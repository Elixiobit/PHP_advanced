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

    public function getById(int $id): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
//        $res = $this->db->queryOne($sql, [':id' => $id]);
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

    }


}