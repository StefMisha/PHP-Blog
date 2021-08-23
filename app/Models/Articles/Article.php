<?php

namespace app\Models\Articles;

use app\Exceptions\InvalidArgumentExceptions;
use app\Models\BaseModel;
use app\Models\Users\User;

class Article extends BaseModel
{
    protected $authorId;
    protected $name;
    protected $text;
    protected $createdAt; //мешает создавать?

    public static function getTableName(): string
    {
        return 'articles';
    }

    public function getAuthor()
    {
        return User::find($this->authorId);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setAuthor($author)
    {
        $this->authorId = $author->getId();
    }

    public function getText()
    {
        return $this->text;
    }

    public function setCreatedAt(): void
    {
        $this->createdAt = date("Y-m-d H:i:s");
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public static function createFromArray($fields, User $author): Article
    {
        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);
        $article->save();

        return $article;
    }

    public function updateFromArray($fields)
    {
//        var_dump($fields, "модель"); die;
        if (empty($fields['name'])) {
            throw new InvalidArgumentExceptions('Не передан текст статьи');
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentExceptions('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }
}