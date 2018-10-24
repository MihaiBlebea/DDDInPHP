<?php

namespace App\Domain\User;


interface UsernameInterface
{
    public static function fromName(String $first_name, String $last_name);

    public function __construct(String $username);

    public function getUsername();

    public function __toString();
}
