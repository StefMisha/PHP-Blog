<?php


namespace app\Services;

date_default_timezone_set('Europe/Moscow');

class Db
{
    private \PDO $pdo;
    private static $instance;

    private function __construct()
    {
        $dbOption = (require __DIR__ . '/../settings.php')['connection_mysql']; //поделючаем файл с настройками бд
        $this->pdo = new \PDO( //подключаемся к бд
            'mysql:host=' . $dbOption['host'] . ';dbname=' . $dbOption['dbname'],
            $dbOption['user'],
            $dbOption['password']
        );
        $this->pdo->exec('SET NAME UTF8');
    }

    public static function getInstance(): self
    {
        if (self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
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

    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }

}