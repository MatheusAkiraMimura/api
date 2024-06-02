<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Interfaces\IServices\CandidateServiceInterface as IServicesCandidateServiceInterface;

class CandidateController extends Controller
{
    protected $candidateService;

    public function __construct(IServicesCandidateServiceInterface $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    public function index()
    {
        $candidates = $this->candidateService->getAllCandidates();
        return CandidateResource::collection($candidates);
    }

    public function store(StoreCandidateRequest $request)
    {
        $candidate = $this->candidateService->createCandidate($request->validated());
        return new CandidateResource($candidate);
    }

    public function show($id)
    {
        $candidate = $this->candidateService->getCandidateById($id);
        return new CandidateResource($candidate);
    }

    public function update(StoreCandidateRequest $request, $id)
    {
        $candidate = $this->candidateService->updateCandidate($request->validated(), $id);
        return new CandidateResource($candidate);
    }

    public function destroy($id)
    {
        $this->candidateService->deleteCandidate($id);
        return response(null, 204);
    }

    public function generatePdf($id)
    {
        return $this->candidateService->generatePdf($id);
    }
}
