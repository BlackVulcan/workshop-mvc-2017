<?php

namespace Controllers;

use Framework\Http\View;

/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 7-6-2017
 * Time: 15:31
 */
class HomeController
{
    public function index()
    {
        return View::render('../views/homecontroller.php');
    }

}
