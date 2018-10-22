<?php

namespace App\Domain\Price;


class Currency implements CurrencyInterface
{
    private $name;

    private $sign;


    public static function createFrom(String $sign, String $name)
    {
        return new static($sign, $name);
    }

    public function __construct(String $sign, String $name)
    {
        $this->name = $name;
        $this->sign = $sign;
    }

    public function getSign()
    {
        return $this->sign;
    }

    public function getName()
    {
        return $this->name;
    }

    public function equals(Currency $currency)
    {
        return $this->name === $currency->name && $this->sign === $currency->sign;
    }
}
