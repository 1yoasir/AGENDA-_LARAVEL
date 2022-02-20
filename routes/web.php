<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use  Illuminate\Http\Request;

Route::get('/', function () {
    //return view('welcome');
    return "<html>
            <body>
                <h1>Bienvenida</h1>
                <br>
                <p>¡Bienvenido/a a la Agenda Laravel</p>

                <a href='/categorias'>Ver lista Categorias</a>
            </body>
            </html>";
});

Route::middleware([])->group(function (){

    Route::get('/categorias', function (){
        $salida = '<style>
                    table, th, td{
                        border:1px solid black;
                        border-collapse: collapse;
                        text-align: center;
                    }

                    form{
                    margin: auto;
                    }

                   </style>
                   <html>
                   <body>
                       <h1>Listado Categorias</h1>
                       <table>
                           <tr>
                               <th>Categoria</th>
                               <th>ID</th>
                               <th>Eliminar</th>
                           </tr>';
        foreach (Categoria::all() as $categoria){
            $salida= $salida . '<tr>
        <td><a href="/categoria/'.$categoria->id.'">' . $categoria->nombre . '</a></td>
        <td><a href="/categoria/'.$categoria->id.'">' . $categoria->id . '</a></td>
        <td>
            <form action="/categoria/'.$categoria->id.'" method="POST">
                <input type="hidden"  name="id" value='.$categoria->id.'>
                <button type="submit" name="eliminar" value="eliminar" id="eliminar">x</button>
            </form>
        </td>
        </tr>';
        }

        $salida = $salida . '</table>
        <a href="/categoria">Crear categoria</a>
        <br>
        <a href="/">Bienvenida</a>
        </body>
        </html>';

        return($salida);
    });

    Route::get('/categoria', function (){
        $salida='<html>
            <body>
                <h1>Crear categoria</h1>
                <form action="/categoria" method="POST">

                <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"  placeholder="Introduce nombre">
                    <input type="submit" name="crear" value="Crear">
                </form>
                <a href="/categorias">Volver al listado</a>
            </body>
            </html>';

        return $salida;
    });

    Route::post('/categoria', function (Request $request){
        $nombre = $request->input('nombre');
        DB::table('categorias')->insert([
            'nombre'=>$nombre
        ]);
        return redirect('/categorias');
    });

    Route::get('/categoria/{categoria}', function (Categoria $categoria){
        $nombre=$categoria->nombre;
        $id= $categoria->id;
        $salida='<html>
            <body>
                <h1>Editar categoria</h1>
                <form action="/categoria/'.$categoria->id.'" method="POST">

                <label for="nombre">Nombre</label>
                    <input type="hidden"  name="id" value='.$id.'>
                    <input type="text" name="nombre" value='.$nombre.'>
                    <input type="submit" name="editar" value="Editar">
                </form>
                <a href="/categorias">Volver al listado</a>
            </body>
            </html>';
        return $salida;
    });

    Route::post('/categoria/{categoria}', function (Request $request){

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

    });


});
