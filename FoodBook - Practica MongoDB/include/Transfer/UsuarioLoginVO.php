<?php

namespace Foodbook\App\Transfer;

/**
 * UsuarioLoginVO Transfer Class
 */
class UsuarioLoginVO
{
    private $user_id;

    private $user_nickname;

    private $user_password;

    private $user_email_;



    /* Getters */
    public function userId()
    {
        return $this->user_id;
    }

    public function userNickname()
    {
        return $this->user_nickname;
    }

    public function userPassword()
    {
        return $this->user_password;
    }

    public function userEmailLogin()
    {
        return $this->user_email;
    }


    /* Setters */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setUserNickname($user_nickname)
    {
        $this->user_nickname = $user_nickname;
    }

    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }

    public function setUserEmailLogin($user_email)
    {
        $this->user_email = $user_email;
    }

}