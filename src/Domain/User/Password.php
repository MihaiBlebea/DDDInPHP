<?php

namespace App\Domain\User;

use App\Domain\User\Exceptions\InvalidPasswordLengthException;


class Password implements PasswordInterface
{
    private $password;

    private $min_length = 6;


    public function __construct(String $password)
    {
        if(!$this->validatePasswordLength($password))
        {
            throw new InvalidPasswordLengthException($this->min_length, 1);
        }
        $this->password = $this->hashPassword($password);
    }

    private function validatePasswordLength($password)
    {
        return strlen($password) >= $this->min_length ? true : false;
    }

    private function hashPassword(String $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function verifyPassword(String $password)
    {
        return password_verify($password, $this->password);
    }
}
