<?php

namespace app\Controllers;

use app\Exceptions\NotFoundException;
use app\Models\Articles\Article;
use app\Models\Users\User;
use function vendor\myVendor\dd;

class ArticlesController extends AbstractController
{
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
        $article->save();
    }

    public function create($user)
    {
        $author = User::find($user->getId());
        dd($author);
        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Ну че');
        $article->setText('3й пост');
        $article->setCreatedAt();

        $article->save();
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

