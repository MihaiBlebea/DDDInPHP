<?php

namespace Framework\Router;

use Exception;


class Request
{
    private $full_url;

    private $method;

    private $payload;

    private $trimmed_url;

    private $url_array = array();

    private $params;


    public function __construct()
    {
        $this->full_url = $this->getUrl();

        // Check if request is GET OR POST
        $this->method = $this->getRequestMethod();

        // Save DATA from Request
        $this->storeParams();

        // Parse Full url and cut query
        $this->trimmed_url = explode('?', $this->full_url)[0];

        // Explode URL and save in array
        $this->url_array = $this->explodeUrl($this->trimmed_url);

        // Calculate elements count
        $this->params = $this->countElements($this->url_array);
    }

    public function getUrl()
    {
        return ltrim(substr($_SERVER['REQUEST_URI'], strlen(implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/') - 1), '/');
    }

    public function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function storeParams()
    {
        switch($this->method)
        {
            case('GET'):
                $this->payload = $_GET;
                break;
            case('POST'):
                $this->payload = $this->getPostParams();
                break;
            default:
                throw new Exception('Error Processing Request', 1);
        }
    }

    private function getPostParams()
    {
        $payload = $_POST;
        if(empty($payload))
        {
            $payload = file_get_contents('php://input');
            $payload = json_decode($payload);
        }
        return $payload;
    }

    private function explodeUrl(String $url)
    {
        return $items = explode("/", $url);
    }

    private function countElements(array $elements)
    {
        return count($elements);
    }

    public function retrive($element)
    {
        if(array_key_exists($element, $this->payload))
        {
            return $this->payload[$element];
        }
        return null;
    }

    public function getTrimmedUrl()
    {
        return $this->trimmedUrl;
    }

    public function getUrlArray()
    {
        return $this->url_array;
    }

    public function getMethod()
    {
        return$this->method;
    }

    public function dump()
    {
        return $this->payload;
    }

    public function getPreviousPath()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            return $_SERVER['HTTP_REFERER'];
        } else {
            return null;
        }
    }
}
