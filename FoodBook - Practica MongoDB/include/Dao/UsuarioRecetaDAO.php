<?php


namespace Foodbook\App\Dao;
use MongoDB\Client;

require'mongodb/bbdd/vendor/autoload.php';

class UsuarioRecetaDAO
{
    public function findReceta($receta)
    {
        $dbConnection = new Client();
        $conn = $dbConnection;
        $colletion = $conn->foodbook->recetas;
        $result = $colletion->findOne(array('receta_nombre' => $receta));
        return $result;
    }

    public function inserta($receta){

        $dbConnection = new Client('mongodb://localhost:27017');
        $conn = $dbConnection;
        $colletion = $conn->foodbook->recetas;
        $result = $colletion->insertOne(array('receta_autor' => $receta['user_id'],
        'receta_nombre' => $receta['receta'], 'receta_cocinero' => $receta['user_nickname'],
        'receta_ing' => $receta['ingredientes'], 'receta_pre' => $receta['metodos']));
        $colletion = $conn->foodbook->user_recetas;
        $user = $colletion->findOne(array('user_nickname' => $receta['user_nickname']));
        if(empty($user)){
            $colletion->insertOne(array('user_nickname' => $receta['user_nickname'], 'recetas_nombre' => array($receta['receta'])));

            return "{1}";   }
        else{
            $auxiliar = array();
            foreach ($user["recetas_nombre"] as $aux){
                array_push($auxiliar,$aux);
            }
            array_push($auxiliar, $receta['receta']);
            $colletion->updateOne(array('user_nickname' => $receta['user_nickname']), array('$set' => array('recetas_nombre'=> $auxiliar)));
        }
        return $result;

    }

    public function findRecetasUser($user)
    {
        $dbConnection = new Client();
        $conn = $dbConnection;
        $colletion = $conn->foodbook->user_recetas;
        $result = $colletion->findOne(array('user_nickname' => $user));
        return $result["recetas_nombre"];
    }

    public function findRecetas()
    {
        $dbConnection = new Client();
        $conn = $dbConnection;
        $colletion = $conn->foodbook->recetas;
        $result = $colletion->find();
        return $result;
    }

    public function findIngrediente($ingrediente)
    {
        $dbConnection = new Client('mongodb://localhost:27017');
        $conn = $dbConnection;
        $colletion = $conn->foodbook->ingredientes;
        $result = $colletion->findOne(array('ingrediente_name' => $ingrediente));
        return $result;
    }

    public function insertaIngrediente($ingrediente){

        $dbConnection = new Client('mongodb://localhost:27017');
        $conn = $dbConnection;
        $colletion = $conn->foodbook->ingredientes;
        $result = $colletion->insertOne(array('ingrediente_name' => $ingrediente));
        return $result;

    }

    public function findMetodo($metodos)
    {
        $dbConnection = new Client('mongodb://localhost:27017');
        $conn = $dbConnection;
        $colletion = $conn->foodbook->metodos;
        $result = $colletion->findOne(array('metodo_name' => $metodos));
        return $result;
    }

    public function insertaMetodo($metodos){

        $dbConnection = new Client('mongodb://localhost:27017');
        $conn = $dbConnection;
        $colletion = $conn->foodbook->metodos;
        $result = $colletion->insertOne(array('metodo_name' => $metodos));
        return $result;

    }

    public function actualiza($userNew, $userOld){

        $dbConnection = new Client('mongodb://localhost:27017');
        $conn = $dbConnection;
        $colletion = $conn->foodbook->user_recetas;
        //$result = $colletion->insertOne(array('metodo_name' => $metodos));
        $colletion->updateMany(array('user_nickname' => $userOld), array('$set' => array('user_nickname' => $userNew)));
        $colletion = $conn->foodbook->recetas;
        $result = $colletion->updateMany(array('receta_cocinero' => $userOld), array('$set' => array('receta_cocinero' => $userNew)));
        return $result;

    }

    public function elimina($user){

        $dbConnection = new Client('mongodb://localhost:27017');
        $conn = $dbConnection;
        $colletion = $conn->foodbook->user_recetas;
        $result = $colletion->deleteOne(array('user_nickname' => $user));

        $colletion = $conn->foodbook->recetas;
        $result = $colletion->deleteMany(array('receta_cocinero' => $user));

        return $result;

    }

}