<?php

class Connection
{
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'phpMessager';
    private $user = 'root';
    private $password = '';

    private function connectToDatabase()
    {
        try {
            return new PDO("$this->driver:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных<br>" . $e->getMessage());
        }
    }

    public function getAllData($sql, $params = [])
    {
        $pdo = $this->connectToDatabase();
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFirstData($sql, $params = [])
    {
        $pdo = $this->connectToDatabase();
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function setDataAndGetId($sql, $params = [])
    {
        $pdo = $this->connectToDatabase();
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        return $pdo->lastInsertId();
    }

    public function setData($sql, $params)
    {
        $pdo = $this->connectToDatabase();
        $statement = $pdo->prepare($sql);
        return $statement->execute($params);
    }
}
