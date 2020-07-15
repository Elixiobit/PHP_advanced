<?php

namespace app\models;
use app\services\Db;
use app\interfaces\IModel;


abstract class Model implements IModel
{
    protected $id;
//    protected static $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
//        $this->tableName = $this->getTableName();
    }

    public static function getById(int $id): Model
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':id' => $id])[0];
//        var_dump($res); exit;
//        return $this->db->queryOne($sql, [':id' => $id]);
//        foreach ($res as $key => $val){
//            $this->$key = $val;
//        }
//        return $this;
    }

    public static function getALl()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }


    public function deleteItem()
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }
    public function updateItem()
    {
//todo UPDATE product SET name = :name

    }

    public function insertItem()
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];

        // INSERT INTO  products (name,description) VALUES (:name, :description)
        foreach ($this as $key => $value) {
            if (in_array($key, ['db', 'tableName'])) {
                continue; //ДЗ придумать фильтр чтобы ненужные свойства не попадали в БД.
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


}   //         сделать метод save для insertItem если новый и updateItem если уже существует