<?php

namespace App\Domain\User;


class UserFactory
{
    public static function build(String $name, String $email, Int $age, String $password)
    {
        $user = new User(
            $name,
            new Email($email),
            new Age($age),
            new Password($password)
        );

        return $user;
    }
}
