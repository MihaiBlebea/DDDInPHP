<?php

namespace App\Domain\User;

use App\Domain\User\Exceptions\InvalidEmailException;


class Email implements EmailInterface
{
    private $email;


    public function __construct(String $email)
    {
        if(!$this->validateEmail($email))
        {
            throw new InvalidEmailException(1);
        }
        $this->email = $email;
    }

    private function validateEmail(String $email)
    {
        return strpos($email, '@') !== false ? true : false;
    }

    public function __toString()
    {
        return $this->getEmail();
    }

    public function getEmail()
    {
        return $this->email;
    }

}
