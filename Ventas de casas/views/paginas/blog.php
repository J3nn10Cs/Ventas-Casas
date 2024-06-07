
<main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
<!--Actualizar-->
        <?php foreach($property as $property): ?>
            <article class="entrada-blog">
                <div class="imagen">
                    <img src="/imagenes/<?php echo $property->imagen; ?>" loading="lazy" alt="anuncio1">
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4> <?php echo $property->titulo; ?> </h4>
                        <p>Escrito el: <span>18/03/2024</span> por: <span>Admin</span></p>
                        <p>
                            <?php echo $property->descripcion; ?>
                        </p>
                    </a>
                </div>
            </article>     
        <?php endforeach; ?>
</main>