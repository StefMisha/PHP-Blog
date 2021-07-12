<?php

namespace app\Models\Articles;

use app\Models\BaseModel;
use app\Models\User\User;

class Article extends BaseModel
{
//    protected $table = 'articles';

    protected $authorId;
    protected $name;
    protected $text;
    protected $createdAt;

    public static function getTableName()
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

    public function getText()
    {
        return $this->text;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }


}