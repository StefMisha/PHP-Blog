<?php

namespace app\Controllers;

use app\Models\Articles\Article;
use app\Models\User\User;
use app\View\View;

class ArticlesController
{
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../public/view');
    }

    public function show(int $id)
    {
        $article = Article::find($id);
        if (!$article) {
            $this->view->renderHTML('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHTML('article/show.php', [
            'article' => $article,
        ]);
    }

}

