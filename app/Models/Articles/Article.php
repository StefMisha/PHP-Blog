<?php

namespace app\Models\Articles;

use app\Models\BaseModel;
use app\Models\User\User;

class Article extends BaseModel
{
    protected $authorId;
    protected $name;
    protected $text;
//    protected $createdAt;

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
}