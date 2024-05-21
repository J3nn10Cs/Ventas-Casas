<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

//require 'app.php';//llamamos a app
function incluirTemplate(string $nombre,bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
}

//funcion que retorna true/false
function Autenticado(){
    session_start();
    if(!$_SESSION['login']){
        header('Location: /');
    }
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "<pre>";
    exit;
}

//Escapa /Sanitizar el Html
function s($html): string{
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido
function ValidarContenido($type){
    $types = ['vendedor','propiedad'];

    return in_array($type,$types);
}

function mostrarInformacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1: 
            $mensaje = 'Creado correctamente';break;
        case 2:
            $mensaje = 'Actualizado correctamente';break;
        case 3:
            $mensaje = 'Eliminado correctamente';break;
        default:
            $mensaje = false;break;
    }
    return $mensaje;
}