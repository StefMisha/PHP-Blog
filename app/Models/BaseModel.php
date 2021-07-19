<?php


namespace app\Models;


use app\Services\Db;
use vendor\myVendor\customFeatures;

abstract class BaseModel
{
    use customFeatures; //        dd($columns); TODO:че не робит??

    protected $id;

    abstract public static function getTableName();

    public function __set($name, $value) //TODO:еще раз глянуть в уроке, как и что сюда попадает https://coursehunters.online/t/webshake-prodvinutyj-kurs-oop-v-php-chast-3/345
    {
        $camelCaseName = $this->underscoreCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreCamelCase($source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore($source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    private function mapPropertiesToDbFormat(): array //TODO:настройки перенести в отдельынй класс
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName; //сложный момент, так как не вкусил раньше. $this->$propertyName; - стучим в имя свойства объекта через название свойства по нейминку объекта $propertyName; Сначала зашли в объект и передели туда название свойства и получили значения свойства
        }
        return $mappedProperties;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function all(): array
    {
        $db = Db::getInstance();
        return $db->query(
            'SELECT * FROM ' . static::getTableName() . ';', [], static::class);
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM ' . static::getTableName() . ' WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $result ? $result[0] : null;
    }

    public function save()
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            $this->insert($mappedProperties);
        }
    }

    private function update($mappedProperties)
    {
        $column2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index; // param1
            $column2params[] = $column . ' = ' . $param; //column1 = :param1
            $params2values[':param' . $index] = $value;
            $index++;//TODO::добавить поле "дата обновления"
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $column2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }

    private function insert($mappedProperties)
    {
        $filteredProperties = array_filter($mappedProperties);

        $columns = [];
        foreach ($filteredProperties as $columnName => $value){
            $columns[] = '`' . $columnName . '`';
            $paramName = ':' . $columnName;
            $paramsName[] = $paramName;
            $params2values[$paramName] = $value;
        }

        $columnsViaSemicolon = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsName);

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);

        $this->id = $db->getLastInsertId();
    }

    public function delete($id)
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $id]
        );
        $this->id = null;
    }

}