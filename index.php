<?php
include_once 'Model/DBConnect.php';
include_once 'Model/ProductDB.php';
include_once 'Model/Product.php';
include_once 'Controller/ProductController.php';

$productController = new ProductController();
$page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;

switch ($page) {
    case 'add':
        // $controller->add();
        // break;
    case 'delete':
        // $controller->delete();
        break;
    case 'update':
        // $controller->update();
        break;
    case 'seach':
        // $controller->seach();
    default:
        $productController->index();
        break;
}
