<?php

//Incluir funciones
require 'funciones.php';

//Conexion
require 'config/database.php';

//Autoload DIR(devuelve la ruta del archivo actual)
require __DIR__ . '/../vendor/autoload.php';

//Conectar a la bd
$db = connectionBd();

//importamos la clase
use App\Propiedad;


Propiedad::setDb($db);
