<?php

namespace App\Interfaces\IServices\CentroMedicoAdm;

interface EspecialidadeServiceInterface
{
    public function getAllEspecialidades();

    public function createEspecialidade(array $data);

    public function getEspecialidadeById($id);

    public function updateEspecialidade(array $data, $id);

    public function deleteEspecialidade($id);
}
