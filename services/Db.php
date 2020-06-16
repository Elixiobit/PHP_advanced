<?php

namespace app\services;

class Db //Работа с БД через \PDO
{

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

    private static $instance = null;

    private function __construct() {} // нельзя из вне создать элемент класса

    public function __wakeup() {}

    public function __clone() {}

    public static function getInstance() //проверяем наличие созданного объекта Db, если отсутствует,то создаем.
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function getConnection()   // подключаемся к bd.
    {
        if (is_null($this->connection)) {         // проаеряем на наличие уже существующего соединения.
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
