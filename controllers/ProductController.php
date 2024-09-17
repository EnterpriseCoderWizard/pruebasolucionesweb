<?php
require_once '../models/ProductModel.php';

class ProductController {
    public function index() {
        $productModel = new ProductModel(); 
        $products = $productModel->getAllProducts(); 

        include '../views/index.php';
    }

    public function sync() {
        $apiUrl = API_URL;
        $response = @file_get_contents($apiUrl); 
        if ($response === false) {
            die("Error fetching products from API");
        }
        $products = json_decode($response, true);

        if (!empty($products)) {
            $productModel = new ProductModel();
            $productModel->syncProducts($products);
        }

        header('Location: /index.php');
    }

    public function delete() {
        $productModel = new ProductModel();
        $productModel->deleteAllProducts(); 
        header('Location: /index.php');
    }
}
?>


