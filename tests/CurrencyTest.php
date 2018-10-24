<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Price\Currency;


class CurrencyTest extends TestCase
{
    protected function setUp()
    {
        //
    }

    public function testValueIsImmutable()
    {
        $pound = new Currency('£', 'GBP');

        $this->assertEquals($pound->getName(), 'GBP');
        $this->assertEquals($pound->getSign(), '£');
    }
}
