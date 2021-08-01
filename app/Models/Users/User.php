<?php

namespace app\Models\Users;

use app\Exceptions\InvalidArgumentExceptions;
use app\Models\BaseModel;

class User extends BaseModel
{
//    protected $table = 'users';

    protected $nickname;
    protected $email;
    protected $isConfirmed;
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

    /**
     * @throws InvalidArgumentExceptions
     * @throws \Exception
     */
    public static function signUp($userData): User
    {
        if (static::findOneByColumn('nickname', $userData !== null)) {
            throw new InvalidArgumentExceptions('Пользователь с таким ником уже существует');
        }
        if (static::findOneByColumn('email', $userData !== null)) {
            throw new InvalidArgumentExceptions('Пользователь с такой почтой уже существует');
        }

        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = $userData['password_hash'];
        $user->isConfirmed = false;
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;
    }

    public function activate()//активация условная, сервис по отправки почты не работает локально
    {
        $this->isConfirmed = true;
        $this->save();
    }
}