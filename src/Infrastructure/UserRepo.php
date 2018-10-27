<?php

namespace App\Infrastructure;

use App\Domain\User\{
    User,
    Email,
    Password,
    HashedPassword,
    Username,
    Age,
    UserId,
    UserRepoInterface,
    EmailInterface
};


class UserRepo extends Connection implements UserRepoInterface
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
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            $collection = [];
            foreach($stmt->fetchAll() as $row)
            {
                $user = new User(
                    new UserId($row['id']),
                    $row['name'],
                    new Email($row['email']),
                    new Age($row['age']),
                    new HashedPassword($row['password']),
                    new Username($row['username'])
                );

                array_push($collection, $user);
            }

            return $collection;

        } catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUserByEmail(EmailInterface $email)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = '" . $email . "'");
            $stmt->execute();

            // set the resulting array to associative
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $result = $stmt->fetch();

            return new User(
                new UserId($result['id']),
                $result['name'],
                new Email($result['email']),
                new Age($result['age']),
                new HashedPassword($result['password']),
                new Username($result['username'])
            );

        } catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
