<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriasController extends Controller
{
    public function listadoCategorias(){
        $categorias = Categoria::all();
        return view ('listadoCategorias', compact('categorias'));
    }

    public function anhadirCategoria(){
        return view('añadirCategoria');
    }

    public function crearCategoria (Request $request){
        $nombre = $request->input('nombre');
        DB::table('categorias')->insert([
            'nombre'=>$nombre
        ]);
        return redirect('/categorias');
    }

    public function editarCategoria(Categoria $categoria){
        $nombre= $categoria->nombre;
        $id= $categoria->id;
        return view('editarCategoria', compact('nombre', 'id'));
    }

    public function actualizarCategoria(Request $request){

        if(isset($_POST['eliminar'])){
            $id = $request->input('id');
            DB::table('categorias')->whereId($id) ->delete();
            return redirect('/categorias');
        } else{
            $nombre = $request ->input('nombre');
            $id = $request->input('id');
            DB::table('categorias')->where("id", $id)->update([
                'nombre'=>$nombre
            ]);
            return redirect('/categorias');
        }

    }
}
