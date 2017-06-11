<?php

namespace Framework\Http;

use Exception;

class Route
{
    static $routes = [];

    private $uri;
    private $class;
    private $method;
    private $requestMethod;
    private $regex = false;
    private $routeMatches = [];

    /**
     * Route constructor.
     * @param $requestMethod
     * @param $uri
     * @param $class
     * @param $method
     */
    public function __construct($requestMethod, $uri, $class, $method)
    {
        $this->requestMethod = $requestMethod;
        $this->uri = $this->buildUri($uri);
        $this->class = $class;
        $this->method = $method;
    }

    /**
     * @param $uri
     * @return mixed|string
     */
    private function buildUri($uri)
    {
        if (str_contains($uri, "{") && str_contains($uri, "}")) {
            $uri = str_replace(["{", "}"], ["(?P<", ">[^/]*)"], $uri);
            $uri = "~{$uri}~";
            $this->regex = true;
        }

        return $uri;
    }

    /**
     * @param $uri
     * @param $class
     * @param $method
     */
    public static function get($uri, $class, $method)
    {
        self::$routes[] = new Route("GET", $uri, $class, $method);
    }

    /**
     * @param $uri
     * @param $class
     * @param $method
     */
    public static function post($uri, $class, $method)
    {
        self::$routes[] = new Route("POST", $uri, $class, $method);
    }

    /**
     * @param $uri
     * @param $method
     *
     * @return array
     *
     * @throws Exception
     */
    public static function match($uri, $method)
    {
        foreach (self::$routes as $route) {
            /** @var Route $route */
            if ($route->matches($uri, $method)) {
                return $route->build();
            }
        }

        throw new Exception("No route found");
    }

    /**
     * @param $uri
     * @param $method
     *
     * @return bool
     */
    private function matches($uri, $method)
    {
        if ($this->regex) {
            return preg_match($this->uri, $uri, $this->routeMatches) && $this->requestMethod === $method;
        } else {
            return $this->uri === $uri && $this->requestMethod === $method;
        }
    }

    /**
     * @return array
     */
    private function build()
    {
        if (is_array($this->routeMatches) && count($this->routeMatches) > 0) {
            foreach ($this->routeMatches as $key => $value) {
                if (is_int($key)) {
                    unset($this->routeMatches[$key]);
                }
            }
        }

        return ["class" => $this->class, "method" => $this->method, "matches" => $this->routeMatches];
    }
}
