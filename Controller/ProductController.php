<?php


include_once 'Model/DBConnect.php';
include_once 'Model/ProductDB.php';
include_once 'Model/Product.php';

class ProductController
{
    public $productDb;

    public function __construct()
    {
        $productDb = new ProductDB();
        $this->productDb = $productDb;
    }

    public function index()
    {
        $this->getAllProducts();
        include_once 'View/index.php';
    }
    public function getAllProducts()
    {
        $product = $this->productDb->getAllProducts();
    }
}
