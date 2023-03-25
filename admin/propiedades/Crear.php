<?php
require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <form class="formulario" action="POST">
        <fieldset>
            <legend>Información General de Propiedad</legend>

            <label for="titulo">Titulo de Propiedad:</label>
            <input id="titulo" type="text">

            <label for="precio">Precio de Propiedad:</label>
            <input id="precio" type="number">

            <label for="imagen">Imagen:</label>
            <input id="imagen" type="file" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion de Propiedad:</label>
            <textarea id="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información específica Propiedad</legend>

            <label for="habitaciones">No. de habitaciones:</label>
            <input id="habitaciones" type="number" min="1" max="9">

            <label for="wc">No. de Baños:</label>
            <input id="wc" type="number" min="1" max="9">

            <label for="estacionamiento">Cajones de Estacionamiento:</label>
            <input id="estacionamiento" type="number" min="1" max="9">
        </fieldset>

        <fieldset>
            <legend>Informacion de Vendedor</legend>

            <select>
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