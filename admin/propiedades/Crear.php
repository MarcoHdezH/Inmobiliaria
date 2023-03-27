<?php
//Autenticacion de Usuario
require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth){
    header('Location: /');
}

//DataBase
require '../../includes/config/database.php';
$db=conectarDB();

//Consultar Vendedores
$consulta = "SELECT * FROM vendedores";
$resultadoVendedores =  mysqli_query($db,$consulta);

//Arreglo con Mensajes de Errores
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';
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

    if(!$imagen['name'] || $imagen['error']){
        $errores[] = "Debes Añadir una Imagen de la Propiedad";
    }

    //Validad Tamaño de Imagenes
    $medida = 2000*100;
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
        //Subir Imagen
        $nombreImagen=md5(uniqid(rand(),true)).".jpg";

        move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagen);
        
        //Insertar en la base de Datos
        $query = "INSERT INTO propiedades (titulo,precio,imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedorId) VALUES ('$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId')";
        $resultado = mysqli_query($db,$query);

        if($resultado){
            header('Location:/admin?resultado=1');
        }
    }
}

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
    <form class="formulario" action="/admin/propiedades/Crear.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General de Propiedad</legend>

            <label for="titulo">Titulo de Propiedad:</label>
            <input id="titulo" name="titulo" type="text" value="<?php echo $titulo ?>">

            <label for="precio">Precio de Propiedad:</label>
            <input id="precio" name="precio" type="number" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input id="imagen" name="imagen" type="file" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion de Propiedad:</label>
            <textarea id="descripcion" name="descripcion" value="<?php echo $descripcion;?>"><?php echo $descripcion; ?></textarea>
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

        <input type="submit" value="CrearPropiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>