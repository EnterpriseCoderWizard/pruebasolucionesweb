<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon">
    <style>
        .form-inline {
            margin-top: 20px;
        }
        .form-inline .form-control {
            margin-left: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Gestionar Productos</h2>

        <form id="action-form" method="get" class="form-inline mb-3">
            <button type="button" name="action" value="sync" id="sync-button" class="btn btn-primary mr-2">Sincronizar productos</button>
            <button type="button" name="action" value="delete" id="delete-button" class="btn btn-danger mr-2">Eliminar productos</button>
            <input type="text" name="query" id="search-query" class="form-control mr-2" placeholder="Buscar producto por SKU...">
            <button type="button" id="search-button" class="btn btn-primary">Buscar</button>
        </form>

        <div id="table-container" class="table-responsive"></div>

        <div class="loader-container" style="display:none;">
            <div class="loader"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../public/js/scripts.js"></script>
</body>
</html>
