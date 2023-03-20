<?php
$db = new PO('tbl_fav');
if (isset($_COOKIE['user_id'])) $c = $db->Count(['user_id' => $_COOKIE['user_id']]);
