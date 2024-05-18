<?php
    
    if(!isset($_SESSION)){
        session_start();
    }

    //                        si no existe
    $auth = $_SESSION['login'] ?? false;
    //var_dump($auth);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6878e74e2e.js" crossorigin="anonymous"></script>
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logo de Bienes y raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menú">
                </div>

                <div class="derecha">
                    
                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                    </nav>
                    <i class="fa-solid fa-sun fa-xl" id="icon"></i>
                    <?php if($auth): ?>
                            <a href="../../cerrarsesion.php" class="cerrar">
                                <i class="fa-solid fa-right-to-bracket fa-xl"></i>
                            </a>
                    <?php endif; ?>
                </div>

            </div> <!--.barra-->
            <?php if($inicio){ ?>
                <h1>Venta de casas y departamentos exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>