<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

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
    include_once __DIR__ . '/view/errors/404.php';
    return 404;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(... $matches);