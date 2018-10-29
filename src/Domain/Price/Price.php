<?php

namespace App\Domain\Price;

use App\Domain\Price\Exceptions\{
    InvalidMinPriceException,
    InvalidCurrencyTypeException
};


class Price implements PriceInterface
{
    private $value;

    private $currency;

    private $discount;


    public function __construct(Int $value, CurrencyInterface $currency, DiscountInterface $discount)
    {
        if($value < 0)
        {
            throw new InvalidMinPriceException(1);
        }
        $this->value    = $value;
        $this->currency = $currency;
        $this->discount = $discount;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function withCurrencySign()
    {
        return $this->currency->sign . $this->value;
    }

    public function withCurrencyName()
    {
        return $this->currency->name . $this->value;
    }

    private function compareSign(Price $price)
    {
        return $this->currency->equals($price->currency);
    }

    public function isEqual(Price $price)
    {
        if($this->compareSign($price))
        {
            return $this->value === $price->value;
        }
        return false;
    }

    public function isGreaterThen(Price $price)
    {
        if($this->compareSign($price))
        {
            return $this->value > $price->value;
        }
        return false;
    }

    public function isLessThen(Price $price)
    {
        if($this->compareSign($price))
        {
            return $this->value < $price->value;
        }
        return false;
    }

    public function add(Price $price)
    {
        if(!$this->compareSign($price))
        {
            throw new InvalidCurrencyTypeException(1);
        }
        return new $this($this->value + $price->value, $this->currency);
    }

    public function sub(Price $price)
    {
        if(!$this->compareSign($price))
        {
            throw new InvalidCurrencyTypeException(1);
        }
        return new $this($this->value - $price->value, $this->currency);
    }
}
