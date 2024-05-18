<?php
    require 'includes/app.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="/build/img/destacada3.jpg" loading="lazy" alt="destacada3">
        </picture>

        <h2>LLena el formulario de contacto</h2>

            <form class="formulario">
                <fieldset>
                    <legend>Información personal</legend>

                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Nombre" id="nombre">

                    
                        <label for="email">Email</label>
                        <input type="email" placeholder="Tu email" id="email">
                
                    
                        <label for="telefono">Telefono</label>
                        <input type="tel" placeholder="Tu número" id="telefono">
                
                    
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" placeholder="Mensaje"></textarea>
                
                </fieldset>

                <fieldset>
                    <legend>Informacion de la propiedad</legend>
                    
                        <label for="opciones">Vende o Compra</label>
                        <select id="opciones">
                            <option value="" disabled selected> --Seleccione-- </option>
                            <option value="Compra">Compra</option>
                            <option value="Vende">Vende</option>
                        </select>
                    
                        <label for="presupuesto">Precio de presupuesto</label>
                        <input type="email" placeholder="Tu presupuesto o precio" id="presupuesto">
                    
                </fieldset>

                <fieldset>
                    <legend>Informacion de la propiedad</legend>
                    <p>Como desea ser contactado</p>
                    <div class="forma-contacto">
                        <label for="contactar-telefono">Teléfono</label>
                        <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                        
                        <label for="contactar-email">Email</label>
                        <input name="contacto" type="radio" value="email" id="contactar-email">
                    </div>
                    <p>Se eligió Telefono, elija fecha y hora</p>
            
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha">
                    
                        <label for="hora">Hora</label>
                        <input type="time" id="hora" min="09:00" max="18:00">
                    
                </fieldset>
                <input type="submit" value="Enviar" class="boton-verde">
            </form>
    </main>

<?php
    incluirTemplate('footer');
?>