<?php


include_once 'DBConnect.php';


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
        $sql = "SELECT DISTINCT products.id,products.name_product,products.name_producer,products.origin,products.description,products.category,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM `products`,product_detail WHERE product_detail.capacity = '100ml' AND products.id = product_detail.id_product";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function trending()
    {
        // lấy ra 4 sản phẩm có số lượng bán nhiều nhất
        $sql = "SELECT id_product,SUM(quantity_number) AS SL FROM bill_details GROUP BY id_product ORDER BY SL DESC LIMIT 4";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $arr = [];

        // hiển thị ra các sản phẩm trên và push vào mảng
        foreach ($products as $product) {
            $sql = "SELECT DISTINCT products.id,products.name_product,products.name_producer,products.origin,products.description,products.category,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM `products`,product_detail WHERE product_detail.capacity = '100ml' AND products.id = product_detail.id_product AND products.id = " . $product['id_product'];
            $stmt = $this->conn->query($sql);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            array_push($arr, $product);
        }
        return $arr;
    }
    //single product

    public function getSingleProduct($id, $capacity)
    {
        $sql = "SELECT DISTINCT products.id,products.name_product,products.name_producer,products.origin,products.description,products.category,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM `products`,product_detail WHERE product_detail.capacity = '$capacity' AND products.id = product_detail.id_product AND products.id = " . $id;
        $stmt = $this->conn->query($sql);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT id,capacity FROM product_detail WHERE id_product = $id order by id desc";
        $stmt = $this->conn->query($sql);
        $capacity = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arr = [$product, $capacity];
        return $arr;
    }

    //car
    public function cart()
    {
        $products = [];
        foreach ($_SESSION['cart'] as $product) {
            $id = $product['id'];
            $capacity = $product['capacity'];

            $sql = "SELECT DISTINCT products.id,products.name_product,products.name_producer,products.origin,products.description,products.category,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM `products`,product_detail WHERE product_detail.capacity = '$capacity' AND products.id = product_detail.id_product AND products.id = " . $id;
            $stmt = $this->conn->query($sql);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            array_push($products, $product);
        }
        // var_dump($products);
        // lấy thời gian hiện tại của hệ thống
        // $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
        // echo $date->format('d-m-Y H:i:s');
        //  var_dump($products);
        return $products;
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
        $sql = "SELECT DISTINCT products.id,products.name_product,products.name_producer,products.origin,products.description,products.category,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM `products`,product_detail WHERE product_detail.capacity = '100ml' AND products.id = product_detail.id_product LIMIT $start, $limit";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}
