<?php
include_once 'Model/DBConnect.php';
include_once 'Model/ProductDB.php';
include_once 'Model/Product.php';

class ProductController
{
    private $productDb;

    public function __construct()
    {
        $productDb = new ProductDB();
        $this->productDb = $productDb;
    }

    public function getAllProducts()
    {
        $product = $this->productDb->getAllProducts();
        var_dump($product);
    }
}
