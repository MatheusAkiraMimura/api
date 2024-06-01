<?php

namespace App\Http\Controllers\Api\CentroMedicoAdm;

use App\Http\Controllers\Controller;
use App\Http\Requests\CentroMedicoAdm\StoreEspecialidadeRequest;
use App\Http\Resources\CentroMedicoAdm\EspecialidadeResource;
use App\Services\CentroMedicoAdm\EspecialidadeService;

class EspecialidadeController extends Controller
{
    protected $especialidadeService;

    public function __construct(EspecialidadeService $especialidadeService)
    {
        $this->especialidadeService = $especialidadeService;
    }

    public function index()
    {
        $especialidades = $this->especialidadeService->getAllEspecialidades();
        return EspecialidadeResource::collection($especialidades);
    }

    public function store(StoreEspecialidadeRequest $request)
    {
        $especialidade = $this->especialidadeService->createEspecialidade($request->validated());
        return new EspecialidadeResource($especialidade);
    }

    public function show($id)
    {
        $especialidade = $this->especialidadeService->getEspecialidadeById($id);
        return new EspecialidadeResource($especialidade);
    }

    public function update(StoreEspecialidadeRequest $request, $id)
    {
        $especialidade = $this->especialidadeService->updateEspecialidade($request->validated(), $id);
        return new EspecialidadeResource($especialidade);
    }

    public function destroy($id)
    {
        $this->especialidadeService->deleteEspecialidade($id);
        return response(null, 204);
    }
}
