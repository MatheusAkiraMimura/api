<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UploadImagemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'caminho_da_imagem' => $this->caminho_da_imagem,
            'identificadorUser' => $this->identificadorUser,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
