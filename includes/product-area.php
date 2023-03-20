<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                        <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                        <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php
                        $sql = "select * from tbl_product limit 10";
                        $result = mysqli_query($conn, $sql);
                        while ($prod = mysqli_fetch_array($result)) {
                        ?>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <?php include('components/card.php') ?>
                                <!-- single-product-wrap end -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div id="li-bestseller-product" class="tab-pane show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php
                        $sql = "select * from tbl_product limit 10 offset 10";
                        $result = mysqli_query($conn, $sql);
                        while ($prod = mysqli_fetch_array($result)) {
                        ?>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <?php include('components/card.php') ?>
                                <!-- single-product-wrap end -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div id="li-featured-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php
                        $sql = "select * from tbl_product limit 10 offset 20";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="index.php?p=single-product&id=<?= $row['prod_id'] ?>">
                                            <img src="images/products/<?= $row['prod_img'] ?>" id="img-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_img'] ?>" alt="Li's Product Image" style="height:150px; object-fit: cover; object-position: center;">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" id="title-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_name'] ?>" href="index.php?p=single-product&id=<?= $row['prod_id'] ?>"><?= $row['prod_name'] ?></a></h4>
                                            <div class="price-box">
                                                <span id="price-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_price'] ?>" class="new-price">$<?= $row['prod_price'] ?></span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="#" onclick=heart(<?= $row['prod_id'] ?>)"><i id="icoHeart" class="fa fa-heart-0"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" onclick="preview(<?= $row['prod_id'] ?>)" href="#"><i class="fa fa-eye"></i></a></li>
                                                <input type="hidden" name="" id="des-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_des'] ?>">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>