<?php

/**
 * Author: Febri Hidayan
 * Site: https://febrihidayan.github.io
 * Email: febrihidayan20@gmail.com
 */

namespace Todolist;

use PDO;

class DB
{
    protected $conn;

    private $table;

    private $id;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=todolist", 'root', '');
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function table(String $table)
    {
        $this->table = $table;

        return $this;
    }

    public function find(Int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function insert(Array $fields): bool
    {
        $columns = implode(',', array_keys($fields));

        $values = "";

        foreach ($fields as $val) {
            $values .= "'$val',";
        }

        $sql = sprintf("INSERT INTO %s(%s) VALUES(%s)", $this->table, $columns, substr($values, 0, -1));

        return $this->runQuery($sql);
    }

    public function update(Array $fields): bool
    {
        $colVal = "";

        foreach ($fields as $key => $val) {
            $colVal .= "$key = '$val',";
        }

        $sql = sprintf("UPDATE %s SET %s WHERE id = %s", $this->table, substr($colVal, 0, -1), $this->id);

        return $this->runQuery($sql);
    }

    public function get()
    {
        $sql = sprintf("SELECT * FROM %s ORDER BY id DESC", $this->table);

        $result = $this->conn->prepare($sql);
        $result->execute();

        return $result->fetchAll();
    }

    public function first()
    {
        $sql = sprintf("SELECT * FROM %s WHERE id = %s", $this->table, $this->id);

        $result = $this->conn->prepare($sql);
        $result->execute();

        return $result->fetchObject();
    }

    public function delete()
    {
        $sql = sprintf("DELETE FROM %s WHERE id = %s", $this->table, $this->id);

        return $this->runQuery($sql);
    }

    private function runQuery(String $query): bool
    {
        $query = $this->conn->prepare($query);

        if ($query->execute()) return true;
            else return false;
    }

    public function __destruct()
    {
        $this->conn = null;
        $this->sql = null;
        $this->table = null;
    }
}