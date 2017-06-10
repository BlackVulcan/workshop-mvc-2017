<?php

define("BASE_DIR", realpath(__DIR__ . DIRECTORY_SEPARATOR . "..") . "/");

require_once '../vendor/autoload.php';
require '../config/routes.php';

$config = require '../config/config.php';

$framework = \Framework\Baby\Baby::init($config);
$framework->run();
