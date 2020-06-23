<?php

namespace app\models;
use app\services\Db;
use app\interfaces\IModel;


abstract class Model implements IModel
{
    protected $id;
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): IModel
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryObject(get_called_class(), $sql, [':id' => $id])[0];
//        var_dump($res); exit;

//        return $this->db->queryOne($sql, [':id' => $id]);
//        foreach ($res as $key => $val){
//            $this->$key = $val;
//        }
//        return $this;
    }

    public function getALl()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }


    public function deleteItem()
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }
    public function updateItem()
    {

    }

    public function insertItem()
    {
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

        $sql = "INSERT INTO {$this->tableName} ({$columns}) VALUES ({$placeholders})";
        var_dump($sql);
//        $this->db->execute($sql, $params);
//        $this->id =


    }


}