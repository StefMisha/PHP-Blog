<?php


namespace app\Services;

use app\Services\Db;

class UserActivationService
{
    private const TABLE_NAME = 'users_activation_codes';

    public static function createActivationCode($user): string//активация условная, сервис по отправки почты не работает локально
    {
        $code = bin2hex(random_bytes(16));

        $db = Db::getInstance();
        $db->query(
            'INSERT INTO ' . self::TABLE_NAME . ' (user_id, code) VALUES (:user_id, :code)',
            [
                'user_id' => $user->getId(),
                'code' => $code
            ]
        );
        return $code;
    }

    public static function checkActivationCode($user, string $code): bool//активация условная, сервис по отправки почты не работает локально
    {
        $db = Db::getInstance();

        $result = $db->query(
            'SELECT * FROM ' . self::TABLE_NAME . ' WHERE user_id = :user_id AND code = :code',
                [
                    'user_id' => $user->getId(),
                    'code' => $code
                ]
        );
        return !empty($result);
    }
}
