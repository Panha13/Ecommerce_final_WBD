<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                        <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php
                        $sql = "select p.*, c.cate_name, b.brand_name, f.user_id from tbl_product as p inner join tbl_category as c on p.cate_id=c.cate_id inner join tbl_brand as b on p.brand_id=b.brand_id
                                left outer join tbl_fav as f on f.prod_id=p.prod_id limit 10";
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
                        $sql = "select p.*, c.cate_name, b.brand_name, f.user_id from tbl_product as p inner join tbl_category as c on p.cate_id=c.cate_id inner join tbl_brand as b on p.brand_id=b.brand_id
                                left outer join tbl_fav as f on f.prod_id=p.prod_id limit 10 offset 10";
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
        </div>
    </div>
</div>