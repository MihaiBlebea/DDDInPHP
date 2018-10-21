<?php

namespace App\Domain\Post;


interface SavePostInterface
{
    public static function savePost(PostInterface $post);
}
