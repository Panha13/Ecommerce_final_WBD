<?php
session_start();

function isLogin()
{
    if (isset($_COOKIE['user_id'])) {
        return 'cookie';
    }
    if (isset($_SESSION['user_id'])) {
        return 'session';
    } else {
        return 'none';
    }
}

function checkLogin($user, $pwd, $save)
{
    $user = trim(strtolower($user));
    $db = new DB('tbl_user');
    $result = $db->Login($user, $pwd);
    echo $result->c;
    if ($result->c > 0) {
        // if ($save == 1) {
        //     setcookie('user_id', $result->user_id, time() + 3600 * 24 * 365);
        //     setcookie('user_pf', $result->user_pf, time() + 3600 * 24 * 365);
        //     setcookie('user_name', $result->user_name, time() + 3600 * 24 * 365);
        // } else {
        //     $_SESSION['user_id'] = $result->user_id;
        //     $_SESSION['user_name'] = $result->user_name;
        //     $_SESSION['user_pf'] = $result->user_pf;
        // }
        echo "<script>window.replace('index.php');</script>";
    } else {
    }

    return false;
}
