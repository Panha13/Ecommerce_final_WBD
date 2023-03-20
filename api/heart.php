<?php
include('../pdo.class.php');
if (isset($_COOKIE['user_id'])) {
    $db = new PO('tbl_fav');
    $count = $db->Count(['prod_id' => $_GET['prod_id'], 'user_id' => $_COOKIE['user_id']]);
    if ($count->c == 0) {
        $p = $_GET['prod_id'];
        $u = $_COOKIE['user_id'];
        $arr = ['prod_id' => $p, 'user_id' => $u];
        $result = $db->Insert($arr);
    }
}
