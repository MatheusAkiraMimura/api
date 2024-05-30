<?php

use App\Http\Controllers\Api\Especialidades\EspecialidadeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('especialidades', EspecialidadeController::class)->except(
    'create', 'edit'
);