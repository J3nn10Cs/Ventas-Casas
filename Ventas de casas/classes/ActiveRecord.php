<?php

    namespace App;

    class ActiveRecord{
        //Base de datos - no se puede acceder desde el objeto
        protected static $db;
        //Arreglo que va a permitir mapear
        protected static $columnBd = [''];
        protected static $table = '';

        //ERRORES -> protected pq solo se va a modificar en la clase y estatico pq no se va a requerir instanciar
        protected static $errores = [];

        //Definir conexion a la bd
        public static function setDb($database){
            //Static => self
            self::$db = $database;
        }

        public function guardar(){
            //si es diferente a null
            if(!is_null($this->idpropiedades)){
                //ACTUALIZAR
                $this->actualizar();
            }else{
                //CREAR UN NUEVO REGISTRO
                $this->crear();
            }
        }

        public function crear() {
            //Sanitizar los datos
            $attributes = $this -> sanitizeBd();

            //Insertar en la bd
            $query = "INSERT INTO ". static::$table . "( ";
            $query .= join(', ',array_keys($attributes));//indice de la tabla
            $query .= ") VALUES ('";
            $query .= join("','",array_values($attributes));//valores de la tabla
            $query .= "')";
            //self pq es estatico -> insertar en la bd
            $result = self::$db -> query($query);

            //Verificacion de insersion
            if($result){
                //redireccionar al usuario
                header('Location: /admin?resultado=1');
            }
        }

        public function actualizar(){
            //Sanitizar los datos
            $attributes = $this -> sanitizeBd();

            $valores = [];

            foreach($attributes as $key => $value):
                $valores[] = "{$key}='{$value}'";
            endforeach;

            $query = "UPDATE ".static::$table." SET ";
            $query .= join(',',$valores);
            $query .= " WHERE idpropiedades='" .self::$db->escape_string($this->idpropiedades) . "' ";
            $query .= " LIMIT 1";

            $result = self::$db->query($query);

            //Verificacion de insersion
            if($result){
                //redireccionar al usuario
                header('Location: /admin?resultado=2');
            }
        }

        //Eliminar un registro
        public function eliminar(){
            //Eliminar la propiedad
            $query = "DELETE FROM ". static::$table . " WHERE idpropiedades = ".self::$db->escape_string($this->idpropiedades). " LIMIT 1";
            $result = self::$db -> query($query);
            // si hay un eliminado
            if($result){
                $this->borrarImagen();
                Header('Location: /admin?resultado=3');
            }
        }

        //Eliminar imagen
        public function borrarImagen(){
            //Comprobar si existe el archivo
            $fileexists = file_exists(CARPETA_IMAGENES . $this->imagen);
            if($fileexists):
                unlink(CARPETA_IMAGENES . $this->imagen);
            endif;
        }

        //Identificar y unir los atributos de la bd
        public function attributes(){
            $attributes = [];
            foreach(static::$columnBd as $column){
                if($column === 'idpropiedades') continue; //ignorar id
                $attributes[$column] = $this -> $column;
            }
            return $attributes;
        }

        public function sanitizeBd(){
            $attributes = $this -> attributes();
            $sanitize = [];

            foreach($attributes as $key => $value){
                $sanitize[$key] = self::$db -> escape_string($value);
            }            
            return $sanitize;
        }

        //Subida de archivos
        public function setImage($image){
            //Elimina si hay una imagen previa
            if(!is_null($this->idpropiedades)){
                $this->borrarImagen();
            }
            //Asignar al atributo de la imagen el nombre de la imagen
            if($image){
                $this->imagen = $image;
            }
        }

        //Lista de todas las propiedades
        public static function all(){
            //static -> hereda el metodo y busca el atrituto en la clase heredada
            $query = "SELECT * FROM " . static::$table;
            // debuguear($query);

            $result= self::ConsultSql($query);

            return $result;
        }

        //Buscar una propiedad por Id
        public static function find($id){
            $query = "SELECT * FROM ".static::$table." WHERE idpropiedades = ${id}";

            $result = self::ConsultSql($query);

            return array_shift($result);
        }

        //
        public static function ConsultSql($query){
            //Consultar la bd
            $result = self::$db -> query($query);

            //Iterar los resultados
            $array = [];
            while($registro = $result->fetch_assoc()){
                $array[] = static::crearObjeto($registro);
            }

            //Liberar la memoria 
            $result -> free();
            //Retornar los resultados
            return $array;
        }

        //Convierte de arreglo a objeto
        protected static function crearObjeto($registro){
            $objeto = new static;//clase padre

            foreach($registro as $key => $value){
                //si la propiedad existe
                if(property_exists($objeto , $key)){
                    $objeto -> $key = $value;
                }
            }
            return $objeto;
        }

        //Sincronizar el objeto en memoria con los cambios realizados por el usuario
        public function sincronizar($args=[]){
            foreach($args as $key => $value):
                if(property_exists($this,$key) && !is_null($value)):
                    $this -> $key= $value;
                endif;
            endforeach;
        }

        //-------------Repasar
        //Obtiene los errores
        public static function getErrores(){
            return static::$errores;
        }

        //Validar errores
        public function validar(){
            return static::$errores = [];
        }
    }

?>