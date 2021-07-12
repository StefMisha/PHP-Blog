<?php


namespace app\Models;


use app\Services\Db;

abstract class BaseModel
{
    private $id;

    abstract public static function getTableName();

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreCamelCase($source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public function getId()
    {
        return $this->id;
    }

    public static function all(): array
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    public static function find($id)
    {
        $db = new Db();
        $result = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $result ? $result[0] : null;
    }
}