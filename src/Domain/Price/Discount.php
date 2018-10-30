<?php

namespace App\Domain\Price;


class Discount implements DiscountInterface
{
    private $discount;


    public function __construct(Int $discount = 0)
    {
        $this->discount = $discount;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getFormatedDiscount()
    {
        return $this->getDiscount() . '% off';
    }

    public function __toString()
    {
        return $this->getDiscount();
    }
}
