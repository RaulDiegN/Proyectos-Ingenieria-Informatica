<?php require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\UsuarioRuta;

?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Almacenamiento - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="archivoLegadoDigital" content="Almacenamiento">
    <meta name="description"
          content="el cliente puede agregar nuevo y cualquier tipo de archivo (multimedia, texto, distintos formatos, entre otros) desde su ordenador."/>
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
        <?php if (isset($_SESSION["login"])): ?>
            <?php require "include/comun/restringido.php" ?>
        <?php else: ?>
            <h1 class="main-title">Almacenamiento</h1>

            <?php
                $path = UsuarioRuta::findPath($_SESSION["user_id"]);

                if ($path != null) {
                    $path = 'raiz,' . $path;
                    $paths = explode(',', $path);
                } else {
                    $paths[0] = 'raiz';
                }

                $size = 0;
                $rutaVerdad = "";

                foreach ($paths as $res) {
                    if ($res != "raiz") {
                        $res = "archivos/" . $_SESSION["user_id"] . "/" . $res;
                    } else {
                        $res = "archivos/" . $_SESSION["user_id"];
                    }

                    $ruta = UsuarioRuta::recorreArchivosCarpeta($res);
                    $archivos = explode(',', $ruta);

                    foreach ($archivos as $archivo) {
                        $rutaVerdad = $res . "/" . $archivo;
                        $size = $size + (filesize($rutaVerdad));
                    }

                    $size = 0;
                    $rutaVerdad = "";

                    foreach ($paths as $res) {
                        if ($res != "raiz") {
                            $res = "archivos/" . $_SESSION["user_id"] . "/" . $res;
                        } else {
                            $res = "archivos/" . $_SESSION["user_id"];
                        }
                        $ruta = UsuarioRuta::recorreArchivosCarpeta($res);
                        $archivos = explode(',', $ruta);

                        foreach ($archivos as $archivo) {
                            $rutaVerdad = $res . "/" . $archivo;
                            $size = $size + (filesize($rutaVerdad));
                        }

                        $MBbyte = number_format($size / 1048576, 2);
                        $porcentaje = ($MBbyte * 100) / 15360;

                        if ($porcentaje < 1) {
                            $porcentaje = 1;
                        }
                    }
                }
            ?>
            <p>Desde esta página puede ver el almacenamiento de su espacio personal.</p>
            <div class="form-content">
                <div class="w3-light-grey w3-round">
                    <?php
                        echo "<div class=\"w3-container w3-blue w3-round\" style=\"width:" . $porcentaje ."%\">" . $MBbyte. "MB</div>";
                    ?>
                </div>
            </div>
        <?php endif ?>
    </div>

    <?php
    require("include/comun/sidebarDer.php");
    require("include/comun/pie.php");
    ?>
</div>
</body>
</html>
