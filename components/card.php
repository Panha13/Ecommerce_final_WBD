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
                <li class="add-cart active"><a onclick="addToCart(<?= $prod['prod_id'] ?>" href="index.php?p=shoppinglist&action=add&prod_id=<?= $prod['prod_id'] ?>">Add to cart</a></li>
                <li style="cursor: pointer;" id="h"><a class="links-details" onclick="heart(<?= $prod['prod_id'] ?>)"><i id="icoHeart-<?= $prod['prod_id'] ?>" class="fa fa-heart<?= $userID == $prod['user_id'] ? '' : '-o' ?>"></i></a></li>
                <small id="error"></small>
                <li><a class="quick-view" data-toggle="modal" style="cursor: pointer;" data-target="#exampleModalCenter" onclick="preview(<?= $prod['prod_id'] ?>)" href="#"><i class="fa fa-eye"></i></a></li>
                <input type="hidden" name="" id="des-<?= $prod['prod_id'] ?>" data-value="<?= $prod['prod_des'] ?>">
            </ul>
        </div>
    </div>
</div>
<script>
    function heart(prod_id) {
        let cookie = getCookie('user_id');
        if (cookie != '') {
            $.ajax({
                url: "http://localhost/hort/api/heart.php?prod_id=" + prod_id,
                success: () => {
                    $('#icoHeart-' + prod_id).removeClass('fa-heart-o');
                    $('#icoHeart-' + prod_id).addClass('fa-heart');
                }
            }).fail(() => {
                $('#error').text('An error occurred ');
            })
        } else {
            window.location.replace('http://localhost/hort/index.php?p=login-register');
        }
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        let user = getCookie("username");
        if (user != "") {
            alert("Welcome again " + user);
        } else {
            user = prompt("Please enter your name:", "");
            if (user != "" && user != null) {
                setCookie("username", user, 365);
            }
        }
    }

    function changeHeart(prod_id) {
        $('#icoHeart-' + prod_id).removeClass('fa-heart-o');
        $('#icoHeart-' + prod_id).addClass('fa-heart');
        let noti = $('#noti').text();
        console.log(noti);
        $('#noti').text(noti + 1);

    }
</script>