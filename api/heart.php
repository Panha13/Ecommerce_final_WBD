<?php
include('../pdo.class.php');
$p = $_GET['prod_id'];
$u = $_GET['user_id'];
$db = new PO('tbl_fav');
$arr = ['prod_id' => $p, 'user_id' => $u];
$result = $db->Insert($arr);
