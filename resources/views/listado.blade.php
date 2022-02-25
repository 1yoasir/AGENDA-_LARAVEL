<style>
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
    <div class="container mx-auto">
        <x-menu/>
    </div>
<h1>Listado Categorias</h1>
<table>
    <tr>
        <th>Categoria</th>
        <th>Eliminar</th>
    </tr>
    @foreach ($categorias as $categoria)
    <tr>
        <td><a href="{{route('categorias.show', $categoria)}}">{{$categoria->nombre}}</a></td>
        <td>
            <form action="{{route('categorias.destroy', $categoria)}}" method="POST">
                @method('DELETE')
                <button type="submit" name="delete" value="eliminar" id="eliminar">x</button>
            </form>
        </td>
    </tr>
    @endforeach

    </table>
<a href="{{route('categorias.create')}}">Crear categoria</a>
<br>
<a href="/">Bienvenida</a>
</body>
</html>
