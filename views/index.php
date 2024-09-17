<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        button {
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #007BFF;
            color: white;
        }

        .no-data {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Product Management</h1>

    <!-- Formulario para sincronizar y eliminar productos -->
    <form method="post" action="../public/index.php">
        <button type="submit" name="action" value="sync">Sincronizar productos</button>
        <button type="submit" name="action" value="delete">Eliminar productos</button>
    </form>

    <!-- Mostrar productos o mensaje de no hay datos -->
    <?php if (empty($products)): ?>
        <h3 class="no-data">No hay datos sincronizados</h3>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <!-- Mostrar los encabezados de las columnas dinámicamente -->
                    <?php foreach (array_keys($products[0]) as $key): ?>
                        <th><?php echo htmlspecialchars($key); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar los datos de los productos -->
                <?php foreach ($products as $product): ?>
                    <tr>
                        <?php foreach ($product as $field): ?>
                            <td><?php echo htmlspecialchars($field); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Cargar el archivo JavaScript -->
    <script src="../public/js/scripts.js"></script> 
</body>
</html>
