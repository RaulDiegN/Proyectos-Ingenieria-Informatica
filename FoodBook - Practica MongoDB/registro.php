<?php
    require_once __DIR__ . '/include/config.php';
    use Foodbook\App\Form\FormRegister;
?>
<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <title>Registro - FoodBook</title>
        <link rel="shortcut icon" type="image/png" href="img/logo/FoodBook.png"/>
        <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
        <link rel="stylesheet" type="text/css" href="css/estilosFormularios.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
    </head>
    <body>
       <?php 
        require("include/comun/cabecera.php");
        ?>
        <div class="contenedor-form">
            <img src="img/login/fondo.png" alt="" class="img-form">
            <?php
            $formRegistro = new FormRegister();
            $formRegistro->gestiona();
            ?>
        </div>

        
        <?php 
        require("include/comun/pie.php");
        ?>
        <script src="js/menu.js"></script>
    </body>

</html>
