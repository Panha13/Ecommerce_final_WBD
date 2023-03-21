<?php
if (isset($_GET['action'])) {
    $d = new PO('tbl_cart');
    $a = $_GET['action'];
    switch ($a) {
        case 'remove':
            $result = $d->Delete(" prod_id=" . $_GET['prod_id'] . " AND user_id='$userID'");
            break;
        case 'add':
            if (isset($_COOKIE['user_id'])) {
                if (isset($_GET['prod_id'])) {
                    $arr = ['prod_id' => $_GET['prod_id'], 'user_id' => $userID];
                    $result = $d->Insert($arr);
                    if ($result) {
                        //DO STH
                    }
                }
            } else {
                echo "<script>window.location.href ='http://localhost/hort/index.php?p=login-register'</script>";
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
                                        <td class="li-product-thumbnail"><a href="#"><img height="200px" src="images/products/<?= $row->prod_img ?>" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="#"><?= $row->prod_name ?></a></td>
                                        <td class="li-product-price" id="price-<?= $row->cart_id ?>" data-value="<?= $row->prod_price ?>"><span class="amount">$<?= $row->prod_price ?></span></td>
                                        <td class="quantity" style="width: 20px;">
                                            <input class="cart-plus-minus-box" id="qty" onchange="changeTotal(<?= $row->cart_id ?>)" value="1" type="number">
                                        </td>
                                        <td class="product-subtotal" style="width: 100px;"><span class="amount" id="total-<?= $row->cart_id ?>">$<?= $row->prod_price ?></span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="float: right;">
                        <div class="cart-page-total">
                            <a href="index.php?p=checkout">Proceed to checkout</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function changeTotal(price) {
        console.log("hi");
        let p = document.getElementById('price-' + price).getAttribute('data-value');
        let qty = $('#qty').val();
        p *= qty;
        let fullPrice = $('#total-' + price).text("$" + p);
        let cartTotal = 0;
        cartTotal += parseInt(p);
        $('#cartTotal').text(cartTotal);
    }
</script>