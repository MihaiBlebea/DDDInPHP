<?php

namespace App\Application;

use App\Application\Exceptions\UserAlreadyRegisteredException;
use App\Domain\User\{
    UserRepoInterface,
    UserFactory,
    Email
};


class RegisterService
{
    private $user_repo;


    public function __construct(UserRepoInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function execute(UserRegisterRequest $request)
    {
        $user = $this->user_repo->getUserByEmail(new Email($request->getEmail()));
        if($user)
        {
            throw new UserAlreadyRegisteredException((string) $user->getEmail(), 1);
        } else {
            $user = UserFactory::build(
                null,
                $request->getName(),
                $request->getEmail(),
                $request->getAge(),
                $request->getPassword(),
                $request->getUsername()
            );
            $this->user_repo->saveUser($user);
        }
    }
}
