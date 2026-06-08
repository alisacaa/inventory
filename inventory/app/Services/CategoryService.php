<?php
namespace App\Services;

use App\Models\Category;

class CategoryService {

    public function all() {
        return Category::all();
    }

    public function find($id) {
        $cat = Category::find($id);
        if (!$cat) throw new \Exception("Kategori tidak ditemukan");
        return $cat;
    }

    public function create(array $data) {
        return Category::create($data);
    }

    public function update($id, array $data) {
        $cat = $this->find($id);
        $cat->update($data);
        return $cat;
    }

    public function delete($id) {
        $cat = $this->find($id);
        $cat->delete();
    }
}