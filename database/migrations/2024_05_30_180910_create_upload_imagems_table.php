<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadImagemsTable extends Migration
{
    public function up()
    {
        Schema::create('upload_imagems', function (Blueprint $table) {
            $table->id();
            $table->string('caminho_da_imagem');
            $table->string('identificadorUser');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('upload_imagems');
    }
}
