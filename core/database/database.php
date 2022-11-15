<?php

class Database {
    var $sql,
        $pdo,
        $statement;
    function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME . ';charset=utf8', '' . USERNAME . '', '' . PASSWORD . ''); //
        } catch (PDOException $e) {
            exit('server error ' . $e->getMessage());
        }
    }

    function setQuery($sql)
    {
        $this->sql = $sql;
        return $this;
    }

    function loadRow($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('server error ' . $e->getMessage());
        }
    }

    function loadAllRow($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('server error ' . $e->getMessage());
        }
    }

    function execute($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            return  $this->statement->execute($params);
        } catch (PDOException $e) {
            exit('server error ' . $e->getMessage());
        }
    }
}
