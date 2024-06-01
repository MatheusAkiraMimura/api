<?php

namespace App\Interfaces\IServices;

interface ContatoServiceInterface
{
    public function getAllContatos();

    public function createContato(array $data);

    public function getContatoById($id);

    public function updateContato(array $data, $id);

    public function deleteContato($id);
}
