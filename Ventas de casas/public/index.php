<?php
    require_once __DIR__ . '/../includes/app.php';
    

    use MVC\Router;
    use Controllers\PropiedadControllers;
    use Controllers\VendedorController;
    $router = new Router();
    
    //debuguear(PropiedadControllers::class);

    $router->get('/admin',[PropiedadControllers::class,"index"]);

    $router->get('/propiedades/crear',[PropiedadControllers::class,'crear']);
    $router->post('/propiedades/crear',[PropiedadControllers::class,'crear']);

    $router->get('/propiedades/actualizar',[PropiedadControllers::class],'actualizar');
    $router->post('/propiedades/actualizar',[PropiedadControllers::class],'actualizar');

    $router->get('/propiedades/eliminar',[PropiedadControllers::class],'eliminar');
    $router->post('/propiedades/eliminar',[PropiedadControllers::class],'eliminar');


    $router->get('/vendedores/crear',[VendedorController::class,'crear']);
    $router->post('/vendedores/crear',[VendedorController::class,'crear']);

    $router->get('/vendedores/actualizar',[VendedorController::class],'actualizar');
    $router->post('/vendedores/actualizar',[VendedorController::class],'actualizar');

    $router->get('/vendedores/eliminar',[VendedorController::class],'eliminar');
    $router->post('/vendedores/eliminar',[VendedorController::class],'eliminar');
    
    $router -> ComprobarRutas();