<?php

namespace App\Infrastructure;

use App\Domain\User\User;


class UserRepo
{
    public function __construct(Connection $conn)
    {
        $this->conn = $conn->getConn();
        // parent::__construct($host, $username, $password, $dbname);
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

    public function getUserByName(String $name)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE name='" . $name . "'");
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            var_dump('RESULT', $result);
        }
        catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
