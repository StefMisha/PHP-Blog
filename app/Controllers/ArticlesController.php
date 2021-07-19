<?php

namespace app\Controllers;

use app\Exceptions\NotFoundException;
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

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->renderHTML('article/show.php', [
            'article' => $article,
        ]);
    }

    public function edit($id)
    {
        $article = Article::find($id);

        if($article === null) {
            throw new NotFoundException();
        }
        $article->setName('Москва любит');
        $article->setText('New text');
//        $article->setCreatedAt();
        $article->save();
    }

    public function create()
    {
        $author = User::find(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Ну че');
        $article->setText('3й пост');
        $article->setCreatedAt();

        echo '<pre>';
        var_dump($article);
        $article->save();

        echo '<pre>';
        var_dump($article);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if ($article === null){
            throw new NotFoundException();
        }
        $article->delete($id);
    }
}

