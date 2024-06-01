<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCRUDRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'data_campo' => ['required', 'date', 'max:255'],
            'celular' => ['required', 'string', 'max:15'],
            'classificacao' => ['required', 'string', 'max:50'],
            'observacao' => ['nullable', 'string', 'max:1000'],
            'conhecimentos' => ['nullable', 'string', 'max:255'],
            'nivel' => ['required', 'string', 'max:50'],
            'identificadorUser' => ['required', 'string', 'max:255'],

        ];
    }
}
