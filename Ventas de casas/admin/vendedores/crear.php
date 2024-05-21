<?php

    require '../../includes/app.php';

    use App\Vendedor;

    Autenticado();

    $seller = new Vendedor();

    //Arrego con mensaje de errores 
    $errores = Vendedor::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Crear una nueva instancia de post con vendedor
        $seller = new Vendedor($_POST['seller']);
        //debuguear($_POST);
        //validar que no haya campos vacíos
        $errores = $seller -> validar();

        //si no hay errores
        if(empty($errores)){
            $seller->guardar();
        }

    }

    incluirTemplate('header');

?>

<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>

        <a href="/admin" class="boton-verde">Volver</a>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>
                                                                                    <!--Leer los archivos 319-->
        <form class="formulario" method="post" action="/admin/vendedores/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar vendedor(a)" class="boton-verde" >
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>