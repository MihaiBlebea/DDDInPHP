<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';



use App\Infrastructure\Database\{
    Connector,
    Persistence
};
use App\Infrastructure\ShowRepo;
use App\Domain\Show\{
    ShowId,
    Title
};

$host     = '0.0.0.0:8802';
$username = 'root';
$password = 'root';
$dbname   = 'ddd_in_php';

$conn = new Connector($host, $dbname, $username, $password);
$persist = new Persistence($conn);

$show_repo = new ShowRepo($persist);
$shows = $show_repo->withTitle(new Title('Little Prince'));

var_dump($shows[0]->getPrice());
// $persist->setTable('users')->create([
//     'name'     => 'George Blebea',
//     'username' => 'serban.blebea',
//     'email'    => 'serban@gmail.com',
//     'password' => 'intrex07',
//     'age'      => 29
// ]);

// $persist->setTable('users')->where('name', 'George Blebea')->update([
//     'name' => 'Cristi Aliman'
// ]);

// $persist->setTable('shows')->create([
//     'title' => 'Revelion 2019',
//     'age' => 18,
//     'price' => 2000,
//     'currency_name' => 'RON',
//     'currency_sign' => 'RON'
// ]);
