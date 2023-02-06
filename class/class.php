<?php
// WHAT TODO: Make class and use it in project

class SuperClass
{
    public $name;
    public $des;
    public $ordernum;
    public $active;
    public $conn;
    public $tbl;
    public $id;
    public $operation;
    public $cur_order;
    public $cur_id;
    public $id_name;
    public $order;
    public function Show()
    {
        $sql = "update $this->tbl set $this->active where $this->id";
        return mysqli_query($this->conn, $sql);
    }
    public function Move()
    {
        $sql = "select $this->id_name,ordernum from $this->tbl where ordernum $this->operation $this->cur_order order by ordernum $this->order limit 1;";
        $result = mysqli_query($this->conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_array($result);
            $new_id = $row["$this->id_name"];
            $new_order = $row['ordernum'];
            $sql = "update $this->tbl set ordernum = $new_order where $this->id_name = $$this->cur_id";
            mysqli_query($this->conn, $sql);
            $sql = "update $this->tbl set ordernum = $this->cur_order where $this->id_name = $new_id";
            mysqli_query($this->conn, $sql);
        }
    }
}
