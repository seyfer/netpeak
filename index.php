<?php

ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);

//you SHOULD call composer install first to generate this file!!!
require "vendor/autoload.php";

if (array_key_exists('route', $_GET) && !empty($_GET['route'])) {

    $route = $_GET['route'];

    switch ($route) {
        case "three_side" :
            $controller = new \Kosmoss\Controller\ThreeSideController();
            break;
        case "area" :
            $controller = new \Kosmoss\Controller\AreaController();
            break;
        default:
            $controller = new \Kosmoss\Controller\IndexController();
            break;
    }

    if (!$controller instanceof \Kosmoss\Controller\ControllerInterface) {
        throw new \Exception("Controller " . get_class($controller) .
                             " must implement \\Kosmoss\\Controller\\ControllerInterface");
    }

    $controller->process();
} else {
    $controller = new \Kosmoss\Controller\IndexController();
    $controller->process();
}