<?php

namespace Foodbook\App\Dao;

use Foodbook\App\Application;
use Foodbook\App\Transfer\UsuarioRegistroVO;

/**
 * Clase UsuarioRegistro Data Acces Object
 */
class UsuarioRegistroDAO
{
    public function findUserById($user_id)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM user_data U WHERE U.user_id = ?");
        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();

        $user = false;

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $user = $this->transferToUserObject($row);
        }

        $query->close();

        return $user;
    }

    public function inserta($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query= $conn->prepare(
            "INSERT INTO user_data(user_id, user_name, user_lastname, user_email, user_age,
             user_DNI, user_nickname, date_account_create, 
            date_account_remove) VALUES (?,?,?,?,?,?,?,?,?)"
        );

        $date = date("Y-m-d H:i:s");

        $query->bind_param("isssissss",
            $user['user_id'],
            $user['user_name'],
            $user['user_lastname'],
            $user['user_email'],
            $user['user_age'],
            $user['user_DNI'],
            $user['user_nickname'],
            $date,
            $user['date_account_remove']
        );

        if ($query->execute()) {
            $user['user_id'] = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $query->close();

        return $user;
    }

    public function actualiza($usuario)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare(
            "UPDATE user_data SET user_name = ?, user_lastname = ?, user_email = ?, user_age = ?,
            user_nickname = ?, user_DNI = ?  WHERE user_id = ?"
        );

        $query->bind_param("sssissi",
            $usuario['user_name'],
            $usuario['user_lastname'],
            $usuario['user_email'],
            $usuario['user_age'],
            $usuario['user_nickname'],
            $usuario['user_DNI'],
            $usuario['user_id']
        );

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $query->close();

        return $usuario;
    }

    public function elimina($user) {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("DELETE FROM user_data  WHERE user_id = ?");

        $query->bind_param("i", $user);

        if (!$query->execute()){
            echo "Error delete user";
            return false;
        }
        $query->close();
        return true;
    }

    private function transferToUserObject($row)
    {
        $user = new UsuarioRegistroVO();

        $user->setUserId($row['user_id']);
        $user->setUserName($row['user_name']);
        $user->setUserLastname($row['user_lastname']);
        $user->setUserDNI($row['user_DNI']);
        $user->setUserAge($row['user_age']);
        $user->setUserEmail($row['user_email']);
        $user->setUserNickname($row['user_nickname']);
        $user->setDateAccountCreate($row['date_account_create']);
        $user->setDateAccountRemove($row['date_account_remove']);

        return $user;
    }

    public function guardaRespuesta($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("UPDATE user_data SET user_response = ? WHERE user_id = ?");

        $query->bind_param("si",
            $user['user_response'],
            $user['user_id']
        );

        if (!$query->execute()){
            echo "Error update user";
            return false;
        }

        $query->close();

        return true;
    }
}
