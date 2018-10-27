<?php

namespace App\Domain\Show;

use App\Domain\Price\PriceInterface;
use App\Domain\User\AgeInterface;


class Show
{
    private $id;

    private $title;

    private $age;

    private $price;


    public function __construct(
        ShowIdInterface $id,
        TitleInterface $title,
        AgeInterface $age,
        PriceInterface $price)
    {
        $this->id    = $id;
        $this->title = $title;
        $this->age   = $age;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
