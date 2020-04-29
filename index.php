<?php
include_once 'Model/DBConnect.php';
include_once 'Model/ProductDB.php';

include_once 'Controller/ProductController.php';

$productController = new ProductController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

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
    case 'single_product':
        $productController->singleProduct();
        break;
    case 'ok':
        echo 'ok';
        $productController->singleProduct();
        break;
    default:
        $productController->index();
        break;
}
