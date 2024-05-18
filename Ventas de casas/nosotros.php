<?php
    require 'includes/app.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Conocer sobre Nosotros</h1>
        <div class="sobre-nosotros">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img src="/build/img/nosotros.jpg" loading="lazy" alt="blog1">
            </picture>
            <div class="informacion">
                <h4>25 años de Experiencia</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, ad provident! 
                    Corrupti ipsum modi, doloremque commodi officia sit! Fugit corporis voluptas 
                    labore, tenetur consequatur cum exercitationem quod dolor velit alias.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, excepturi 
                    perferendis. Officia officiis autem quos ullam nihil earum. Temporibus architecto 
                    odio exercitationem id hic perferendis modi ab ad at cum? Lorem ipsum dolor sit amet 
                    consectetur adipisicing elit. Amet cupiditate consequatur reiciendis cum rerum magnam 
                    beatae, corrupti quod accusantium laboriosam tempora rem minus officiis similique modi 
                    distinctio recusandae ex. Autem.
                </p>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum est possimus voluptatem
                     quidem minus in et eaque harum perferendis, quaerat, pariatur esse molestias quos 
                     fugiat voluptas cupiditate dolore vel. Nisi! Lorem ipsum dolor sit amet consectetur
                      adipisicing elit. Doloribus maiores blanditiis consectetur ipsam atque at maxime, 
                      molestias iusto labore laborum ducimus perferendis doloremque obcaecati, et asperiores
                       repudiandae quasi iure deleniti?
                </p>
            </div>
        </div>
    </main>

    <div class="contenedor seccion">
            <h1>Más sobre nosotros</h1>
            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="/build/img/icono1.svg" alt="Icono seguridad"  loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum praesentium, 
                        magnam unde nam itaque distinctio reiciendis atque quia amet aspernatur 
                        libero optio soluta non quasi, omnis similique ex officia tempora!</p>
                </div>
                <div class="icono">
                    <img src="/build/img/icono2.svg" alt="Icono precio"  loading="lazy">
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum praesentium, 
                        magnam unde nam itaque distinctio reiciendis atque quia amet aspernatur 
                        libero optio soluta non quasi, omnis similique ex officia tempora!</p>
                </div>
                <div class="icono">
                    <img src="/build/img/icono3.svg" alt="Icono Tiempo"  loading="lazy">
                    <h3>Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum praesentium, 
                        magnam unde nam itaque distinctio reiciendis atque quia amet aspernatur 
                        libero optio soluta non quasi, omnis similique ex officia tempora!</p>
                </div>
            </div>
    </div>
<?php
    incluirTemplate('footer');
?>