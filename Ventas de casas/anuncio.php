<?php
    //Importar conexion de la bd
    require 'includes/app.php';
    $db = connectionBd();
    //Obtener la id de la URL
    $id = $_GET['id'];
    // var_dump($id);
    //Validar
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }
    //Consulta a la bd
    $query = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db,$query);

    if($resultado->num_rows ===0){
        header('Location: /');
    }

    $propiedades = mysqli_fetch_assoc($resultado);

    
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        <div class="contenido-propiedad">
                <img src="/imagenes/<?php echo $propiedades['imagen']; ?>" loading="lazy" alt="destacada">
            <p class="precio"> <?php echo $propiedades['precio']; ?> </p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono"  loading="lazy" src="/build/img/icono_wc.svg" alt="icono wc">
                    <p> <?php echo $propiedades['wc']; ?> </p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="iccono estacionamiento">
                    <p> <?php echo $propiedades['estacionamiento']; ?> </p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p> <?php echo $propiedades['habitaciones']; ?> </p>
                </li>
            </ul>
            <p><?php echo $propiedades['descripcion']; ?> </p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>