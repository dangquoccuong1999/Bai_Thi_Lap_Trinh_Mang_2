<?php


include_once 'DBConnect.php';
include_once 'Product.php';
include_once 'ProductDetail.php';

class ProductDB
{
    public $conn;

    public function __construct()
    {
        $conn = new DBConnect();
        $this->conn = $conn->connect();
    }

    // Lấy tất cả sản phẩm và chi tiết của sản phẩm
    public function getAllProducts()
    {
        $sql = "SELECT * FROM `products`";
        $stmt = $this->conn->query($sql);
        $dataProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM `product_detail` WHERE capacity ='100ml'";
        $stmt = $this->conn->query($sql);
        $dataProductDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $arr = [];
        $i = 0;
        foreach ($dataProduct as $value) {

            $productDetail = new ProductDetail($dataProductDetail[$i]['id'], $dataProductDetail[$i]['price'], $dataProductDetail[$i]['capacity'], $dataProductDetail[$i]['quantity_number'], $dataProductDetail[$i]['id_product']);
            $i++;

            $product = new Product($value['id'], $value['name_product'], $value['name_producer'], $value['origin'], $value['description'], $value['img_product'], $productDetail);
            array_push($arr, $product);
        }
        return $arr;
    }

    //phân trang
    public function getTotalRecords()
    {
        //TÌM TỔNG SỐ RECORDS
        $sql = "select count(id) as total from products";
        $stmt = $this->conn->query($sql);
        $total_records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $total_records;
    }
    public function pagination($current_page, $limit)
    {

        // Tìm Start
        $start = ($current_page - 1) * $limit;
        //TRUY VẤN LẤY DANH SÁCH TIN TỨC
        $sql = "SELECT * FROM products LIMIT $start, $limit";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


        //tạo product trong product có productdetail
        $arr = [];
        foreach ($products as $value) {
            $capacity = '100ml';
            $id = $value['id'];
            $sql = "SELECT * FROM product_detail WHERE capacity = '$capacity' AND id_product = $id";
            $stmt = $this->conn->query($sql);
            $dataProductDetail = $stmt->fetch(PDO::FETCH_ASSOC);

            $productDetail = new ProductDetail($dataProductDetail['id'], $dataProductDetail['price'], $dataProductDetail['capacity'], $dataProductDetail['quantity_number'], $dataProductDetail['id_product']);

            $product = new Product($value['id'], $value['name_product'], $value['name_producer'], $value['origin'], $value['description'], $value['img_product'], $productDetail);
            array_push($arr, $product);
        }
        return $arr;
    }
}
