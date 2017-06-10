<?php

namespace Framework\Http;


class Router
{
    public static function run()
    {
        $route = Route::match($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
        $controller = $route["class"];
        $controller = new $controller();
        $method = $route["method"];
        $result = $controller->$method();
        echo($result);
    }
}
