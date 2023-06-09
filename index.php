<?php

use Controllers\ProductController;

$route = isset($_GET['route']) ? $_GET['route'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: POST, OPTIONS'); 
    header('Access-Control-Allow-Headers: Content-Type'); 
    exit;
}

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'Controllers/ProductController.php';

$prodController = new ProductController();

switch($route) {
    case "getAllProducts":
       $prodController->getProducts();
       break;
    case "deleteProducts":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prodController = new ProductController();
            $id = $_POST['id'];
            $prodController->deleteProduct($id);
        } else {
            echo "Method not allowed";
        }
        break;
    case "createProduct":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prodController = new ProductController();
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $size = $_POST['size'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $width = $_POST['width'];
            $lenght = $_POST['length'];
            $prodController->createProduct($sku,$name,$price,$type,$size,$weight,$height,$width,$lenght);
        } else {
            echo "Method not allowed";
        }
        break;
}