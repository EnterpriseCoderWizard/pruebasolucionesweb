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

    public function searchProducts($query) {      
        $query = trim($query); 
        $productModel = new ProductModel();
        $products = $productModel->searchProducts($query);  
    
        ob_start();
        if (empty($products)) {
            echo '<h3>Código SKU no encontrado.</h3>';
        } else {
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
        
        $tableHtml = ob_get_clean();
    
        echo $tableHtml;  // Output the HTML table
    }
    

    
}

?>
