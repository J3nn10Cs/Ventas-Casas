
<main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
<!--Actualizar-->
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <article class="entrada-blog">
                <div class="imagen">
                    <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" loading="lazy" alt="anuncio1">
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4> <?php echo $propiedad['titulo']; ?> </h4>
                        <p>Escrito el: <span>18/03/2024</span> por: <span>Admin</span></p>
                        <p>
                            <?php echo $propiedad['descripcion']; ?>
                        </p>
                    </a>
                </div>
            </article>     
        <?php endwhile; ?>
</main>