<?php

use app\View\View;
use app\Exceptions\NotFoundException;
use app\Exceptions\DbException;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use \vendor\myVendor\customFeatures; //        dd($columns); TODO:че не робит dd??

try {
    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    });

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/../routes/web.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new NotFoundException();
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(... $matches);

} catch (DbException $e) {
    $view = new View(__DIR__ . '/view/errors');
    $view->renderHTML('500.php', ['error' => $e->getMessage()], 500);
} catch (NotFoundException $e) {
    $view = new View(__DIR__ . '/view/errors');
    $view->renderHTML('404.php', ['error' => $e->getMessage()], 404);
}