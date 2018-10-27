<?php

namespace App\Domain\User;

use Rhumsaa\Uuid\Uuid;


class User
{
    private $id;

    private $name;

    private $username;

    private $email;

    private $password;

    private $age;


    public function __construct(
        UserIdInterface $id,
        $name,
        EmailInterface $email,
        AgeInterface $age,
        PasswordInterface $password,
        UsernameInterface $username = null)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->username = $username;
        $this->email    = $email;
        $this->password = $password;
        $this->age      = $age;
    }

    public function getId()
    {
        return $this->id;
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

    public function getAge()
    {
        return $this->age;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
