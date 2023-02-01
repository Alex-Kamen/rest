<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/utilities/router/Router.php');
require_once(ROOT.'/application/model/exception/ExceptionResponse.php');

try {
    $router = new Router();
    $router->run();
} catch (Exception $exception) {
    http_response_code($exception->getCode());
    echo ExceptionResponse::response($exception);
}