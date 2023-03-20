<?php
$pages = "index.php?p=shop";
$current = "All Products";
$sql = "select p.*, c.cate_name, b.brand_name, f.user_id from tbl_product as p inner join tbl_category as c on p.cate_id=c.cate_id inner join tbl_brand as b on p.brand_id=b.brand_id
left outer join tbl_fav as f on f.prod_id=p.prod_id order by prod_name asc";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$pagenum = ceil($num / 12);
$offset = 0;
$c = 'all';
$pg = 1;
if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    $offset = 12 * ($pg - 1);
}
if (isset($_POST['choice']) || isset($_GET['cur'])) {
    $sql = "select p.*, c.cate_name, b.brand_name, f.user_id from tbl_product as p inner join tbl_category as c on p.cate_id=c.cate_id inner join tbl_brand as b on p.brand_id=b.brand_id
    left outer join tbl_fav as f on f.prod_id=p.prod_id order by";
    if (isset($_POST['choice'])) {
        $c = $_POST['choice'];
        $choice = $_POST['choice'];
    } else {
        $c =  $_GET['cur'];
        $cur =  $_GET['cur'];
    }
    switch ($c) {
        case 'all':
            $sql .= " prod_name asc";
            $current = "All Products";
            break;
        case 'b-a-z':
            $sql .= " brand_name asc";
            $current = "Brand (A - Z)";
            break;
        case 'b-z-a':
            $sql .= " brand_name desc";
            $current = "Brand (Z - A)";
            break;
        case 'c-a-z':
            $sql .= " cate_name asc";
            $current = "Category (A - Z)";
            break;
        case 'c-z-a':
            $sql .= " cate_name desc";
            $current = "Category (Z - A)";
            break;
        case 'l-h':
            $sql .= " prod_price asc";
            $current = "Price Low to High";
            break;
        case 'h-l':
            $sql .= " prod_price desc";
            $current = "Price High to Low";
            break;
    }
}
$sql .= " limit 12 offset $offset";
$result = mysqli_query($conn, $sql);

?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Shooping</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="toolbar-amount">
                            <span><?= $current ?></span>
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <label for="choice" style="margin-top:10px; margin-right:10px">Sort By:</label>
                            <form method='POST' style="display:flex;gap:15px" id="f">
                                <select class="form-select" name="choice">
                                    <option value="all" selected>All Product</option>
                                    <option value="b-a-z">Brand (A - Z)</option>
                                    <option value="b-z-a">Brand (Z - A)</option>
                                    <option value="l-h">Price (Low &gt; High)</option>
                                    <option value="h-l">Price (High &gt; Low)</option>
                                    <option value="c-a-z">Category (A - Z)</option>
                                    <option value="c-z-a">Category (Z - A)</option>
                                </select>
                                <button class="btn btn-primary">Go</button>
                            </form>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row" sytle="margin:0 0 20px 0">
                                    <?php
                                    while ($prod = mysqli_fetch_array($result)) {
                                    ?>

                                        <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                            <!-- single-product-wrap start -->
                                            <?php include('components/card.php') ?>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if ($num > 12) {
?>
    <!-- Pagination -->
    <?php include 'admin/components/pagination.php' ?>
    <!-- Pagination -->
<?php
} ?>