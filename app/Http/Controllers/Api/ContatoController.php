<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContatoRequest;
use App\Http\Resources\ContatoResource;
use App\Services\ContatoService;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    protected $ContatoService;

    public function __construct(ContatoService $ContatoService)
    {
        $this->ContatoService = $ContatoService;
    }

    public function index()
    {
        $contatos = $this->ContatoService->getAllContatos();
        return ContatoResource::collection($contatos);
    }

    public function store(StoreContatoRequest $request)
    {
        $contato = $this->ContatoService->createContato($request->validated());
        return new ContatoResource($contato);
    }

    public function show(string $id)
    {
        $contato = $this->ContatoService->getContatoById($id);
        return new ContatoResource($contato);
    }

    public function update(Request $request, string $id)
    {
        $contato = $this->ContatoService->updateContato($request->validated(), $id);
        return new ContatoResource($contato);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ContatoService->deleteContato($id);
        return response(null, 204);
    }
}
