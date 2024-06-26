<?php
    namespace Controllers;
    use MVC\Router;
    use Model\Admin;

    class LoginController{
        public static function login(Router $router){
            $errores = [];
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $auth = new Admin($_POST);

                $errores = $auth->validar();

                if(empty($errores)){
                    //Verificar usuario existente
                    $resultado = $auth -> existeUsuario();

                    if(!$resultado){
                        //Verifica 
                        $errores = Admin::getErrores();
                    }else{
                        //verificar password
                        $autenticado = $auth -> ComprobarPass($resultado);
                        if($autenticado){
                            //autenticar usuario
                            $auth->autenticar();
                        }else{
                            //Pass incorrecto
                            $errores = Admin::getErrores();
                        }
                        
                    }
                    
                }
            }

            $router -> render('/auth/login',[
                'errores' => $errores
            ]);
        }

        public static function logout(){
            session_start();

            $_SESSION = [];

            header('Location: /');
        }
    }