    <div class="group-featured-product pt-60 pb-40 pb-xs-25">
        <div class="container">
            <div class="row">
                <?php
                $sql = "select * from tbl_brand limit 3";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    // TODO: finish brand
                ?>
                    <div class="col-lg-4">
                        <div class="featured-product">
                            <div class="li-section-title">
                                <h2>
                                    <span><?= $row['brand_name'] ?></span>
                                </h2>
                            </div>
                            <div class="featured-product-active-2 owl-carousel">
                                <div class="featured-product-bundle">
                                    <div class="row">
                                        <?php
                                        $prod_s = "select * from tbl_product where brand_id =" . $row['brand_id'] . " limit 3 ";
                                        $r = mysqli_query($conn, $prod_s);
                                        while ($prod = mysqli_fetch_array($r)) {
                                        ?>
                                            <div class="group-featured-pro-wrapper">
                                                <div class="product-img">
                                                    <a href="product-details.html">
                                                        <img alt="" src="images/products/<?= $prod['prod_img'] ?>" style="height: 100px; width: 100px; object-fit: cover; object-position: center;">
                                                    </a>
                                                </div>
                                                <div class="featured-pro-content">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html"><?= $prod['prod_name'] ?></a>
                                                        </h5>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h4><a class="featured-product-name" href="single-product.html"><?= strlen($prod['prod_des']) > 50 ? substr($prod['prod_des'], 0, 50) . "..." : $prod['prod_des'] ?></a></h4>
                                                    <div class="featured-price-box">
                                                        <span class="new-price">$<?= $prod['prod_price'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>