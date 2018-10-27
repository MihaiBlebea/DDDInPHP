<?php

namespace App\Domain\Show;


class ShowId implements ShowIdInterface
{
    private $id;


    public function __construct(String $id = null)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
