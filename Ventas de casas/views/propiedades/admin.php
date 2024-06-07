<main class="contenedor seccion">
    <h1>Administrador</h1>

    <?php
        if($resultado){
            $mensaje = mostrarInformacion(intval($resultado));
            if($mensaje){?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php }
        } 
    ?>
    
    <a href="/propiedades/crear" class="boton-verde">Nueva Propiedad</a> 
    <a href="/vendedores/crear" class="boton-amarillo">Nuevo Vendedor(a)</a> 

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead> <!--Cabecera-->
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody><!--Cuerpo -- Mostrar resultados-->
            <?php foreach($property as $propiedad): ?>
                <tr>
                    <td> <?php echo $propiedad->id;  ?> </td>
                    <td> <?php echo $propiedad->titulo; ?></td>
                    <td> <img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen"> </td>
                    <td> <?php echo $propiedad->precio; ?></td>
                    <td class="acciones">
                        <form method="POST" action="/propiedades/eliminar">
                            <!--Tipo Hidden-->
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                                <button type="submit" class="boton-rojo-block" value="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                        </form>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" 
                        class="boton-claro-block"> <i class="fa-solid fa-pen"></i> </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead> <!--Cabecera-->
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
            
        <tbody><!--Cuerpo -- Mostrar resultados-->
            <?php foreach($seller as $vendedor): ?>
                <tr>
                    <td> <?php echo $vendedor->id;  ?> </td>
                    <td> <?php echo $vendedor->nombres . " " . $vendedor->apellidos; ?></td>
                    <td> <?php echo $vendedor->telefono; ?></td>
                    <td class="acciones">
                        <form method="POST" action="/vendedores/eliminar">
                                <!--Tipo Hidden-->
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <button type="submit" class="boton-rojo-block" value="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                        </form>
                            <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" 
                            class="boton-claro-block"> <i class="fa-solid fa-pen"></i> </a>
                        </td>
            </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main> 