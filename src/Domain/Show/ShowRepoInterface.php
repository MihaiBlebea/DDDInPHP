<?php

namespace App\Domain\Show;


interface ShowRepoInterface
{
    public function nextIdentity();

    public function add(Show $show);

    public function addAll(Array $shows);

    public function remove(Show $show);

    public function removeAll(Array $shows);

    public function withId(ShowIdInterface $id);
}
