<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'celular' => 'required|string|max:15',
            'nascimento' => 'required|date',
            'profissao' => 'nullable|string|max:255',
            'empresa_contratante' => 'nullable|string|max:255',
            'dia_contratacao' => 'nullable|date',
            'faculdade' => 'nullable|string|max:255',
            'inicio_faculdade' => 'nullable|date',
            'fim_faculdade' => 'nullable|date',
            'identificadorUser' => 'required|string|max:255',
        ];
    }
}