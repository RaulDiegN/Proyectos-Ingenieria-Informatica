<?php require_once __DIR__ . '/include/config.php'; ?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Muro Memorial - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <meta name="muroLegadoDigital" content="Muro Memorial LegadoDigital">
    <meta name="description" content="el cliente puede guardar sus recuerdos como por ejemplo imágenes."/>
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
                <h1 class="main-title">Muro</h1>
                <p>Esto es el muro para añadir contenido disponible para usuarios.</p>
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


</body>
</html>
