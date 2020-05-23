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
        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];

        include 'View/admin.php';
    }

    public function update()
    {
        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];

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
                                                //cập nhật
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
                            } else {
                                $thongBao = "Số điện thoại nhập vào phải là số !";
                            }
                        }
                    }
                }
            }
        }
        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];
        include 'View/adminAddUser.php';
    }

    public function adminProduct()
    {
        $products = $this->adminDB->getAllProducts();
        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];
        include 'View/adminProduct.php';
    }

    public function updateProduct()
    {
        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];

        $products = $this->adminDB->getAllProducts();

        if (isset($_POST['updateProduct'])) {
            $name_product = $_POST['name_product'];
            $name_producer = $_POST['name_producer'];
            $origin = $_POST['origin'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $img_product = $_POST['img_product'];
            $price = $_POST['price'];
            $id = $_POST['id'];
            $capacity = '100ml';
            $quantity_number = $_POST['quantity_number'];
            var_dump($id);
            for ($i = 1; $i <= count($products); $i++) {
                
                if ($name_product[$i] == "") {
                    $_SESSION['thongBaoUpdateSp'] = "Tên sản phẩm không được để trống";
                } else {
                    if ($name_producer[$i] == "") {
                        $_SESSION['thongBaoUpdateSp'] = "Tên nhà sản xuất không được để trống";
                    } else {
                        if ($origin[$i] == "") {
                            $_SESSION['thongBaoUpdateSp'] = "Nơi nhà sản xuất không được để trống";
                        } else {
                            if ($description[$i] == "") {
                                $_SESSION['thongBaoUpdateSp'] = "Mô tả không được để trống";
                            } else {
                                if ($category[$i] == "") {
                                    $_SESSION['thongBaoUpdateSp'] = "Thể loại không được để trống";
                                } else {
                                    if ($category[$i]  != "man" && $category[$i]  != "women") {
                                        $category[$i] == "khác";
                                    }
                                    if ($img_product[$i] == "") {

                                        $img_product[$i] = $products[$i - 1]['id'];
                                        if ($price[$i] == "") {
                                            $_SESSION['thongBaoUpdateSp'] = "Giá tiền không được để trống";
                                        } else {
                                            if (!is_numeric($price[$i])) {
                                                $_SESSION['thongBaoUpdateSp'] = "Giá tiền không đúng định dạng";
                                            } else {
                                                if ($quantity_number[$i] == "") {
                                                    $_SESSION['thongBaoUpdateSp'] = "Số lượng không được để trống";
                                                } else {
                                                    if ($quantity_number[$i] - (int) $quantity_number[$i] != 0) {
                                                        $_SESSION['thongBaoUpdateSp'] = "Số lượng không đúng định dạng";
                                                    } else {
                                                        
                                                        // $this->adminDB->updateProduct($id[$i], $name_product[$i], $name_producer[$i], $origin[$i], $description[$i], $category[$i], $img_product[$i], $price[$i], $capacity[$i], $quantity_number[$i]);
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        if ($price[$i] == "") {
                                            $_SESSION['thongBaoUpdateSp'] = "Giá tiền không được để trống";
                                        } else {
                                            if (!is_numeric($price[$i])) {
                                                $_SESSION['thongBaoUpdateSp'] = "Giá tiền không đúng định dạng";
                                            } else {
                                                if ($quantity_number[$i] == "") {
                                                    $_SESSION['thongBaoUpdateSp'] = "Số lượng không được để trống";
                                                } else {
                                                    if ($quantity_number[$i] - (int) $quantity_number[$i] != 0) {
                                                        $_SESSION['thongBaoUpdateSp'] = "Số lượng không đúng định dạng";
                                                    } else {

                                                        // $this->adminDB->updateProduct($id[$i], $name_product[$i], $name_producer[$i], $origin[$i], $description[$i], $category[$i], $img_product[$i], $price[$i], $capacity[$i], $quantity_number[$i]);
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
        }
        // header('Location: index.php?page=adminProduct&product');
    }

    public function adminAddProduct()
    {
        if (isset($_POST['addProduct'])) {
            $name_product = $_POST['name_product'];
            $name_producer = $_POST['name_producer'];
            $origin = $_POST['origin'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $img_product = $_POST['img_product'];
            $price = $_POST['price'];
            $capacity = "100ml";
            $quantity_number = $_POST['quantity_number'];

            if ($name_product == "") {
                $thongBao = "Tên sản phẩm không được để trống !";
            } else {
                if ($name_producer == "") {
                    $thongBao = "Tên nhà sản xuất không được để trống !";
                } else {
                    if ($origin == "") {
                        $thongBao = "Nơi sản xuất không được để trống !";
                    } else {
                        if ($description == "") {
                            $thongBao = "Mô tả không được để trống !";
                        } else {
                            if ($category == "") {
                                $thongBao = "Thể loại không được để trống !";
                            } else {
                                if ($category != "man" && $category != "women") {
                                    $category = "man";
                                }
                                if ($img_product == "") {
                                    $thongBao = "Đường dẫn hình ảnh không được để trống";
                                } else {
                                    if ($price == "") {
                                        $thongBao = "Giá tiền không được để trống";
                                    } else {
                                        if (!is_numeric($price)) {
                                            $thongBao = "Giá tiền không đúng định dạng";
                                        }
                                        if ($capacity == "") {
                                            $thongBao = "Dung tích không được để trống";
                                        } else {
                                            if ($quantity_number == "") {
                                                $thongBao = "Số lượng không được để trống";
                                            } else {
                                                if (!is_numeric($quantity_number)) {
                                                    $thongBao = "Số lượng không đúng định dạng";
                                                } else {
                                                    if ($quantity_number - (int) $quantity_number != 0) {
                                                        $thongBao = "Số lượng không đúng định dạng";
                                                    } else {
                                                        $img_product = "images/" . $img_product;

                                                        $this->adminDB->adminAddProduct($name_product, $name_producer, $origin, $description, $category, $img_product, $price, $capacity, $quantity_number);
                                                        $thongBao = "Thêm sản phẩm thành công";
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
        }
        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];
        include 'View/adminAddProduct.php';
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->adminDB->deleteProduct($id);
            header('Location: index.php?page=adminProduct&product');
        }
    }

    public function sanPhamBanChayNhatThang()
    {
        if (isset($_GET['thang']) && isset($_GET['nam'])) {
            $thang = $_GET['thang'];
            $nam =  $_GET['nam'];
            $products = $this->adminDB->sanPhamBanChayNhatThang($thang, $nam);

            $now = getdate();
            $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
            $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
            $currentWeek = $now["wday"] . ".";

            $year =  $now["year"];
        }
        include 'View/sanPhamBanChayNhatThang.php';
    }


    public function sanPhamDoanhThuCaoNhatThang()
    {
        if (isset($_GET['thang']) && isset($_GET['nam'])) {
            $thang = $_GET['thang'];
            $nam =  $_GET['nam'];
            $products = $this->adminDB->sanPhamDoanhThuCaoNhatThang($thang, $nam);

            $now = getdate();
            $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
            $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
            $currentWeek = $now["wday"] . ".";

            $year =  $now["year"];
        }
        include 'View/sanPhamDoanhThuCaoNhatThang.php';
    }

    public function sanPhamMoi()
    {
        $products = $this->adminDB->sanPhamMoi();
        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];
        include 'View/sanPhamMoi.php';
    }

    public function khachHangMuaNhieuNhat()
    {
        if (isset($_GET['thang']) && isset($_GET['nam'])) {
            $thang = $_GET['thang'];
            $nam =  $_GET['nam'];
            $customers = $this->adminDB->khachHangMuaNhieuNhat($thang, $nam);

            $now = getdate();
            $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
            $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
            $currentWeek = $now["wday"] . ".";

            $year =  $now["year"];
        }
        include 'View/khachHangMuaNhieuNhat.php';
    }

    public function khachHangChuaMuaSanPhamNao()
    {
        $customers = $this->adminDB->khachHangChuaMuaSanPhamNao();

        $now = getdate();
        $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
        $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
        $currentWeek = $now["wday"] . ".";

        $year =  $now["year"];
        include 'View/khachHangChuaMuaSanPhamNao.php';
    }
}
