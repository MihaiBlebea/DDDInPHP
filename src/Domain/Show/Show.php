<?php

namespace App\Domain\Show;

use App\Domain\Price\PriceInterface;
use App\Domain\User\AgeInterface;


class Show implements ShowInterface
{
    private $title;

    private $age;

    private $price;


    public function __construct(TitleInterface $title, AgeInterface $age, PriceInterface $price)
    {
        $this->title = $title;
        $this->age   = $age;
        $this->price = $price;
    }

    public static function createFrom(TitleInterface $title, AgeInterface $age, PriceInterface $price)
    {
        return new static($title, $age, $price);
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
