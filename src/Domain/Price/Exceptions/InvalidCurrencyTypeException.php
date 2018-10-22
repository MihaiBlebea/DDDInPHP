<?php

namespace App\Domain\User\Exceptions;

use Exception;


class InvalidCurrencyTypeException extends Exception
{
    public function __construct($code = 0)
    {
        $message = 'Currency sign is not the same';
        parent::__construct($message, $code, null);
    }
}
