<?php


namespace Foodbook\App\Form;


use Foodbook\App\UsuarioRegistro;
use Foodbook\App\UsuarioReceta;

class FormReceta extends Form
{
    public function __construct()
    {
        parent::__construct('form-recetas');
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $receta = isset($datos['receta']) ? $datos['receta'] : '';
        $ingredientes = isset($datos['ingredientes']) ? $datos['ingredientes'] : '';
        $metodos = isset($datos['metodos']) ? $datos['metodos'] : '';

        $error['ingredientes'] = isset($errores['ingredientes']) ? $errores['ingredientes'] : '';
        $error['receta'] = isset($errores['receta']) ? $errores['receta'] : '';
        $error['metodos'] = isset($errores['metodos']) ? $errores['metodos'] : '';
        $error['login'] = isset($errores['login']) ? $errores['login'] : '';

        $html = <<<EOF
        <div class="receta">
            <input type="text" name="receta" placeholder="Nombre de receta" value="$receta">
            ${error['receta']}
            <input type="text" name="ingredientes" placeholder="Ingredientes separados por comas" value="$ingredientes">
            ${error['ingredientes']}
            <input type="text" name="metodos" placeholder="Métodos separados por comas" value="$metodos">
            ${error['metodos']}
        
        </div>
        <div class="receta">
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $user = array();


        $user = self::datosToVariable();
        if(empty($user)){
            $result['receta'] = '<span class="error">No se ha podido guardar</span>';
        }
        $user['receta'] = isset($datos['receta']) ? $datos['receta'] : null;
        $user['receta'] = ucfirst($user['receta']);
        if (empty($user['receta']) ) {
            $result['receta'] = '<span class="error">El nombre de la receta no puede estar vacío</span>';
        }
        if(UsuarioReceta::findReceta($user['receta'])){
            $result['receta'] = '<span class="error">El nombre de receta ya está cogido, seleccione otro diferente.</span>';
        }


        $user['ingredientes'] = isset($datos['ingredientes']) ? $datos['ingredientes'] : null;
        if (empty($user['ingredientes']) ) {
            $result['ingredientes'] = '<span class="error">El nombre de la receta no puede estar vacío</span>';
        }
        else {
            $ingredientes = explode(',', $user['ingredientes']);
            $user['ingredientes'] = "";
            foreach ($ingredientes as $ingrediente) {
                $ingrediente = str_replace(" ", "", $ingrediente);
                $ingrediente=ucfirst($ingrediente);
                $auxiliar = UsuarioReceta::findIngrediente($ingrediente);
                if (empty($auxiliar)) {
                    UsuarioReceta::creaIngrediente($ingrediente);
                }
                 $user['ingredientes'] =  $user['ingredientes'] . $ingrediente. ',';
            }
        }

        $user['metodos'] = isset($datos['metodos']) ? $datos['metodos'] : null;
        if (empty($user['metodos']) ) {
            $result['metodos'] = '<span class="error">El nombre de la receta no puede estar vacío</span>';
        }
        else {
            $metodos = explode(',', $user['metodos']);
            $user['metodos'] = "";
            foreach ($metodos as $metodo) {
                $metodo = str_replace(" ", "", $metodo);
                $metodo = ucfirst($metodo);
                $auxiliar = UsuarioReceta::findMetodo($metodo);
                if (empty($auxiliar)) {
                    UsuarioReceta::creaMetodo($metodo);
                }
                $user['metodos'] =  $user['metodos'] . $metodo .',';
            }
        }

        if (count($result) === 0) {
            $usuario = UsuarioReceta::crea($user);

            if ($usuario !== false) {
                $result = 'nuevaReceta.php';
            } else {
                $result['login'] = '<span class="error">¡Algo falla!</span>';
            }
        }

        return $result;

    }
    private function datosToVariable(){
        if (isset($_SESSION['user_id'])) {
            $user = UsuarioRegistro::findUser($_SESSION['user_id']);
            $usuario['user_id'] = $user->userId();
            $usuario['user_nickname'] = $user->userNickname();
            $usuario['user_name'] = $user->userName();
            $usuario['user_lastname'] = $user->userLastname();
            $usuario['user_Age'] = $user->userAge();
            $usuario['user_DNI'] = $user->userDni();
            $usuario['user_email'] = $user->userEmail();
        }
       return $usuario;
    }
}