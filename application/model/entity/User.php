<?php


class User
{
    private $id;
    private $fullName;
    private $login;
    private $password;

    const TABLE_NAME = 'user';

    const FIELDS = array(
        'id' => 'id',
        'fullName' => 'fullName',
        'login' => 'login',
        'password' => 'password'
    );

    public function __construct()
    {
        $this->id = 0;
        $this->fullName = '';
        $this->login = '';
        $this->password = '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


}