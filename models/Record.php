<?php

namespace app\models;
use app\services\Db;
use app\interfaces\IRecord;


abstract class Record implements IRecord
{
    protected $id;
//    protected static $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
//        $this->tableName = $this->getTableName();
    }


    public static function getById(int $id): Record
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':id' => $id])[0];
    }

    public static function getByIds($ids)
    {
        $params = [];
        $tableName = static::getTableName();
        foreach ($ids as $key => $value) {
            $params[":{$key}"] = $key;
        }
        $placeholders = implode(", ", array_keys($params));
        $sql = "SELECT * FROM {$tableName} WHERE id IN ($placeholders)";
        return Db::getInstance()->queryObject(get_called_class(), $sql, $params);
    }

    public static function getALl()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryObject(get_called_class(), $sql);
    }


    public function delete()
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }
    public function insertItem()
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];

        // INSERT INTO  products (name,description) VALUES (:name, :description)
        foreach ($this as $key => $value) {
            if (in_array($key, ['db', 'tableName'])) {
                continue;
                //TODO придумать фильтр чтобы ненужные свойства не попадали в БД.
            }

            $params[":{$key}"] = $value;
            $columns[]= "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";

        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();


    }
    public function update()
    {
        $tableName = static::getTableName();

//todo UPDATE product SET name = :name При апдейте на изменение уходили только измененные поля.

    }
    public function save()
    {
        //todo   Сохранять изменения черз метод save().
    }


}