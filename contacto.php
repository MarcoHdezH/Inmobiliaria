    <!-- Header -->
    <?php
        require './includes/funciones.php';
        incluirTemplate('header');
    ?> <!---->

    <main class="contenedor seccion">
        <h1>Contacta con Nosotros</h1>
        <picture>
            <source srcset="./build/img/destacada3.webp" type="image/webp">
            <source srcset="./build/img/destacada3.jpg" type="image/jpg">
            <img loading="lazy" src="./build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>
        <h2>Llene el Formulario de Contacto</h2>
        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">Correo Electrónico</label>
                <input type="email" placeholder="Tu Nombre" id="email">

                <label for="telefono">Teléfono Movil</label>
                <input type="tel" placeholder="222-123-4567" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Comprar</option>
                    <option value="Vende">Vender</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Precio o Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>¿Comó desea ser contactado?</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">Correo</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligio teléfono, elija la fecha y hora</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">
                
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <!-- Footer -->
    <?php
        incluirTemplate('footer');
    ?> <!---->