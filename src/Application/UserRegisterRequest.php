<?php

namespace App\Application;


class UserRegisterRequest
{
    private $name;

    private $username;

    private $email;

    private $password;

    private $age;


    public function __construct($name, $email, $password, $age, $username)
    {
        $this->name     = $name;
        $this->username = $username;
        $this->email    = $email;
        $this->password = $password;
        $this->age      = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAge()
    {
        return $this->age;
    }
}
