<?php

use Framework\Http\Route;

# Step 1: Define crontrollers here
use Controllers\HomeController;

# Step 2: Define the routes here.
# Route is a class which has a static get() function. (See framework/Http/Route.php)
# Argument 1: The url
# Argument 2: The class to be used for the controller
# Argument 3: The method (function) of the controller to be used
Route::get("/", HomeController::class, "index");
