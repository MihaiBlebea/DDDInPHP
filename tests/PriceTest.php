<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Price\{
    Currency,
    Price
};


class PriceTest extends TestCase
{
    private $currency_pound;


    protected function setUp()
    {
        $this->currency_pound = new Currency('£', 'GBP');
    }

    public function testValueIsImmutable()
    {

        $first_price = new Price(10, $this->currency_pound);
        $second_price = new Price(20, $this->currency_pound);
        $third_price = $first_price->add($second_price);

        $this->assertEquals($first_price->getValue(), 10);
        $this->assertEquals($third_price->getValue(), 30);
    }
}
