<?php


namespace Foodbook\App;

use Foodbook\App\Dao\UsuarioRecetaDAO;



class UsuarioReceta
{
    public static function findReceta($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->findReceta($user);
    }

    public static function crea($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->inserta($user);
    }

    public static function findRecetasUser($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->findRecetasUser($user);
    }

    public static function findRecetas()
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->findRecetas();
    }

    public static function findIngrediente($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->findIngrediente($user);
    }

    public static function creaIngrediente($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->insertaIngrediente($user);
    }

    public static function findMetodo($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->findMetodo($user);
    }

    public static function creaMetodo($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->insertaMetodo($user);
    }

    public static function actualiza($userNew, $userOld)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->actualiza($userNew, $userOld);
    }

    public static function eliminar($user)
    {
        $userDAO = new UsuarioRecetaDAO();

        return $userDAO->elimina($user);
    }

}