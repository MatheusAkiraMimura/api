<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\crudSimples;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        return crudSimples::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'data_campo' => 'required|date',
            'celular' => 'required|string|max:15',
            'classificacao' => 'required|string|max:50',
            'observacao' => 'nullable|string',
            'conhecimentos' => 'nullable|string',
            'nivel' => 'required|string|max:50',
            'identificadorUser' => 'required|string|max:255',
        ]);

        $crud = crudSimples::create($validatedData);

        return response()->json($crud, 201);
    }

    public function show($id)
    {
        $crud = crudSimples::findOrFail($id);
        return response()->json($crud);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255',
            'data_campo' => 'sometimes|required|date',
            'celular' => 'sometimes|required|string|max:15',
            'classificacao' => 'sometimes|required|string|max:50',
            'observacao' => 'nullable|string',
            'conhecimentos' => 'nullable|string',
            'nivel' => 'sometimes|required|string|max:50',
            'identificadorUser' => 'required|string|max:255',
        ]);

        $crud = crudSimples::findOrFail($id);
        $crud->update($validatedData);

        return response()->json($crud);
    }

    public function destroy($id)
    {
        $crud = crudSimples::findOrFail($id);
        $crud->delete();

        return response()->json(null, 204);
    }
}
