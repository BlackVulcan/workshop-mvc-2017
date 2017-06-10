<?php

namespace Framework\Http;


use Framework\View\View;
use Smarty;

class Router
{
    public static function run(Smarty $smarty)
    {
        $route = Route::match($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
        $controller = $route["class"];
        $controller = new $controller();
        $method = $route["method"];
        /** @var mixed $result */
        $result = $controller->$method();

        if ($result instanceof View) {
            self::render($smarty, $result);
        } else {
            echo($result);
        }

    }

    private static function render(Smarty $smarty, View $view)
    {
        foreach ($view->getData() as $name => $value) {
            $smarty->assign($name, $value);
        }

        $smarty->display($view->getTemplate());
    }
}
