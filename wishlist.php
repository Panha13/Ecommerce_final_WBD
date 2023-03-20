<?php
$db = new PO('tbl_fav');
if (isset($_GET['action'])) {
    $a = $_GET['action'];
    if (isset($_GET['id'])) {
        switch ($a) {
            case 'remove':
                $result = $db->Delete("fav_id='" . $_GET['id'] . "'");
                if ($result) {
                } // DO STH
                break;

            default:
                # code...
                break;
        }
    }
}

?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-add-cart">add to cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $db = new PO('tbl_fav as f');
                                $rows = $db->Select('p.prod_id,f.fav_id,p.prod_name, p.prod_img, p.prod_price', "u.user_id='" . $userID . "'", ' inner join tbl_user as u on f.user_id=u.user_id inner join tbl_product as p on f.prod_id=p.prod_id');

                                foreach ($rows as $row) {
                                ?>
                                    <tr>
                                        <td class="li-product-remove"><a href="index.php?p=wishlist&action=remove&id=<?= $row->fav_id ?>"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="index.php?p=single-product&id=<?= $row->prod_id ?>"><img src="images/products/<?= $row->prod_img ?>" height="200" style="object-fit: cover;object-position: center;" alt=""></a></td>
                                        <td class="li-product-name"><a href="index.php?p=single-product&id=<?= $row->prod_id ?>"><?= $row->prod_name ?></a></td>
                                        <td class="li-product-price"><span class="amount">$<?= $row->prod_price ?></span></td>
                                        <td class="li-product-add-cart"><a href="index.php?p=single-product&id=<?= $row->prod_id ?>">add to cart</a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>