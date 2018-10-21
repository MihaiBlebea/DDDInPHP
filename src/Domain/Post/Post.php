<?php

namespace App\Domain\Post;


class Post implements PostInterface
{
    private $slug;

    private $title;

    private $content;


    public static function createWith($title, $content, $slug = null)
    {
        return new static($title, $content, $slug);
    }

    public function __construct($title, $content, $slug = null)
    {
        $this->slug    = $slug === null ? createSlug($title) : $slug;
        $this->title   = $title;
        $this->content = $content;
    }

    private function createSlug($title)
    {
        return strtolower(str_replace(' ', '-', $title));
    }

    public function getPost()
    {
        return [
            'slug'    => $this->slug,
            'title'   => $this->title,
            'content' => $this->content
        ];
    }
}
