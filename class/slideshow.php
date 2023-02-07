<?php
include 'global.php';
class Slideshow extends SuperClass
{
    public $price;
    public $link;
    public $img;
    public function AddSlideshow()
    {
        $this->InsertData();
        $this->Update("slide_price", $this->price);
        $this->Update("link", $this->link);
        $this->Update("slide_img", $this->img);
    }
}
