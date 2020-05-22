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
        echo $name;
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
}
