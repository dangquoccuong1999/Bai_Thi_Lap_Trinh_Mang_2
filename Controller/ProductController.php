<?php


include_once 'Model/DBConnect.php';
include_once 'Model/ProductDB.php';
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
        include_once 'View/index.php';
    }
    public function getAllProducts()
    {
        return $this->productDb->getAllProducts();
    }

    public function trending()
    {
        return $this->productDb->trending();
    }

    //single product
    public function singleProduct()
    {
        include_once 'View/singleProduct.php';
    }

    public function getSingleProduct()
    {
        $id = $_GET['id'];

        if (isset($_GET['capacity'])) {
            $capacity = $_GET['capacity'];

            return $this->productDb->getSingleProduct($id, $capacity);
        } else {
            $capacity = '100ml';
            return $this->productDb->getSingleProduct($id, $capacity);
        }
    }

    //giỏ hàng 
    public function cart()
    {
        
        include_once 'View/cart.php';
    }

    public function addCart()
    {
        if (!isset($_SESSION['countCart'])) {
            $_SESSION['countCart'] = 1;
            $_SESSION['cart'] = [];

            $id = $_GET['id'];
            $capacity = $_GET['capacity'];
            $arr = [];
            array_push($arr, ['id' => $id, 'capacity' => $capacity, 'quantity_number' => 1]);
            $_SESSION['cart'] = $arr;
            // var_dump($_SESSION['cart']);
        } else {
            $id = $_GET['id'];
            $capacity = $_GET['capacity'];

            $_SESSION['countCart'] = $_SESSION['countCart'];
            $_SESSION['countCart']++;

            $arr = $_SESSION['cart'];
            $i = 0;
            $checkAdd = true;

            foreach ($arr as $array) {
                if (in_array($id, $array) && in_array($capacity, $array)) {
                    $_SESSION['cart'][$i]['quantity_number']++;
                    $checkAdd = false;
                }
                $i++;
            }
            if ($checkAdd == true) {
                array_push($arr, ['id' => $id, 'capacity' => $capacity, 'quantity_number' => 1]);
                $_SESSION['cart'] = $arr;
            }

            var_dump($_SESSION['cart']);
        }
        $this->singleProduct();
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
    }
}
