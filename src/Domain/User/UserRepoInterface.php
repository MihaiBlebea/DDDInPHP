<?php

namespace App\Domain\User;


interface UserRepoInterface
{
    public function __construct();

    public function saveUser(User $user);

    public function getUsersByName(String $name);

    public function getUserByEmail(EmailInterface $email);
}
