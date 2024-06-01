<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crudSimples extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'email', 
        'data_campo', 
        'celular', 
        'classificacao', 
        'observacao', 
        'conhecimentos', 
        'nivel', 
        'identificadorUser',
    ];

    protected $dates = ['data_campo'];
}
