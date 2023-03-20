<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        <?php
                        $sql = "SELECT *  from tbl_slideshow order by ordernum";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <div class="single-slide align-center-left animation-style-01 bg-1">
                                <div class="slider-progress"></div>
                                <div>
                                    <img src="images/slideshows/<?= $row['slide_img'] ?>" alt="" style="object-fit: cover; object-position: center; width: 100%; height: 480px;">
                                </div>
                                <div class="slider-content text-white">
                                    <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                    <h2><?= $row['slide_name'] ?></h2>
                                    <h3>Starting at <span>$<?= $row['slide_price'] ?>.00</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="index.php?p=shop">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-sm-30 pt-xs-30">
                <div class="li-banner">
                    <a href="#">
                        <img src="images/banner/1_1.jpg" alt="">
                    </a>
                </div>
                <div class="li-banner mt-15 mt-md-30 mt-xs-25 mb-xs-5">
                    <a href="#">
                        <img src="images/banner/1_2.jpg" alt="">
                    </a>
                </div>
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>