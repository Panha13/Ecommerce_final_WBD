<?php
include 'global.php';

class Product extends SuperClass
{
    public $cate_id;
    public $brand_id;
    public $instock;
    public $price;
    public $link;
    public $img;
    public function AddProduct()
    {
        $this->InsertData();
        $this->Update("cate_id", $this->cate_id);
        $this->Update("brand_id", $this->brand_id);
        $this->Update("prod_instock", $this->instock);
        $this->Update("prod_price", $this->price);
        $this->Update("link", $this->link);
        $this->Update("prod_img", $this->img);
    }
}
