<?php

namespace App\Domain\User;


class AgeRange
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
        $this->age = $age;
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
