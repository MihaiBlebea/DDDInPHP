<?php

namespace App\Infrastructure;

use Ramsey\Uuid\Uuid;
use App\Domain\Show\{
    Show,
    ShowIdInterface,
    ShowId,
    ShowRepoInterface,
    TitleInterface
};


class ShowRepo extends ShowDAO implements ShowRepoInterface
{
    private $shows = [];


    public function nextIdentity()
    {
        return new ShowId(strtoupper(Uuid::uuid4()));
    }

    public function add(Show $show)
    {
        $this->insert($this->nextIdentity(), $show);
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
        unset($this->shows[(string) $show->getId()]);
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
        if(isset($this->shows[(string) $id]))
        {
            return $this->shows[(string) $id];
        }
        return null;
    }

    public function withTitle(TitleInterface $title)
    {
        $this->shows = $this->select((string) $title);
        return $this->shows;
    }
}
