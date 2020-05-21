<?php
include_once 'Model/DBConnect.php';
include_once 'Model/ProductDB.php';

include_once 'Controller/ProductController.php';
session_start();

$productController = new ProductController();
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
    default:
        $productController->index();
        break;
}
