<?php

namespace App\Domain\Show;


interface TitleInterface
{
    public function __construct(String $title);

    public function getTitle();

    public function __toString();
}
