<?php

namespace Framework\Http;


use Framework\View\View;
use Smarty;

class Router
{
    /**
     * @param Smarty $smarty
     */
    public static function run(Smarty $smarty)
    {
        $route = Route::match($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
        $controller = $route["class"];
        $controller = new $controller();
        $method = $route["method"];
        if ($route["matches"] !== null && count($route["matches"]) > 0) {
            $result = call_user_func_array([$controller, $method], $route["matches"]);
        } else {
            $result = call_user_func([$controller, $method]);
        }

        if ($result instanceof View) {
            self::render($smarty, $result);
        } else {
            echo($result);
        }

    }

    /**
     * @param Smarty $smarty
     * @param View $view
     */
    private static function render(Smarty $smarty, View $view)
    {
        foreach ($view->getData() as $name => $value) {
            $smarty->assign($name, $value);
        }

        $smarty->display($view->getTemplate());
    }
}
