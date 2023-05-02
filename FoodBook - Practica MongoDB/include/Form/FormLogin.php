<?php

namespace Foodbook\App\Form;

use Foodbook\App\UsuarioLogin;

/**
 * FormLogin Class
 */
class FormLogin extends Form
{
    public function __construct()
    {
        parent::__construct('form-login');
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $nickname = isset($datos['nickname']) ? $datos['nickname'] : '';

        $error['nickname'] = isset($errores['user_nickname']) ? $errores['user_nickname'] : '';
        $error['login'] = isset($errores['login']) ? $errores['login'] : '';

        $html = <<<EOF
        <h1>Inicio Sesión</h1>
        <div class="form-group">
            <input type="text" name="nickname" id="nickname" placeholder="Nombre de usuario" value="$nickname">
            ${error['nickname']}
            <input type="password" name="password" id="password" placeholder="Contraseña">
            ${error['login']}
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $user = array();

        $user['user_nickname'] = isset($datos['nickname']) ? $datos['nickname'] : null;

        if (empty($user['user_nickname'])) {
            $result['user_nickname'] = '<span class="error">El nombre del usuario no puede estar vacío</span>';
        }

        if (count($result) === 0) {
            $usuario = UsuarioLogin::login($user['user_nickname'], $datos['password']);

            if ($usuario !== false) {
                $_SESSION['user_id'] = $usuario->userId();
                $_SESSION['user_nickname'] = $usuario->userNickname();
                $_SESSION['user_email'] = $usuario->userEmailLogin();

                $result = 'home.php';
            } else {
                $result['login'] = '<span class="error">Nombre de usuario o contraseña incorrectos</span>';
            }
        }

        return $result;
    }
}
