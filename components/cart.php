<div class="single-add-to-cart">
    <form action="index.php?p=checkout" method="POST" class="cart-quantity">
        <div class="quantity">
            <label>Quantity</label>
            <div class="cart-plus-minus">
                <input class="cart-plus-minus-box" name="qty" value="1" type="text">
                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
            </div>
        </div>
        <a class="add-to-cart" href="index.php?p=shoppinglist&action=add&prod_id=<?= $row['prod_id'] ?>" type="button">Add to cart</a>
    </form>

</div>