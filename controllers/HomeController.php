<?php

namespace Controllers;
use Framework\View\View;

/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 7-6-2017
 * Time: 15:31
 */
class HomeController
{
    public function index() {
        View::display('../views/homecontroller.php');
    }

    public function test() {
        return View::render('test.tpl');
    }
}