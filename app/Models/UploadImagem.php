<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadImagem extends Model
{
    use HasFactory;

    protected $fillable = ['caminho_da_imagem', 'identificadorUser'];
}
