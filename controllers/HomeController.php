<?php

namespace Controllers;

use Framework\View\View;

class HomeController
{
    public function index()
    {
        return View::render('../views/homecontroller.php');
    }

}
