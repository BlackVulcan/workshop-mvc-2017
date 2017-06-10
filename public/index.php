<?php

require_once '../vendor/autoload.php';
require '../config/routes.php';

$config = require '../config/config.php';

\Framework\Http\Router::run();
