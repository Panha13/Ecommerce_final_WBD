<?php
// WHAT TODO: Make class and use it in project

class CategoryClass
{
    public $name;
    public $des;
    public $ordernum;
    public $active;

    public function UpdateMe($id, $active, $conn)
    {
        $sql = "update tbl_category set $active where $id";
        return mysqli_query($conn, $sql);
    }
    public function MoveUP($conn, $cur_order, $cur_id)
    {
        $sql = "select cate_id,ordernum from tbl_category where ordernum < $cur_order order by ordernum desc limit 1;";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_array($result);
            $new_id = $row['cate_id'];
            $new_order = $row['ordernum'];
            $sql = "update tbl_category set ordernum = $new_order where cate_id = $cur_id";
            mysqli_query($conn, $sql);
            $sql = "update tbl_category set ordernum = $cur_order where cate_id = $new_id";
            mysqli_query($conn, $sql);
        }
    }
}
