<?php

namespace app\Controllers;

use app\Exceptions\InvalidArgumentExceptions;
use app\Exceptions\NotFoundException;
use app\Models\Articles\Article;
use app\Exceptions\UnauthorizedException;
use app\Requests\ArticleRequests;

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

    public function add()
    {
        if (!empty($_POST)) {
            if ($this->user === null) {
                throw new UnauthorizedException();
            }
            $validate = new ArticleRequests($_POST);
            if ($validate->getErrors()){
                $this->view->renderHTML('/article/create.php', ['errors' => $validate->getErrors()]);
                return;
            }
            $article = Article::createFromArray($_POST, $this->user);

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHTML('/article/create.php');
    }

    public function edit(int $id)
    {
        $article = Article::find($id);

        if($article === null) {
            throw new NotFoundException();
        }
        if ($this->user === null){
            throw new UnauthorizedException();
        }
//        var_dump($article);
        var_dump($_POST, "контроллер");
        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentExceptions $e) {
                $this->view->renderHTML('article/edit.php', ['errors' => $e->getMessage()]);
                return;
            }
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHTML('article/edit.php', ['article' => $article]);
    }

    public function delete(int $id)
    {
        $article = Article::find($id);
        if ($article === null){
            throw new NotFoundException();
        }
        $article->delete($id);
    }
}

