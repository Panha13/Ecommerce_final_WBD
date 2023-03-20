<?php
$c = '0';
//Authentication
include "./Auth/auth.php";
isLogin();
include '../pdo.class.php';
$conn = mysqli_connect(HOST, USER, PASS, DB);
$page = 'dashboard.php';
$pageid = 0;
if (isset($_GET['p'])) {
  $p = $_GET['p'];
  switch ($p) {
    case 'dashboard':
      $page = 'dashboard.php';
      break;
    case 'category':
      $page = 'category.php';
      break;
    case 'brand':
      $page = 'brand.php';
      break;
    case 'products':
      $page = 'product.php';
      break;
    case 'slideshow':
      $page = 'slideshow.php';
      break;
    case 'ads':
      $page = 'ads.php';
      break;
    case 'aboutus':
      $pageid = 1;
      $page = 'page.php';
      break;
    case 'contactus':
      $pageid = 2;
      $page = 'page.php';
      break;
    case 'socialmedia':
      $page = 'socialmedia.php';
      break;
    case "pageeditform":
      $page = "pageeditform.php";
      break;
  }
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <?php include('includes/head.php') ?>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?Php include('includes/aside_navbar.php') ?>
      <div class="layout-page">
        <?php include('includes/header.php') ?>
        <div class="content-wrapper">
          <?php include($page) ?>
          <?php include('includes/footer.php') ?>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <?php include('includes/script.php') ?>
</body>

</html>