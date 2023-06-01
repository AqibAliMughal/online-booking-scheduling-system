<?php

require '../vendor/autoload.php';
require "../vendor/larapack/dd/src/helper.php";

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'App' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
define('BASE_PATH', $root);

$router = new \Bramus\Router\Router();

require_once '../routes/routes.php';

$router->run();
