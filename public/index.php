<?php
require_once '../controllers/ProductController.php';

<<<<<<< HEAD
// Controlador
$controller = new ProductController();

// Acción por defecto
$action = $_GET['action'] ?? ''; 
$query = $_GET['query'] ?? '';

=======
$controller = new ProductController();

$action = $_POST['action'] ?? ''; 
>>>>>>> ea4ccc19267c015b42f1f791a9760679a347990d


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
