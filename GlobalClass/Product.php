<?php
class Product
{
    public $tbl;
    public $conn;
    public $comp;
    public $id;
    public function __construct($conn, $tbl, $id,  $comp)
    {
        $this->tbl = $tbl;
        $this->conn = $conn;
        $this->comp = $comp;
        $this->id = $id;
    }
    public function Show($id_val, $active)
    {
        $sql = "update $this->tbl set active=$active where $this->id=$id_val";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $this->Dialog();
        } else {
            $this->Dialog();
        }
    }
    public function Move($id, $order, $operation, $orderBy)
    {
        $sql = "select $this->id, ordernum from $this->tbl where ordernum $operation $order order by ordernum $orderBy limit 1";
        $result  = mysqli_query($this->conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_array($result);
            $new_ssid = $row[$this->id];
            $new_order = $row['ordernum'];
            $sql = "update $this->tbl set ordernum = $order where $this->id=$new_ssid";
            mysqli_query($this->conn, $sql);
            $sql = "update $this->tbl set ordernum = $new_order where $this->id=$id";
            mysqli_query($this->conn, $sql);
        }
        if ($result) {
            $this->Dialog();
        } else {
            $this->Dialog();
        }
    }
    public function Update($id, $val)
    {
        $sql = "update $this->tbl set $val where $this->id = $id";
        mysqli_query($this->conn, $sql);
    }
    public function Delete($id)
    {
        $sql = "delete from $this->tbl where $this->id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $this->Dialog();
        } else {
            $this->Dialog();
        }
    }



    public function CheckActive($active)
    {
        $a = 0;
        if ($active) {
            $a = 1;
        }
        return $a;
    }
    public function Dialog()
    {
    }
}
