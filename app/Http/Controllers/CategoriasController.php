<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::orderBy('nombre')->get();
        return view ('listado', compact('categorias'));
    }

    public function create(){
        return view('anhadir');
    }

    public function store (Request $request, Categoria $categoria){
        $this->validate($request, [
            'nombre' => 'required',
        ]);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        //return redirect('/categorias'); Antigua forma
        return redirect()->route('categorias.index');
    }

    public function show(Categoria $categoria){
        $id = $categoria->id;
        $nombre = $categoria->nombre;
        return view('categoria_show', compact('id', 'nombre'));
    }

    public function edit(Categoria $categoria){
        $id = $categoria->id;
        $nombre = $categoria->nombre;
        return view('editar', compact('id', 'nombre'));
    }

    public function update(Request $request, $id){
            $nombre = $request->nombre;

            DB::table('categorias')->where("id", $id)->update([
                'nombre'=>$nombre
            ]);
            return redirect()->route('categorias.index');

    }

    public function destroy(Categoria $categoria){

        $categoria->delete();
        return redirect()->route('categorias.index');

    }
}
//Route::resource('categorias', CategoriaController:class) -> only(rutas);
//el only si solo quiero algunos y si quiero todos, sin nada
//index create store update destroy show
