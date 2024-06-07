<?php
    namespace Controllers;
    use Model\Propiedad;
    use MVC\Router;

class PaginasController{
    public static function index(Router $router){
        $property = Propiedad::get(3);
        $inicio = true;
        $router -> render('/paginas/index',[
            'property' => $property,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router -> render('/paginas/nosotros',[
            
        ]);
    }

    public static function propiedades(Router $router){
        $property = Propiedad::get(10);
        $router -> render('paginas/propiedades',[
            'property' => $property
        ]);
    }
    public static function blog(Router $router){
        $property = Propiedad::all();
        $router -> render('paginas/blog',[
            'property' => $property
        ]);
    }

    public static function propiedad(Router $router){
        $id = ValidarRdireccionar('/admin');
        $property = Propiedad::find($id);
        $router -> render('paginas/propiedad',[
            'property' => $property,
        ]);
    }

    public static function entrada(Router $router){
        $router -> render('paginas/entrada',[

        ]);
    }

    public static function contacto(Router $router){
        $router -> render('paginas/contacto',[

        ]);
    }
}