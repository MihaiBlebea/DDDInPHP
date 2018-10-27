<?php

namespace App\Domain\User;


class LoginService
{
    private $user_repo;


    public function __construct(UserRepoInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function execute(EmailInterface $email, String $password)
    {
        $user = $this->user_repo->getUserByEmail($email);
        return $user->getPassword()->verifyPassword($password);
    }
}
