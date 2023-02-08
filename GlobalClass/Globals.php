<?php
class Globals
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
    public function Show($id_val, $active, $name)
    {
        $sql = "update $this->tbl set active=$active where $this->id=$id_val";
        $message = $active == 1 ? 'Show' : 'Hide';
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $this->Dialog($message . "  $name Successfully 🎉🎉🎉", "primary");
        } else {
            $this->Dialog($message . "  $name Failed 😢😢😢", "danger");
        }
    }
    public function Move($id, $order, $operation, $orderBy, $pos)
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
            $this->Dialog("Moved $this->comp ID $id $pos Successfully 🎉🎉🎉", "primary");
        } else {
            $this->Dialog("Moved $this->comp ID $id $pos Failed 😢😢😢", "danger");
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
            $this->Dialog("Delete $this->comp $id Successfully 🎉🎉🎉", "primary");
        } else {
            $this->Dialog("Delete $this->comp $id Failed 😢😢😢", "danger");
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
}
