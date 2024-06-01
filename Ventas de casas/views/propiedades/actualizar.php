<main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <!--Mostrar los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
                <?php echo $error;?>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus maxime dicta cupiditate exercitationem repellendus culpa, vel laudantium aperiam, asperiores hic, iste possimus voluptas. Doloremque quam iure corrupti ea? Commodi, expedita.</p>
        <?php endforeach; ?>

        <a href="/admin" class="boton-verde">Volver</a>

        <form class="formulario" method="$_POST" enctype="multipart/form-data">
            <?php include __DIR__ . 'formulario.php' ?>
            <input type="submit" value="Actualizar propiedad" class="boton-verde" >
        </form> 
</main>