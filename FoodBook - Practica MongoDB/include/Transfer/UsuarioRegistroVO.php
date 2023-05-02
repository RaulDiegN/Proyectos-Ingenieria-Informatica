<?php

namespace Foodbook\App\Transfer;

/**
 * UsuarioRegistro Transfer Object Class
 */
class UsuarioRegistroVO
{
    private $user_id;

    private $user_name;

    private $user_lastname;

    private $user_nickname;

    private $user_email;

    private $user_age;

    private $user_DNI;

    private $user_response;

    private $date_account_create;

    private $date_account_remove;


    /* Getters */
    public function userId()
    {
        return $this->user_id;
    }
    public function userNickname()
    {
        return $this->user_nickname;
    }

    public function userName()
    {
        return $this->user_name;
    }

    public function userLastname()
    {
        return $this->user_lastname;
    }

    public  function  userResponse()
    {
        return $this->user_response;
    }

    public function userTelephone()
    {
        return $this->user_nickname;
    }

    public function userEmail()
    {
        return $this->user_email;
    }

    public function userAge()
    {
        return $this->user_age;
    }

    public function userDni()
    {
        return $this->user_DNI;
    }

    public function dateAccountCreate()
    {
        return $this->date_account_create;
    }

    public function dateAccountRemove()
    {
        return $this->date_account_remove;
    }

    /* Setters */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    public function setUserLastname($user_lastname)
    {
        $this->user_lastname = $user_lastname;
    }

    public function setUserNickname($user_nickname)
    {
        $this->user_nickname = $user_nickname;
    }

    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    public function setUserAge($user_age)
    {
        $this->user_age = $user_age;
    }

    public function setUserDni($user_DNI)
    {
        $this->user_DNI = $user_DNI;
    }

    public function setDateAccountCreate($date_account_create)
    {
        $this->date_account_create = $date_account_create;
    }

    public function setDateAccountRemove($date_account_remove)
    {
        $this->date_account_remove = $date_account_remove;
    }
}