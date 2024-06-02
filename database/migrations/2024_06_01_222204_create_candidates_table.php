<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('celular');
            $table->date('nascimento');
            $table->string('profissao')->nullable();
            $table->string('empresa_contratante')->nullable();
            $table->date('dia_contratacao')->nullable();
            $table->string('faculdade')->nullable();
            $table->date('inicio_faculdade')->nullable();
            $table->date('fim_faculdade')->nullable();
            $table->string('identificadorUser');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
