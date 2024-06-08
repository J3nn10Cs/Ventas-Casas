<?php
    namespace Controllers;
    use Model\Propiedad;
    use MVC\Router;
    use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
        $property = Propiedad::get(3);
        $inicio = true;
        $router -> render('/paginas/index',[
            'property' => $property,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router -> render('/paginas/nosotros',[
            
        ]);
    }

    public static function propiedades(Router $router){
        $property = Propiedad::get(10);
        $router -> render('paginas/propiedades',[
            'property' => $property
        ]);
    }
    public static function blog(Router $router){
        $property = Propiedad::all();
        $router -> render('paginas/blog',[
            'property' => $property
        ]);
    }

    public static function propiedad(Router $router){
        $id = ValidarRdireccionar('/admin');
        $property = Propiedad::find($id);
        $router -> render('paginas/propiedad',[
            'property' => $property,
        ]);
    }

    public static function entrada(Router $router){
        $router -> render('paginas/entrada',[

        ]);
    }

    public static function contacto(Router $router){
        $mensaje = null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $respuestas = $_POST['contacto'];
            //Crear una instancia de PHPMailer
            $email = new PHPMailer();

            //Configurar SMTP
            $email -> isSMTP();
            $email -> Host = 'sandbox.smtp.mailtrap.io';
            $email -> SMTPAuth = true;
            $email -> Username = 'dcc37b831f0332';
            $email -> Password = '9b8efa0046ea70';
            $email -> SMTPSecure = 'tls';
            $email -> Port = 2525;

            //Configurar el contenido del email
            $email -> setFrom('admin@ventascasa.com');
            $email -> addAddress('admin@ventascasa.com','Jennifer.com');
            $email -> Subject = 'Tienes un nuevo mensaje';

            //Habilitar html
            $email -> isHTML(true);
            $email -> CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p> ';
            $contenido .= '<p> Nombre : '. $respuestas['nombre'] .'</p> ';
            
            
            //Enviar de forma condicional algunos campos
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligió ser contactado por Teléfono</p> ';
                $contenido .= '<p> Telefono : '. $respuestas['telefono'] .'</p> ';
                $contenido .= '<p> Fecha : '. $respuestas['fecha'] .'</p> ';
                $contenido .= '<p> Hora : '. $respuestas['hora'] .'</p> ';
                
            }else{
                $contenido .= '<p>Eligió ser contactado por Email</p> ';
                $contenido .= '<p> Email : '. $respuestas['email'] .'</p> ';
            }

            $contenido .= '<p> Mensaje : '. $respuestas['mensaje'] .'</p> ';
            $contenido .= '<p> Vende o compra : '. $respuestas['tipo'] .'</p> ';
            $contenido .= '<p> Precio : '. '$' . $respuestas['precio'] .'</p> ';
            $contenido .= '</html>';

            $email -> Body = $contenido;
            $email -> AltBody = "Esto es texto alternativo sin HTML";
            
            //Enviar el email
            if($email -> send()){
                $mensaje = "Mensaje enviado Correctamente";
            }else{
                $mensaje = "El mensaje no se pudo enviar";
            }
        }

        $router -> render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }
}