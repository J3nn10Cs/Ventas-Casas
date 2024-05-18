<?php
//En el index APP está llamando a la bd
$db = connectionBd();

//consultar
$query = "SELECT * FROM propiedades LIMIT ${limite}";

//obtener la conexion
$resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">

            <img src="/imagenes/<?php echo $propiedad['imagen'] ?>" loading="lazy" alt="anuncio1">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo'] ?></h3>
            <p><?php echo $propiedad['descripcion'] ?></p>
            <p class="precio"> <?php echo $propiedad['precio'] ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc'] ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="iccono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones'] ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['idpropiedades']; ?>" class="boton-amarillo-block">Ver propiedad</a>
        </div> <!--.Contenido-->
    </div><!--.Anuncio-->
    <?php endwhile; ?>
</div><!--.Contenedor Anuncios-->
<?php
//Cerrar la conexion
mysqli_close($db);
?>