<main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <?php include 'iconos.php'; ?>
</main>

    <section class="seccion contenedor">
        <h2>Casas y depas en venta</h2>
        <?php 
            include 'listado.php';
        ?>
        <div class="alinear-derecha">
            <a href="propiedades" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="/build/img/blog1.jpg" loading="lazy" alt="blog1">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>18/03/2024</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores
                            materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="/build/img/blog2.jpg" loading="lazy" alt="blog1">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guia para la decoración de tu casa</h4>
                        <p>Escrito el: <span>18/03/2024</span> por: <span>Admin</span></p>
                        <p>
                            Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles
                            y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me
                    ofrecieron cumple con todas mis expectativas
                </blockquote>
                <p>-Jennifer Cs</p>
            </div>
        </section>
    </div>