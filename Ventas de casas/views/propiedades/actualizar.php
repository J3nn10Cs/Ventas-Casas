<main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>

        <a href="/admin" class="boton-verde">Volver</a>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
            <input type="submit" value="Actualizar propiedad" class="boton-verde" >
        </form> 
</main>