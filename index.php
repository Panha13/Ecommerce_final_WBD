<?php
session_start();
include 'config.php';
include 'library/uuid.php';
$conn = mysqli_connect(HOST, USER, PASS, DB);
$page = "main.php";
$current_page = "Home";
$slider = true;
$pageid=0;
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
            $pageid=1;
            $page = 'page.php';
            $current_page = "About Us";
            $slider = false;
            break;
        case 'contact-us':
            $pageid=2;
            $page = 'page.php';
            $current_page = "Contact Us";
            $slider = false;
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