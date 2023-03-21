<?php
$db = new PO('tbl_fav');
$c = 0;
$cart = 0;
$m = 0;
if (isset($_COOKIE['user_id'])) {
    $c = $db->Count(['user_id' => $_COOKIE['user_id']]);
    $c = $c->c;
    $db = new PO('tbl_cart');
    $cart = $db->Count(['user_id' => $_COOKIE['user_id']]);
    $cart = $cart->c;
    $db = new PO('tbl_cart as c');
    $money = $db->Select('SUM(p.prod_price) as b', "user_id='$userID'", 'inner join tbl_product as p on p.prod_id = c.prod_id');
    foreach ($money as $mon) {
        $m += $mon->b;
    }
}
?>
<!-- TODO: Making the product appeear in the box :) -->
<header class="li-header-4">
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.php">
                            <?php
                            $config = new PO('tbl_config');
                            foreach ($config->Select() as $row) {
                                # code...
                            ?>
                                <img height="50px" src="images/logo/<?= $row->logo ?>" alt="">
                            <?php } ?>
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <form action="index.php?p=search" class="hm-searchbox">
                        <select class="nice-select select-search-category">
                            <option value="0">All</option>
                            <option value="1">Laptops</option>
                        </select>
                        <input type="text" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="index.php?p=wishlist">
                                    <?php
                                    if ($c != 0) {
                                    ?>
                                        <span class="cart-item-count wishlist-item-count" id="noti"><?= $c ?></span>
                                    <?php } ?>
                                    <i class=" fa fa-heart-o"></i>

                                </a>
                            </li>
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">$<?= $m ?>
                                        <?php
                                        if ($c != 0) {
                                        ?>
                                            <span class="cart-item-count"><?= $cart ?></span>
                                        <?php } ?>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <div class="btn btn-warning">
                                        <a href="index.php?p=shoppinglist" class="btn">View Cart</a>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hb-menu">
                        <?php include('includes/nav.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
</header>