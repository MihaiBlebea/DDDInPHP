<?php

namespace App\Domain\User;


class User
{
    private $name;

    private $username;

    private $email;

    private $password;

    private $age;


    public function __construct(
        $first_name,
        $last_name,
        EmailInterface $email,
        AgeInterface $age,
        PasswordInterface $password,
        UsernameInterface $username = null)
    {
        $this->name     = $first_name . ' ' . $last_name;
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

    public function getAge()
    {
        return $this->age;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
