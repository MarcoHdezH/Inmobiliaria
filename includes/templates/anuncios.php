<?php
//Importar la Conexion
require __DIR__.'/../config/database.php';
$db = conectarDB();

//Consultar DB
if($band===1){
    $query = "SELECT * FROM propiedades LIMIT $limite";
}else{
    $query = "SELECT * FROM propiedades";
}
//Obtener Resultado
$resultado = mysqli_query($db,$query);
?>

<div class="contenedor-anuncios">
    <?php while($Propiedad=mysqli_fetch_assoc($resultado)):?>
    <div class="anuncio">
            <img loading="lazy" src="/images/<?php echo $Propiedad['imagen'];?>" alt="Anuncio <?php echo $Propiedad['id'];?>">
        <div class="contenido-anuncio">
            <h3><?php echo $Propiedad['titulo']?></h3>
            <p><?php echo $Propiedad['descripcion']?></p>
            <p class="precio"><?php echo number_format($Propiedad['precio'])?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_wc.svg" alt="icono-wc">
                    <p><?php echo $Propiedad['wc']?></p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_estacionamiento.svg" alt="icono-estacionamiento">
                    <p><?php echo $Propiedad['estacionamiento']?></p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_dormitorio.svg" alt="icono-dormitorio">
                    <p><?php echo $Propiedad['habitaciones']?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $Propiedad['id'] ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php
mysqli_close($db);
?>