<?php require_once __DIR__ . '/include/config.php' ?>

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
            <?php if(isset($_SESSION['user_id'])): ?>
                <h1 class="main-title">TESTAMENTO</h1>
                <h3> Eliminar Testamento</h3>
                <p>
                    Si presionas el siguiente botón se eliminara tu testamento y no podrás recuperarlo.
                    El usuario asociado seguira vigente, pero no se le podrá enviar nada:
                </p>
                <a class="enlace-link" href="include/processForm/procesarEliminarTestamento.php">Eliminar Testamento</a>
            <?php else: ?>
                <?php require "include/comun/restringido.php" ?>
            <?php endif ?>
        </div>

        <?php
            require("include/comun/sidebarDer.php");
            require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>


