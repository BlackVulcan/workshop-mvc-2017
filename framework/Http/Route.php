<?php

namespace Framework\Http;

/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 7-6-2017
 * Time: 15:30
 */
class Route
{
    static $routes = [];

    private $uri;
    private $class;
    private $method;
    private $requestMethod;

    public function __construct($requestMethod, $uri, $class, $method)
    {
        $this->requestMethod = $requestMethod;
        $this->uri = $uri;
        $this->class = $class;
        $this->method = $method;
    }

    public static function get($uri, $class, $method)
    {
        self::$routes[] = new Route("GET", $uri, $class, $method);
    }

    public static function post($uri, $class, $method)
    {
        self::$routes[] = new Route("POST", $uri, $class, $method);
    }

    public static function match($uri, $method)
    {
        foreach (self::$routes as $route) {
            if ($route->matches($uri, $method)) {
                return $route->build();
            }
        }

        throw new \Exception("No route found");
    }

    private function matches($uri, $method)
    {
        return $this->uri === $uri && $this->requestMethod === $method;
    }

    private function build()
    {
        return ["class" => $this->class, "method" => $this->method];
    }
}
