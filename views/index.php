<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <link rel="stylesheet" href="./styles/styles.css">    
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h1 class="centered">Product Management</h1>
        <form id="action-form" method="post" class="centered mb-3">
            <button type="submit" name="action" value="sync" id="sync-button" class="btn btn-primary mr-2">Sincronizar productos</button>
            <button type="submit" name="action" value="delete" id="delete-button" class="btn btn-danger">Eliminar productos</button>
        </form>

        <!-- Aquí estará el contenido dinámico de la tabla -->
        <div id="table-container" class="centered">
            <!-- La tabla de productos se cargará aquí -->
        </div>

        <!-- Loader -->
        <div class="loader-container">
            <div class="loader"></div>
        </div>
    </div>

    <script src="../public/js/scripts.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const loaderContainer = document.querySelector('.loader-container');
            const syncButton = document.getElementById('sync-button');
            const deleteButton = document.getElementById('delete-button');

            function showLoader() {
                loaderContainer.style.display = 'block';
            }

            function hideLoader() {
                loaderContainer.style.display = 'none';
            }

            function disableButtons() {
                syncButton.disabled = true;
                deleteButton.disabled = true;
            }

            function enableButtons() {
                syncButton.disabled = false;
                deleteButton.disabled = false;
            }

            function handleButtonClick(action) {
                return function (event) {
                    event.preventDefault();
                    disableButtons();
                    showLoader();
                    fetch("../public/index.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        body: new URLSearchParams({ action: action }),
                    })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("table-container").innerHTML = html;
                        hideLoader();
                    })
                    .catch(error => {
                        console.error(`Error ${action} products:`, error);
                        hideLoader();
                    })
                    .finally(() => {
                        enableButtons();
                    });
                };
            }

            syncButton.addEventListener("click", handleButtonClick("sync"));
            deleteButton.addEventListener("click", handleButtonClick("delete"));
        });
    </script>
</body>
</html>
