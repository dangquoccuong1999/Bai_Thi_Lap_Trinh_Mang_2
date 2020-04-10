<?php
include_once 'DBConnect.php';
include_once 'Product.php';

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
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arr = [];
        foreach ($data as $value) {
            $product = new Product($value['id'], $value['name_product'], $value['name_producer'], $value['origin'], $value['description'], $value['img_product']);
            $product->id = $value['id'];
            array_push($arr, $product);
        }
        return $arr;
    }

}
