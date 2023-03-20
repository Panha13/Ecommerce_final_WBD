<?php
if (isset($_GET['action'])) {
    $d = new PO('tbl_cart');
    $a = $_GET['action'];
    switch ($a) {
        case 'remove':
            $result = $d->Delete(" prod_id=" . $_GET['prod_id'] . " AND user_id='$userID'");
            break;
        case 'add':
            if (isset($_GET['prod_id'])) {
                $arr = ['prod_id' => $_GET['prod_id'], 'user_id' => $userID];
                $result = $d->Insert($arr);
                if ($result) {
                    //DO STH
                }
            }

        default:
            # code...
            break;
    }
}
$db = new PO('tbl_cart as c');
$rows = $db->Select('c.cart_id,p.prod_img, p.prod_name, p.prod_price, p.prod_id', " user_id='$userID'", 'inner join tbl_product as p on p.prod_id = c.prod_id');


?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
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
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($rows as $row) {
                                ?>
                                    <tr>
                                        <td class="li-product-remove"><a href="index.php?p=shoppinglist&action=remove&prod_id=<?= $row->prod_id ?>"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="#"><img src="images/products/<?= $row->prod_img ?>" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="#"><?= $row->prod_name ?></a></td>
                                        <td class="li-product-price" id="price-<?= $row->cart_id ?>" data-value="<?= $row->prod_price ?>"><span class="amount">$<?= $row->prod_price ?></span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount" id="total">$0</span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>$130.00</span></li>
                                    <li>Total <span>$130.00</span></li>
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>