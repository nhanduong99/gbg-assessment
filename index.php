<?php
require_once "./public/autoload.php";

define('PATH_ROOT', __DIR__);

spl_autoload_register(function ($class_name) {
    include_once PATH_ROOT . '/' . str_replace('\\', '/', $class_name) . '.php';
});

$router = new Core\Http\Route();
include_once PATH_ROOT . '/app/routes.php';

$request_url = !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

$method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

$router->map($request_url, $method_url);

