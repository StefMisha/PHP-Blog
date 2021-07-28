<?php

namespace app\Models\Users;

use app\Exceptions\InvalidArgumentExceptions;
use app\Models\BaseModel;

class User extends BaseModel
{
//    protected $table = 'users';

    protected $nickname;
    protected $email;
    protected $isConfirme;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public static function getTableName(): string
    {
        return 'users';
    }

    public function getNickName()
    {
        return $this->nickname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public static function signUp($userData)
    {

    }

}