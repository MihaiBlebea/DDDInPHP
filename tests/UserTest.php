<?php

use PHPUnit\Framework\TestCase;
use App\Domain\User\{
    User,
    Age,
    Email,
    Password,
    Username
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

        $this->assertEquals('' . $user->getAge(), 28);
    }
}
