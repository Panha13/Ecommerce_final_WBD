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
    public $id_name;
    public $order;
    public $num;
    public $des_val;
    public $name_val;
    public function __construct(...$conn)
    {
        $this->conn = $conn;
    }
    public function Show()
    {
        $sql = "update $this->tbl set $this->active where $this->id";
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
    public function Update()
    {
        $sql = "update $this->tbl set $this->name='$this->name_val', $this->des='$this->des_val', $this->active where $this->id=$this->id_val";
        mysqli_query($this->conn, $sql);
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
    public function InsertData()
    {
        $sql = "insert into $this->tbl($this->name, $this->des, active, ordernum) values('$this->name_val','$this->des_val',$this->active,$this->num)";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            echo "<h4 class='fw-bold py-3 mb-4'>You're Successfully Added 🎉🎉🎉</h4>";
        } else {

            echo "<h4 class='fw-bold py-3 mb-4'>Failed to add $this->comp</h4>";
        }
    }
    public function CheckActive()
    {
        $active = "active=0";
        if ($this->active) {
            $active = "active=1";
        }
        return $active;
    }
}
