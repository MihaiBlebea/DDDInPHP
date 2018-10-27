<?php

namespace App\Domain\User;


class UserId implements UserIdInterface
{
    private $id;


    public function __construct($id = null)
    {
        $this->id = $id;
    }
}
