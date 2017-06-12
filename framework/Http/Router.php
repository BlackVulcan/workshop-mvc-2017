<?php

namespace Framework\Http;


use Framework\View\View;
use Smarty;

class Router
{
    /**
     * Run the router over the build up route collection
     *
     * @param Smarty $smarty The template engine if required
     */
    public static function run(Smarty $smarty, array $config = [])
    {
        $url = str_replace($config["routes"]["base_path"], "", $_SERVER["REQUEST_URI"]);
        $route = Route::match($url, $_SERVER["REQUEST_METHOD"]);
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
     * Render a result to the screen of the user
     *
     * @param Smarty $smarty The template engine to use
     * @param View $view The view that needs to be rendered
     */
    private static function render(Smarty $smarty, View $view)
    {
        foreach ($view->getData() as $name => $value) {
            $smarty->assign($name, $value);
        }

        $smarty->display($view->getTemplate());
    }
}
