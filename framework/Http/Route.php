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
     *
     * @param string $requestMethod The method of the request
     * @param string $uri The path to the request
     * @param string $class The controller class that handles the request
     * @param string $method The method on the class
     */
    public function __construct($requestMethod, $uri, $class, $method)
    {
        $this->requestMethod = $requestMethod;
        $this->uri = $this->buildUri($uri);
        $this->class = $class;
        $this->method = $method;
    }

    /**
     * Build the uri to the required format for later
     *
     * @param string $uri The uri to reformat
     *
     * @return string The formatted uri
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
     * Add a new Get route to the router.
     *
     * @param string $uri The path that this route will respond to
     * @param string $class The controller class that will handle the request
     * @param string $method The method on the controller class that will handle the request
     */
    public static function get($uri, $class, $method)
    {
        self::$routes[] = new Route("GET", $uri, $class, $method);
    }

    /**
     * Add a new Post route to the router.
     *
     * @param string $uri The path that this route will respond to
     * @param string $class The controller class that will handle the request
     * @param string $method The method on the controller class that will handle the request
     */
    public static function post($uri, $class, $method)
    {
        self::$routes[] = new Route("POST", $uri, $class, $method);
    }

    /**
     * Match the route to the given uri and method
     *
     * @param string $uri The uri to be matched against
     * @param string $method The method to be matched against
     *
     * @return array The result of the match
     *
     * @throws Exception Will throw if no match was found for the given $uri and $method
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
     * Check to see if the route matches
     *
     * @param string $uri The uri to be matched against
     * @param string $method The method to be matched against
     *
     * @return bool True if the route matches, false otherwise
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
     * Build the matches route to a format that the Router understands
     *
     * @return array The formatted route match
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
