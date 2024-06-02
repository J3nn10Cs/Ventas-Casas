<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>

        <a href="/admin" class="boton-verde">Volver</a>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <?php endforeach; ?>
                                                                                    <!--Leer los archivos 319-->
        <form class="formulario" method="post" action="/admin/vendedores/crear.php" enctype="multipart/form-data">

            <input type="submit" value="Registrar vendedor(a)" class="boton-verde" >
        </form>
</main>