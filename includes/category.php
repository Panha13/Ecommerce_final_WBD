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
                            $prod_s = "select p.*, c.cate_name, b.brand_name, f.user_id from tbl_product as p inner join tbl_category as c on p.cate_id=c.cate_id inner join tbl_brand as b on p.brand_id=b.brand_id
                                left outer join tbl_fav as f on f.prod_id=p.prod_id where c.cate_id =" . $row['cate_id'];
                            $r = mysqli_query($conn, $prod_s);
                            while ($prod = mysqli_fetch_array($r)) {
                            ?>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap end -->
                                    <?php include('components/card.php') ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>