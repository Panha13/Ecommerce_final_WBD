<?php
    if($pageid !==0)
    {
        $sql="select*from tbl_page where pageid=$pageid";
        $result=mysqli_query ($conn,$sql);
        $row= mysqli_fetch_array ($result);
?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><?= $current_page ?></li>
            </ul>
            <div>
                <?=$row['pagecontent']?>
            </div>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- about wrapper start -->
<div class="about-us-wrapper pt-60 pb-40">
    <div class="container">
    </div>
</div>
<?php
    }
    else{
    
?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><?= $current_page ?></li>
                <h3> error 404 -page not found !</h2>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- about wrapper start -->
<div class="about-us-wrapper pt-60 pb-40">
    <div class="container">
    </div>
</div>
<?php
    }
?>