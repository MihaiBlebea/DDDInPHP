<?php

namespace App\Infrastructure;


interface ConnectionInterface
{
    public function __construct($host, $username, $password, $dbname);

    public function getConn();
}
