<?php
// WHAT TODO: Make class and use it in project

class SuperClass
{
    public $name;
    public $comp;
    public $des;
    public $active;
    public $conn;
    public $tbl;
    public $id;
    public $id_val;
    public $operation;
    public $cur_order;
    public $cur_id;
    public $order;
    public $num;
    public $des_val;
    public $name_val;
    public function __construct($conn, $tbl, $id, $name, $des, $comp)
    {
        $this->conn = $conn;
        $this->name = $name;
        $this->tbl = $tbl;
        $this->id = $id;
        $this->des = $des;
        $this->comp = $comp;
    }
    public function Show()
    {
        $sql = "update $this->tbl set $this->active where $this->id=$this->id_val";
        return mysqli_query($this->conn, $sql);
    }
    public function Move()
    {
        $sql = "select $this->id,ordernum from $this->tbl where ordernum $this->operation $this->cur_order order by ordernum $this->order limit 1;";
        $result = mysqli_query($this->conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_array($result);
            $new_id = $row["$this->id"];
            $new_order = $row['ordernum'];
            $sql = "update $this->tbl set ordernum = $new_order where $this->id = $this->cur_id";
            mysqli_query($this->conn, $sql);
            $sql = "update $this->tbl set ordernum = $this->cur_order where $this->id = $new_id";
            mysqli_query($this->conn, $sql);
        }
    }
    public function DeleteData()
    {
        $sql = "delete from $this->tbl where $this->id=$this->id_val;";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "<h4 class='fw-bold py-3 mb-4'>You Remove $this->name_val Successfully</h4>";
        } else {
            echo "<h4 class='fw-bold py-3 mb-4'>Failed to Remove 🥲</h4>";
        }
    }
    public function Update($key, $val)
    {
        $sql = "update $this->tbl set $key='$val', active=$this->active where $this->id=$this->id_val";
        mysqli_query($this->conn, $sql);
        return true;
    }
    public function InsertData()
    {
        $sql = "insert into $this->tbl($this->name,  active, ordernum) values('$this->name_val',$this->active,$this->num)";
        mysqli_query($this->conn, $sql);
        $sql = "select $this->id from $this->tbl order by $this->id desc limit 1";
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $this->id_val = $row["$this->id"];
        }
        $this->Update($this->des, $this->des_val);
    }
    public function CheckActive($a)
    {
        $active = "0";
        if ($a) {
            $active = "1";
        }
        return $this->active = $active;
    }
}
