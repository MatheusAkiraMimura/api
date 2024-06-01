<?php

namespace App\Repositories;

use App\Interfaces\IRepositories\ContatoRepositoryInterface;
use App\Models\Contato;

class ContatoRepository implements ContatoRepositoryInterface
{
    public function all()
    {
        return Contato::all();
    }

    public function create(array $data)
    {
        return Contato::create($data);
    }

    public function find($id)
    {
        return Contato::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $contato = $this->find($id);
        $contato->update($data);
        return $contato;
    }

    public function delete($id)
    {
        $contato = $this->find($id);
        $contato->delete();
        return $contato;
    }
}
