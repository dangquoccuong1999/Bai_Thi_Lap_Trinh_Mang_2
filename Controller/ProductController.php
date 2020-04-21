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
        $this->pagination();

        include_once 'View/index.php';
    }
    public function getAllProducts()
    {
        return $this->productDb->getAllProducts();
    }

    // phân chia trang
    public function pagination()
    {
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;

        //TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;

        //TÍNH TOÁN TOTAL_PAGE VÀ START
        $total_records = $this->productDb->getTotalRecords();

        $total_page = ceil($total_records[0]['total'] / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        
        $productPagination = $this->productDb->pagination($current_page, $limit);
        include_once 'View/index.php';
    }
}
