<?php
$sql = "SELECT * from tbl_category limit 2";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
?>
    <section class="product-area li-laptop-product li-tv-audio-product pb-45 mt-5">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span><?= $row['cate_name'] ?></span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <?php
                            $prod_s = "select p.*, c.cate_name, b.brand_name from tbl_product as p left join 
                                    tbl_category as c on c.cate_id=p.cate_id left join 
                                    tbl_brand as b on b.brand_id=p.brand_id where c.cate_id =" . $row['cate_id'];
                            $r = mysqli_query($conn, $prod_s);
                            while ($prod = mysqli_fetch_array($r)) {
                            ?>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/products/<?= $prod['prod_img'] ?>" alt="Li's Product Image" style="height:150px; object-fit: cover; object-position: center;">
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
                                                <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">$<?= $prod['prod_price'] ?></span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
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
            <!-- Li's Section Area End Here -->
        </div>
        </div>
    </section>
<?php } ?>