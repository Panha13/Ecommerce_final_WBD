<?php
include 'library/uuid.php';
include 'library/auth.php';
include 'pdo.class.php';
$userID = "";
if (isset($_COOKIE['user_id'])) {
    $userID = $_COOKIE['user_id'];
}
$conn = mysqli_connect(HOST, USER, PASS, DB);
$page = "main.php";
$current_page = "Home";
$slider = true;
$pageid = 0;
$log = isLogin();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    switch ($p) {
        case 'home':
            $page = 'main.php';
            $current_page = 'Home';
            $slider = true;
            break;
        case 'shop':
            $page = 'shop.php';
            $current_page = "Shop";
            $slider = false;
            break;
        case 'account':
            $page = 'account.php';
            $current_page = "Account";
            $slider = false;
            break;
        case 'checkout':
            $page = 'checkout.php';
            $current_page = "Checkout";
            $slider = false;
            break;
        case 'login-register':
            $page = 'login-register.php';
            $current_page = "Login and Register";
            $slider = false;
            break;
        case 'search':
            $page = 'search.php';
            $current_page = "search";
            $slider = false;
            break;
        case 'wishlist':
            $page = 'wishlist.php';
            $current_page = "Wishlist";
            $slider = false;
            break;
        case 'shoppinglist':
            $page = 'shopping-cart.php';
            $current_page = "Wishlist";
            $slider = false;
            break;
        case 'single-product':
            $page = 'single-product.php';
            $current_page = "Signle Product";
            $slider = false;
            break;
        case 'about-us':
            $pageid = 1;
            $page = 'page.php';
            $current_page = "About Us";
            $slider = false;
            break;
        case 'contact-us':
            $pageid = 2;
            $page = 'page.php';
            $current_page = "Contact Us";
            $slider = false;
            break;
        case 'logout':
            if (isset($_COOKIE['user_id'])) {
                setcookie('user_id', '', time() - 1);
                setcookie('user_name', '', time() - 1);
                setcookie('user_pf', '', time() - 1);
            }
            if (isset($_SESSION['user_id'])) {
                session_destroy();
            }
            header('Location: index.php?p=login-register');
            break;
        default:
            $page = '404.php';
            $current_page = "404 Not Found";
            $slider = false;
            break;
    }
}


?>
<!doctype html>
<html class="no-js">

<head>
    <title><?= $current_page ?></title>
    <?php include('includes/head.php'); ?>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="body-wrapper">
        <?php $slider ? include('includes/slider.php') : ''; ?>
        <?php include("$page"); ?>
    </div>
    <?php include('includes/footer.php') ?>
    <?php include('includes/script.php') ?>
</body>

</html>