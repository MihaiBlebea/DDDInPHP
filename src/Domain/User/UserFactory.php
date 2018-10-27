<?php

namespace App\Domain\User;


class UserFactory
{
    public static function build($id, String $name, String $email, Int $age, String $password, String $username)
    {
        return new User(
            new UserId($id),
            $name,
            new Email($email),
            new Age($age),
            new Password($password),
            new Username($username)
        );
    }
}
