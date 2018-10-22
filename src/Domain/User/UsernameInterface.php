<?php

namespace App\Domain\User;


interface UsernameInterface
{
    public function __construct(String $first_name, String $last_name);

    public function getUsername();
}
