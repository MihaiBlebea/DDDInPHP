<?php

namespace App\Infrastructure\Database;


class Connector
{
    private $host;
    private $dbName;
    private $user;
    private $password;
    private $connector;
    public function __construct($host, $dbName, $user, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
        $this->connector = $this->connect();
    }
    public function setUp()
    {
    }
    public function connect()
    {
        $connector = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8", $this->user, $this->password, array(\PDO::ATTR_PERSISTENT => true));
        return $connector;
    }
    public function getConnector()
    {
        return $this->connector;
    }
    public function close()
    {
        $this->connector = null;
    }
}
