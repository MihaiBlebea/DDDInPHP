<?php

namespace App\Domain\User;


class RegisterService
{
    private $user_repo;


    public function __construct(UserRepoInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function execute(User $user)
    {
        $this->user_repo->saveUser($user);
    }
}
