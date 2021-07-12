<?php

namespace app\Models\User;

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

    public static function getTableName()
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


}