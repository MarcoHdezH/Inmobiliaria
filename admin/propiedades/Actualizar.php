<?php

$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location:/admin');
}
//DataBase
require '../../includes/config/database.php';
$db=conectarDB();

//Consultar Vendedores
$consulta = "SELECT * FROM vendedores";
$resultadoVendedores =  mysqli_query($db,$consulta);

$consulta = "SELECT * FROM propiedades WHERE id=$id";
$resultadoPropiedades =  mysqli_query($db,$consulta);
$Propiedades =mysqli_fetch_assoc($resultadoPropiedades);

//Arreglo con Mensajes de Errores
$titulo = $Propiedades['titulo'];
$precio = $Propiedades['precio'];
$descripcion = $Propiedades['descripcion'];
$habitaciones = $Propiedades['habitaciones'];
$wc = $Propiedades['wc'];
$estacionamiento = $Propiedades['estacionamiento'];
$vendedorId = $Propiedades['vendedorId'];
$ImagenPropiedad = $Propiedades['imagen'];
$errores = [];

if($_SERVER['REQUEST_METHOD']==='POST'){


    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    $imagen = ($_FILES['imagen']);

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

    //Validad Tamaño de Imagenes
    $medida = 1000*100;
    if($imagen['size']>$medida){
        $errores[]="La imagen es muy Pesada para Subir";
    }

    //Revisar el Arreglo de Errores
    if(empty($errores)){

        /* Subida de Archivos */
        $carpetaImagenes='../../images/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        if($imagen['name']){
            unlink($carpetaImagenes.$Propiedades['imagen']);
            //Subir Imagen
            $nombreImagen=md5(uniqid(rand(),true)).".jpg";
            move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagen);
        }else{
            $nombreImagen=$Propiedades['imagen'];
        }

        //Insertar en la base de Datos
        $query = "UPDATE propiedades SET titulo='$titulo',precio=$precio,imagen='$nombreImagen',descripcion='$descripcion',habitaciones=$habitaciones,wc=$wc,estacionamiento=$estacionamiento,vendedorId=$vendedorId WHERE id=$id";
        $resultado = mysqli_query($db,$query);
        if($resultado){
            header('Location:/admin?resultado=2');
        }
    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach($errores as $error) : ?> 
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General de Propiedad</legend>

            <label for="titulo">Titulo de Propiedad:</label>
            <input id="titulo" name="titulo" type="text" value="<?php echo $titulo ?>">

            <label for="precio">Precio de Propiedad:</label>
            <input id="precio" name="precio" type="number" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input id="imagen" name="imagen" type="file" accept="image/jpeg, image/png">

            <img class="imagen-small" src="/images/<?php echo $ImagenPropiedad ?>">

            <label for="descripcion">Descripcion de Propiedad:</label>
            <textarea id="descripcion" name="descripcion" value="<?php echo $descripcion ?>"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información específica Propiedad</legend>

            <label for="habitaciones">No. de habitaciones:</label>
            <input id="habitaciones" name="habitaciones" type="number" min="1" max="9" value="<?php echo $habitaciones ?>">

            <label for="wc">No. de Baños:</label>
            <input id="wc" type="number" name="wc" min="1" max="9" value="<?php echo $wc ?>">

            <label for="estacionamiento">Cajones de Estacionamiento:</label>
            <input id="estacionamiento" name="estacionamiento" type="number" min="1" max="9" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Informacion de Vendedor</legend>

            <select name="vendedor">
                <option value="" disabled selected>-- Seleccione una Opción --</option>
                <?php while($vendedor=mysqli_fetch_assoc($resultadoVendedores)) :?>
                    <option <?php echo $vendedorId===$vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id'] ?>"><?php echo $vendedor['nombre']." ".$vendedor['apellido'] ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>