<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Propiedad;
    use Model\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    class PropiedadController{
        public static function index(Router $router){
            
            $router->render('propiedades/admin',[
            ]);
        }
        public static function crear(Router $router){
            $property = new Propiedad();
            $seller = Vendedor::all();
            $errores = Propiedad::getErrores();

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

            $router -> render('propiedades/crear',[
                'property' => $property,
                'seller' => $seller,
                'errores' => $errores
            ]);
        }

        public static function actualizar(Router $router){
            $id = ValidarRdireccionar('/admin');            
            $property = Propiedad::find($id);
            $seller = Vendedor::all();

            $errores = Propiedad::getErrores();

            //Metdo POST para actualizar
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
                        if($_FILES['property']['tmp_name']['imagen']){
                            //ALMACENAR LA IMAGEN
                            $image -> save(CARPETA_IMAGENES . $nombre_imagen);
                        }
                        
                        //Actualizar en la bd
                        $property->guardar();
                    endif;
                    
                }
                
            }   

            $router->render('propiedades/actualizar',   [
                'property' => $property,
                'errores' => $errores,
                'seller' => $seller
            ]);
        }

        public static function eliminar(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                //Validar ID
                $id = $_POST['id'];
                
                $id = filter_var($id,FILTER_VALIDATE_INT);

                if($id){

                    $type = $_POST['tipo'];

                    if(ValidarContenido($type)){
                        
                    }
                    
                }
            }
        }
        
    }
?>