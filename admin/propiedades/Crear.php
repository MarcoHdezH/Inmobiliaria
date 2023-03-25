<?php

//DataBase
require '../../includes/config/database.php';
$db=conectarDB();

//Arreglo con Mensajes de Errores
$errores = [];

if($_SERVER['REQUEST_METHOD']==='POST'){
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    // $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];

    if(!$titulo){
        $errores[] = "Debes Añadir un titulo";
    }

    if(!$precio){
        $errores[] = "Debes añadir un Precio";
    }

    if(strlen($descripcion)<50){
        $errores[] = "Debes Añadir una descripcion y esta debe ser mayor a 50";
    }

    if(!$habitaciones){
        $errores[] = "Debes Añadir un número de Habitacion(es)";
    }

    if(!$wc){
        $errores[] = "Debes Añadir un número de Baño(s)";
    }

    if(!$estacionamiento){
        $errores[] = "Debes Añadir un número de cajones de estacionamiento";
    }

    if(!$vendedorId){
        $errores[] = "Debes Añadir un Vendedor";
    }

    //Revisar el Arreglo de Errores
    if(empty($errores)){
        //Insertar en la base de Datos
        $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento,vendedorId) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$vendedorId')";
        $resultado = mysqli_query($db,$query);
    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach($errores as $error) : ?> 
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" action="/admin/propiedades/Crear.php" method="POST">
        <fieldset>
            <legend>Información General de Propiedad</legend>

            <label for="titulo">Titulo de Propiedad:</label>
            <input id="titulo" name="titulo" type="text">

            <label for="precio">Precio de Propiedad:</label>
            <input id="precio" name="precio" type="number">

            <label for="imagen">Imagen:</label>
            <input id="imagen" name="imagen" type="file" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion de Propiedad:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información específica Propiedad</legend>

            <label for="habitaciones">No. de habitaciones:</label>
            <input id="habitaciones" name="habitaciones" type="number" min="1" max="9">

            <label for="wc">No. de Baños:</label>
            <input id="wc" type="number" name="wc" min="1" max="9">

            <label for="estacionamiento">Cajones de Estacionamiento:</label>
            <input id="estacionamiento" name="estacionamiento" type="number" min="1" max="9">
        </fieldset>

        <fieldset>
            <legend>Informacion de Vendedor</legend>

            <select name="vendedor">
                <option value="" disabled selected>-- Seleccione una Opción --</option>
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