<?php

namespace App\Application;

use App\Application\Exceptions\UserAlreadyRegisteredException;
use App\Domain\User\{
    UserRepoInterface,
    User
};


class RegisterService
{
    private $user_repo;


    public function __construct(UserRepoInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function execute(User $user)
    {
        $user = $this->user_repo->getUserByEmail($user->getEmail());
        if($user)
        {
            throw new UserAlreadyRegisteredException((string) $user->getEmail(), 1);
        }
        $this->user_repo->saveUser($user);
    }
}
