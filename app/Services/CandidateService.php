<?php

namespace App\Services;

use App\Interfaces\IRepositories\CandidateRepositoryInterface;
use App\Interfaces\IServices\CandidateServiceInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class CandidateService implements CandidateServiceInterface
{
    protected $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function getAllCandidates()
    {
        return $this->candidateRepository->getAll();
    }

    public function createCandidate(array $data)
    {
        return $this->candidateRepository->create($data);
    }

    public function getCandidateById($id)
    {
        return $this->candidateRepository->findById($id);
    }

    public function updateCandidate(array $data, $id)
    {
        return $this->candidateRepository->update($data, $id);
    }

    public function deleteCandidate($id)
    {
        return $this->candidateRepository->delete($id);
    }

    public function generatePdf($id)
    {
        App::setLocale('pt_BR');
        Carbon::setLocale('pt_BR');

        $candidate = $this->candidateRepository->findById($id);
        $age = Carbon::parse($candidate->nascimento)->age;

        if ($candidate->dia_contratacao) {
            $start = Carbon::parse($candidate->dia_contratacao);
            $end = Carbon::now();
            $diff = $start->diff($end);

            $diffYears = $diff->y;
            $diffMonths = $diff->m;
            $diffDays = $diff->d;

            $formattedDiff = '';
            if ($diffYears > 0) {
                $formattedDiff .= $diffYears . ' ano' . ($diffYears > 1 ? 's' : '');
            }
            if ($diffMonths > 0) {
                if ($formattedDiff !== '') {
                    $formattedDiff .= ', ';
                }
                $formattedDiff .= $diffMonths . ' mês' . ($diffMonths > 1 ? 'es' : '');
            }
            if ($diffDays > 0) {
                if ($formattedDiff !== '') {
                    $formattedDiff .= ' e ';
                }
                $formattedDiff .= $diffDays . ' dia' . ($diffDays > 1 ? 's' : '');
            }
        } else {
            $formattedDiff = 'N/A';
        }

        $pdf = Pdf::loadView('pdf.candidate', compact('candidate', 'formattedDiff'));
        return $pdf->download('candidate.pdf');
    }
}
