<?php
    require 'includes/app.php';
    incluirTemplate('header');

    $db = connectionBd();

    //Consulta a la bd
    $query = "SELECT * FROM propiedades";

    //Obtener la conexion
    $resultado = mysqli_query($db,$query);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <article class="entrada-blog">
                <div class="imagen">
                    <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" loading="lazy" alt="anuncio1">
                </div>
                <div class="texto-entrada">
                    <a href="/entrada.php">
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

<?php
    incluirTemplate('footer');
?>