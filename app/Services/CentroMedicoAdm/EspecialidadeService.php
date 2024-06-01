<?php

namespace App\Services\CentroMedicoAdm;

use App\Interfaces\IRepositories\CentroMedicoAdm\EspecialidadeRepositoryInterface;
use App\Interfaces\IServices\CentroMedicoAdm\EspecialidadeServiceInterface;

class EspecialidadeService implements EspecialidadeServiceInterface
{
    protected $especialidadeRepository;

    public function __construct(EspecialidadeRepositoryInterface $especialidadeRepository)
    {
        $this->especialidadeRepository = $especialidadeRepository;
    }

    public function getAllEspecialidades()
    {
        return $this->especialidadeRepository->all();
    }

    public function createEspecialidade(array $data)
    {
        return $this->especialidadeRepository->create($data);
    }

    public function getEspecialidadeById($id)
    {
        return $this->especialidadeRepository->find($id);
    }

    public function updateEspecialidade(array $data, $id)
    {
        return $this->especialidadeRepository->update($data, $id);
    }

    public function deleteEspecialidade($id)
    {
        return $this->especialidadeRepository->delete($id);
    }
}
