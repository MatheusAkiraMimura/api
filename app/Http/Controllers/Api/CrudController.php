<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCRUDRequest;
use App\Http\Resources\CRUDResource;
use App\Services\CRUDService;

class CrudController extends Controller
{
    protected $CRUDService;

    public function __construct(CRUDService $CRUDService)
    {
        $this->CRUDService = $CRUDService;
    }

    public function index()
    {
        $contatos = $this->CRUDService->getAllCRUDs();
        return CRUDResource::collection($contatos);
    }

    public function store(StoreCRUDRequest $request)
    {
        $contato = $this->CRUDService->createCRUD($request->validated());
        return new CRUDResource($contato);
    }

    public function show(string $id)
    {
        $contato = $this->CRUDService->getCRUDById($id);
        return new CRUDResource($contato);
    }

    public function update(StoreCRUDRequest $request, string $id)
    {
        $contato = $this->CRUDService->updateCRUD($request->validated(), $id);
        return new CRUDResource($contato);
    }

    public function destroy(string $id)
    {
        $this->CRUDService->deleteCRUD($id);
        return response(null, 204);
    }
}
