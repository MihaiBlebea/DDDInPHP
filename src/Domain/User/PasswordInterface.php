<?php

namespace App\Domain\User;


interface PasswordInterface
{
    public function __construct(String $password);

    public function getPassword();

    public function __toString();

    public function verifyPassword(String $password);
}
