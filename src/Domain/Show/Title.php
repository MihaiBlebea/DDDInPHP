<?php

namespace App\Domain\Show;


class Title implements TitleInterface
{
    private $title;


    public function __construct(String $title)
    {
        $this->title = ucwords($title);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
