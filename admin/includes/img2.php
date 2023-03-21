<?php
$tmp_name = $_FILES['img']['tmp_name'];
$orginal_name = $_FILES['img']['name'];
$size = $_FILES['img']['size'];
$ext = strtolower(pathinfo($orginal_name, PATHINFO_EXTENSION));
