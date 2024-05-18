<?php

namespace App;

//PHP8
class Propiedad{
    //Base de datos - no se puede acceder desde el objeto
    protected static $db;
    //Arreglo que va a permitir mapear
    protected static $columnBd = ['idpropiedades','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_idvendedores'];

    //ERRORES -> protected pq solo se va a modificar en la clase y estatico pq no se va a requerir instanciar
    protected static $errores = [];

    //Atributos
    public $idpropiedades, $titulo, $precio, $imagen, $descripcion, $habitaciones,
            $wc, $estacionamiento, $creado, $vendedores_idvendedores;

    //Definir conexion a la bd
    public static function setDb($database){
        //Static => self
        self::$db = $database;
    }

    //this -> public constructor
    function __construct($args =[]){
        $this -> idpropiedades =$args['idpropiedades'] ?? null;
        $this -> titulo =$args['titulo'] ?? '';
        $this -> precio =$args['precio'] ?? '';
        $this -> imagen =$args['imagen'] ?? '';
        $this -> descripcion =$args['descripcion'] ?? '';
        $this -> habitaciones =$args['habitaciones'] ?? '';
        $this -> wc =$args['wc'] ?? '';
        $this -> estacionamiento =$args['estacionamiento'] ?? '';
        $this -> creado = date('y/m/d');
        $this -> vendedores_idvendedores =$args['vendedores_idvendedores'] ?? 1;
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
        $query = "INSERT INTO propiedades ( ";
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

        $query = "UPDATE propiedades SET ";
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
        $query = "DELETE FROM propiedades WHERE idpropiedades = ".self::$db->escape_string($this->idpropiedades). " LIMIT 1";
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
        foreach(self::$columnBd as $column){
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
        $query = "SELECT * FROM propiedades";

        $result= self::ConsultSql($query);

        return $result;
    }

    //Buscar una propiedad por Id
    public static function find($id){
        $query = "SELECT * FROM propiedades WHERE idpropiedades = ${id}";

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
            $array[] = self::crearObjeto($registro);
        }

        //Liberar la memoria 
        $result -> free();
        //Retornar los resultados
        return $array;
    }

    //Convierte de arreglo a objeto
    protected static function crearObjeto($registro){
        $objeto = new self;//clase padre

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

    //Validacion
    public static function getErrores(){
        return self::$errores;
    }

    //Validar errores
    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titúlo";
        }if(!$this->precio){
            self::$errores[] = "El precio es obligatorio";
        }if(strlen($this->descripcion) < 50){
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }if(!$this->habitaciones){
            self::$errores[] = "Las habitaciones son obligatorias";
        }if(!$this->wc){
            self::$errores[] = "El baño es obligatorio";
        }if(!$this->estacionamiento){
            self::$errores[] = "El estacionamiento es obligatorio";
        }if(!$this->vendedores_idvendedores){
            self::$errores[] = "El vendedor es obligatorio";
        }if(!$this->imagen){
             self::$errores[] = "La imagen es obligatoria";
        }
        return self::$errores;
    }
}

