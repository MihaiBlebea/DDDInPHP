<?php

use PHPUnit\Framework\TestCase;
use App\Domain\User\AgeRange;


class AgeRangeTest extends TestCase
{
    private $age_range;

    private $age;


    public function setUp()
    {
        $this->age       = 28;
        $this->age_range = new AgeRange($this->age);
    }

    public function testGetAgeAsInteger()
    {
        $this->assertEquals($this->age_range->getAge(), $this->age);
    }

    public function testGetAgeAsRange()
    {
        $this->assertEquals($this->age_range->getAgeRange()['min'], 26);
        $this->assertEquals($this->age_range->getAgeRange()['max'], 35);
    }
}
