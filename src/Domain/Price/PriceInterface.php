<?php

namespace App\Domain\Price;


interface PriceInterface
{
    public function __construct(Int $value, CurrencyInterface $currency);

    public function getValue();

    public function getCurrency();

    public function getDiscount();

    public function withCurrencySign();

    public function withCurrencyName();

    public function isEqual(Price $price);

    public function isGreaterThen(Price $price);

    public function isLessThen(Price $price);

    public function add(Price $price);

    public function sub(Price $price);
}
