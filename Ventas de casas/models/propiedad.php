<?php

namespace Model;

//PHP8
class Propiedad extends ActiveRecord{
    protected static $table = 'propiedades';

    protected static $columnBd = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];

    //Atributos
    public $id, $titulo, $precio, $imagen, $descripcion, $habitaciones,
    $wc, $estacionamiento, $creado, $vendedores_id;

    //this -> public constructor
    function __construct($args =[]){
        $this -> id =$args['id'] ?? null;
        $this -> titulo =$args['titulo'] ?? '';
        $this -> precio =$args['precio'] ?? '';
        $this -> imagen =$args['imagen'] ?? '';
        $this -> descripcion =$args['descripcion'] ?? '';
        $this -> habitaciones =$args['habitaciones'] ?? '';
        $this -> wc =$args['wc'] ?? '';
        $this -> estacionamiento =$args['estacionamiento'] ?? '';
        $this -> creado = date('y/m/d');
        $this -> vendedores_id =$args['vendedores_id'] ?? '';
    }

    //Validar errores
    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un título";
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
        }if(!$this->vendedores_id){
            self::$errores[] = "El vendedor es obligatorio";
        }if(!$this->imagen){
            self::$errores[] = "La imagen de la propiedad es obligatoria";
        }
        return self::$errores;
    }
}

