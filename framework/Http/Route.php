<?php

namespace Framework\Http;

class Route
{
    static $routes = [];

    private $uri;
    private $class;
    private $method;
    private $requestMethod;
    private $regex = false;
    private $routeMatches;

    public function __construct($requestMethod, $uri, $class, $method)
    {
        $this->requestMethod = $requestMethod;
        $this->uri = $this->buildUri($uri);
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
            /** @var Route $route */
            if ($route->matches($uri, $method)) {
                return $route->build();
            }
        }

        throw new \Exception("No route found");
    }

    private function matches($uri, $method)
    {
        if($this->regex) {
            return preg_match($this->uri, $uri, $this->routeMatches) && $this->requestMethod === $method;
        } else {
            return $this->uri === $uri && $this->requestMethod === $method;
        }
    }

    private function build()
    {
        foreach ($this->routeMatches as $key => $value) {
            if (is_int($key)) {
                unset($this->routeMatches[$key]);
            }
        }
        return ["class" => $this->class, "method" => $this->method, "matches" => $this->routeMatches];
    }

    private function buildUri($uri)
    {
        if(str_contains($uri, "{") && str_contains($uri, "}")) {
            $uri = str_replace(["{", "}"], ["(?P<", ">[^/]*)"], $uri);
            $uri = "~{$uri}~";
            $this->regex = true;
        }

        return $uri;
    }
}
