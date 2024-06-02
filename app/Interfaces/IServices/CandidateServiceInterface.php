<?php

namespace App\Interfaces\IServices;

interface CandidateServiceInterface
{
    public function getAllCandidates();
    public function createCandidate(array $data);
    public function getCandidateById($id);
    public function updateCandidate(array $data, $id);
    public function deleteCandidate($id);
    public function generatePdf($id);
}
