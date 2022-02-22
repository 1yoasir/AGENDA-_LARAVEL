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
<h1>Listado Categorias</h1>
<table>
    <tr>
        <th>Categoria</th>
        <th>ID</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach (App\Models\Categoria::all() as $categoria){?>
    <tr>
        <td><a href="/categoria/<?php echo $categoria->id?>"><?php echo $categoria->nombre?></a></td>
        <td><a href="/categoria/<?php echo $categoria->id?>"><?php echo $categoria->id?> </a></td>
        <td>
            <form action="/categoria/<?php echo $categoria->id?>" method="POST">
                <input type="hidden"  name="id" value="<?php echo $categoria->id?>">
                <button type="submit" name="eliminar" value="eliminar" id="eliminar">x</button>
            </form>
        </td>
    </tr>
    <?php }?>

    </table>
<a href="/categoria">Crear categoria</a>
<br>
<a href="/">Bienvenida</a>
</body>
</html>
