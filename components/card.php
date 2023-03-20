<div class="single-product-wrap">
    <div class="product-image">
        <a href="index.php?p=single-product&id=<?= $prod['prod_id'] ?>">
            <img src="images/products/<?= $prod['prod_img'] ?>" id="img-<?= $prod['prod_id'] ?>" data-value="<?= $prod['prod_img'] ?>" alt="Li's Product Image" style="height:150px; object-fit: cover; object-position: center;">
        </a>
        <span class="sticker" style="z-index: 1;">New</span>
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
            <ul class="add-actions-link d-flex justify-content-center" style="z-index: 2;">
                <li class="add-cart active"><a href="#">Add to cart</a></li>
                <li style="cursor: pointer;" id="h"><a class="links-details" onclick="heart(<?= $prod['prod_id'] ?>)"><i id="icoHeart-<?= $prod['prod_id'] ?>" class="fa fa-heart-o"></i></a></li>
                <small id="error"></small>
                <li><a class="quick-view" data-toggle="modal" style="cursor: pointer;" data-target="#exampleModalCenter" onclick="preview(<?= $prod['prod_id'] ?>)" href="#"><i class="fa fa-eye"></i></a></li>
                <input type="hidden" name="" id="des-<?= $prod['prod_id'] ?>" data-value="<?= $prod['prod_des'] ?>">
            </ul>
        </div>
    </div>
</div>
<script>
    function heart(prod_id) {
        $('#icoHeart-' + prod_id).removeClass('fa-heart-o');
        $('#icoHeart-' + prod_id).addClass('fa-heart');
        $.ajax({
            url: "http://localhost/hort/api/heart.php?prod_id=" + prod_id,
            success: () => {
                $('#icoHeart').removeClass('fa-heart-o');
                $('#icoHeart').addClass('fa-heart');
            }
        }).fail(() => {
            $('#error').text('An error occurred ');
        })
    }
</script>