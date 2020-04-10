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
}
