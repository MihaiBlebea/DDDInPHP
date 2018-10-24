<?php

use PHPUnit\Framework\TestCase;
use App\Domain\User\{
    User,
    Age,
    Email,
    Password,
    Username,
    UserFactory
};


class UserTest extends TestCase
{
    public function setUp()
    {
        //
    }

    public function testUserAge()
    {
        $user = new User('Mihai Blebea',
                         new Email('mihaiserban.blebea@gmail.com'),
                         new Age(28),
                         new Password('intrex'),
                         Username::fromName('Mihai', 'Blebea'));

        $this->assertEquals((string) $user->getAge(), 28);
    }

    public function testUserFactory()
    {
        $name = 'Mihai Blebea';
        $email = 'mihaiserban.blebea@gmail.com';
        $age = 28;
        $password = 'intrex';
        $username = 'mihai.blebea';

        $user = new User($name,
                         new Email($email),
                         new Age($age),
                         new Password($password),
                         new Username($username));

        $user_from_factory = UserFactory::build($name, $email, $age, $password, $username);

        $this->assertEquals((string) $user->getName(), (string) $user_from_factory->getName());
        $this->assertEquals((string) $user->getEmail(), (string) $user_from_factory->getEmail());
        $this->assertEquals((string) $user->getAge(), (string) $user_from_factory->getAge());
        $this->assertEquals($user->getPassword()->verifyPassword($password), true);
        $this->assertEquals($user_from_factory->getPassword()->verifyPassword($password), true);
        $this->assertEquals((string) $user->getUsername(), (string) $user_from_factory->getUsername());
    }
}
