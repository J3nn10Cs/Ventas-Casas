<?php
    require '../includes/app.php';
    Autenticado();

    use App\Propiedad;
    use App\Vendedor;

    //Implementar un metodo para poder obtener todas las propiedades
    $property = Propiedad::all();
    $seller = Vendedor::all();
    //muestra mensaje segun la condicional
    $resultado = $_GET['resultado'] ?? null;

    //Si es POST
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if($id){

            $type = $_POST['tipo'];

            if(ValidarContenido($type)){
                
                //Compara lo que vamos a eliminar
                if($type === 'propiedad'){
                    //Obtener los datos de la propiedad
                    $property = Propiedad::find($id);

                    $property -> eliminar(); 
                }else if($type === 'vendedor'){
                    $seller = Vendedor::find($id);
                    $seller -> eliminar();
                }
            }
               
        }
    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador</h1>
        <?php if(intval($resultado) == 1): ?>
            <p class="alerta exito">Anuncio creado correctamente!</p>
        <?php elseif(intval($resultado)==2): ?>
            <p class="alerta exito">Anuncio actualizado correctamente!</p>
        <?php elseif(intval($resultado)==3): ?>
            <p class="alerta elimado">Anuncio eliminado correctamente!</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva Propiedad</a> 
        <a href="/admin/vendedores/crear.php" class="boton-amarillo">Nuevo Vendedor(a)</a> 

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
                            <form method="POST">
                                <!--Tipo Hidden-->
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <button type="submit" class="boton-rojo-block" value="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" 
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
                        <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                        <td> <?php echo $vendedor->telefono; ?></td>
                        <td class="acciones">
                            <form method="POST">
                                <!--Tipo Hidden-->
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <button type="submit" class="boton-rojo-block" value="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            <a href="admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" 
                            class="boton-claro-block"> <i class="fa-solid fa-pen"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

<?php

    //Cerrar la conexion    
    incluirTemplate('footer');
?>