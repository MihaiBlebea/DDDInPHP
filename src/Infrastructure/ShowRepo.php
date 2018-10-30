<?php

namespace App\Infrastructure;

use Ramsey\Uuid\Uuid;
use App\Infrastructure\Database\PersistenceInterface;
use App\Domain\Show\{
    Show,
    ShowIdInterface,
    ShowId,
    ShowRepoInterface,
    TitleInterface,
    ShowFactory
};


class ShowRepo implements ShowRepoInterface
{
    private $persist;

    private $shows = [];


    public function __construct(PersistenceInterface $persist)
    {
        $this->persist = $persist;
    }

    public function nextIdentity()
    {
        return new ShowId(strtoupper(Uuid::uuid4()));
    }

    public function add(Show $show)
    {
        $this->persist->table('shows')->create([
            'id'            => (string) $show->getId(),
            'title'         => (string) $show->getTitle(),
            'age'           => (string) $show->getAge(),
            'price'         => $show->getPrice()->getValue(),
            'currency_name' => $show->getPrice()->getCurrency()->getName(),
            'currency_sign' => $show->getPrice()->getCurrency()->getSign(),
        ]);
    }

    public function addAll(Array $shows)
    {
        foreach($shows as $show)
        {
            $this->add($show);
        }
    }

    public function remove(Show $show)
    {
        $this->persist->table('shows')->where('id', (string) $show->getId())->delete();
    }

    public function removeAll(Array $shows)
    {
        foreach($shows as $show)
        {
            $this->remove($show);
        }
    }

    public function withId(ShowIdInterface $id)
    {
        $show = $this->persist->table('shows')->where('id', (string) $id->getId())->selectOne();
        return ShowFactory::build(
            $show['id'],
            $show['title'],
            $show['age'],
            $show['price'],
            $show['currency_name'],
            $show['currency_sign'],
            $show['discount']
        );
    }

    public function withTitle(TitleInterface $title)
    {
        $shows = $this->persist->table('shows')->where('title', (string) $title->getTitle())->select();
        foreach($shows as $show)
        {
            $show_model = ShowFactory::build(
                $show['id'],
                $show['title'],
                $show['age'],
                $show['price'],
                $show['currency_name'],
                $show['currency_sign'],
                $show['discount']
            );
            array_push($this->shows, $show_model);
        }
        return $this->shows;
    }
}
