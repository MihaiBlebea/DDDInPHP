<?php

namespace App\Domain\User;


class Username implements UsernameInterface
{
    private $username;


    public function __construct(String $first_name, String $last_name)
    {
        $this->username = strtolower(trim($first_name) . '.' . trim($last_name));
    }

    public function getUsername()
    {
        return $this->username;
    }
}
