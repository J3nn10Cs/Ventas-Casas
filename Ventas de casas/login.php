<?php
    require 'includes/app.php';
    $db = connectionBd();

    //Errores
    $errores = [];
    //Autenticar el usuario
    //ver resultados de post
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db,$_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio";
        }
        if(!$password){
            $errores[] = "El password es obligatorio";
        }
        // echo '<pre>';
        // var_dump($errores);
        // echo '</pre>';
        if(empty($errores)){
            //Verificar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}' "; 
            $resultado = mysqli_query($db,$query);
            

            //si hay resultados
            if($resultado -> num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                
                //Verificar si el password es correcto
                $auth = password_verify($password,$usuario['password']);

                if($auth){
                    //El usuario está autenticado
                    //session_start();//iniciar la sesión
                    session_start();
                    //Llenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    //Redireccionamos al usuario
                    header('Location: /admin');
                }else{
                    $errores[] = "El password es incorrecto";
                }
            }else{
                $errores[] = "El usuario no existe";
            }
        }
    }

    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <!--Iterar los errores-->
    <?php foreach ($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Email</label>
            <input type="email" placeholder="Tu email" id="email" name="email" required>


            <label for="password">Password</label>
            <input type="password" placeholder="Tu password" id="password" name="password" required>

            <button type="submit" class="boton-verde">
                 Iniciar Sesión
                 <i class="fa-regular fa-user fa-lg"></i>
            </button>

        </fieldset>
    </form>
</main>

<?php
    incluirTemplate('footer');
?>