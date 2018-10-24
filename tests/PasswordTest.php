<?php

use PHPUnit\Framework\TestCase;
use App\Domain\User\Password;


class PasswordTest extends TestCase
{
    protected function setUp()
    {
        //
    }

    public function testCreateHashAndVerifyPassword()
    {
        $password = new Password('intrex');

        $this->assertEquals($password->verifyPassword('intrex'), true);
        $this->assertEquals($password->verifyPassword('intrex2'), false);

    }
}
