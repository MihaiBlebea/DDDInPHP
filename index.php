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

$persist->setTable('users')->create([
    'name'     => 'Serban Blebea',
    'username' => 'serban.blebea',
    'email'    => 'serban@gmail.com',
    'password' => 'intrex07',
    'age'      => 29
]);

$users = $persist->setTable('users')->selectAll();
var_dump($users);
