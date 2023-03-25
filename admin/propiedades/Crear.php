<?php

//DataBase
require '../../includes/config/database.php';
$db=conectarDB();

if($_SERVER['REQUEST_METHOD']==='POST'){
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <form class="formulario" action="/admin/propiedades/Crear.php" method="POST">
        <fieldset>
            <legend>Información General de Propiedad</legend>

            <label for="titulo">Titulo de Propiedad:</label>
            <input id="titulo" name="titulo" type="text" required>

            <label for="precio">Precio de Propiedad:</label>
            <input id="precio" name="precio" type="number" required>

            <label for="imagen">Imagen:</label>
            <input id="imagen" name="imagen" type="file" accept="image/jpeg, image/png" required>

            <label for="descripcion">Descripcion de Propiedad:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información específica Propiedad</legend>

            <label for="habitaciones">No. de habitaciones:</label>
            <input id="habitaciones" name="habitaciones" type="number" min="1" max="9" required>

            <label for="wc">No. de Baños:</label>
            <input id="wc" type="number" name="wc" min="1" max="9" required>

            <label for="estacionamiento">Cajones de Estacionamiento:</label>
            <input id="estacionamiento" name="estacionamiento" type="number" min="1" max="9" required>
        </fieldset>

        <fieldset>
            <legend>Informacion de Vendedor</legend>

            <select required name="vendedor">
                <option value="1">Juan</option>
                <option value="2">Karen</option>
            </select>
        </fieldset>

        <input type="submit" value="CrearPropiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>