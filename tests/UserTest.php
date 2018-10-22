<?php

use PHPUnit\Framework\TestCase;
use App\Domain\User\{
    User,
    AgeRange
};


class UserTest extends TestCase
{
    public function setUp()
    {
        //
    }

    public function testUserAge()
    {
        $user = new User('Mihai', 'Blebea', 'mihaiserban.blebea@gmail.com', new AgeRange(28), 'intrex');

        $this->assertEquals($user->getAge(), 28);
    }
}
