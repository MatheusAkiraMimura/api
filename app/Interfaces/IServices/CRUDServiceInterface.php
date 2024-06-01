<?php

namespace App\Interfaces\IServices;

interface CRUDServiceInterface
{
    public function getAllCRUDs();

    public function createCRUD(array $data);

    public function getCRUDById($id);

    public function updateCRUD(array $data, $id);

    public function deleteCRUD($id);
}
