<?php

namespace App\Repositories;

use App\Models\UploadImagem;
use Illuminate\Support\Facades\DB;

class UploadImagemRepository
{
    public function getAll()
    {
        return UploadImagem::all();
    }
}
