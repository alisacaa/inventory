<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_all_items()
    {
        $response = $this->getJson('/api/v1/items');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_an_item()
    {
        // 1. Buat kategori terlebih dahulu agar ID 1 tersedia
        $category = Category::create(['name' => 'Elektronik']);

        $data = [
            'name' => 'Item Baru Dari Test',
            'stock' => 15,
            'price' => 250000,
            'quantity' => 15,
            'category_id' => $category->id // Menggunakan ID dari kategori yang baru dibuat
        ];

        $response = $this->postJson('/api/v1/items', $data);
        $response->assertStatus(201);
    }

    /** @test */
    public function it_can_update_an_item()
    {
        // 1. Buat kategori terlebih dahulu
        $category = Category::create(['name' => 'Elektronik']);

        // 2. Buat item terikat dengan kategori tersebut
        $item = Item::create([
            'name' => 'Item Test Awal',
            'stock' => 5,
            'price' => 10000,
            'quantity' => 5,
            'category_id' => $category->id
        ]);

        $data = [
            'name' => 'Nama Item Diubah lewat Test',
            'stock' => 5,
            'price' => 10000,
            'quantity' => 5,
            'category_id' => $category->id
        ];

        $response = $this->putJson("/api/v1/items/{$item->id}", $data);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_an_item()
    {
        // 1. Buat kategori terlebih dahulu
        $category = Category::create(['name' => 'Elektronik']);

        // 2. Buat item terikat dengan kategori tersebut
        $item = Item::create([
            'name' => 'Item Test Diapus',
            'stock' => 2,
            'price' => 5000,
            'quantity' => 2,
            'category_id' => $category->id
        ]);

        $response = $this->deleteJson("/api/v1/items/{$item->id}");
        $response->assertStatus(204);
    }
}