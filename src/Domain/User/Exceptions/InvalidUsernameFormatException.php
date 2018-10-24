<?php

namespace App\Domain\User\Exceptions;

use Exception;


class InvalidUsernameFormatException extends Exception
{
    public function __construct($code = 0)
    {
        $message = 'Username should not have white spaces and must contain a dot';
        parent::__construct($message, $code, null);
    }
}
