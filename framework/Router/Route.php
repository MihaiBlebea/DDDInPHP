<?php

namespace Framework\Router;


class Route
{
    private $path;

    private $callback;

    private $method;


    public static function get(String $path, $callback)
    {
        return new static ($path, $callback, 'GET');
    }

    public static function post(String $path, $callback)
    {
        return new static ($path, $callback, 'POST');
    }

    public function __construct(String $path, $callback, String $method = 'GET')
    {
        $this->path     = $path;
        $this->callback = $callback;
        $this->method   = $method;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function trigger($params)
    {
        return call_user_func_array($this->callback, $params);
    }
}
