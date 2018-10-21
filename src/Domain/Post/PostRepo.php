<?php

namespace App\Domain\Post;

use App\Infrastructure\LocalFileStorage;


class PostRepo implements SavePostInterface, GetPostInterface
{
    public static $file_name = 'storage/post.txt';


    public static function savePost(PostInterface $post)
    {
        LocalFileStorage::store(self::$file_name, $post->getPost());
    }

    public static function getPost(Int $id)
    {
        $post_data = LocalFileStorage::retriveById(self::$file_name, $id);
        return PostFactory::build($post_data->id, $post_data->title, $post_data->content);
    }
}
