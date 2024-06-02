<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'celular', 'nascimento',
        'profissao', 'empresa_contratante', 'dia_contratacao',
        'faculdade', 'inicio_faculdade', 'fim_faculdade',
        'identificadorUser'
    ];
}
