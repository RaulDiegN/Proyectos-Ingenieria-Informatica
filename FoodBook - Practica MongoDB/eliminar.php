<?php
require_once __DIR__ . '/include/config.php';
use Foodbook\App\UsuarioRegistro;
use Foodbook\App\UsuarioLogin;
use Foodbook\App\UsuarioReceta;

$user = $_SESSION['user_id'];
$nickname = $_SESSION['user_nickname'];
UsuarioRegistro::eliminar($user);
UsuarioLogin::eliminar($user);
UsuarioReceta::eliminar($nickname);

session_destroy();
unset($_SESSION);
header("Location:home.php");
