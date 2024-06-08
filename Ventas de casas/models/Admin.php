<?php
    namespace Model;

    class Admin extends ActiveRecord{
        //bd
        protected static $table = 'usuarios';
        protected static $columnDb = ['id','email','password'];

        public $id,$email,$password;

        function __construct($args = []){
            $this -> id = $args['id'] ?? null;
            $this -> email = $args['email'] ?? null;
            $this -> password = $args['password'] ?? null;
        }

        public function validar(){
            if(!$this->email){
                self::$errores[] = 'El email es obligatorio';
            }

            if(!$this->password){
                self::$errores[] = 'El password es obligatorio';
            }

            return self::$errores;
        }

        public function existeUsuario(){
            //Revisar si un usuario existe o no
            $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this -> email . "' LIMIT 1";

            $resultado = self::$db->query($query);

            if(!$resultado->num_rows){
                self::$errores[] = 'El usuario no existe';
                return;
            }

            return $resultado;
        }

        public function ComprobarPass($resultado){
            $usuario = $resultado->fetch_object();

            $autenticado = password_verify($this->password,$usuario->password);

            if(!$autenticado){
                self::$errores[] = 'El password es incorrecto';
                
            }
            return $autenticado;
        }

        public function autenticar(){
            session_start();
            $_SESSION['usuario'] = $this->email;
            $_SESSION['login'] = true;

            header('Location: /admin');
        }
    }