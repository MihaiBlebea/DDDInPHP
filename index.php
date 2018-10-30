<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';



use App\Infrastructure\Database\{
    Connector,
    Persistence
};


$host     = '0.0.0.0:8802';
$username = 'root';
$password = 'root';
$dbname   = 'ddd_in_php';

$conn = new Connector($host, $dbname, $username, $password);
$persist = new Persistence($conn);

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

$users = $persist->setTable('users')->where('id', '>', 16)->limit(2)->sortBy('id', 'DESC')->select();
var_dump($users);
