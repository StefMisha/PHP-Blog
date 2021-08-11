<?php

namespace app\Controllers;

use app\Exceptions\NotFoundException;
use app\Models\Articles\Article;

class MainController extends AbstractController
{
    public function main()
    {
        $articles = Article::All(); //подготовленный запрос передаю в метод query объекта класса бд

        if($articles == null){
            throw new NotFoundException();
        }
        $this->view->renderHTML('main/main.php', [
            'articles' => $articles,
        ]);
    }

    public function sayHello($name) {
        $this->view->renderHTML('main/hello.php', ['name' => $name]);
    }
}