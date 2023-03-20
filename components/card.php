<!-- single-product-wrap start -->
<div class="single-product-wrap">
    <div class="product-image">
        <a href="index.php?p=single-product&id=<?= $prod['prod_id'] ?>">
            <img src="images/products/<?= $prod['prod_img'] ?>" id="img-<?= $prod['prod_id'] ?>" data-value="<?= $prod['prod_img'] ?>" alt="Li's Product Image" style="height:150px; object-fit: cover; object-position: center;">
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
            <h4><a class="product_name" id="title-<?= $prod['prod_id'] ?>" data-value="<?= $prod['prod_name'] ?>" href="index.php?p=single-product&id=<?= $prod['prod_id'] ?>"><?= $prod['prod_name'] ?></a></h4>
            <div class="price-box">
                <span id="price-<?= $prod['prod_id'] ?>" data-value="<?= $prod['prod_price'] ?>" class="new-price">$<?= $prod['prod_price'] ?></span>
            </div>
        </div>
        <div class="add-actions">
            <ul class="add-actions-link">
                <li class="add-cart active"><a href="#">Add to cart</a></li>
                <li><a class="links-details" href="#" onclick=heart(<?= $prod['prod_id'] ?>)"><i id="icoHeart" class="fa fa-heart-0"></i></a></li>
                <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" onclick="preview(<?= $prod['prod_id'] ?>)" href="#"><i class="fa fa-eye"></i></a></li>
                <input type="hidden" name="" id="des-<?= $prod['prod_id'] ?>" data-value="<?= $prod['prod_des'] ?>">
            </ul>
        </div>
    </div>
</div>
<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // $('#icoHeart').removeClass = "fa-heart-o";
                    // $('#icoHeart').addClass = "fa-heart";
                }
            };
            xmlhttp.open("GET", "api/heart.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>