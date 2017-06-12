<?php

namespace Controllers;

use Framework\View\View;

class HomeController
{
    public function index()
    {
        View::display('../views/homecontroller.php');
    }

    public function test()
    {
        return View::render('test.tpl');
    }
}