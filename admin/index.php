<?php

require '../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth){
    header('Location: /');
}

//Importar Conexion
require '../includes/config/database.php';
$db  = conectarDB();

//Escribir Query
$query = "SELECT * FROM propiedades";

//Consultar DB
$conexion = mysqli_query($db, $query);

$resultado = $_GET['resultado'] ?? null;

if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if($id){

        //Eliminando Imagen
        $query = "SELECT imagen FROM propiedades WHERE id=$id";
        $resultado = mysqli_query($db,$query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../images/'.$propiedad['imagen']);

        //Elimina la Propiedad
        $query="DELETE FROM propiedades WHERE id=$id";
        $resultado = mysqli_query($db,$query);
        if($resultado){
            header('Location:/admin?resultado=3');
        }
    }
}

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Inmobiliaria (<?php echo $_SESSION['usuario'] ?>)</h1>
    <?php if (intval($resultado) === 1) : ?>
        <P class="alerta exito">Anuncio Creado Correctamente</P>
    <?php endif ?>

    <?php if (intval($resultado) === 2) : ?>
        <P class="alerta exito">Anuncio Actualizado Correctamente</P>
    <?php endif ?>

    <?php if (intval($resultado) === 2) : ?>
        <P class="alerta exito">Anuncio Borrado Correctamente</P>
    <?php endif ?>
    <a href="/admin/propiedades/Crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($conexion)) : ?>
                <tr>
                    <td><?php echo $propiedad['id'] ?></td>
                    <td><?php echo $propiedad['titulo'] ?></td>
                    <td><img class="imagen-tabla" src="/images/<?php echo $propiedad['imagen']; ?>"></td>
                    <td><?php echo $propiedad['precio'] ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/admin/propiedades/Actualizar.php?id=<?php echo $propiedad['id'] ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</main>

<?php
//Cerrar Conexion
mysqli_close($db);
incluirTemplate('footer');
?>