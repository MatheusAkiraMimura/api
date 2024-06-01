<?php

namespace App\Models\CentroMedicoAdm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'inactive', 'identificadorUser'];
    
}
