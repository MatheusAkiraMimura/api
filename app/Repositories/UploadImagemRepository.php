<?php

namespace App\Repositories;

use App\Interfaces\IRepositories\UploadImagemRepositoryInterface;
use App\Models\UploadImagem;

class UploadImagemRepository implements UploadImagemRepositoryInterface
{
    public function all()
    {
        return UploadImagem::all();
    }

    public function create(array $data)
    {
        return UploadImagem::create($data);
    }

    public function find($id)
    {
        return UploadImagem::findOrFail($id);
    }

    public function delete($id)
    {
        $crud = $this->find($id);
        $crud->delete();
        return $crud;
    }

}
