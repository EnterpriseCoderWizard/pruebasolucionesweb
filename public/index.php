<?php
require_once '../controllers/ProductController.php';

// Controlador
$controller = new ProductController();

// Acción por defecto
$action = $_GET['action'] ?? ''; 
$query = $_GET['query'] ?? '';


// Lógica del switch para manejar las acciones
switch ($action) {
    case 'sync':
        $controller->sync();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'search':        
        $controller->searchProducts($query);
        break;
    default:
        $controller->index();
        break;
}
