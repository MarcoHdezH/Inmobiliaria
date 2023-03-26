<?php

//Importar Conexion
require '../includes/config/database.php';
$db  = conectarDB();

//Escribir Query
$query = "SELECT * FROM propiedades";

//Consultar DB
$conexion = mysqli_query($db, $query);

$resultado = $_GET['resultado'] ?? null;
require '../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Inmobiliaria</h1>
    <?php if (intval($resultado) === 1) : ?>
        <P class="alerta exito">Anuncio Creado Correctamente</P>
    <?php endif ?>

    <?php if (intval($resultado) === 2) : ?>
        <P class="alerta exito">Anuncio Actualizado Correctamente</P>
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
                        <a class="boton-rojo-block" href="/admin/propiedades/Borrar.php">Eliminar</a>
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