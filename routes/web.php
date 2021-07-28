<?php

return [
    '~^$~' => [\app\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\app\Controllers\ArticlesController::class, 'show'],
    '~^articles/(\d+)/edit$~' => [\app\Controllers\ArticlesController::class, 'edit'],
    '~^articles/create~' => [\app\Controllers\ArticlesController::class, 'create'],
    '~^articles/(\d+)/delete$~' => [\app\Controllers\ArticlesController::class, 'delete'],

    '~^users/register$~' => [\app\Controllers\UsersController::class, 'signUp'],

];