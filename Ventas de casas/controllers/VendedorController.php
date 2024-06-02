<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController{
    public static function crear(Router $router){
        $seller = Vendedor::all();

        $router -> render('vendedores/crear',[

        ]);
    }
    public static function actualizar(Router $router){
        echo 'Eliminar';
    }
    public static function eliminar(){
        
    }
}