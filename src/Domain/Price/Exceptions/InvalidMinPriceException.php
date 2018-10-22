<?php

namespace App\Domain\User\Exceptions;

use Exception;


class InvalidMinPriceException extends Exception
{
    public function __construct($code = 0)
    {
        $message = 'Price value should be greater then 0';
        parent::__construct($message, $code, null);
    }
}
