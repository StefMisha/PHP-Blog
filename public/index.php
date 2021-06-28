<?php

use src\Controllers\MainController;

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
});


$route = $_GET['route'] ?? '';

$routes = require __DIR__ . '/../routes/routes.php';
echo '<pre>';
var_dump($routes);

echo 'Страница не найдена';