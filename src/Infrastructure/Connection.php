<?php

namespace App\Infrastructure;


class Connection implements ConnectionInterface
{
    private $conn;


    public function __construct($host, $username, $password, $dbname)
    {
        try {
            $this->conn = new \PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getConn()
    {
        return $this->conn;
    }
}
