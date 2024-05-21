<?php

    require '../../includes/app.php';

    use App\Vendedor;

    Autenticado();

    //Validación de ID
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //Obtener al vendedor desde la bd
    $seller = Vendedor::find($id);

    //Arrego de errores
    $errores = Vendedor::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Asignar los valores
        $args = $_POST['seller'];

        //Sincronizar objeto en memoria con lo que el usu escibió
        $seller->sincronizar($args);

        //Validación
        $errores = $seller->validar();

        if(empty($errores)){
            $seller -> guardar();
        }
        
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
        <form class="formulario" method="post">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Actualizar vendedor(a)" class="boton-verde" >
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>