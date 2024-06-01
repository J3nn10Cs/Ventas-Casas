<main class="contenedor seccion">
        <h1>Crear</h1>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>

        <a href="/admin" class="boton-verde">Volver</a>

        <form class="formulario" method="$_POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php' ?>
            <input type="submit" value="Crear propiedad" class="boton-verde" >
        </form> 
</main>