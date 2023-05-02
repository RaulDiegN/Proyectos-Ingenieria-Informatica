<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioRutaDAO;

class UsuarioRuta
{
    public static function findPath($user_id)
    {
        $userDAO = new UsuarioRutaDAO();

        $user_path = $userDAO->findPath($user_id);

        return $user_path;
    }

    public static function insertPath($user_id, $user_path)
    {
        $userDAO = new UsuarioRutaDAO();

        return $userDAO->insertPath($user_id, $user_path);
    }

    public static function updatePath($user_id, $user_path)
    {
        $userDAO = new UsuarioRutaDAO();

        return $userDAO->updatePath($user_id, $user_path);
    }

    public static function recorreArchivosCarpeta($ruta)
    {

        $archivos = "";
        $cont = true;

        if (is_dir($ruta)) {
            // Abre un gestor de directorios para la ruta indicada
            $gestor = opendir($ruta);

            // Recorre todos los elementos del directorio
            while (($archivo = readdir($gestor)) !== false) {
                $ruta_completa = $ruta . "/" . $archivo;

                if ($archivo != "." && $archivo != "..") {
                    if (!is_dir($ruta_completa)) {
                        if($cont === true) {
                            $archivos = $archivo;
                            $cont = false;
                        } else {
                            $archivos = $archivos . ',' . $archivo;
                        }
                    }
                }
            }

            // Cierra el gestor de directorios
            closedir($gestor);
        }
        return $archivos;
    }

    public function calcularPorcentaje()
    {
    }
}
