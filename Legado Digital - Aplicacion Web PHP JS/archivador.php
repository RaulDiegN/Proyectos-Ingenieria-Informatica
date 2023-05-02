<?php
require_once __DIR__ . '/include/config.php';
use LegadoDigital\App\UsuarioRuta;
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Archivador - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <meta name="archivadorLegadoDigital" content="Archivador LegadoDigital">
    <meta name="description" content="Los usuarios y usuarias, podrán visualizar sus carpetas y archivos subidos a la aplicación."/>
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
            <?php if(isset($_SESSION["login"])): ?>
                <?php require "include/comun/restringido.php" ?>
            <?php else: ?>
                <h1 class="main-title">Archivador</h1>
                <p>
                    Desde aquí puedes ver y/o eliminar los archivos que subiste a tu cuenta.
                </p>
                <div class="form-content">
                    <?php
                        $path = UsuarioRuta::findPath($_SESSION["user_id"]);
                        $path = 'raiz,' . $path;
                        $paths = explode(',', $path);
                    ?>
                    <h2 class="main-title">Directorio principal</h2>
                    <?php
                        foreach ($paths as $res) {
                            echo "<h3 class=\"tituloArchivador\">$res</h3>";

                            if ($res != "raiz") {
                                $res = "archivos/" . $_SESSION["user_id"] . "/" . $res ."/";
                            } else{
                                $res = "archivos/" . $_SESSION["user_id"] . "/";
                            }

                            $ruta = UsuarioRuta::recorreArchivosCarpeta($res);
                            if ($ruta !== '') {
                                $archivos = explode(',', $ruta);

                                foreach ($archivos as $archivo){
                                    //echo"<div class=\"archivoArchivador\">$archivo</div>";
                                   echo '<div class="archivoArchivador"><a href="' . $res . $archivo. '" target="_blank">' . $archivo . '</a></div>';
                                }
                            }
                        }
                    ?>
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
