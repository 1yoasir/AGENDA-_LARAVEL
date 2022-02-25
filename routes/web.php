<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use App\Http\Controllers\CategoriasController;
use  Illuminate\Http\Request;

Route::get('/', function () {
    return view('bienvenida');
});

Route::resource('categorias', CategoriasController::class);


//{{\route('anhadir', $persona)}}
/*Route::middleware([])->group(function (){

    Route::controller(CategoriasController::class)->group(function (){

        Route::get('/categorias', 'listado');

        Route::get('/categoria', 'anhadir');

        Route::post('/categoria', 'crear');

        Route::get('/categoria/{categoria}', 'editar');

        Route::post('/categoria/{categoria}', 'actualizar');

    });


});*/
