<?php

require_once '../vendor/autoload.php';
require '../config/routes.php';

$config = require '../config/config.php';

print_r($config);
\Framework\Http\Router::run();
