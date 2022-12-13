<?php
require_once(__DIR__.'/Product.php');
class ProductDetail extends Product{
    private $id;
    public $category;
    public $use;
    public function __construct($_name, $_imgPath, $_price, $_brand, $_category, $_use, $_id)
    {
        parent::__construct($_name, $_imgPath, $_price, $_brand);
        $this->category = $_category;
        $this->use = $_use;
        $this->id = $_id;
    }

}