<?php

namespace App\Infrastructure\Database;


class Connector
{
    private $host;

    private $db_name;

    private $username;

    private $password;


    public function __construct($host, $db_name, $username, $password)
    {
        $this->host     = $host;
        $this->db_name  = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $connect = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch(\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
