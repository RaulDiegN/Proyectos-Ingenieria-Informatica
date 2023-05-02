<?php
    require_once '../config.php';

    use LegadoDigital\App\UsuarioLogin;

    // Data from ajax serialize
    $user_nickname = htmlspecialchars(strip_tags(trim($_POST['nickname'])));
    $user_password = htmlspecialchars(strip_tags(trim($_POST['password'])));

    $user = UsuarioLogin::login($user_nickname, $user_password);

    if ($user === false) {
        echo 'Nombre de usuario o contraseña incorrectos';
        exit();
    }

    $_SESSION['user_id'] = $user->userId();
    $_SESSION['user_nickname'] = $user->userNickname();
    $_SESSION['user_email'] = $user->userEmailLogin();
    $_SESSION['user_type'] = $user->userType();

    if($user->userType() == "user_lawer")
        $_SESSION['abogado'] = true;

    echo 'ok';
