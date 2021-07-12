<?php

return [
    '~^$~' => [\app\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\app\Controllers\ArticlesController::class, 'show'],

];