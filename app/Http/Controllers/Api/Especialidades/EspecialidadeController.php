<?php

namespace App\Http\Controllers\Api\Especialidades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEspecialidadeRequest;
use App\Http\Resources\EspecialidadeResource;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidade = Especialidade::all();
        return EspecialidadeResource::collection($especialidade);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEspecialidadeRequest $request)
    {
        $especialidade = Especialidade::create($request->validated());
        return new EspecialidadeResource($especialidade);
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidade $especialidade)
    {
        return new EspecialidadeResource($especialidade);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEspecialidadeRequest $request, Especialidade $especialidade)
    {
        $especialidade->update($request->validated());
        return new EspecialidadeResource($especialidade);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidade $especialidade)
    {
        $especialidade->delete();
        return response(null, 204);
    }
}
