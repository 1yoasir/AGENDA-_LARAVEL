<html>
<body>
<?php

?>
<h1>Editar categoria</h1>
<form action="{{route('categorias.update', $id)}}" method="POST">
@method('PUT')
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{$nombre}}">
    <input type="submit" name="editar" value="Guardar">
</form>
<a href="{{route('categorias.index')}}">Volver al listado</a>
</body>
</html>
