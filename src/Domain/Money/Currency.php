<?php

namespace App\Domain\Money;


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

    public function __get($name)
    {
        switch($name)
        {
            case 'name':
                return $this->getName();
            case 'sign':
                return $this->getSign();
            default:
                throw new \Exception('Could not find requested attribute in this class', 1);
        }
        // if($name === 'name')
        // {
        //     return $this->getName();
        // }
        //
        // if($name === 'sign')
        // {
        //     return $this->getSign();
        // }
        //
        // throw new \Exception('Could not find requested attribute in this class', 1);
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
