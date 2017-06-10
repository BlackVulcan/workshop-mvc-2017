<?php

namespace Framework\View;

class View
{

    /**
     * Includes the path of the view in the index.php file. This static method is
     * just a wrapper and functions as a more elegant way to render views in the
     * controller. It replaces the include 'path/to/view.php';
     *
     * @param string $path
     * @return string
     */
    public static function render($path)
    {
        include $path;
        return;
    }
}
