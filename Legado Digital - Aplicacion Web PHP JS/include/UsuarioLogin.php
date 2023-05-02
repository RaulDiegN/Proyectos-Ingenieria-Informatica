<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioLoginDAO;

class UsuarioLogin
{
    public static function buscaUsuario($user_nickname)
    {
        $userDAO = new UsuarioLoginDAO();

        return $userDAO->buscaUsuario($user_nickname);
    }

    public static function login($user_nickname, $user_password)
    {
        $userDAO = new UsuarioLoginDAO();

        $user = $userDAO->buscaUsuario($user_nickname);

        if ($user !== false && self::compruebaPassword($user_password, $user->userPassword())) {
            return $user;
        }

        return false;
    }

    public static function crea($user)
    {
        $userDAO = new UsuarioLoginDAO();

        return $userDAO->inserta($user);
    }

    public static function guarda($user)
    {
        $userDAO = new UsuarioLoginDAO();

        if ($user['user_id'] !== null) {
            return $userDAO->actualiza($user);
        }

        return $userDAO->inserta($user);
    }

    public static function compruebaPassword($password, $user_password)
    {
       return password_verify($password, $user_password);
    }
}
