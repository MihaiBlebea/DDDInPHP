<?php

namespace App\Domain\Money;


class Price
{
    private $value;

    private $currency;


    public function __construct(Int $value, CurrencyInterface $currency)
    {
        if($value < 0)
        {
            throw new \Exception('Price value should be greater then 0', 1);
        }
        $this->value    = $value;
        $this->currency = $currency;
    }

    public function __debugInfo()
    {
        return [
            'value'         => $this->value,
            'currency_sign' => $this->currency->sign
        ];
    }

    public function __get($name)
    {
        if($name === 'currency_sign')
        {
            return $this->currency->sign;
        }
        throw new \Exception('Could not find requested attribute in this class', 1);
    }

    public function value()
    {
        return $this->value;
    }

    public function withMoneySign()
    {
        return $this->currency->sign . $this->value;
    }

    public function withMoneyName()
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
            throw new \Exception('Currency should be the same for adding the two prices', 1);
        }
        return new $this($this->value + $price->value, $this->currency);
    }

    public function sub(Price $price)
    {
        if(!$this->compareSign($price))
        {
            throw new \Exception('Currency should be the same for substracting the two prices', 1);
        }
        return new $this($this->value - $price->value, $this->currency);
    }
}
