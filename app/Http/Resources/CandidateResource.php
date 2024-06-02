<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'celular' => $this->celular,
            'nascimento' => $this->nascimento,
            'profissao' => $this->profissao,
            'empresa_contratante' => $this->empresa_contratante,
            'dia_contratacao' => $this->dia_contratacao,
            'faculdade' => $this->faculdade,
            'inicio_faculdade' => $this->inicio_faculdade,
            'fim_faculdade' => $this->fim_faculdade,
            'identificadorUser' => $this->identificadorUser,
        ];
    }
}