<?php

namespace App\Domain\User;

use App\Domain\User\Exceptions\InvalidUsernameFormatException;


class Username implements UsernameInterface
{
    private $username;


    public static function fromName(String $first_name, String $last_name)
    {
        $username = strtolower(trim($first_name) . '.' . trim($last_name));
        return new self($username);
    }

    public function __construct(String $username)
    {
        if(!$this->validateHasDotInUsername($username) || !$this->validateNoWhiteSpaceInName($username))
        {
            throw new InvalidUsernameFormatException(1);
        }
        $this->username = $username;
    }

    private function validateNoWhiteSpaceInName(String $username)
    {
        return strpos($username, ' ') === false ? true : false ;
    }

    private function validateHasDotInUsername(String $username)
    {
        return strpos($username, '.') === false ? false : true ;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function __toString()
    {
        return $this->getUsername();
    }
}
