<?php
include('pdo.class.php');
include('library/uuid.php');
// $db = new DB('tbl_product');
// $result = $db->Select();
// while ($row = $result->fetch()) {
//     echo $row->prod_name;
//     echo "<br/>";
// }
$db = new DB('tbl_user');
if (isset($_POST['user'])) {
    if (isset($_POST['pass'])) {
        $result = $db->Login($_POST['user'], $_POST['pass']);
        if ($result->c == 1) {
            echo "LOGGED IN as $result->user_name";
        } else {
            echo "FAILED";
        }
    } else {
        echo "Please enter your password";
    }
}
$id = "49f1d02c-9068-413e-ad50-b58d3165ce13";
$arr = ['user_id' => Uid(), 'user_name' => "ev", 'user_password' => "ev"];
$where = " user_id='$id'";
$result = $db->Update($arr, $where);
if ($result) {
    echo "Updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="">Username</label>
        <input type="text" name="user" id="">

        <label for="">Password</label>
        <input type="password" name="pass" id="">
        <button>Login</button>
    </form>

</body>

</html>