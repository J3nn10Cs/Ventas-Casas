<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <!--Iterar los errores-->
    <?php foreach ($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/login">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Email</label>
            <input type="email" placeholder="Tu email" id="email" name="email">


            <label for="password">Password</label>
            <input type="password" placeholder="Tu password" id="password" name="password">

            <button type="submit" class="boton-verde">
                 Iniciar Sesión
                 <i class="fa-regular fa-user fa-lg"></i>
            </button>

        </fieldset>
    </form>
</main>