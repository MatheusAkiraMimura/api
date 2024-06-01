<?php

namespace App\Services;

use App\Interfaces\IRepositories\ContatoRepositoryInterface;
use App\Interfaces\IServices\ContatoServiceInterface;

class ContatoService implements ContatoServiceInterface
{
    protected $contatoRepository;

    public function __construct(ContatoRepositoryInterface $contatoRepository)
    {
        $this->contatoRepository = $contatoRepository;
    }

    public function getAllContatos()
    {
        return $this->contatoRepository->all();
    }

    public function createContato(array $data)
    {
        return $this->contatoRepository->create($data);
    }

    public function getContatoById($id)
    {
        return $this->contatoRepository->find($id);
    }

    public function updateContato(array $data, $id)
    {
        return $this->contatoRepository->update($data, $id);
    }

    public function deleteContato($id)
    {
        return $this->contatoRepository->delete($id);
    }
}
