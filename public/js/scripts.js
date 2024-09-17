document.addEventListener("DOMContentLoaded", function () {
  // Manejar el clic en el botón de sincronización
  document
    .querySelector('button[name="action"][value="sync"]')
    .addEventListener("click", function (event) {
      event.preventDefault();
      performAction("sync");
    });

  // Manejar el clic en el botón de eliminación
  document
    .querySelector('button[name="action"][value="delete"]')
    .addEventListener("click", function (event) {
      event.preventDefault();
      performAction("delete");
    });

  // Función para realizar una solicitud AJAX
  function performAction(action) {
    fetch("../public/index.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        action: action,
      }),
    })
      .then((response) => response.text())
      .then((html) => {
        document.getElementById("table-container").innerHTML = html;
      })
      .catch((error) =>
        console.error(`Error performing ${action} action:`, error)
      );
  }
});
