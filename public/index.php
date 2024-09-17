<?php
require_once '../controllers/ProductController.php';

$controller = new ProductController();

$action = $_POST['action'] ?? '';

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
?>
