<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Money\Currency;


class CurrencyTest extends TestCase
{
    protected function setUp()
    {
        //
    }

    public function testValueIsImmutable()
    {
        $pound = new Currency('£', 'GBP');

        $this->assertEquals($pound->name, 'GBP');
        $this->assertEquals($pound->sign, '£');
    }
}
