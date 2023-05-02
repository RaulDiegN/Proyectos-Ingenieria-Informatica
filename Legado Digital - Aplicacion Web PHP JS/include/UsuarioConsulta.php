<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioConsultaDAO;


class UsuarioConsulta
{
    public static function buscaAbogado($user_id)
    {
        $userDAO = new UsuarioConsultaDAO();

        return $userDAO->findAbogadoById($user_id);
    }

    public static function creaAbogado($user_id)
    {
        $userDAO = new UsuarioConsultaDAO();

        return $userDAO->insertaAbogado($user_id);
    }

    public static function crea($user)
    {
        $userDAO = new UsuarioConsultaDAO();

        return $userDAO->inserta($user);
    }

    public static function añade($user)
    {
        $userDAO = new UsuarioConsultaDAO();

        return $userDAO->añade($user);
    }



}