<?php
include_once 'Model/DBConnect.php';
include_once 'Model/AdminDB.php';

include_once 'Controller/ProductController.php';
include_once 'Controller/AdminController.php';

session_start();

$productController = new ProductController();
$adminController = new AdminController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

switch ($page) {
    case 'updateUser':
        $productController->updateUser();
        break;
    case 'userProfile':
        $productController->userProfile();
        break;
    case 'login':
        $productController->login();
        break;
    case 'shop':
        $productController->shop();
    case 'single_product':
        $productController->singleProduct();
        break;
    case 'cart':
        $productController->cart();
        break;
    case 'addCartToShop':
        $productController->addCartToShop();
        break;
    case 'logout':
        $productController->logout();
        break;
    case 'checkOut':
        $productController->checkOut();
        break;
    case 'dangKi':
        $productController->dangKi();
        break;
    case 'xoaSanPham':
        $productController->xoaSanPham();
        break;
    case 'admin':
        $adminController->index();
        break;
    case 'adminUpdate':
        $adminController->update();
        break;
    case 'adminDelete':
        $adminController->delete();
        break;
    case 'adminAdd':
        $adminController->add();
        break;
    case 'adminProduct':
        $adminController->adminProduct();
        break;
    case 'adminUpdateProduct':
        $adminController->updateProduct();
        break;
    case 'adminUpdateProduct':
        $adminController->updateProduct();
        break;
    case 'adminAddProduct':
        $adminController->adminAddProduct();
        break;
    case 'addProduct':
        $adminController->adminAddProduct();
        break;
    case 'adminDeleteProduct':
        $adminController->deleteProduct();
        break;
    case 'sanPhamBanChayThang':
        $adminController->sanPhamBanChayNhatThang();
        break;
    case 'sanPhamDoanhThuCaoNhatThang':
        $adminController->sanPhamDoanhThuCaoNhatThang();
        break;
    case 'sanPhamMoi':
        $adminController->sanPhamMoi();
        break;
    case 'khachHangMuaNhieuNhat':
        $adminController->khachHangMuaNhieuNhat();
        break;
    default:
        $productController->index();
        break;
}
