<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CRUDResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'data_campo' => $this->data_campo,
            'celular' => $this->celular,
            'classificacao' => $this->classificacao,
            'observacao' => $this->observacao,
            'conhecimentos' => $this->conhecimentos,
            'nivel' => $this->nivel,
            'identificadorUser' => $this->identificadorUser,
        ];
    }
}
