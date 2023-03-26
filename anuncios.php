    <!-- Header -->
    <?php
    require './includes/funciones.php';
    incluirTemplate('header');
    ?> <!---->

    <main class="contenedor seccion">
        <h1>Casas y Departamentos en Venta</h1>

        <?php
        $band = 0;
        include 'includes/templates/anuncios.php';
        ?>
    </main>

    <!-- Footer -->
    <?php
    incluirTemplate('footer');
    ?> <!---->