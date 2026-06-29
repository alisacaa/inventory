<?php

namespace App\Services;

use App\Models\Item;
// Tambah import Log Facade di bawah ini (Sesuai Soal 2)
use Illuminate\Support\Facades\Log;

class ItemService {

    public function all() {
        return Item::all();
    }

    public function find($id) {
        $item = Item::find($id);
        if (!$item) throw new \Exception("Item tidak ditemukan");
        return $item;
    }

    public function create(array $data) {
        // Log saat membuat item baru
        Log::info('Membuat item baru (ItemService@create)', ['data_input' => $data]);
        
        return Item::create($data);
    }

    public function update($id, array $data) {
        $item = $this->find($id);
        
        // Log saat memperbarui item beserta id dan perubahannya
        Log::info('Memperbarui data item (ItemService@update)', [
            'item_id' => $id,
            'data_baru' => $data
        ]);
        
        $item->update($data);
        return $item;
    }

    public function delete($id) {
        $item = $this->find($id);
        
        // Log saat menghapus item
        Log::info('Menghapus data item (ItemService@delete)', ['item_id' => $id]);
        
        $item->delete();
    }
}