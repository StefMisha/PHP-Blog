<?php

return [
    '~^$~' => [\app\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\app\Controllers\ArticlesController::class, 'show'],

    '~^articles/add$~' => [\app\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/edit$~' => [\app\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)/delete$~' => [\app\Controllers\ArticlesController::class, 'delete'],


    '~^users/register$~' => [\app\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\app\Controllers\UsersController::class, 'activate'],//id пользователя code активации
    '~^users/login~' => [\app\Controllers\UsersController::class, 'login'],
    '~^users/logout~' => [\app\Controllers\UsersController::class, 'logout'],

];