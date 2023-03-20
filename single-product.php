<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select p.*, c.cate_name, b.brand_name from tbl_product as p inner join tbl_category as c on p.cate_id=c.cate_id inner join tbl_brand as b on p.brand_id=b.brand_id where prod_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
}
?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><?= $row['prod_name'] ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area" style="align-items: center;">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <img src="images/products/<?= $row['prod_img'] ?>" alt="product image">
                        </div>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content sp-normal-content pt-60">
                    <div class="product-info">
                        <h2><?= $row['prod_name'] ?></h2>
                        <span class="product-details-ref"><?= $row['cate_name'] ?></span>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">$<?= $row['prod_price'] ?></span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span><?= $row['prod_des'] ?>
                                </span>
                            </p>
                        </div>
                        <?php include('components/cart.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Section Area -->
                <div class="li-section-title">
                    <h2>
                        <span>10 other products in the same category:</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php
                        $sql = "select p.*, c.cate_name, b.brand_name from tbl_product as p inner join tbl_category as c on p.cate_id=c.cate_id inner join tbl_brand as b on p.brand_id=b.brand_id where p.cate_id= " . $row['cate_id'] . " limit 10";
                        $result = mysqli_query($conn, $sql);
                        while ($prod = mysqli_fetch_array($result)) {

                        ?>
                            <div class="col-lg-12">
                                <?php include('components/card.php') ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>