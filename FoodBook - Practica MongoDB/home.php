<?php
    require_once __DIR__ . '/include/config.php';
?>
<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <title>Home - FoodBook</title>
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
            <img class="img" src="img/index/banner/fondo3.png" alt="" class="banner_img">
            <div class="contenedor">
                <h1 class="banner_titulo">Las mejores recetas en solo un click</h1>
                <h3 class="banner_txt">Añade y guarda recetas a tu gusto</h3>
            </div>
        </div>
        <main class="main">
            <div class="container">
                <section class="info_section">
                    <article class="info_columna">
                        <img class="img" src="img/index/columnas/saludable.png" alt="" class="info_img">
                        <h2 class="info_titulo">Crea recetas</h2>
                        <p class="info_txt">Añade a nuestra web nuevas recetas que quieras guardar en tu perfil on-line y 
                        compartir con otros usuarios a través de esta aplicación.</p>
                    </article>
                    <article class="info_columna">
                        <img src="img/index/columnas/fondo2.png" alt="" class="info_img">
                        <h2 class="info_titulo">Guarda recetas</h2>
                        <p class="info_txt">Guarda tus recetas en tu perfil on-line para poder acceder
                        a ellas rapidamente.</p>
                    </article>
                    <article class="info_columna">
                        <img src="img/index/columnas/hamburguesa.png" alt="" class="info_img">
                        <h2 class="info_titulo">Busca recetas</h2>
                        <p class="info_txt">Explora en nuestra web las distintas recetas 
                        que ofrece la propia web y los demás usuarios.</p>
                    </article>
                    <article class="info_columna">
                        <img src="img/index/columnas/personas.png" alt="" class="info_img">
                        <h2 class="info_titulo">Tú, chef</h2>
                        <p class="info_txt">Guarda tus datos en tu perfil on-line para poder anunciarte con tu exquisitas recetas,
                        a otros usuarios y restaurantes.</p>
                    </article>
                </section>
            </div>
            <div class="index-texto">   
                 <?php if (true): ?>
                <h1 class="bienvenida">BIENVENI@ A NUESTRA WEB</h1>
                <p>Al estar registrado tienes acceso a todas nuestras ventajas. Explora esta aplicación para aprender nuevas recetas
                o compartir las tuyas con este mundo culinario que formamos todos juntos.</p>
                <br>
                <p>Muchas gracias por participar y aportar tu granito de arena a esta web en crecimiento. Esperemos que disfrute
                de esta aventura. Si quiere contactar con nosotros envienos un email a foodbook@correo.com.</p>
                <?php else: ?>
                <h1 class="bienvenida">REGISTRATE E INICIA SESIÓN</h1>
                <p>Para disfrutar de todas nuestras ventajas, un mundo que esta en crecimiento y del que todos podemos aprender 
                y disfrutar. Muchas gracias por dedicarnos tu tiempo. Si quiere contactar con nosotros envienos un email a 
                foodbook@correo.com.</p>
                <?php endif ?>
            </div>
        </main>
        <?php 
        require("include/comun/pie.php");
        ?>
        <script src="js/menu.js"></script>
    </body>

</html>
