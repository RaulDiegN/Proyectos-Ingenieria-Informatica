<?php
    require 'include/config.php';

    use LegadoDigital\App\Form\FormTestamento;

?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Testamento - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="testamentoLegadoDigital" content="Testamento LegadoDigital">
    <meta name="description" content="se almacenan los documentos que establecen el futuro de la infomación digital."/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
   <script  type="text/javascript" src="js/form/subirTestamento.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>
    <div class="full-wrapper">
        <?php
            require("include/comun/cabecera.php");
            require("include/comun/sidebarIzq.php");
        ?>

        <div class="container">
            <h1 class="main-title">TESTAMENTO</h1>

            <?php
                $form = new FormTestamento();
                $form->muestra();
            ?>
        </div>

        <?php
            require("include/comun/sidebarDer.php");
            require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>
