<?php

namespace App\Domain\Post;


interface PostInterface
{
    public static function createWith($id, $title, $content);

    public function __construct($id, $title, $content);

    public function getPost();
}
