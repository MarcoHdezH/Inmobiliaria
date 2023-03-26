    <!-- Header -->
    <?php
        $id=$_GET['id'];
        $id=filter_var($id,FILTER_VALIDATE_INT);
        if(!$id){
            header('Location: /');
        }

        //Importar la Conexion
        require __DIR__.'/includes/config/database.php';
        $db = conectarDB();

        //Consultar
        $query = "SELECT * FROM propiedades WHERE id=$id";

        //Resultado
        $resultado = mysqli_query($db,$query);

        if(!$resultado->num_rows){
            header('Location: /');
        }
        $propiedad = mysqli_fetch_assoc($resultado);

        require './includes/funciones.php';
        incluirTemplate('header');
    ?> <!---->

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'];?></h1>

        <img loading="lazy" src="/images/<?php echo $propiedad['imagen'];?>" alt="Imagen-Propiedad">

        <div class="anuncio">
            <p class="precio"><?php echo number_format($propiedad['precio'])?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_wc.svg" alt="icono-wc">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_estacionamiento.svg" alt="icono-estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_dormitorio.svg" alt="icono-dormitorio">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
            </ul>
            <p class="text-center"><?php echo $propiedad['descripcion'];?></p>
        </div>
    </main>

    <!-- Footer -->
        <?php
        incluirTemplate('footer');
        mysqli_close($db);
    ?> <!---->