    <!-- Header -->
    <?php
        $inicio=true;
        require './includes/funciones.php';
        incluirTemplate('header',$inicio);
    ?> <!---->

    <main>
        <section class="contenedor seccion">
            <h1>Más Sobre Nosotros</h1>

            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="./build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla hic blanditiis tempora beatae
                        facilis, distinctio corporis modi laboriosam expedita commodi autem praesentium harum odit
                        asperiores tenetur rem facere deserunt possimus?</p>
                </div>

                <div class="icono">
                    <img src="./build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla hic blanditiis tempora beatae
                        facilis, distinctio corporis modi laboriosam expedita commodi autem praesentium harum odit
                        asperiores tenetur rem facere deserunt possimus?</p>
                </div>

                <div class="icono">
                    <img src="./build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                    <h3>Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla hic blanditiis tempora beatae
                        facilis, distinctio corporis modi laboriosam expedita commodi autem praesentium harum odit
                        asperiores tenetur rem facere deserunt possimus?</p>
                </div>
            </div>
        </section>

        <section class="contenedor seccion">
            <h2>Casas y Departamentos en Venta</h2>
            <?php
                $band=1;
                $limite=3;
                include 'includes/templates/anuncios.php'; 
            ?>

            <div class="alinear-derecha">
                <a href="anuncios.php" class="boton boton-verde">Ver Todas</a>
            </div>
        </section>

        <section class="imagen-contacto">
            <h2>Encuentra la Casa de tus Sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad.</p>
            <a href="contacto.html" class="boton-amarillo">Contactános</a>
        </section>

        <div class="contenedor seccion seccion-inferior">
            <section class="blog">
                <h3>Nuestro Blog</h3>
                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="./build/img/blog1.webp" type="image/webp">
                            <source srcset="./build/img/blog1.jpg" typea="image/jpg">
                            <img loading="lazy" src="./build/img/blog1.jpg" alt="Texto Entrada Blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Terraza en el techo de tu casa</h4>
                            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                            <p>
                                Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                            </p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="./build/img/blog2.webp" type="image/webp">
                            <source srcset="./build/img/blog2.jpg" typea="image/jpg">
                            <img loading="lazy" src="./build/img/blog2.jpg" alt="Texto Entrada Blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Guía para la decoración de tu hogar</h4>
                            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                            <p>
                                Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                            </p>
                        </a>
                    </div>
                </article>
            </section>

            <section class="testimoniales">
                <h3>Testimonios</h3>
                <div class="testimonial">
                    <blockquote>
                        El Personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                    </blockquote>
                    <p>- Marco Hernandez</p>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php
        incluirTemplate('footer');
    ?> <!---->