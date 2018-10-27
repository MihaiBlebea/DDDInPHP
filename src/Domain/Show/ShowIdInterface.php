<?php

namespace App\Domain\Show;


interface ShowIdInterface
{
    public function __construct(String $id = null);

    public function getId();
}
