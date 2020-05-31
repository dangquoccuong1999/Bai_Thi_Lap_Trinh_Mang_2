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
        if (isset($_GET['theLoai'])) {
            if ($_GET['theLoai'] == 'nam') {
                $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
                $limit = 8;

                //TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
                $limit = 8;

                //TÍNH TOÁN TOTAL_PAGE VÀ START
                $total_records = $this->productDb->getTotalRecordsMan();

                $total_page = ceil($total_records[0]['total'] / $limit);
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $productPagination = $this->productDb->paginationLocTheoMan($current_page, $limit);
            } else if ($_GET['theLoai'] == 'nu') {
                $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
                $limit = 8;

                //TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
                $limit = 8;

                //TÍNH TOÁN TOTAL_PAGE VÀ START
                $total_records = $this->productDb->getTotalRecordsWomen();

                $total_page = ceil($total_records[0]['total'] / $limit);
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $productPagination = $this->productDb->paginationLocTheoWomen($current_page, $limit);
            }
        } else {
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
        }

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
        if (isset($_SESSION['user'])) {
            if (isset($_POST['addcart'])) {
                $quantity = $_POST['quantity'];
                $capacity = "100ml";
                $id = $_GET['id'];
                $product = $this->getSingleProduct()[0];
                if (is_numeric($quantity) && $quantity != "") {
                    if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) { // chưa có sản phẩm nào trong giỏ hàng
                        $product['qty'] = $quantity;
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
        } else {
            header('Location: index.php?page=login');
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

    // đăng nhập
    public function login()
    {
        if (isset($_REQUEST['submit'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if ($user != '' && $pass != '') {
                $data = $this->productDb->login($user, $pass);
                if (!empty($data)) {
                    $_SESSION['user'] =  $data;
                    if ($data['role'] == 0) {
                        header('Location: index.php');
                    } else {
                        header('Location: index.php?page=admin&user');
                    }
                } else {
                    if (!empty($this->productDb->checkUser($user))) {
                        $_SESSION['error'] = 'Đăng nhập sai';
                        include 'View/login.php';
                    } else {
                        $_SESSION['error'] = 'User không tồn tại';
                        include 'View/login.php';
                    }
                }
            } else {
                $_SESSION['error'] = 'Tài khoản mật khẩu không được để trống';
                include 'View/login.php';
            }
        } else {
            include 'View/login.php';
        }
    }

    public function userProfile()
    {

        include 'View/userProfile.php';
    }

    //khách hàng cập nhật thông tin cá nhân
    public function updateUser()
    {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sex = $_POST['sex'];
            $pass1 = $_POST['password'];
            $pass2 = $_POST['password2'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $birthday = $_POST['day'];
            if ($name == "") {
                $thongBao = "Tên không được để trống !";
            } else {
                if ($email == "") {
                    $thongBao = "Email không được để trống !";
                } else {
                    if ($sex == "") {
                        $thongBao = "Giới tính không được để trống !";
                    } else {
                        if ($sex != 'nam' || $sex != 'Nam' || $sex != 'nữ' || $sex != 'Nữ') {
                            $sex = "Khác";
                        }
                        if ($phone == "") {
                            $thongBao = "Số điện thoại không được để trống !";
                        } else {
                            if ($address == "") {
                                $thongBao = "Địa chỉ không được để trống !";
                            } else {
                                if ($birthday == "") {
                                    $thongBao = "Ngày sinh không được để trống !";
                                } else {
                                    if ($pass1 == "" || $pass2 == "") {
                                        $thongBao = "Mật khẩu không được để trống !";
                                    } else {
                                        if ($pass1 == $pass2) {
                                            if (strlen($pass1) >= 6) {
                                                $this->productDb->updateUser($name, $phone, $email, $address, $pass1, $sex, $birthday);
                                                $data = $this->productDb->login($_SESSION['user']['user'], $pass1);
                                                $_SESSION['user'] = $data;
                                                $thongBao = "Đã cập nhật thành công !";
                                            } else {
                                                $thongBao = "Mật khẩu phải có chiều dàn lớn hơn 5 kí tự";
                                            }
                                        } else {
                                            $thongBao = "Mật khẩu phải trùng nhau !";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            include 'View/userProfile.php';
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        header('Location: index.php');
    }

    public function checkOut()
    {
        if (!empty($_SESSION['cart'])) {
            $this->productDb->checkOut();
            $thongbao = "Bạn đã mua thành công";
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            unset($_SESSION['tongTien']);
        }
        include 'View/cart.php';
    }

    public function xoaSanPham()
    {
        $id = $_GET['id']; // lấy id sp cần xóa
        $qty = $_SESSION['cart'][$id]['qty'];
        $_SESSION['total'] -=  $qty;
        unset($_SESSION['cart'][$id]);
        header('Location: index.php?page=cart');
    }


    public function dangKi()
    {
        if (isset($_POST['submitSingUp'])) {
            $user = $_POST['user'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            $name = $_POST['name'];
            $birthday = $_POST['birthday'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $sex = $_POST['gender'];

            if ($name == "") {
                $thongBao = "Tên không được để trống !";
            } else {
                if ($email == "") {
                    $thongBao = "Email không được để trống !";
                } else {
                    if ($sex == "") {
                        $thongBao = "Giới tính không được để trống !";
                    } else {
                        if ($sex != 'nam' && $sex != 'Nam' && $sex != 'nữ' && $sex != 'Nữ') {
                            $sex = "Khác";
                        }
                        if ($phone == "") {
                            $thongBao = "Số điện thoại không được để trống !";
                        } else {
                            if (is_numeric($phone)) {
                                if ($phone - (int) $phone != 0) {
                                    $thongBao = "Số điện thoại không đúng định dạng !";
                                } else {
                                    if ($address == "") {
                                        $thongBao = "Địa chỉ không được để trống !";
                                    } else {
                                        if ($birthday == "") {
                                            $thongBao = "Ngày sinh không được để trống !";
                                        } else {
                                            if ($pass1 == "" || $pass2 == "") {
                                                $thongBao = "Mật khẩu không được để trống !";
                                            } else {
                                                if ($pass1 == $pass2) {
                                                    if (strlen($pass1) >= 6) {
                                                        $checkUser = $this->productDb->checkUserTonTaiChua($user);
                                                        if (empty($checkUser)) {
                                                            $this->productDb->singup($user, $name, $phone, $email, $address, $pass1, $sex, $birthday);
                                                            $thongBao = "Đã đăng kí thành công !";
                                                        } else {
                                                            $thongBao = "Tài khoản đã tồn tại";
                                                        }
                                                    } else {
                                                        $thongBao = "Mật khẩu phải có chiều dàn lớn hơn 5 kí tự";
                                                    }
                                                } else {
                                                    $thongBao = "Mật khẩu phải trùng nhau !";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        include 'View/singup.php';
    }
}
