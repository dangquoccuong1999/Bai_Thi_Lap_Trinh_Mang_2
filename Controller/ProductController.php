<?php


include_once 'Model/DBConnect.php';
include_once 'Model/ProductDB.php';
include_once 'Model/Product.php';
include_once 'Controller/FounderController.php';

class ProductController
{
    public $productDb;
    public $founderController;

    public function __construct()
    {
        $productDb = new ProductDB();
        $founderController = new FounderController();

        $this->founderController = $founderController;
        $this->productDb = $productDb;
    }

    public function index()
    {
        $this->getAllProducts();
        $this->founderController->getAllFounders();
        
        include_once 'View/index.php';
    }
    public function getAllProducts()
    {
        return $this->productDb->getAllProducts();
    }
}
