<?php
class Product
{
    public $tbl;
    public $conn;
    public $comp;
    public $id;
    public $id_val;
    public function __construct($conn, $tbl, $id,  $comp)
    {
        $this->tbl = $tbl;
        $this->conn = $conn;
        $this->comp = $comp;
        $this->id = $id;
    }
    public function Show($id_val, $active)
    {
        $sql = "update $this->tbl set active=$active where $this->id=$id_val";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $this->Dialog();
        } else {
            $this->Dialog();
        }
    }
    public function Move($id, $order, $operation, $orderBy)
    {
        $sql = "select $this->id, ordernum from $this->tbl where ordernum $operation $order order by ordernum $orderBy limit 1";
        $result  = mysqli_query($this->conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_array($result);
            $new_ssid = $row[$this->id];
            $new_order = $row['ordernum'];
            $sql = "update $this->tbl set ordernum = $order where $this->id=$new_ssid";
            mysqli_query($this->conn, $sql);
            $sql = "update $this->tbl set ordernum = $new_order where $this->id=$id";
            mysqli_query($this->conn, $sql);
        }
        if ($result) {
            $this->Dialog();
        } else {
            $this->Dialog();
        }
    }
    public function Update($val)
    {
        $sql = "update $this->tbl set $val where $this->id = $this->id_val";
        mysqli_query($this->conn, $sql);
    }
    public function Delete($id)
    {
        $sql = "delete from $this->tbl where $this->id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $this->Dialog();
        } else {
            $this->Dialog();
        }
    }

    public function CheckActive($active)
    {
        $a = 0;
        if ($active) {
            $a = 1;
        }
        return $a;
    }
    public function Dialog($message, $event)
    {
?>
        <div class="alert alert-<?= $event ?>" role="alert">
            <?= $message ?>
        </div>
<?php
    }
    public function DeletePhoto($id, $img, $destination)
    {
        $sql = "delete from $this->tbl where $this->id=$id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            unlink("../images/$destination/$img");
            unlink("../images/$destination/thumbnail/$img");
            ini_set('display_errors', 0);
        } else {
        }
    }
    public function UploadImage($size, $tmp_name, $ext, $destination, $name, $des, $instock, $price, $img, $name_val, $des_val, $instock_val, $price_val,  $cate_id, $brand_id, $link, $active, $num)
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
                $this->Dialog();
            } else {
                $this->Dialog();
            }
        } else {
            $this->Dialog();
            $errmsg = "File image should not be excceed 3MB!";
        }
    }
}
