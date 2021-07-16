<?php

return [
    '~^$~' => [\app\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\app\Controllers\ArticlesController::class, 'show'],
    '~^articles/(\d+)/edit$~' => [\app\Controllers\ArticlesController::class, 'edit'],
    '~^articles/create~' => [\app\Controllers\ArticlesController::class, 'create'],

];