<?php

namespace app\Controllers;

use app\Models\Articles\Article;
use app\View\View;

class MainController
{
    /**
     * @var View
     */
    private View $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../public/view');
    }

    public function main()
    {
        $articles = Article::All(); //подготовленный запрос передаю в метод query объекта класса бд

        $this->view->renderHTML('main/main.php', [
            'articles' => $articles,
        ]);
    }

    public function sayHello($name) {
        $this->view->renderHTML('main/hello.php', ['name' => $name]);
    }
}