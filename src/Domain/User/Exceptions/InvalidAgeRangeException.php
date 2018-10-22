<?php

namespace App\Domain\User\Exceptions;

use Exception;


class InvalidAgeRangeException extends Exception
{
    public function __construct(Int $min, Int $max, $code = 0)
    {
        $message = 'Age should be between ' . $min . ' and ' . $max;
        parent::__construct($message, $code, null);
    }
}
