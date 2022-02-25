<body>
<h1>Crear categoria</h1>
<form action="{{route('categorias.store')}}" method="POST">
@method('POST')
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"  placeholder="Introduce nombre">
    <input type="submit" name="crear" value="Crear">
</form>
<a href="/categorias">Volver al listado</a>
</body>
</html
