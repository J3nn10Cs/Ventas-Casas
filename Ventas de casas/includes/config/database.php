<?php

function connectionBd(): mysqli{
    $db = new mysqli('localhost','root','15042004','bienesraices_crud');

    if(!$db){
        echo "Error al conectar";
        exit;
    }
    return $db;
}