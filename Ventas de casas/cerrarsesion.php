<?php
    session_start();

    $_SESSION = [];//Cerrar la sesión

    //var_dump($_SESSION);

    //Redirigir a la raiz
    header('Location: /');