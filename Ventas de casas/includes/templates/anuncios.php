<?php
    use Model\Propiedad;
    //debuguear($_SERVER);
    if($_SERVER['SCRIPT_NAME'] === '/index.php'){
        //Solo se muetra 3 propiedades
        $property = Propiedad::get(3);
    }else{
        //Se muestran todas las propiedades
        $property = Propiedad::all();
    }
?>

<div class="contenedor-anuncios">
    <?php foreach($property as $property): ?>
    <div class="anuncio">
                <!--sintaxis de objeto-->
            <img src="/imagenes/<?php echo $property->imagen ?>" loading="lazy" alt="anuncio1">

        <div class="contenido-anuncio">
            <h3><?php echo $property->titulo ?></h3>
            <p><?php echo $property->descripcion ?></p>
            <p class="precio"> <?php echo $property->precio ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $property->wc ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="iccono estacionamiento">
                    <p><?php echo $property->estacionamiento ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $property->habitaciones ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $property->id; ?>" class="boton-amarillo-block">Ver propiedad</a>
        </div> <!--.Contenido-->
    </div><!--.Anuncio-->
    <?php endforeach; ?>
</div><!--.Contenedor Anuncios-->
<?php
//Cerrar la conexion
mysqli_close($db);
?>