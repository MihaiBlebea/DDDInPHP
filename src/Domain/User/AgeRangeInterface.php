<?php

namespace App\Domain\User;


interface AgeRangeInterface
{
    public function __construct(Int $age);

    public function getAge();

    public function getAgeRange();
}