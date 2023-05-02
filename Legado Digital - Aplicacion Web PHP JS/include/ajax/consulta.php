<?php
    require_once '../config.php';

    use LegadoDigital\App\UsuarioConsulta;


    // Data from ajax serialize
    $consulta['user_id']= $_SESSION['user_id'];
    $consulta['description'] = htmlspecialchars(strip_tags(trim($_POST['description'])));
    $consulta['text_consulta'] = htmlspecialchars(strip_tags(trim($_POST['text_consulta'])));

    $consulta['lawyer_asociated_id'] = UsuarioConsulta::buscaAbogado($consulta['user_id']);
    if (!isset($consulta['lawyer_asociated_id'])) {
        $consulta['lawyer_asociated_id'] = UsuarioConsulta::creaAbogado($consulta['user_id']);
    }
    UsuarioConsulta::crea($consulta);

    echo 'ok';
    exit();
