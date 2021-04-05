<?php


require '../config/dev.php';
require '../vendor/autoload.php';


use Memory\config\Router;

$router = new Router();
$router->run();
