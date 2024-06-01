<?php

namespace App\Interfaces\IRepositories;

interface UploadImagemRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function find($id);
    public function delete($id);
}
