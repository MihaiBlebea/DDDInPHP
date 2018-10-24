<?php

use PHPUnit\Framework\TestCase;
use App\Domain\User\Username;


class UsernameTest extends TestCase
{
    protected function setUp()
    {
        //
    }

    public function testCreateUsernameFromName()
    {
        $username = Username::fromName('Mihai', 'Blebea');

        $this->assertEquals($username->getUsername(), 'mihai.blebea');
    }

    public function testAssignUsername()
    {
        $username = new Username('mihai.blebea');

        $this->assertEquals($username->getUsername(), 'mihai.blebea');
    }
}
