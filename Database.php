<?php
class Database
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $pdo;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'user_kas';
        $this->password = 'dontuseroot';
        $this->database = 'db_kas';
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = array())
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }

    public function select($table, $columns = '*', $where = '', $params = array())
    {
        $sql = "SELECT $columns FROM $table";
        if (!empty($where)) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->query($sql, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->query($sql, $data);

        return $stmt->rowCount();
    }

    public function update($table, $data, $where = '', $params = array())
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', ');

        $sql = "UPDATE $table SET $set";
        if (!empty($where)) {
            $sql .= " WHERE $where";
        }

        $params = array_merge($data, $params);
        $stmt = $this->query($sql, $params);

        return $stmt->rowCount();
    }

    public function delete($table, $where = '', $params = array())
    {
        $sql = "DELETE FROM $table";
        if (!empty($where)) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->query($sql, $params);

        return $stmt->rowCount();
    }
}
