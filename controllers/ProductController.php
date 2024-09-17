<?php
require_once '../models/ProductModel.php';

class ProductController {
    public function index() {
        $productModel = new ProductModel();
        $productsTable = $this->getProductsTable();
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

        // Devuelve la tabla actualizada para AJAX
        echo $this->getProductsTable();
    }

    public function delete() {
        $productModel = new ProductModel();
        $productModel->deleteAllProducts();

        // Devuelve la tabla actualizada para AJAX
        echo $this->getProductsTable();
    }

    public function getProductsTable() {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
    
        ob_start();
        if (empty($products)) {
            echo '<h3>No hay datos sincronizados</h3>';
        } else {
            // Utiliza la clase 'table' y el encabezado 'thead-dark' o 'thead-light'
            echo '<table class="table">';
            echo '<thead class="thead-dark"><tr>';
            foreach (array_keys($products[0]) as $key) {
                echo '<th scope="col">' . htmlspecialchars($key) . '</th>';
            }
            echo '</tr></thead><tbody>';
            foreach ($products as $product) {
                echo '<tr>';
                foreach ($product as $field) {
                    echo '<td>' . htmlspecialchars($field) . '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody></table>';
        }
        return ob_get_clean();
    }
}

?>
