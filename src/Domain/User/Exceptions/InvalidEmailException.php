<?php

namespace App\Domain\User\Exceptions;

use Exception;


class InvalidEmailException extends Exception
{
    public function __construct($code = 0)
    {
        $message = 'Please supply a valid email address';
        parent::__construct($message, $code, null);
    }
}
