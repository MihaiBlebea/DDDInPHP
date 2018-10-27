<?php

namespace App\Application\Exceptions;

use Exception;


class UserAlreadyRegisteredException extends Exception
{
    public function __construct(String $email, $code = 0)
    {
        $message = 'User with email ' . $email . ' is already registered';
        parent::__construct($message, $code, null);
    }
}
