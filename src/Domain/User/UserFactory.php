<?php

namespace App\Domain\User;


class UserFactory
{
    public static function build(String $name, String $email, Int $age, String $password, String $username = null)
    {
        if($username === null)
        {
            $user = new User(
                $name,
                new Email($email),
                new Age($age),
                new Password($password)
            );
        } else {
            $user = new User(
                $name,
                new Email($email),
                new Age($age),
                new Password($password),
                new Username($username)
            );
        }

        return $user;
    }
}
