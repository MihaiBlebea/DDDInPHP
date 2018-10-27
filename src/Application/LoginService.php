<?php

namespace App\Application;

use App\Domain\User\{
    UserRepoInterface,
    EmailInterface
};


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

        if($user->getPassword()->verifyPassword($password))
        {
            $_SESSION['auth'] = $user->getUsername();
            return true;
        }
        return false;
    }
}
