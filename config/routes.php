<?php

use Controllers\HomeController;
use Framework\Http\Route;

Route::get("/", HomeController::class, "index");

