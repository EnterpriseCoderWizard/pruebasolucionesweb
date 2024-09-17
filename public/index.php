<?php
require_once '../controllers/ProductController.php';



// Controlador
$controller = new ProductController();


// Acción por defecto
$action = $_POST['action'] ?? ''; 

// Lógica del switch para manejar las acciones
switch ($action) {
    case 'sync':
        $controller->sync();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}
