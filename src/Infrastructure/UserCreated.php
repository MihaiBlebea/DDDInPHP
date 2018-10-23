<?php

namespace App\Infrastructure;


class UserCreated implements DomainEventInterface
{
    private $user_name;

    private $occured_on;


    public function __construct($user_name)
    {
        $this->user_name  = $user_name;
        $this->occured_on = new \DateTime();
    }

    public function occurredOn()
    {
        return $this->occured_on;
    }
}
