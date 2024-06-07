<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController{
    public static function crear(Router $router){
        $seller = new Vendedor();
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Crea una nueva instancia
            $seller = new Vendedor($_POST['seller']); //POST ARREGLO

            //Validar errores
            $errores = $seller -> validar();
            
            //Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                //Guarda en la base de datos
                $seller -> guardar();
                
            }
        }

        $router -> render('vendedores/crear',[
            'seller' => $seller,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = ValidarRdireccionar('/admin');
        $seller = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Asignar los valores
            $args = $_POST['seller'];

            //Sincronizar objeto en memoria con lo que el usu escibió
            $seller->sincronizar($args);

            //Validación
            $errores = $seller->validar();

            if(empty($errores)){
                $seller -> guardar();
            }
        }

        $router -> render('/vendedores/actualizar',[
            'seller' => $seller,
            'errores' => $errores
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
                        $seller = Vendedor::find($id);
                        $seller -> eliminar();
                    }
                   
            }
        }
    }
}