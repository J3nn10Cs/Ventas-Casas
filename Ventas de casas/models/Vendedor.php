<?php
    namespace Model;

    class Vendedor extends ActiveRecord{
        protected static $table = 'vendedores'; 

        protected static $columnBd = ['id','nombres','apellidos','telefono'];

        public $id,$nombres,$apellidos,$telefono;

        //this -> public constructor
        function __construct($args =[]){
            $this -> id =$args['id'] ?? null;
            $this -> nombres =$args['nombres'] ?? '';
            $this -> apellidos =$args['apellidos'] ?? '';
            $this -> telefono =$args['telefono'] ?? '';
        }

        //Validar errores
        public function validar(){
            if(!$this->nombres){
                self::$errores[] = "Debes añadir un nombres";
            }if(!$this->apellidos){
                self::$errores[] = "El apellido es obligatorio";
            }if(!$this->telefono){
                self::$errores[] = "Las telefono son obligatorias";
            }//if(!preg_match('/[0-9]{10}/' , $this->telefono)){
            //     self::$errores[] = "Formato no válido";
            // }
            return self::$errores;
        }
    }
?>