<?php

namespace App\Repositories;

use App\Interfaces\IRepositories\CRUDRepositoryInterface;
use App\Models\CrudSimples;

class CRUDRepository implements CRUDRepositoryInterface
{
    public function all()
    {
        return CrudSimples::all();
    }

    public function create(array $data)
    {
        return CrudSimples::create($data);
    }

    public function find($id)
    {
        return CrudSimples::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $crud = $this->find($id);
        $crud->update($data);
        return $crud;
    }

    public function delete($id)
    {
        $crud = $this->find($id);
        $crud->delete();
        return $crud;
    }
}
