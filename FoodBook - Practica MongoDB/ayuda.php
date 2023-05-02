<?php
    require_once __DIR__ . '/include/config.php';
?>
<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <title>Cocina Para Principiantes - FoodBook</title>
        <link rel="shortcut icon" type="image/png" href="img/logo/FoodBook.png"/>
        <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
    </head>
    <body>
       <?php 
        require("include/comun/cabecera.php");
        ?>
        <div class="div-ayuda">
            <div class="contenedor">
                <article id="btn-article" class="fila-ayuda">
                    <img src="img/ayuda/pochar.png" alt="" class="img-ayuda">
                    <div class="div-article">
                        <h2>POCHAR</h2>
                        <p class="info-ayuda">Es una técnica de cocina mediante la cual los alimentos se calientan en un líquido 
                        mientras se agita lentamente, no alcanzando nunca durante el proceso el punto de ebullición,
                         esta es la diferencia fundamental que posee con el escaldado. </p>
                     </div>
                </article>
                <article id="btn-article" class="fila-ayuda">
                    <img src="img/ayuda/gratinado.png" alt="" class="img-ayuda">
                    <div class="div-article">
                        <h2>GRATINADO</h2>
                        <p class="info-ayuda">Tostar o dorar en el horno o el grill la superficie de ciertos platos hasta formarse una costra dorada y crujiente, generalmente después de espolvorearlos con queso o pan rallado.</p>
                    </div>
                </article>
                <article id="btn-article" class="fila-ayuda">
                    <img src="img/ayuda/saltear.png" alt="" class="img-ayuda">
                    <div class="div-article">
                        <h2>SALTEAR</h2>
                        <p class="info-ayuda">Es un método de cocina empleado para cocinar alimentos con una pequeña cantidad de grasa o aceite en una sartén y empleando una fuente de calor relativamente alta.</p>
                    </div>
                </article>
                <article id="btn-article" class="fila-ayuda">
                    <img src="img/ayuda/parrilla.png" alt="" class="img-ayuda">
                    <div class="div-article">
                        <h2>A LA PARRILLA</h2>
                        <p class="info-ayuda">La parrilla es ideal para preparar carnes tiernas, pescados, mariscos, verduras y hortalizas.
                        Eso sí, debemos vigilar la preparación de los ingredientes, así como el encendido y el propio mantenimiento del calor en sí.</p>
                    </div>
                </article>
                 <article id="btn-article" class="fila-ayuda">
                    <img src="img/ayuda/cocer.png" alt="" class="img-ayuda">
                    <div class="div-article">
                        <h2>COCER</h2>
                        <p class="info-ayuda">Mantener un alimento crudo en agua u otro líquido en ebullición hasta que quede tierno o blando.</p>
                    </div>
                </article>
                <article id="btn-article" class="fila-ayuda">
                    <img src="img/ayuda/desalar.png" alt="" class="img-ayuda">
                    <div class="div-article">
                        <h2>DESALAR</h2>
                        <p class="info-ayuda">Quitar toda o parte de la sal a un alimento como la cecina, el pescado salado o el jamón.</p>
                    </div>
                </article>
            </div>
        </div>

        
        <?php 
        require("include/comun/pie.php");
        ?>
        <script src="js/menu.js"></script>
    </body>

</html>
