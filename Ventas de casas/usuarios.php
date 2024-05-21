<?php
    //importar la conexion
    require 'includes/app.php';
    $db = connectionBd();

    //Crear un smail y password
    $email = "jennifer@correo.com";
    $password = "123456789";

    //tener un password diferente (tiene 60 caratcteres)
    $passwordHash = password_hash($password,PASSWORD_DEFAULT);

    //debuguear($passwordHash);
    //Query para crear el usuario
    $query = "INSERT INTO usuarios (email,password) VALUES ('${email}','${passwordHash}'); ";
    //echo $query;
    // exit;
    //Agregar a la BD
    mysqli_query($db,$query);
