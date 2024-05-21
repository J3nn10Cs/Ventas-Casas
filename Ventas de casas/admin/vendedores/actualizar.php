<?php

    require '../../includes/app.php';

    use App\Vendedor;

    Autenticado();

    $seller = new Vendedor();

    //Arrego de errores
    $errores = Vendedor::getErrores();

    if($_POST['REQUEST_METHOD' === 'POST' ]){

    }

    incluirTemplate('header');

?>

<main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>

        <a href="/admin" class="boton-verde">Volver</a>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>
                                                        <!--Leer los archivos 319-->
        <form class="formulario" method="post" action="/admin/vendedores/actualizar.php">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Actualizar vendedor(a)" class="boton-verde" >
        </form>
    </main>

<?php

    incluirTemplate('footer');

?>