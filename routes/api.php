<?php

use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\CentroMedicoAdm\EspecialidadeController;
use App\Http\Controllers\Api\ContatoController;
use App\Http\Controllers\Api\CrudController;
use App\Http\Controllers\Api\UploadImagemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas RESTful para especialidades
Route::apiResource('especialidades', EspecialidadeController::class)->except([
    'create', 'edit'
]);

// Rotas RESTful para upload de imagens
Route::apiResource('upload', UploadImagemController::class)->except([
    'show', 'update'
]);

Route::apiResource('crud', CrudController::class);

Route::apiResource('contato', ContatoController::class)->except([
    'create', 'edit'
]);

Route::apiResource('candidates', CandidateController::class);
Route::get('candidates/{id}/pdf', [CandidateController::class, 'generatePdf']);