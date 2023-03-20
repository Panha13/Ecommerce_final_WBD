<?php
include('../pdo.class.php');
echo "<script>alert('hello')</script>";
if (isset($_COOKIE['user_id'])) {
    $p = $_GET['prod_id'];
    $u = $_COOKIE['user_id'];
    $db = new PO('tbl_fav');
    $arr = ['prod_id' => $p, 'user_id' => $u];
    $result = $db->Insert($arr);
    if ($result) {
        return true;
    }
    return false;
}
