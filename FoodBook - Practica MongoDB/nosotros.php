<?php
    require_once __DIR__ . '/include/config.php';
?>
<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <title>Sobre Nosotros - FoodBook</title>
        <link rel="shortcut icon" type="image/png" href="img/logo/FoodBook.png"/>
        <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
    </head>
    <body>
       <?php 
        require("include/comun/cabecera.php");
        ?>
        <div class="banner">
            <img class="img" src="img/nosotros/fondo.png" alt="" class="banner_img">
            <div class="contenedor">
                <h1 class="banner_titulo">Bienvenid@ a nuestra web</h1>
                <h3 class="banner_txt">Desliza hacia bajo para ver más información sobre nosotros</h3>
            </div>
        </div>
        <main class="main">
            <div class="contenedor">
                <section class="info_section">
                    <article class="info_columna">
                        <img class="img" src="img/nosotros/mundo.png" alt="" class="info_img">
                        <h2 class="info_titulo">Comunidad internacional</h2>
                        <p class="info_txt">Esta web tiene potencial para llegar a ser un referente culinario 
                        en el mundo, ayudanos a conseguirlo.</p>
                    </article>
                    <article class="info_columna">
                        <img src="img/nosotros/fondo2.png" alt="" class="info_img">
                        <h2 class="info_titulo">Nosotros</h2>
                        <p class="info_txt">Somos un grupo de informaticos con afición a la cocina, y con 
                            la inquietud de intercambiar conocimientos por todo el mundo sobre conceptos, platos, 
                        métodos de cocina de las diferentes culturas.</p>
                    </article>
                    <article class="info_columna">
                        <img src="img/nosotros/menu.png" alt="" class="info_img">
                        <h2 class="info_titulo">Restaurantes</h2>
                        <p class="info_txt">Esta web esta planteada también para restaurantes que quieren hacerse un hueco
                        en el mundo de la cocina.</p>
                    </article>
                </section>
            </div>
        </main>


        <?php 
        require("include/comun/pie.php");
        ?>
        <script src="js/menu.js"></script>
    </body>

</html>
