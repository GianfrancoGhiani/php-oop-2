<?php
require_once(__DIR__.'/Product.php');
require_once(__DIR__ . '/../Traits/ProtectedVarPrinter.php');
class ProductDetail extends Product{
    protected $id;
    public $category;
    public $use;
    use ProtectedVarPrinter;

    public function __construct($_name, $_imgPath, $_price, $_brand, $_category, $_use, $_id)
    {
        parent::__construct($_name, $_imgPath, $_price, $_brand);
        $this->category = $_category;
        $this->use = $_use;
        $this->id = $_id;
    }
    
}