<?php

namespace Foodbook\App\Form;

use Foodbook\App\UsuarioRegistro;
use Foodbook\App\UsuarioLogin;

/**
 * FormRegister Class
 */
class FormRegister extends Form
{
    public function __construct() {
        parent::__construct('form-register');
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $name = isset($datos['name']) ? $datos['name'] : '';
        $lastname = isset($datos['lastname']) ? $datos['lastname'] : '';
        $nickname = isset($datos['nickname']) ? $datos['nickname'] : '';
        $email = isset($datos['email']) ? $datos['email'] : '';
        $edad = isset($datos['edad']) ? $datos['edad'] : '';
        $dni = isset($datos['dni']) ? $datos['dni'] : '';

        $error['name'] = isset($errores['user_name']) ? $errores['user_name'] : '';
        $error['lastname'] = isset($errores['user_lastname']) ? $errores['user_lastname'] : '';
        $error['nickname'] = isset($errores['user_nickname']) ? $errores['user_nickname'] : '';
        $error['email'] = isset($errores['user_email']) ? $errores['user_email'] : '';
        $error['password'] = isset($errores['user_password']) ? $errores['user_password'] : '';
        $error['repassword'] = isset($errores['user_repassword']) ? $errores['user_repassword'] : '';
        $error['edad'] = isset($errores['edad']) ? $errores['edad'] : '';
        $error['dni'] = isset($errores['dni']) ? $errores['dni'] : '';

        $html = <<<EOF
        <div class="form-registro">
            <input type="text" name="name" id="name" placeholder="Nombre" value="$name">
            ${error['name']}
            <input type="text" name="lastname" id="lastname" placeholder="Apellidos" value="$lastname">
            ${error['lastname']}
            <input type="text" name="nickname" id="nickname" placeholder="Nombre de usuario" value="$nickname">
            ${error['nickname']}
            <input type="email" name="email" id="email" placeholder="Email" value="$email">
            ${error['email']}
            <input type="text" name="edad" id="edad" placeholder="Edad" value="$edad">
            ${error['edad']}
            <input type="text" name="dni" id="dni" placeholder="DNI" value="$dni">
            ${error['dni']}
            <input type="password" name="password" id="password" placeholder="Contraseña">
            ${error['password']}
            <input type='password' name="repassword" id="repassword" placeholder="Repetir contraseña">
            ${error['repassword']}
            <input type="submit" name="submit" id="submit" value="Registrar">
        </div>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $user = array();

        $user['user_name'] = isset($datos['name']) ? $datos['name'] : null;

        if ( empty($user['user_name']) ) {
            $result['user_name'] = '<span class="error">El nombre del usuario no puede estar vacío</span>';
        }

        $user['user_lastname'] = isset($datos['lastname']) ? $datos['lastname'] : null;

        if ( empty($user['user_lastname']) ) {
            $result['user_lastname'] = '<span class="error">Los apellidos de usuario no pueden estar vacío</span>';
        }

        $user['user_password'] = isset($datos['password']) ? $datos['password'] : null;

        if ( strlen($user['user_password']) < 5 ) {
            $result['user_password'] = '<span class="error">El longitud de la contraseña debe ser de 5 o más caracteres.</span>';
        }

        $user['user_repassword'] = isset($datos['repassword']) ? $datos['repassword'] : null;

        if ( strcmp($user['user_password'], $user['user_repassword']) !== 0 ) {
            $result['user_repassword'] = '<span class="error">Las contraseñas deben coincidir.</span>';
        }

        $user['user_email'] = isset($datos['email']) ? $datos['email'] : null;

        if ( empty($user['user_email']) ) {
            $result['user_email'] = '<span class="error">El email de usuario no puede estar vacío</span>';
        }

        $user['user_nickname'] = isset($datos['nickname']) ? $datos['nickname'] : null;

        if ( empty($user['user_nickname'])  || strlen($user['user_nickname']) < 5 ){
            $result['user_nickname'] = '<span class="error">La longitud del  nombre de usuario debe ser de 5 o más caracteres.</span>';
        }
        if(UsuarioLogin::buscaUsuario($user['user_nickname'])){
            $result['user_nickname'] = '<span class="error">El nombre de usuario ya está cogido, seleccione otro diferente.</span>';
        }

        $user['user_age'] = isset($datos['edad']) ? $datos['edad'] : null;

        if ( empty($user['user_age']) ) {
            $result['user_age'] = '<span class="error">La edad de usuario no pueden estar vacío</span>';
        }

        $user['user_DNI'] = isset($datos['dni']) ? $datos['dni'] : null;

        if ( empty($user['user_DNI']) ) {
            $result['user_DNI'] = '<span class="error">El dni de usuario no pueden estar vacío</span>';
        }
        $user['date_account_remove'] = "";
        if (count($result) === 0) {
            $usuarioLogin = UsuarioLogin::crea($user);
            $user['user_id'] = $usuarioLogin->userId();
            UsuarioRegistro::crea($user);

            $_SESSION['user_id'] = $usuarioLogin->userId();
            $_SESSION['user_nickname'] = $usuarioLogin->userNickname();
            $_SESSION['user_email'] = $usuarioLogin->userEmailLogin();
            //$_SESSION['user_id'] = $user['user_id'];
            //$_SESSION['esAdmin'] = strcmp($usuarioLogin->tipoUsuario(), 'admin') == 0 ? true : false;
            $result = 'home.php';
        }

        return $result;
    }
}