<?php require_once __DIR__ . '/include/config.php'; ?>

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
</head>

<body>
    <div class="full-wrapper">
        <?php
            require("include/comun/cabecera.php");
            require("include/comun/sidebarIzq.php");
        ?>

        <div class="container">

            <h1 class="main-title">Testamento</h1>


            <p>El testamento se guardará en nuestra base de datos y esta formado por una descripción de este, la segunda ventana será
                para el desarrollo y una última para el texto anexo.</p>

            <p>Le damos las gracias por confiar en nosotros para tan importate tarea y le aseguramos que está se cumplirá con
                mucha profesionalidad.</p>
            <div class="info_div">
                <div class="enlace">
                    <a class="enlace-link" href="subirTestamento.php">Subir/Modificar Testamento</a>
                </div>
                <div class="enlace">
                    <a class="enlace-link" href="eliminarTestamento.php">Eliminar Testamento</a>
                </div>
            </div>
        </div>

        <?php
            require("include/comun/sidebarDer.php");
            require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>


