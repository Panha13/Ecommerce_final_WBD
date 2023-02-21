<?php
include 'config.php';
$conn = mysqli_connect(HOST, USER, PASS, DB);
$page = 'home.php';
$slider = true;
if (isset($_GET["p"])) {
    $p = $_GET["p"];
    switch ($p) {
        case "components":
            $page = "product.php";
            $slider = false;
            break;
        case "laptop":
            $page = "product.php";
            $slider = false;
            break;
        case "accessories":
            $page = "product.php";
            $slider = false;
            break;
        case "about_us":
            $page = "about.php";
            $slider = false;
            break;
        case "contact_us":
            $page = "contact.php";
            $slider = false;
            break;
    }
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->

<head>
    <?php include('includes/head.php') ?>
</head>

<body>
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header>
            <?php include('includes/header.php') ?>
            <?php include('includes/navbar.php') ?>
        </header>
        <!-- Header Area End Here -->
        <!-- Begin Slider With Banner Area -->
        <?php if ($slider) {
            include('includes/slideshow.php');
        } ?>
        <!-- Slider With Banner Area End Here -->

        <?php include($page) ?>

        <!-- Begin Footer Area -->
        <?php include('includes/footer.php') ?>
        <!-- Quick View | Modal Area End Here -->
    </div>
    <?php include('script.php') ?>
</body>

<!-- index30:23-->

</html>