<main class="contenedor">
        <h1>Contacto</h1>

        <?php
            if($mensaje){?>
                <p class="alerta exito"> <?php echo $mensaje ?></p>
        <?php } ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="/build/img/destacada3.jpg" loading="lazy" alt="destacada3">
        </picture>

        <h2>LLena el formulario de contacto</h2>

            <form class="formulario" action="/contacto" method="POST">
                <fieldset>
                    <legend>Información personal</legend>

                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Nombre" id="nombre" name="contacto[nombre]" required>            
                    
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" placeholder="Mensaje" name="contacto[mensaje]"></textarea>
                
                </fieldset>

                <fieldset>
                    <legend>Informacion de la propiedad</legend>
                    
                        <label for="opciones">Vende o Compra</label>
                        <select id="opciones" name="contacto[tipo]" required>
                            <option value="" disabled selected> --Seleccione-- </option>
                            <option value="Compra">Compra</option>
                            <option value="Vende">Vende</option>
                        </select>
                    
                        <label for="presupuesto">Precio de presupuesto</label>
                        <input type="text" placeholder="Tu presupuesto o precio" id="presupuesto" name="contacto[precio]" required>
                    
                </fieldset>

                <fieldset>
                    <legend>Informacion de la propiedad</legend>
                    <p>Como desea ser contactado</p>
                    <div class="forma-contacto">
                        <label for="contactar-telefono">Teléfono</label>
                        <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
                        
                        <label for="contactar-email">Email</label>
                        <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                    </div>

                    <div id="contacto"></div>
                    
                </fieldset>
                <input type="submit" value="Enviar" class="boton-verde">
            </form>
</main>