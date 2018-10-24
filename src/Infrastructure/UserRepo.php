<?php

namespace App\Infrastructure;

// use App\Infrastructure\ConnectionInterface;
use App\Domain\User\{
    User,
    UserFactory
};


class UserRepo extends Connection
{
    public function __construct()
    {
        $host     = '0.0.0.0:8802';
        $username = 'root';
        $password = 'root';
        $dbname   = 'ddd_in_php';

        parent::__construct($host, $username, $password, $dbname);
    }

    public function saveUser(User $user)
    {
        // $name = $user->getName();
        try {
            $this->conn->beginTransaction();
            $sql = "INSERT INTO users (name, username, email, password, age)
                    VALUES ('" . $user->getName() . "', '" . $user->getUsername() . "', '" . $user->getEmail() . "', '" . $user->getPassword() . "', '" . $user->getAge() . "')";
            $this->conn->exec($sql);

            $this->conn->commit();

        } catch(PDOException $e) {
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUsersByName(String $name)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE name = '" . $name . "'");
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            $collection = [];
            foreach($stmt->fetchAll() as $row)
            {
                $user = UserFactory::build($row['name'], $row['email'], $row['age'], $row['password']);
                array_push($collection, $user);
            }

            return $collection;

        } catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
