<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contato::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mensagem' => 'required|string|max:500',
            'identificadorUser' => 'required|string|email|max:255',
        ]);

        $contato = Contato::create($validatedData);

        return response()->json($contato, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contato = Contato::findOrFail($id);
        return response()->json($contato);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'mensagem' => 'sometimes|required|string|max:500',
            'email' => 'sometimes|required|string|email|max:255',
        ]);

        $contato = Contato::findOrFail($id);
        $contato->update($validatedData);

        return response()->json($contato);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();

        return response()->json(null, 204);
    }
}
