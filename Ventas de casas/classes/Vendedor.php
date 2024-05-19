<?php
    namespace App;

    class Vendedor extends ActiveRecord{
        protected static $table = 'vendedores'; 

        protected static $columnBd = ['idvendedores','nombre','apellido','teleforno'];

        public $idvendedores,$nombre,$apellido,$telefono;

        //this -> public constructor
        function __construct($args =[]){
            $this -> idvendedores =$args['idvendedores'] ?? null;
            $this -> nombre =$args['nombre'] ?? '';
            $this -> apellido =$args['apellido'] ?? '';
            $this -> telefono =$args['telefono'] ?? '';
        }
    }
?>