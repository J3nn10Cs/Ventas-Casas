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
            //Obtener los datos de la propiedad
            $property = Propiedad::find($id);

            $property -> eliminar();    
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
                        <td> <?php echo $propiedad->idpropiedades;  ?> </td>
                        <td> <?php echo $propiedad->titulo; ?></td>
                        <td> <img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen"> </td>
                        <td> <?php echo $propiedad->precio; ?></td>
                        <td class="acciones">
                            <form method="POST">
                                <!--Tipo Hidden-->
                                <input type="hidden" name="id" value="<?php echo $propiedad->idpropiedades; ?>">
                                <button type="submit" class="boton-rojo-block" value="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->idpropiedades; ?>" 
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