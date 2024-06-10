<?php
    namespace MVC;

    class Router{
        public $rutasGet = [];
        public $rutasPost = [];
        
        public function get($url,$fn) {
            $this->rutasGet[$url] = $fn;
        }
        
        public function post($url,$fn) {
            $this->rutasPost[$url] = $fn;
        }

        public function ComprobarRutas(){
            //Contiene la sesion iniciada
            session_start();

            $auth = $_SESSION['login'] ?? null;

            //Arreglo de rutas protegidas
            $ruta_prote = ['/admin', '/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar','/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar'];

            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];
            //debuguear($_SERVER['REQUEST_METHOD']);
            if($metodo === 'GET'){
                //debuguear($this->rutasGet[$urlActual]);
                $fn = $this->rutasGet[$urlActual] ?? null;
                
            }else{
                $fn = $this->rutasPost[$urlActual] ?? null;
            }
            
            //Proteger las rutas
            if(in_array($urlActual,$ruta_prote) && !$auth){
                header('Location: /');
            }

            if($fn){
                //Llamar una funcion cuando no sabemos como se llama
                call_user_func($fn, $this);
            }else{
                echo 'Página no encontrada';
            }
        }

        //Muestra una vista
        public function render($view, $datos=[]){
            //$$ -> variable de variable
            foreach ($datos as $key => $value){
                $$key = $value;
            }
            //almacena en memoria
            ob_start();
            include __DIR__ . "/views/$view.php";

            //Limpiamos la memoria
            $contenido = ob_get_clean();
            include __DIR__ . "/views/layout.php";
        }
    }
?>