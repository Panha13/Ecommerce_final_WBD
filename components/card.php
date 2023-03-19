<!-- single-product-wrap start -->
<div class="single-product-wrap">
    <div class="product-image">
        <a href="index.php?p=single-product&id=<?= $prod['prod_id'] ?>">
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
            <h4><a class="product_name" href="index.php?p=single-product&id=<?= $prod['prod_id'] ?>">Accusantium dolorem1</a></h4>
            <div class="price-box">
                <span class="new-price">$<?= $prod['prod_price'] ?></span>
            </div>
        </div>
        <div class="add-actions">
            <ul class="add-actions-link">
                <li class="add-cart active"><a href="#">Add to cart</a></li>
                <li><a class="links-details" href="index.php?p=single-product&id=<?= $prod['prod_id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
            </ul>
        </div>
    </div>
</div>