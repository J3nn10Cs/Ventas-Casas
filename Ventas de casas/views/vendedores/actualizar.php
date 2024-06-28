<main class="contenedor seccion">
        <h1>Actualizar vendedor</h1>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error hidden">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>

        <a href="/admin" class="boton-verde">Volver</a>

        <form class="formulario" method="POST">
            <?php include __DIR__ . '/formulario.php' ?>
            <input type="submit" value="Actualizar propiedad" class="boton-verde mandar" >
        </form> 
</main>