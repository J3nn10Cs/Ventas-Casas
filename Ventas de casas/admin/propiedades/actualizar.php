<?php

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
    Autenticado();
    //Validar la URL por ID válido
    //Obtener datos de la URL
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //Obtener los datos de la propiedad
    $property = Propiedad::find($id);
    //var_dump($consulta);  

    //Consultar para obtener a los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);

    //Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    //Verficacion - EJECUTAR CODIGO LUEGO DE QUE EL USUARIO ENVIO FORM
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Asignar los atributos
        $args = $_POST['property'];

        $property -> sincronizar($args); 
        
        $errores = $property->validar();

        //Revisar que el arreglo de errores este vacio
        if(empty($errores)){

            //Generar un nombre unico
            $nombre_imagen = md5(uniqid(rand(),true)) . '.jpg';

            //Setear la imagen
            //Realiza un resize a la imagen con intervension
            if($_FILES['property']['tmp_name']['imagen']){
                $image = Image::make($_FILES['property']['tmp_name']['imagen'])->fit(800,600);
                $property -> setImage($nombre_imagen);
            }
            
            if(empty($errores)):
                //ALMACENAR LA IMAGEN
                $image -> save(CARPETA_IMAGENES . $nombre_imagen);
                //Actualizar en la bd
                $resultado = $property->guardar();
            endif;
            
        }
        
    }   
    //Header
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar</h1>

        <a href="/admin" class="boton-verde">Volver</a>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>
                                                        <!--Leer los archivos 319-->
        <form class="formulario" method="post" enctype="multipart/form-data">
            
            <?php require '../../includes/templates/formulario_propiedades.php' ?>

            <input type="submit" value="Actualizar propiedad" class="boton-verde" >
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>