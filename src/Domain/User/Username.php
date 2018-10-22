<?php

namespace App\Domain\User;

use App\Domain\User\Exceptions\InvalidNameException;


class Username implements UsernameInterface
{
    private $username;


    public function __construct(String $first_name, String $last_name)
    {
        if($this->validateWhiteSpaceInName($first_name) || $this->validateWhiteSpaceInName($last_name))
        {
            throw new InvalidNameException(1);
        }
        $this->username = strtolower(trim($first_name) . '.' . trim($last_name));
    }

    private function validateWhiteSpaceInName(String $name)
    {
        return strpos($name, ' ') == false ? true : false ;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
