<?php

namespace App\Domain\Show;

use App\Domain\Price\PriceInterface;
use App\Domain\User\AgeInterface;


interface ShowInterface
{
    public function __construct(TitleInterface $title, AgeInterface $age, PriceInterface $price);

    public static function createFrom(TitleInterface $title, AgeInterface $age, PriceInterface $price);

    public function getTitle();

    public function getAge();

    public function getPrice();
}
