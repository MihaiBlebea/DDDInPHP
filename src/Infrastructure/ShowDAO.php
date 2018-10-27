<?php

namespace App\Infrastructure;

use App\Domain\Show\{
    Show,
    ShowIdInterface,
    ShowId,
    Title
};
use App\Domain\User\Age;
use App\Domain\Price\{
    Price,
    Currency
};


class ShowDAO extends Connection
{
    public function __construct()
    {
        $host     = '0.0.0.0:8802';
        $username = 'root';
        $password = 'root';
        $dbname   = 'ddd_in_php';

        parent::__construct($host, $username, $password, $dbname);
    }

    public function insert(ShowIdInterface $show_id, Show $show)
    {
        $stmt = $this->conn->prepare("INSERT INTO shows (id, title, age, price, currency_name, currency_sign)
            VALUES (:id, :title, :age, :price, :currency_name, :currency_sign)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':currency_name', $currency_name);
        $stmt->bindParam(':currency_sign', $currency_sign);

        // insert a row
        $id            = $show_id->getId();
        $title         = (string) $show->getTitle();
        $age           = (string) $show->getAge();
        $price         = (string) $show->getPrice()->getValue();
        $currency_name = $show->getPrice()->getCurrency()->getName();
        $currency_sign = $show->getPrice()->getCurrency()->getSign();
        $stmt->execute();
    }

    public function select(String $title)
    {
        $stmt = $this->conn->prepare("SELECT * FROM shows WHERE title = :title");
        $stmt->execute(['title' => $title]);

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $collection = [];
        foreach($stmt->fetchAll() as $row)
        {
            $currency = new Currency($row['currency_sign'], $row['currency_name']);
            $show = new Show(
                new ShowId($row['id']),
                new Title($row['title']),
                new Age($row['age']),
                new Price($row['price'], $currency)
            );

            array_push($collection, $show);
        }

        return $collection;
    }

}
