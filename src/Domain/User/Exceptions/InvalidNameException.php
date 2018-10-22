<?php

namespace App\Domain\User\Exceptions;

use Exception;


class InvalidNameException extends Exception
{
    public function __construct($code = 0)
    {
        $message = 'First or Last name should not contain spaces';
        parent::__construct($message, $code, null);
    }
}
