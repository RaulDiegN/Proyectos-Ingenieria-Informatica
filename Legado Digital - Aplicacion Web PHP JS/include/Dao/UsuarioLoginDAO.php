<?php

namespace LegadoDigital\App\Dao;

use LegadoDigital\App\Application;
use LegadoDigital\App\Transfer\UsuarioLoginVO;


/**
 * UsuarioLogin Data Access Object Class
 */
class UsuarioLoginDAO
{
    public function buscaUsuario($user_nickname)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM user_login U WHERE U.user_nickname = ?");

        $query->bind_param("s", $user_nickname);

        if (!$query->execute()) {
            echo 'Error al consultar la BD: (' . $conn->errno . ') ' . utf8_encode($conn->error);
            exit();
        }

        $rs = $query->get_result();
        $result = false;

        if ($rs->num_rows == 1) {
            $row = $rs->fetch_assoc();
            $user = $this->transferToUserObject($row);
            $result = $user;
        }

        $query->close();

        return $result;
    }

    public function inserta($usuario)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare(
            "INSERT INTO user_login(user_nickname, user_email_login, user_password, user_type) VALUES (?, ?, ?, ?)"
        );

        $pass = self::hashPassword($usuario['user_password']);

        $query->bind_param("ssss",
            $usuario['user_nickname'],
            $usuario['user_email_login'],
            $pass,
            $usuario['user_type']
        );

        if (!$query->execute()) {
            $msg = utf8_encode($conn->error);
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . $msg;
            exit();
        }

        $usuario['user_id'] = $conn->insert_id;

        $user = $this->transferToUserObject($usuario);

        $query->close();

        return $user;
    }

    public function buscaId($user){
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT user_id FROM user_login U WHERE U.user_nickname = ?");

        $query->bind_param("s", $user);

        if (!$query->execute()) {
            echo 'Error al consultar la BD: (' . $conn->errno . ') ' . utf8_encode($conn->error);
            exit();
        }

        $rs = $query->get_result();
        $result = $rs->fetch_assoc();

        $query->close();

        return $result['user_id'];
    }

    public function actualiza($usuario)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $password = $usuario['user_password'] !== '' ? ', user_password = ? ' : '';
        $stmt = <<<EOT
        UPDATE user_login SET user_nickname = ?, user_email_login = ?$password
        WHERE user_id = ?
EOT;

        $query = $conn->prepare($stmt);

        if ($usuario['user_password'] !== '') {
            $pass = self::hashPassword($usuario['user_password']);

            $query->bind_param("sssi",
                $usuario['user_nickname'],
                $usuario['user_email_login'],
                $pass,
                $usuario['user_id']
            );
        } else {
            $query->bind_param("ssi",
                $usuario['user_nickname'],
                $usuario['user_email_login'],
                $usuario['user_id']
            );
        }

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $user = $this->transferToUserObject($usuario);

        $query->close();

        return $user;
    }

    private function transferToUserObject($row)
    {
        $user = new UsuarioLoginVO();

        $user->setUserId($row['user_id']);
        $user->setUserNickname($row['user_nickname']);
        $user->setUserPassword($row['user_password']);
        $user->setUserEmailLogin($row['user_email_login']);
        $user->setUserType($row['user_type']);

        return $user;
    }

    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
