<?php

namespace App\Domain\User;


interface AgeInterface
{
    public function __construct(Int $age);

    public function getAge();

    public function __toString();

    public function getAgeRange();
}
