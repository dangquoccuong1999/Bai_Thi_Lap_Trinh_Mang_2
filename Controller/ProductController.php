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

    public function shop()
    {
        $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
        $limit = 8;

        //TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
        $limit = 8;

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
        include_once 'View/shop.php';
    }

    public function trending()
    {
        return $this->productDb->trending();
    }

    //single product
    public function singleProduct()
    {
        $this->addCart();
        include_once 'View/singleProduct.php';
    }

    public function getSingleProduct()
    {
        $id = $_GET['id'];
        $capacity = '100ml';
        return $this->productDb->getSingleProduct($id, $capacity);
    }

    //giỏ hàng 
    public function cart()
    {
        include_once 'View/cart.php';
    }

    public function addCart()
    {
        if (isset($_POST['addcart'])) {
            $quantity = $_POST['quantity'];
            $capacity = "100ml";
            $id = $_GET['id'];
            $product = $this->getSingleProduct()[0];
            if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) { // chưa có sản phẩm nào trong giỏ hàng
                $product['qty'] = 1;
                $_SESSION['cart'][$id] = $product;
            } else {
                if (array_key_exists($id, $_SESSION['cart'])) { // kiểm tra xem id có tồn tại trong mảng cart không
                    $_SESSION['cart'][$id]['qty'] += $quantity; // tăng số lượng sản phẩm của sản phẩm đã có trong giỏ hàng
                } else { // ngược lại nếu không có thì thêm mới
                    $product['qty'] = $quantity;
                    $_SESSION['cart'][$id] = $product;
                }
            }

            $total = 0;
            if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                foreach ($_SESSION['cart'] as $list) {
                    $total += $list['qty']; //cộng tổng số lượng các sản phẩm lại
                }
            }
            $_SESSION['total'] = $total;
        }
    }

    //thêm sản phẩm từ shop.php
    public function addCartToShop()
    {
        $quantity = 1;
        $capacity = "100ml";
        $id = $_GET['id'];
        $product = $this->getSingleProduct()[0];
        if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) { // chưa có sản phẩm nào trong giỏ hàng
            $product['qty'] = 1;
            $_SESSION['cart'][$id] = $product;
        } else {
            if (array_key_exists($id, $_SESSION['cart'])) { // kiểm tra xem id có tồn tại trong mảng cart không
                $_SESSION['cart'][$id]['qty'] += $quantity; // tăng số lượng sản phẩm của sản phẩm đã có trong giỏ hàng
            } else { // ngược lại nếu không có thì thêm mới
                $product['qty'] = $quantity;
                $_SESSION['cart'][$id] = $product;
            }
        }

        $total = 0;
        if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
            foreach ($_SESSION['cart'] as $list) {
                $total += $list['qty']; //cộng tổng số lượng các sản phẩm lại
            }
        }
        $_SESSION['total'] = $total;
        header('Location: index.php?page=shop');
    }

    //gợi ý sản phẩm 
    public function recommended_products()
    {
        return $this->productDb->recommended_products();
    }

    // phân chia trang

}
