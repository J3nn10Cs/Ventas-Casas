<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;
    
    Autenticado();

    $db = connectionBd();

    $property = new Propiedad;

    //Consultar para obtener a los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);

    //Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    //Verficacion
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Crea una nueva instancia
        $property = new Propiedad($_POST['property']); //POST ARREGLO

        //Generar un nombre unico
        $nombre_imagen = md5(uniqid(rand(),true)) . '.jpg';

        //Setear la imagen
        //Realiza un resize a la imagen con intervension
        if($_FILES['property']['tmp_name']['imagen']){
            $image = Image::make($_FILES['property']['tmp_name']['imagen'])->fit(800,600);
            $property -> setImage($nombre_imagen);
        }

        //Validar errores
        $errores = $property -> validar();
        
        //Revisar que el arreglo de errores este vacio
        if(empty($errores)){
            //Crear la carpeta para subir las imagenes
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
            
            //Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombre_imagen);

            //Guarda en la base de datos
            $property -> guardar();
            
        }
        
    }   
    //Header
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton-verde">Volver</a>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>
                                                        <!--Leer los archivos 319-->
        <form class="formulario" method="post" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear propiedad" class="boton-verde" >
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>