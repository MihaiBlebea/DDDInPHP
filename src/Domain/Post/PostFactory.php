<?php

namespace App\Domain\Post;


class PostFactory
{
    public static function build($id, $title, $content)
    {
        return new Post($id, $title, $content);
    }
}
