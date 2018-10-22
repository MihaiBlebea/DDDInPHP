<?php

namespace App\Domain\User;

use App\Domain\User\Exceptions\InvalidAgeRangeException;


class Age implements AgeInterface
{
    private $age;

    private $age_ranges = [
        ['min' => 18, 'max' => 25],
        ['min' => 26, 'max' => 35],
        ['min' => 36, 'max' => 45],
        ['min' => 45, 'max' => 55]
    ];

    public function __construct(Int $age)
    {
        if(!$this->validateAgeMin($age) || !$this->validateAgeMax($age))
        {
            throw new InvalidAgeRangeException($this->getMinAllowedAge(), $this->getMaxAllowedAge(), 1);
        }
        $this->age = $age;
    }

    private function getMinAllowedAge()
    {
        return $this->age_ranges[0]['min'];
    }

    private function getMaxAllowedAge()
    {
        return $this->age_ranges[count($this->age_ranges) - 1]['max'];
    }

    private function validateAgeMin(Int $age)
    {
        return $age < $this->getMinAllowedAge() ? false : true;
    }

    private function validateAgeMax(Int $age)
    {
        return $age > $this->getMaxAllowedAge() ? false : true;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getAgeRange()
    {
        foreach($this->age_ranges as $age_range)
        {
            if($this->age >= $age_range['min'] && $this->age <= $age_range['max'])
            {
                return $age_range;
            }
        }
    }
}
