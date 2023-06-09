<?php 

namespace Controllers;
use Models\ProductsModel;

require_once 'Models/ProductsModel.php';
class ProductController {
    public function getProducts() {
        $prodModel = new ProductsModel();
        $data = $prodModel->getAllData();
        echo $data;
    }

    public function deleteProduct($id){
        $prodModel = new ProductsModel();
        $prodModel->deleteProduct($id);
    }

    public function createProduct($sku,$name,$price,$type,$size,$weight,$height,$width,$lenght) {
        $prodModel = new ProductsModel();
        $prodModel->createProduct($sku,$name,$price,$type,$size,$weight,$height,$width,$lenght);
    }
}