<?php

namespace app\Controllers;

use app\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../public/view');
    }

    public function main()
    {
        $articles = [
            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Текста статьи 2']
        ];
        $this->view->renderHTML('main/main.php', ['articles' => $articles]);
    }

    public function sayHello($name) {
        $this->view->renderHTML('main/hello.php', ['name' => $name]);
    }
}