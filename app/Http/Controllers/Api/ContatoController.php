<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContatoRequest;
use App\Http\Resources\ContatoResource;
use App\Services\ContatoService; 

class ContatoController extends Controller
{
    protected $contatoService;

    public function __construct(ContatoService $contatoService)
    {
        $this->contatoService = $contatoService;
    }

    public function index()
    {
        $contatos = $this->contatoService->getAllContatos();
        return ContatoResource::collection($contatos);
    }

    public function store(StoreContatoRequest $request)
    {
        $contato = $this->contatoService->createContato($request->validated());
        return new ContatoResource($contato);
    }

    public function show(string $id)
    {
        $contato = $this->contatoService->getContatoById($id);
        return new ContatoResource($contato);
    }

    public function update(StoreContatoRequest $request, string $id)
    {
        $contato = $this->contatoService->updateContato($request->validated(), $id);
        return new ContatoResource($contato);
    }

    public function destroy(string $id)
    {
        $this->contatoService->deleteContato($id);
        return response(null, 204);
    }
}