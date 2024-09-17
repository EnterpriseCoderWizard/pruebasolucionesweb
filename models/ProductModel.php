<?php
require_once '../database/database.php';

class ProductModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection(); // Asegúrate de que 'Database::getConnection()' devuelva la conexión PDO
    }

    public function syncProducts($products) {
        // Eliminar la tabla y volver a crearla
        $this->resetTable();

        // Preparar la consulta de inserción
        $stmt = $this->pdo->prepare("
            INSERT INTO producto (
                id, name, slug, permalink, date_created, date_modified, type, status, featured, catalog_visibility,
                description, short_description, sku, price, regular_price, sale_price, date_on_sale_from, 
                date_on_sale_from_gmt, date_on_sale_to, date_on_sale_to_gmt, on_sale, purchasable, 
                total_sales, is_virtual, downloadable, download_limit, download_expiry, external_url, button_text, 
                tax_status, tax_class, manage_stock, stock_quantity, backorders, backorders_allowed, backordered, 
                low_stock_amount, sold_individually, weight, dimensions, shipping_required, 
                shipping_taxable, shipping_class, shipping_class_id, reviews_allowed, average_rating, rating_count,
                upsell_ids, cross_sell_ids, parent_id, purchase_note, categories
            ) VALUES (
                :id, :name, :slug, :permalink, :date_created, :date_modified, :type, :status, :featured, :catalog_visibility,
                :description, :short_description, :sku, :price, :regular_price, :sale_price, :date_on_sale_from, 
                :date_on_sale_from_gmt, :date_on_sale_to, :date_on_sale_to_gmt, :on_sale, :purchasable, 
                :total_sales, :is_virtual, :downloadable, :download_limit, :download_expiry, :external_url, :button_text, 
                :tax_status, :tax_class, :manage_stock, :stock_quantity, :backorders, :backorders_allowed, :backordered, 
                :low_stock_amount, :sold_individually, :weight, :dimensions, :shipping_required, 
                :shipping_taxable, :shipping_class, :shipping_class_id, :reviews_allowed, :average_rating, :rating_count,
                :upsell_ids, :cross_sell_ids, :parent_id, :purchase_note, :categories
            )
        ");

        // Ejecutar la inserción para cada producto
        foreach ($products as $product) {
            $stmt->execute([
                ':id' => $product['id'], // Cambié de '->' a '[]' porque json_decode($response, true) devuelve un array
                ':name' => $product['name'],
                ':slug' => $product['slug'],
                ':permalink' => $product['permalink'],
                ':date_created' => $product['date_created'],
                ':date_modified' => $product['date_modified'],
                ':type' => $product['type'],
                ':status' => $product['status'],
                ':featured' => $product['featured'],
                ':catalog_visibility' => $product['catalog_visibility'],
                ':description' => $product['description'],
                ':short_description' => $product['short_description'],
                ':sku' => $product['sku'],
                ':price' => $product['price'],
                ':regular_price' => $product['regular_price'],
                ':sale_price' => $product['sale_price'],
                ':date_on_sale_from' => $product['date_on_sale_from'],
                ':date_on_sale_from_gmt' => $product['date_on_sale_from_gmt'],
                ':date_on_sale_to' => $product['date_on_sale_to'],
                ':date_on_sale_to_gmt' => $product['date_on_sale_to_gmt'],
                ':on_sale' => $product['on_sale'],
                ':purchasable' => $product['purchasable'],
                ':total_sales' => $product['total_sales'],
                ':is_virtual' => $product['virtual'], 
                ':downloadable' => $product['downloadable'],
                ':download_limit' => $product['download_limit'],
                ':download_expiry' => $product['download_expiry'],
                ':external_url' => $product['external_url'],
                ':button_text' => $product['button_text'],
                ':tax_status' => $product['tax_status'],
                ':tax_class' => $product['tax_class'],
                ':manage_stock' => $product['manage_stock'],
                ':stock_quantity' => $product['stock_quantity'],
                ':backorders' => $product['backorders'],
                ':backorders_allowed' => $product['backorders_allowed'],
                ':backordered' => $product['backordered'],
                ':low_stock_amount' => $product['low_stock_amount'],
                ':sold_individually' => $product['sold_individually'],
                ':weight' => $product['weight'],
                ':dimensions' => json_encode($product['dimensions']),
                ':shipping_required' => $product['shipping_required'],
                ':shipping_taxable' => $product['shipping_taxable'],
                ':shipping_class' => $product['shipping_class'],
                ':shipping_class_id' => $product['shipping_class_id'],
                ':reviews_allowed' => $product['reviews_allowed'],
                ':average_rating' => $product['average_rating'],
                ':rating_count' => $product['rating_count'],
                ':upsell_ids' => json_encode($product['upsell_ids']),
                ':cross_sell_ids' => json_encode($product['cross_sell_ids']),
                ':parent_id' => $product['parent_id'],
                ':purchase_note' => $product['purchase_note'],
                ':categories' => json_encode($product['categories'])
            ]);
        }
    }

    private function resetTable() {
        // Eliminar la tabla si existe
        $this->pdo->exec("DROP TABLE IF EXISTS producto");

        // Crear la tabla nuevamente
        $this->pdo->exec("
            CREATE TABLE producto (
                id VARCHAR(255) PRIMARY KEY,
                name VARCHAR(255),
                slug VARCHAR(255),
                permalink VARCHAR(255),
                date_created DATETIME,
                date_modified DATETIME,
                type VARCHAR(255),
                status VARCHAR(255),
                featured TINYINT(1),
                catalog_visibility VARCHAR(255),
                description TEXT,
                short_description TEXT,
                sku VARCHAR(255),
                price DECIMAL(10, 2),
                regular_price DECIMAL(10, 2),
                sale_price DECIMAL(10, 2),
                date_on_sale_from DATETIME,
                date_on_sale_from_gmt DATETIME,
                date_on_sale_to DATETIME,
                date_on_sale_to_gmt DATETIME,
                on_sale TINYINT(1),
                purchasable TINYINT(1),
                total_sales INT,
                is_virtual TINYINT(1),
                downloadable TINYINT(1),
                download_limit INT,
                download_expiry INT,
                external_url VARCHAR(255),
                button_text VARCHAR(255),
                tax_status VARCHAR(255),
                tax_class VARCHAR(255),
                manage_stock TINYINT(1),
                stock_quantity INT,
                backorders VARCHAR(255),
                backorders_allowed TINYINT(1),
                backordered TINYINT(1),
                low_stock_amount INT,
                sold_individually TINYINT(1),
                weight DECIMAL(10, 2),
                dimensions JSON,
                shipping_required TINYINT(1),
                shipping_taxable TINYINT(1),
                shipping_class VARCHAR(255),
                shipping_class_id INT,
                reviews_allowed TINYINT(1),
                average_rating DECIMAL(3, 2),
                rating_count INT,
                upsell_ids JSON,
                cross_sell_ids JSON,
                parent_id VARCHAR(255),
                purchase_note TEXT,
                categories JSON
            )
        ");
    }

    public function getAllProducts() {
        $stmt = $this->pdo->query("SELECT * FROM producto");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAllProducts() {
        $this->pdo->exec("DELETE FROM producto");
    }
}
?>
