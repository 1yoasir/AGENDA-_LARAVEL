<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use App\Http\Controllers\CategoriasController;
use  Illuminate\Http\Request;

Route::get('/', function () {
    return view('bienvenida');
});

Route::middleware([])->group(function (){

    Route::get('/categorias', [CategoriasController::class, 'listadoCategorias']);

    Route::get('/categoria', [CategoriasController::class, 'anhadirCategoria']);

    Route::post('/categoria', [CategoriasController::class, 'crearCategoria']);

    Route::get('/categoria/{categoria}', [CategoriasController::class, 'editarCategoria']);

    Route::post('/categoria/{categoria}', [CategoriasController::class, 'actualizarCategoria']);


});
