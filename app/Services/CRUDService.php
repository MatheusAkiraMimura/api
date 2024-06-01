<?php

namespace App\Services;

use App\Interfaces\IRepositories\CRUDRepositoryInterface;
use App\Interfaces\IServices\CRUDServiceInterface;

class CRUDService implements CRUDServiceInterface
{
    protected $crudRepository;

    public function __construct(CRUDRepositoryInterface $crudRepository)
    {
        $this->crudRepository = $crudRepository;
    }

    public function getAllCRUDs()
    {
        return $this->crudRepository->all();
    }

    public function createCRUD(array $data)
    {
        return $this->crudRepository->create($data);
    }

    public function getCRUDById($id)
    {
        return $this->crudRepository->find($id);
    }

    public function updateCRUD(array $data, $id)
    {
        return $this->crudRepository->update($data, $id);
    }

    public function deleteCRUD($id)
    {
        return $this->crudRepository->delete($id);
    }
}
