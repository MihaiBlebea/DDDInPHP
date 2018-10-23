<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';



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
use App\Infrastructure\{
    Connection,
    UserRepo
};


// $show = new Show(new Title('Lion king'), new Age(25), new Price(28, new Currency('£', 'GBP')));
//
// var_dump($show);

$user = new User(
    'Mihai',
    'Blebea',
    new Email('mihaiserban.blebea2@gmail.com'),
    new Age(28),
    new Password('intrex007')
);

$conn = new Connection('0.0.0.0:8802', 'root', 'root', 'ddd_in_php');
$user_repo = new UserRepo($conn);
$user_repo->saveUser($user);

$user_repo->getUserByName('Mihai Blebea');


var_dump($conn);
