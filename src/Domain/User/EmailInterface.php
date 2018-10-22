<?php

namespace App\Domain\User;


interface EmailInterface
{
    public function __construct(String $email);

    public function getEmail();
}
