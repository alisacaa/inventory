<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;

class ItemController extends BaseController
{
    protected ItemService $svc;

    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    public function index()
    {
        return $this->success($this->svc->all());
    }

    public function store(StoreItemRequest $req)
    {
        $item = $this->svc->create($req->validated());
        return $this->success($item, 'Item dibuat', 201);
    }

    public function show($id)
    {
        try {
            return $this->success($this->svc->find($id));
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    public function update(UpdateItemRequest $req, $id)
    {
        try {
            $item = $this->svc->update($id, $req->validated());
            return $this->success($item, 'Item diperbarui');
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->svc->delete($id);
            return $this->success(null, 'Item dihapus', 204);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }
}