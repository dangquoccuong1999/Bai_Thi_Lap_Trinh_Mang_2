<?php

include_once 'Model/DBConnect.php';
include_once 'Model/AdminDB.php';
include_once 'Controller/ProductController.php';

class AdminController
{
    public $adminDB;

    public function __construct()
    {
        $adminDB = new AdminDB();
        $this->adminDB = $adminDB;
    }

    public function index()
    {
        $users = $this->adminDB->getAllUser();

        include 'View/admin.php';
    }

    public function update()
    {
        $users = $this->adminDB->getAllUser();

        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sex = $_POST['sex'];
            $phone = $_POST['number_phone'];
            $address = $_POST['address'];

            foreach ($users as $user) {
                if ($user['role'] != 1) {
                    if (!empty($email[$user['id']])) {
                        if (!empty($name[$user['id']])) {
                            if (!empty($sex[$user['id']])) {
                                if ($sex[$user['id']] == "nam" || $sex[$user['id']] == "Nam" || $sex[$user['id']] == "nữ" || $sex[$user['id']] == "Nữ" || $sex[$user['id']] == "Khác" || $sex[$user['id']] == "khác") {
                                    if (!empty($phone[$user['id']])) {
                                        if (is_numeric($phone[$user['id']]) && $phone[$user['id']] - (int) $phone[$user['id']] == 0) {
                                            if (!empty($address[$user['id']])) {                              
                                                $this->adminDB->updateUser($user['id'], $name[$user['id']], $phone[$user['id']], $email[$user['id']], $address[$user['id']], $sex[$user['id']]);
                                                $_SESSION['thongBaoCapNhatAdmin'] = "Bạn Đã Cập Nhật Thành Công";
                                            } else {
                                                $_SESSION['thongBaoCapNhatAdmin'] = "Địa Chỉ Của id " . $user['id'] . " Không Được Để Trống";
                                            }
                                        } else {
                                            $_SESSION['thongBaoCapNhatAdmin'] = "Số Điện Thoại Của id " . $user['id'] . " Không Đúng Định Dạng";
                                        }
                                    } else {
                                        $_SESSION['thongBaoCapNhatAdmin'] = "Số Điện Thoại Của id " . $user['id'] . " Không Được Để Trống";
                                    }
                                } else {
                                    $_SESSION['thongBaoCapNhatAdmin'] = "Giới Tính Của id " . $user['id'] . " Sai Định Dạng";
                                }
                            } else {
                                $_SESSION['thongBaoCapNhatAdmin'] = "Giới Tính Của id " . $user['id'] . " Không Được Để Trống";
                            }
                        } else {
                            $_SESSION['thongBaoCapNhatAdmin'] = "Name Của id " . $user['id'] . " Không Được Để Trống";
                        }
                    } else {
                        $_SESSION['thongBaoCapNhatAdmin'] = "Email Của id " . $user['id'] . " Không Được Để Trống";
                    }
                 
                }
            }
            header('Location: index.php?page=admin&user');
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->adminDB->delete($id);
            header('Location: index.php?page=admin&user');
        }
    }

    public function add()
    {
        if (isset($_POST['addUser'])) {
            $user = $_POST['user'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            $name = $_POST['name'];
            $birthday = $_POST['birthday'];
            $email = $_POST['email'];
            $phone = $_POST['number_phone'];
            $address = $_POST['address'];
            $sex = $_POST['sex'];

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
                                                $productController = new ProductController();
                                                $checkUser = $productController->productDb->checkUserTonTaiChua($user);

                                                if (empty($checkUser)) {
                                                    $productController->productDb->singup($user, $name, $phone, $email, $address, $pass1, $sex, $birthday);
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
        include 'View/adminAdd.php';
    }
}
