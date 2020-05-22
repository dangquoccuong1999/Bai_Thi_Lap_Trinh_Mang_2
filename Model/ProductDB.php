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
        $capacity = $stmt->fetch(PDO::FETCH_ASSOC);

        $arr = [$product, $capacity];
        return $arr;
    }

    //car
    public function checkOut()
    {
        //  lấy thời gian hiện tại của hệ thống
        $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));

        $dayHienTai = $date->format('d-m-Y H:i:s');
        $id = $_SESSION['user']['id'];
        $tongTien = $_SESSION['tongTien'];
        $sql = "INSERT INTO bill (id_customer,date,total_money) 
                VALUES ('$id','$dayHienTai','$tongTien')";
        $stmt = $this->conn->query($sql);

        $sql = "SELECT MAX(id) AS id  FROM `bill`";
        $stmt = $this->conn->query($sql);
        $id_bill = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_bill = $id_bill['id'];
        $capacity = "100ml";
        foreach ($_SESSION['cart'] as $product) {
            $id_product = $product['id'];
            $qty = $product['qty'];
            $soLuongSanPhamTrongKho = $product['quantity_number']; // lấy ra số lượng ở trong kho 
            $soLuongSanPhamTrongKho -= $qty; // trừ đi số lượng sản phẩm đã được mua

            //update số lượng hàng của sản phẩm đó trong kho
            $sql = "UPDATE product_detail
                    SET quantity_number = '$soLuongSanPhamTrongKho'
                    WHERE id_product = '$id_product'";
            $stmt = $this->conn->query($sql);

            //thêm vào bảng bill_details
            $sql = "INSERT INTO bill_details (id_bill,id_product,quantity_number,capacity) 
                    VALUES ('$id_bill','$id_product','$qty','$capacity')";
            $stmt = $this->conn->query($sql);
        }
    }

    // gợi ý sản phẩm 
    public function recommended_products()
    {
        // lấy ra các dữ liệu sản phẩm khác 
        $id = $_GET['id'];
        $sql = "SELECT * FROM `recommend_products` WHERE id != $id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // lấy ra các dữ liệu sản phẩm hiện tại
        $sql = "SELECT * FROM `recommend_products` WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        $arrTuSo = [];
        $arrMauSo = [];
        $arrKetQua = [];
        // tính tử số
        foreach ($result as $value) {
            $tuSo = ($product['JIMMY CHOO'] * $value['JIMMY CHOO']) + ($product['Dolce & Gabbana'] * $value['Dolce & Gabbana']) + ($product['Yves Saint Laurent'] * $value['Yves Saint Laurent']) + ($product['Dior'] * $value['Dior']) + ($product['Versace'] * $value['Versace']) + ($product['Giorgio'] * $value['Giorgio']) + ($product['Montblanc'] * $value['Montblanc']) + ($product['Valentino'] * $value['Valentino']) + ($product['Jo Malone'] * $value['Jo Malone']) + ($product['CHANEL'] * $value['CHANEL']) + ($product['origin_My'] * $value['origin_My']) + ($product['origin_Y'] * $value['origin_Y']) + ($product['origin_Phap'] * $value['origin_Phap']) + ($product['origin_Anh'] * $value['origin_Anh']) + ($product['category_man'] * $value['category_man']) + ($product['category_women'] * $value['category_women']) + ($product['rating'] * (1 / 10) * $value['rating'] * (1 / 10));
            array_push($arrTuSo, [$tuSo, $value['id']]);
        }
        // tính mẫu số
        foreach ($result as $value) {
            $mauSo = sqrt(($value['JIMMY CHOO'] + $value['Dolce & Gabbana'] + $value['Yves Saint Laurent'] + $value['Dior'] + $value['Versace'] + $value['Giorgio'] + $value['Montblanc'] + $value['Valentino'] + $value['Jo Malone'] + $value['CHANEL'] +  $value['origin_My'] + $value['origin_Y'] + $value['origin_Phap'] + $value['origin_Anh'] + $value['category_man'] + $value['category_women'] + pow($value['rating'] * 1 / 10, 2))) * sqrt(($product['JIMMY CHOO'] + $product['Dolce & Gabbana'] + $product['Yves Saint Laurent'] + $product['Dior'] + $product['Versace'] + $product['Giorgio'] + $product['Montblanc'] + $product['Valentino'] + $product['Jo Malone'] + $product['CHANEL'] +  $product['origin_My'] + $product['origin_Y'] + $product['origin_Phap'] + $product['origin_Anh'] + $product['category_man'] + $product['category_women'] + pow($product['rating'] * 1 / 10, 2)));
            array_push($arrMauSo, [$mauSo, $value['id']]);
        }
        $i = 0;
        // var_dump($tu)
        foreach ($arrTuSo as $value) {
            $kq = $value[0] / $arrMauSo[$i][0];
            array_push($arrKetQua, [$kq, $value[1]]);
            $i++;
        }

        // sắp xếp tăng dần từ bé đến lớn
        rsort($arrKetQua);
        // lấy ra thông tin các sản phẩm đã sắp xếp
        $arr_products = [];
        foreach ($arrKetQua as $value) {
            $sql = "SELECT DISTINCT products.id,products.name_product,products.name_producer,products.origin,products.description,products.category,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM `products`,product_detail WHERE product_detail.capacity = '100ml' AND products.id = product_detail.id_product AND products.id = " . $value[1];
            $stmt = $this->conn->query($sql);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            array_push($arr_products, $product);
        }
        return $arr_products;
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

    //đăng nhập
    public function login($userName, $password)
    {
        $user = $userName;
        $pass = $password;

        $sql = "SELECT users.id,users.user,users.email, customer.name, customer.date_of_birth,customer.number_phone,customer.sex,customer.address FROM `users`, customer Where user ='$user' AND password = '$pass' AND users.id = customer.id_user";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function checkUser($userName)
    {
        $user = $userName;

        $sql = "SELECT * FROM `users` Where user  ='$user'";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateUser($name, $phone, $email, $address, $password, $sex, $dateOfBirth)
    {
        $id = $_SESSION['user']['id'];
        $sql = "UPDATE customer SET name = '$name', number_phone ='$phone', address ='$address', date_of_birth ='$dateOfBirth', sex ='$sex' WHERE id_user = '$id'";
        $stmt = $this->conn->query($sql);

        $sql = "UPDATE users SET email='$email',password='$password' WHERE id= '$id'";
        $stmt = $this->conn->query($sql);
    }

    public function checkUserTonTaiChua($user)
    {
        $sql = "SELECT * FROM `users` WHERE user = '$user'";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function singup($user, $name, $phone, $email, $address, $pass1, $sex, $birthday)
    {
        $sql = "INSERT INTO users (user, email, password)
                VALUES ('$user','$email','$pass1');";
        $stmt = $this->conn->query($sql);

        $sql = "SELECT MAX(id) AS id FROM users";
        $stmt = $this->conn->query($sql);
        $id_user = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_user =  $id_user['id'];

        $sql = "INSERT INTO customer (id_user, name,date_of_birth,address,number_phone,sex)
        VALUES ('$id_user','$name','$birthday','$address','$phone','$sex');";
        $stmt = $this->conn->query($sql);
    }

}
