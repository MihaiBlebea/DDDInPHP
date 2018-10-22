<?php

namespace App\Domain\User\Exceptions;

use Exception;


class InvalidPasswordLengthException extends Exception
{
    public function __construct(Int $min_length, $code = 0)
    {
        $message = 'Password should be longer then ' . $min_length . ' characters';
        parent::__construct($message, $code, null);
    }
}
