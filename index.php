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
            $controller->process();
            break;
        case "area" :
            $controller = new \Kosmoss\Controller\AreaController();
            $controller->process();
            break;
        default:
            echo \Kosmoss\Lib\View::render("index.phtml", []);
            break;
    }
} else {
    echo \Kosmoss\Lib\View::render("index.phtml", []);
}