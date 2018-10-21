<?php

namespace App\Domain\Money;


interface CurrencyInterface
{
    public function __construct(String $name, String $sign);

    public function getSign();

    public function getName();

    public function equals(Currency $currency);
}
