<?php
class Product{
    public $name;
    public $imgPath;
    public $price;
    public $brand;

    public function __construct($_name, $_imgPath, $_price, $_brand)
    {
        $this->name = $_name;
        $this->imgPath = $_imgPath;
        $this->price = $_price;
        $this->brand = $_brand;
    }
}