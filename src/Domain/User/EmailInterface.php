<?php

namespace App\Domain\User;


interface EmailInterface
{
    public function __construct(String $email);

    public function __toString();

    public function getEmail();
}
