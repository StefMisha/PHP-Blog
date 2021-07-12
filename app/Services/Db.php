<?php

namespace app\Services;

class Db
{
    private \PDO $pdo;

    public function __construct()
    {
        $dbOption = (require __DIR__ . '/../settings.php')['connection_mysql']; //поделючаем файл с настройками бд
        $this->pdo = new \PDO( //подключаемся к бд
            'mysql:host=' . $dbOption['host'] . ';dbname=' . $dbOption['dbname'],
             $dbOption['user'],
            $dbOption['password']
        );
        $this->pdo->exec('SET NAME UTF8');
    }

    /**
     * @return array
     */
    public function query(string $sql, $params = [], $className = 'stdClass'): ?array //метод запроса, 1 эл запрос, 2 эл параметры
    {
        $sth = $this->pdo->prepare($sql);//подготовка запроса
        $result = $sth->execute($params);//передача параметров для запроса

        if (false === $result) {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);//получаем все данные
    }
}