document.addEventListener("DOMContentLoaded", function () {
  // Seleccionamos los botones por su nombre y valor
  const syncButton = document.querySelector(
    'button[name="action"][value="sync"]'
  );
  const deleteButton = document.querySelector(
    'button[name="action"][value="delete"]'
  );

  // Manejar el clic en el botón de sincronizar productos
  if (syncButton) {
    syncButton.addEventListener("click", function (event) {
      // Confirmar antes de sincronizar productos
      if (!confirm("¿Estás seguro de que deseas sincronizar los productos?")) {
        event.preventDefault(); // Evita que el formulario se envíe si el usuario cancela
      }
    });
  }

  // Manejar el clic en el botón de eliminar productos
  if (deleteButton) {
    deleteButton.addEventListener("click", function (event) {
      // Confirmar antes de eliminar productos
      if (
        !confirm("¿Estás seguro de que deseas eliminar todos los productos?")
      ) {
        event.preventDefault(); // Evita que el formulario se envíe si el usuario cancela
      }
    });
  }
});
