<?php

namespace App\Repositories;

use App\Interfaces\IRepositories\CandidateRepositoryInterface;
use App\Models\Candidate;

class CandidateRepository implements CandidateRepositoryInterface
{
    public function getAll()
    {
        return Candidate::all();
    }

    public function create(array $data)
    {
        return Candidate::create($data);
    }

    public function findById($id)
    {
        return Candidate::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->update($data);
        return $candidate;
    }

    public function delete($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
    }
}
