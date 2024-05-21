<?php

function connectionBd(): mysqli{
    $db = new mysqli('localhost','root','15042004','DBBienesRaices');

    if(!$db){
        echo "Error al conectar";
        exit;
    }
    return $db;
}