    <!-- Header -->
    <?php
        require './includes/funciones.php';
        incluirTemplate('header');
    ?> <!---->

    <main>
        <section class="contenedor seccion">
            <h1>Conoce más Sobre Nosotros</h1>

            <div class="contenido-nosotros">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/nosotros.webp" type="image/webp">
                        <source srcset="./build/img/nosotros.jpg" type="image/jpg">
                        <img loading="lazy" src="./build/img/nosotros.jpg">
                    </picture>
                </div>

                <div class="texto-nosotros">
                    <blockquote>
                        25 años de Experiencia nos respaldan.
                    </blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla exercitationem quod dolorum possimus, quasi praesentium voluptate iure in atque corrupti, ab velit at reprehenderit facere esse facilis id ullam temporibus?</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis doloremque porro voluptate ullam architecto assumenda id illum aperiam ad! Cupiditate praesentium non totam ipsa minima necessitatibus, tenetur voluptas expedita?</p>
                </div>
            </div>
        </section>

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
    </main>

    <!-- Footer -->
    <?php
        incluirTemplate('footer');
    ?> <!---->