<?php
$resultado=$_GET['resultado'] ?? null;
require '../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Inmobiliaria</h1>
    <?php if(intval($resultado)===1) : ?>
        <P class="alerta exito">Anuncio Creado Correctamente</P>
    <?php endif ?>
    <a href="/admin/propiedades/Crear.php" class="boton boton-verde">Nueva Propiedad</a>
</main>

<?php
incluirTemplate('footer');
?>