<?php

namespace App\Domain\Show;

use App\Domain\User\Age;
use App\Domain\Price\{
    Price,
    Currency,
    Discount
};


class ShowFactory
{
    public static function build(
        String $id,
        String $title,
        String $age,
        String $price,
        String $currency_name,
        String $currency_sign,
        String $discount)
    {
        return new Show(
            new ShowId($id),
            new Title($title),
            new Age($age),
            new Price(
                $price,
                new Currency(
                    $currency_sign,
                    $currency_name
                ),
                new Discount($discount)
            )
        );
    }
}
