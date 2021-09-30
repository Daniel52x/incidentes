<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('tipo-criticidade')->group(function () {
    Route::get('/all',  [App\Http\Controllers\TipoCriticidade::class, 'getAll']);
});

Route::prefix('tipo-incidente')->group(function () {
    Route::get('/all',  [App\Http\Controllers\TipoIncidente::class, 'getAll']);
});

Route::prefix('incidente')->group(function () {
    Route::post('/',  [App\Http\Controllers\Incidente::class, 'insert']);
    Route::delete('/{id}',  [App\Http\Controllers\Incidente::class, 'delete']);
});
