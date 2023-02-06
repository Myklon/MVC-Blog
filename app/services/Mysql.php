<?php

namespace app\services;

use app\interfaces\services\Database;

class Mysql implements Database
{
    private \PDO $pdo;
    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=".$_SERVER["DB_HOST"] . ";dbname=" . $_SERVER["DB_DBNAME"], $_SERVER["DB_USER"], $_SERVER["DB_PASSWORD"]);
        $this->pdo->exec('SET NAMES UTF8');
    }
    public function query(string $sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if(false === $result) {
            return null;
        }
        return $sth->fetchAll();
    }
}