<?php

namespace App\Infrastructure;

use Ramsey\Uuid\Uuid;
use App\Infrastructure\Database\PersistenceInterface;
use App\Domain\User\{
    User,
    Email,
    Password,
    HashedPassword,
    Username,
    UsernameInterface,
    Age,
    UserId,
    UserRepoInterface,
    EmailInterface,
    UserIdInterface,
    UserFactory
};


class UserRepo extends UserRepoInterface
{
    private $users = [];

    private $persist;


    public function __construct(PersistenceInterface $persist)
    {
        $this->persist = $persist;
    }

    public function nextIdentity()
    {
        return new UserId(strtoupper(Uuid::uuid4()));
    }

    public function add(User $user)
    {
        $this->persist->table('users')->create([
            'id'       => (string) $user->getId(),
            'name'     => (string) $user->getName(),
            'username' => (string) $user->getUsername(),
            'email'    => (string) $user->getEmail(),
            'password' => (string) $user->getPassword(),
            'age'      => (string) $user->getAge()
        ]);
    }

    public function addAll(Array $users)
    {
        foreach($users as $user)
        {
            $this->add($user);
        }
    }

    public function remove(User $user)
    {
        $this->persist->table('users')->where('id', (string) $user->getId())->delete();
    }

    public function removeAll(Array $users)
    {
        foreach($user as $user)
        {
            $this->remove($user);
        }
    }

    public function withId(UserIdInterface $id)
    {
        $user = $this->persist->table('users')->where('id', (string) $id->getId())->selectOne();
        return UserFactory::build(
            $user['id'],
            $user['name'],
            $user['username'],
            $user['email'],
            $user['password'],
            $user['age'],
        );
    }

    public function withUsername(UsernameInterface $username)
    {
        $user = $this->persist->table('users')->where('username', (string) $username->getUsername())->selectOne();
        return UserFactory::build(
            $user['id'],
            $user['name'],
            $user['username'],
            $user['email'],
            $user['password'],
            $user['age'],
        );
    }
}
