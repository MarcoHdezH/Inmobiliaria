    <!-- Header -->
    <?php
        include './includes/templates/header.php';
    ?> <!---->

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al Bosque</h1>
        <picture>
            <source srcset="./build/img/destacada.webp" type="image/webp">
            <source srcset="./build/img/destacada.jpg" type="image/jpg">
            <img loading="lazy" src="./build/img/destacada.jpg" alt="Imagen-Propiedad">
        </picture>

        <div class="anuncio">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_wc.svg" alt="icono-wc">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_estacionamiento.svg" alt="icono-estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="./build/img/icono_dormitorio.svg" alt="icono-dormitorio">
                    <p>4</p>
                </li>
            </ul>
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