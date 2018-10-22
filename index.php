<?php

require __DIR__ . '/vendor/autoload.php';

use App\Domain\Show\{
    Show,
    Title
};
use App\Domain\Price\{
    Price,
    Currency
};
use App\Domain\User\{
    User,
    Age,
    Password,
    Email,
    Username
};

$show = new Show(new Title('Lion king'), new Age(25), new Price(28, new Currency('£', 'GBP')));

var_dump($show);
