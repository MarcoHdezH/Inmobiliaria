    <!-- Header -->
    <?php
        require './includes/funciones.php';
        incluirTemplate('header');
    ?> <!---->

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoracion de tu hogar</h1>

        <picture>
            <source srcset="./build/img/destacada2.webp" type="image/webp">
            <source srcset="./build/img/destacada2.jpg" type="image/jpg">
            <img loading="lazy" src="./build/img/destacada2.jpg" alt="Imagen-Propiedad">
        </picture>

        <p class="informacion-meta">Escrito el <span>20/10/2018</span> por: <span>Admin</span> </p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique excepturi dolor qui autem at laudantium quod. Explicabo temporibus ipsa quod labore, voluptas pariatur atque modi dignissimos non, nesciunt, molestiae nam!</p>
        </div>
    </main>

    <!-- Footer -->
    <?php
        incluirTemplate('footer');
    ?> <!---->