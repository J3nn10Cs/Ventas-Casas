<?php

    //Importar conexion de la bd
    require 'includes/app.php';

    use App\Propiedad;
    
    //Obtener la id de la URL
    $id = $_GET['id'];
    // var_dump($id);
    //Validar
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }
    
    $property = Propiedad::find($id);
    //debuguear($property);
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        <div class="contenido-propiedad">
                <img src="/imagenes/<?php echo $property->imagen; ?>" loading="lazy" alt="destacada">
            <p class="precio"> <?php echo $property->precio; ?> </p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono"  loading="lazy" src="/build/img/icono_wc.svg" alt="icono wc">
                    <p> <?php echo $property->wc; ?> </p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="iccono estacionamiento">
                    <p> <?php echo $property->estacionamiento; ?> </p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p> <?php echo $property->habitaciones; ?> </p>
                </li>
            </ul>
            <p><?php echo $property->descripcion; ?> </p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>