<?php

namespace App\Http\Resources\CentroMedicoAdm;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EspecialidadeResource extends JsonResource
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
            'name' => $this->name,
            'inactive' => $this->inactive,
            'identificadorUser' => $this->identificadorUser,
            'created_at' => $this->created_at
        ];
    }
}
