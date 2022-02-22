<html>
<body>
<?php

?>
<h1>Editar categoria</h1>
<form action="/categoria/{{$id}}" method="POST">

    <label for="nombre">Nombre</label>
    <input type="hidden"  name="id" value={{$id}}>
    <input type="text" name="nombre" value="{{$nombre}}">
    <input type="submit" name="editar" value="Editar">
</form>
<a href="/categorias">Volver al listado</a>
</body>
</html>
