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