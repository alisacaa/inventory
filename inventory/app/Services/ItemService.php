<?php
namespace App\Services;

use App\Models\Item;

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
        return Item::create($data);
    }

    public function update($id, array $data) {
        $item = $this->find($id);
        $item->update($data);
        return $item;
    }

    public function delete($id) {
        $item = $this->find($id);
        $item->delete();
    }
}