<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo : </label>
    <input type="text" id="titulo" name="property[titulo]" placeholder="Titulo de la propiedad" value="<?php echo s($property->titulo); ?>">

    <label for="precio">Precio : </label>
    <input type="number" id="precio" name="property[precio]" placeholder="Precio de la propiedad" value="<?php echo s($property->precio); ?>">

    <label for="imagen">Imagen : </label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="property[imagen]">

    <?php if($property->imagen): ?>
        <img src="/imagenes/<?php echo $property->imagen ?>" class="imagen-small" alt="imagen">
    <?php endif; ?>

    <label for="descripcion">Descripcion : </label>
    <textarea id="descripcion" name="property[descripcion]"> <?php echo s($property->descripcion); ?> </textarea>

</fieldset>

<fieldset>
    <legend>Información de la propiedad</legend>

    <label for="habitaciones">Habitaciones : </label>
    <input type="number" id="habitaciones" name="property[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($property->habitaciones); ?>">

    <label for="wc">Baños : </label>
    <input type="number" id="wc" name="property[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($property->wc); ?>">

    <label for="estacionamiento">Estacionamiento : </label>
    <input type="number" id="estacionamiento" name="property[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($property->estacionamiento); ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>
    <select name="property[vendedores_id]" id="vendedor">
        <option selected value="" disabled> --Seleccione--</option>
        <?php foreach($seller as $vendedor): ?>
            <!--Si el id de Vendedor es igual al vendorId a iterar -> Selected -->
            <option 
            <?php echo $property->vendedores_id === $vendedor->id ? 'selected' : '';  ?>
            value="<?php echo s($vendedor->id); ?>">
             <?php echo s($vendedor->nombres) . " " . s($vendedor->apellidos); ?> 
            </option>
        <?php endforeach; ?>
    </select>
    
</fieldset>