<?php
// WHAT TODO: Make class and use it in project$

class SuperClass
{
    public $name;
    public $des;
    public $ordernum;
    public $active;

    public function UpdateMe($id, $active, $conn, $tbl)
    {
        $sql = "update $tbl set $active where $id";
        return mysqli_query($conn, $sql);
    }
    public function Move($conn, $cur_order, $cur_id, $tbl, $id_name, $operation, $order)
    {
        $sql = "select $id_name,ordernum from $tbl where ordernum $operation $cur_order order by ordernum $order limit 1;";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_array($result);
            $new_id = $row["$id_name"];
            $new_order = $row['ordernum'];
            $sql = "update $tbl set ordernum = $new_order where $id_name = $cur_id";
            mysqli_query($conn, $sql);
            $sql = "update $tbl set ordernum = $cur_order where $id_name = $new_id";
            mysqli_query($conn, $sql);
        }
    }
}
