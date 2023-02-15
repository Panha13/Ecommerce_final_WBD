<?php
include 'Globals.php';
class Product extends Globals
{
    public function UploadImage($size, $tmp_name, $ext, $destination, $name, $des, $instock, $price, $img, $name_val, $des_val, $instock_val, $price_val, $cate_id, $brand_id, $link, $active, $num)
    {
        if (($size / 1048576) <= 3) {
            $img_val = floor(microtime(true) * 1000) . "." . $ext;
            $sourceProperties = getimagesize($tmp_name);
            $width = $sourceProperties[0];
            $height = $sourceProperties[1];
            $imageType = $sourceProperties[2];
            $sql = "insert into $this->tbl ($name, $des, $instock,$price,cate_id, brand_id, link, $img,active,ordernum) values('$name_val','$des_val','$instock_val','$price_val',$cate_id,$brand_id, '$link', '$img_val', $active,$num);";
            $result = mysqli_query($this->conn, $sql);
            if ($result) {
                createThumbnail($imageType, $tmp_name, $width, $height, $destination, $img_val, $ext);
                move_uploaded_file($tmp_name, $destination . $img_val);
                $this->Dialog("Insert $this->comp $name_val Successfully 🎉🎉🎉", "primary");
            } else {
                $this->Dialog("Insert $this->comp $name_val Failed 🥲🥲🥲", "danger");
            }
        } else {
            $errmsg = "File image should not be excceed 3MB!";
            $this->Dialog($errmsg, "danger");
        }
    }
    public function UploadSlide($size, $tmp_name, $ext, $destination, $name, $des,  $price, $img, $name_val, $des_val, $price_val, $link, $active, $num)
    {
        if (($size / 1048576) <= 3) {
            $img_val = floor(microtime(true) * 1000) . "." . $ext;
            $sourceProperties = getimagesize($tmp_name);
            $width = $sourceProperties[0];
            $height = $sourceProperties[1];
            $imageType = $sourceProperties[2];
            $sql = "insert into $this->tbl ($name, $des, $price, link, $img,active,ordernum) values('$name_val','$des_val','$price_val', '$link', '$img_val', $active,$num);";
            $result = mysqli_query($this->conn, $sql);
            if ($result) {
                createThumbnail($imageType, $tmp_name, $width, $height, $destination, $img_val, $ext);
                move_uploaded_file($tmp_name, $destination . $img_val);
                $this->Dialog("Insert $this->comp $name_val Successfully 🎉🎉🎉", "primary");
            } else {
                $this->Dialog("Insert $this->comp $name_val Failed 🥲🥲🥲", "danger");
            }
        } else {
            $errmsg = "File image should not be excceed 3MB!";
            $this->Dialog($errmsg, "danger");
        }
    }
}
