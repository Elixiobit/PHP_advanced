<?php

namespace app\services;

use app\traits\TSingleton;

class Db //Работа с БД через \PDO
{
    use TSingleton;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'root',
        'database' => 'june',
        'charset' => 'utf8',
    ];

    /**
     * @var \PDO
     */

    private $connection = null;



    public function getConnection()   // подключаемся к bd.
    {
        if (is_null($this->connection)) {         // проверяем на наличие уже существующего соединения.
            $this->connection = new \PDO(
                $this->buildDshString(),
                $this->config['login'],
                $this->config['password'],
            );
            $this->connection->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );
        }
        return $this->connection;
    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function getLastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }

     public function queryObject($className, string $sql, array $params = [])
     {
         $pdoStatement = $this->query($sql, $params);
         $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className/*FETCH_OBJ - stdClass - пуустой общий класс.*/);
         return $pdoStatement->fetchAll();
     }

    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->rowCount();

    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll(/*\PDO::FETCH_ASSOC*/); // Для выведения только ассециативного
        // массива.
    }


    private function buildDshString()
    {
        return sprintf(
            '%s:host=%s;dbname=%s; charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset'],
        );
    }
}
