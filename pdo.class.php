<?php
include('config.php');

class PO
{
    private $table;
    function __construct($table)
    {
        $this->table = $table;
    }
    function Conn()
    {
        $dsn = "mysql:host=localhost;dbname=wbd";
        return new PDO($dsn, "root", "");
    }
    function Select($column = "*", $where = "", $join = "", $order = "",  $limit = "", $offset = "")
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $sql = "SELECT $column FROM $this->table ";
        if (!empty($join)) $sql .= $join;
        if (!empty($where)) $sql .= " WHERE " . $where;
        if (!empty($order)) $sql .= " ORDER BY " . $order;
        if (!empty($limit)) $sql .= " LIMIT " . $limit;
        if (!empty($offset)) $sql .= " OFFSET " . $offset;
        // echo $sql;
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }
    function Count($arr = array())
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $fv = "";
        foreach ($arr as $key => $value) {
            $fv .= "$key=:$key AND ";
        }
        $fv = substr($fv, 0, strlen($fv) - 5);

        $sql = "SELECT COUNT(*) AS c FROM $this->table WHERE $fv";
        // echo $sql;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arr);
        return $stmt->fetch();
    }
    function Insert($arr = array())
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $fields = implode(",", array_keys($arr));
        $values = implode(",:", array_keys($arr));
        $sql = "INSERT INTO $this->table ($fields) VALUES (:$values)";
        // echo $sql;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arr);
    }
    function Update($arr = array(), $where = "")
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $fv = "";
        foreach ($arr as $key => $value) {
            $fv .= "$key=:$key,";
        }
        $fv = substr($fv, 0, strlen($fv) - 1);
        $sql = "UPDATE $this->table SET $fv where $where";
        // echo $sql;
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($arr);
    }
    function Delete($where)
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $sql = "DELETE FROM $this->table WHERE $where";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute();
    }
}
