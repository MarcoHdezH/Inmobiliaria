    <!-- Header -->
    <?php
        include './includes/templates/header.php';
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

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Nuestro Blog</a>
                <a href="contacto.html">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos Reservados 2023 &copy;</p>
    </footer>

    <script src="./build/js/bundle.min.js"></script>
</body>
</html>