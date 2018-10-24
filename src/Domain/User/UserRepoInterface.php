<?php

namespace App\Domain\User;


class UserRepo
{
    public function __construct();

    public function saveUser(User $user);

    public function getUsersByName(String $name);
}
