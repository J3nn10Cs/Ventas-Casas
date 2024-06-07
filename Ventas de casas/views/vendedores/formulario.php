<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombres" name="seller[nombres]" placeholder="Ingresa el nombre" value="<?php echo s($seller->nombres); ?>">

    <label for="apellido">Apellidos:</label>
    <input type="text" id="apellidos" name="seller[apellidos]" placeholder="Ingresa el apellido" value="<?php echo s($seller->apellidos); ?>">

    <label for="telefono">Telefoono:</label>
    <input type="text" id="telefono" name="seller[telefono]" placeholder="Ingresa el telefoono" value="<?php echo s($seller->telefono); ?>">

</fieldset>