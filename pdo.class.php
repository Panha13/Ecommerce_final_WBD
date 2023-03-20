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
    function Select($column = "*", $where = "", $order = "",  $limit = "", $offset = "", $join = "")
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $sql = "SELECT $column FROM $this->table ";
        if (!empty($join)) $sql .= $join;
        if (!empty($where)) $sql .= " WHERE " . $where;
        if (!empty($order)) $sql .= " ORDER BY " . $order;
        if (!empty($limit)) $sql .= " LIMIT " . $limit;
        if (!empty($offset)) $sql .= " OFFSET " . $offset;
        return $pdo->query($sql);
    }
    function Login($u, $p)
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $sql = "SELECT user_name, user_password,user_pf, COUNT(user_name) AS c FROM $this->table WHERE user_name = :u AND user_password = :p ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':u' => $u, ':p' => $p]);
        return $stmt->fetch();
    }
    function Insert($arr = array())
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $fields = implode(",", array_keys($arr));
        $values = implode(",:", array_keys($arr));
        $sql = "INSERT INTO $this->table ($fields) VALUES (:$values)";
        echo $sql;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arr);
    }
    function Update($arr = array(), $where = "")
    {
        $pdo = $this->Conn();
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $fv = "";
        foreach ($arr as $key => $value) {
            $fv .= "$key='$value',";
        }
        $fv = substr($fv, 0, strlen($fv) - 1);
        $sql = "UPDATE $this->table SET $fv where $where";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute();
    }
}
