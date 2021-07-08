<?php

return [
    '~^hello/(.*)$~' => [\app\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\app\Controllers\MainController::class, 'main'],
];