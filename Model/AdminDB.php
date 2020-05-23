<?php


include_once 'DBConnect.php';

class AdminDB
{
    public $conn;

    public function __construct()
    {
        $conn = new DBConnect();
        $this->conn = $conn->connect();
    }

    public function updateUser($id, $name, $phone, $email, $address, $sex)
    {
        $sql = "UPDATE users SET  email = '$email' where id = '$id'";
        $stmt = $this->conn->query($sql);

        $sql = "UPDATE customer SET  name = '$name', address = '$address',number_phone = '$phone', sex = '$sex'  where id_user = '$id'";
        $stmt = $this->conn->query($sql);
    }

    public function getAllUser()
    {
        $sql = "SELECT users.id,users.user,users.role,users.password,users.email, customer.name, customer.date_of_birth,customer.number_phone,customer.sex,customer.address 
                FROM `users`, customer Where users.id = customer.id_user";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM customer WHERE id_user = $id;";
        $stmt = $this->conn->query($sql);

        $sql = "DELETE FROM users WHERE id = $id;";
        $stmt = $this->conn->query($sql);
    }

    public function getAllProducts()
    {
        $sql = "SELECT DISTINCT products.id,products.name_product,products.name_producer,products.origin,products.description,products.category,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM `products`,product_detail WHERE product_detail.capacity = '100ml' AND products.id = product_detail.id_product";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function updateProduct($id, $name_product, $name_producer, $origin, $description, $category, $img_product, $price, $capacity, $quantity_number)
    {
        $sql = "UPDATE products SET name_product = '$name_product',name_producer = '$name_producer',origin = '$origin',description = '$description', category = '$category',img_product = '$img_product' where id = '$id'";
        $stmt = $this->conn->query($sql);

        $sql = "UPDATE product_detail SET price = '$price' ,capacity = '$capacity' ,quantity_number = '$quantity_number' where id_product = '$id'";
        $stmt = $this->conn->query($sql);
    }

    public function adminAddProduct($name_product, $name_producer, $origin, $description, $category, $img_product, $price, $capacity, $quantity_number)
    {
        $dayHienTai = time();
        $sql = "INSERT INTO products (name_product,name_producer,origin,description,category,img_product,created_at)
                VALUES ('$name_product', '$name_producer', '$origin', '$description','$category','$img_product','$dayHienTai');";
        $stmt = $this->conn->query($sql);

        $sql = "SELECT MAX(id) AS id FROM `products`";
        $stmt = $this->conn->query($sql);
        $id_product = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_product = $id_product['id'];

        $sql = "INSERT INTO product_detail (price,capacity,quantity_number,id_product)
                VALUES ('$price','$capacity','$quantity_number','$id_product');";
        $stmt = $this->conn->query($sql);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product_detail WHERE id_product = $id";
        $stmt = $this->conn->query($sql);

        $sql = "DELETE FROM products WHERE id = $id";
        $stmt = $this->conn->query($sql);
    }

    public function sanPhamBanChayNhatThang($thang, $nam)
    {

        $sql = "SELECT sum(bill_details.quantity_number) as SL,products.id, products.name_product,products.name_producer,products.origin,products.description,products.category ,products.img_product, product_detail.price,product_detail.quantity_number ,product_detail.capacity
        FROM bill_details, bill, products, product_detail 
        WHERE product_detail.id_product = products.id and bill_details.id_bill =`bill`.`id` and products.id = bill_details.id_product and month(FROM_UNIXTIME(bill.date)) = $thang and year(FROM_UNIXTIME(bill.date))= $nam 
        GROUP by bill_details.id_product order by SL DESC LIMIT 5";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function sanPhamDoanhThuCaoNhatThang($thang, $nam)
    {

        $sql = "SELECT bill_details.id_product, sum(bill_details.quantity_number * product_detail.price) as Tong, products.name_product,products.name_producer,products.origin,products.description,products.category ,products.img_product, product_detail.price,product_detail.quantity_number, product_detail.capacity
         FROM bill_details, bill, products, product_detail WHERE product_detail.id_product = products.id and bill_details.id_bill =bill.id and products.id = bill_details.id_product and month(FROM_UNIXTIME(bill.date)) =$thang and year(FROM_UNIXTIME(bill.date))=$nam 
        GROUP by bill_details.id_product order by Tong DESC LIMIT 5";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function sanPhamMoi()
    {       
        $sql = "SELECT products.id,products.name_product,products.name_producer,products.origin,products.description,products.description,products.category ,products.img_product,product_detail.price,product_detail.capacity,product_detail.quantity_number FROM products, product_detail WHERE products.id= product_detail.id_product AND products.created_at > (UNIX_TIMESTAMP(now()) -24*3600*15) limit 5";
        $stmt = $this->conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function khachHangMuaNhieuNhat($thang, $nam)
    {       
        $sql = "SELECT bill.id_customer, sum(bill_details.quantity_number) as tong, customer.name,customer.date_of_birth,customer.date_of_birth,customer.address,customer.number_phone,customer.sex FROM bill_details, bill,customer WHERE bill.id_customer = customer.id and bill_details.id_bill =bill.id and month(FROM_UNIXTIME(bill.date)) =$thang and year(FROM_UNIXTIME(bill.date))=$nam GROUP by bill.id_customer order by tong DESC LIMIT 5";
        $stmt = $this->conn->query($sql);
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $customer;
    }

    public function khachHangChuaMuaSanPhamNao()
    {       
        $sql = "SELECT * FROM customer WHERE id Not in (SELECT DISTINCT id_customer FROM `bill`)";
        $stmt = $this->conn->query($sql);
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $customer;
    }
}
