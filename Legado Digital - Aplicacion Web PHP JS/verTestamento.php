<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\UsuarioTestamento;

    $okey = false;

    if(isset($_SESSION['user_id']) && UsuarioTestamento::buscaTestamento($_SESSION['user_id'])) {
        $okey = true;
        $result = UsuarioTestamento::muestraTestamento($_SESSION['user_id']);
    }
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
</head>

<body>
    <div class="full-wrapper">
        <?php
            require("include/comun/cabecera.php");
            require("include/comun/sidebarIzq.php");
        ?>

        <div class="container">
            <h1 class="main-title">TESTAMENTO</h1>

            <h3> Ver Testamento</h3>
            <p class="p_ver">Descripción: </p>
            <p class="p_ver">
                <?php
                if($okey) {
                    echo $result['description'];
                }
                ?>
            </p>
            <p class="p_ver">Testamento: </p>
            <p class="p_ver">
                <?php
                if($okey) {
                    echo $result['text_testament'];
                }
                ?>
            </p>
        </div>

        <?php
            require("include/comun/sidebarDer.php");
            require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>
