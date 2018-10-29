<?php

namespace App\Domain\Price;


interface DiscountInterface
{
    public function __construct(Int $discount);

    public function getDiscount();

    public function getFormatedDiscount();

    public function __toString();
}
