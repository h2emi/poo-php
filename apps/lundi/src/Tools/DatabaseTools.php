<?php

namespace App\Tools;

use PDO;

class DatabaseTools
{
    private $host;
    private $dbName;
    private $user;
    private $password;

    private $dsn;

    private $pdo;
    

    public function __construct($host, $dbName, $user, $password)
    {
        //credentials pour la BDD
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;

        $this->dsn = "mysql:host=$host;dbname=$dbName";

        $this->initDatabase();
    }

    //pour se connecter à ma BDD avec PDO
    public function initDatabase()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->password);
    }

    /* pour faire une requete à la bdd */
    public function executeQuery($SQL)
    {
        $result = $this->pdo->query($SQL);
        return $result->fetchAll();
    }

    /*
     * un param serait = ["paramKey" => ":name", "paramValue" => "Claude"]
     */

    public function insertQuery($sql, $params)
    {
        foreach ($params as $param) {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam($param["paramKey"], $param["paramValue"]);
            $stmt->execute();
        }
    }

    public function selectByNameInTable($tableName, $name)
    {
        $result = $this->pdo->query("SELECT * FROM $tableName WHERE name = '$name'");
        return $result->fetch();
    }
}