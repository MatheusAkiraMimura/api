<?php

namespace App\Repositories\CentroMedicoAdm;

use App\Interfaces\IRepositories\CentroMedicoAdm\EspecialidadeRepositoryInterface;
use App\Models\CentroMedicoAdm\Especialidade;

class EspecialidadeRepository implements EspecialidadeRepositoryInterface
{
    public function all()
    {
        return Especialidade::all();
    }

    public function create(array $data)
    {
        return Especialidade::create($data);
    }

    public function find($id)
    {
        return Especialidade::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $especialidade = $this->find($id);
        $especialidade->update($data);
        return $especialidade;
    }

    public function delete($id)
    {
        $especialidade = $this->find($id);
        $especialidade->delete();
        return $especialidade;
    }
}
