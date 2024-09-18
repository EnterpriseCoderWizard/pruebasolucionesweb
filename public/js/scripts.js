document.addEventListener("DOMContentLoaded", function () {
  const loaderContainer = document.querySelector(".loader-container");
  const searchButton = document.getElementById("search-button");
  const syncButton = document.getElementById("sync-button");
  const deleteButton = document.getElementById("delete-button");
  const actionForm = document.getElementById("action-form");
  const searchInput = document.getElementById("search-query");

  function showLoader() {
    loaderContainer.style.display = "block";
  }

  function hideLoader() {
    loaderContainer.style.display = "none";
  }

  function disableButtons() {
    searchButton.disabled = true;
    syncButton.disabled = true;
    deleteButton.disabled = true;
  }

  function enableButtons() {
    searchButton.disabled = false;
    syncButton.disabled = false;
    deleteButton.disabled = false;
  }

  function showError(message) {
    const tableContainer = document.getElementById("table-container");
    tableContainer.innerHTML = `<div class="alert alert-danger">${message}</div>`;
  }

  function performAction(action, query = "") {
    showLoader();
    disableButtons();

    const url = new URL("../public/index.php", window.location.href);
    if (query) url.searchParams.append("query", query);
    if (action) url.searchParams.append("action", action);

    fetch(url, {
      method: "GET",
    })
      .then((response) => response.text())
      .then((html) => {
        const tableContainer = document.getElementById("table-container");
        tableContainer.innerHTML = html;

        searchInput.value = "";
      })
      .catch((error) => {
        console.error(`Error performing ${action} action:`, error);
      })
      .finally(() => {
        hideLoader();
        enableButtons();
      });
  }

  searchButton.addEventListener("click", function () {
    const query = searchInput.value.trim();
    if (query === "") {
      showError("El código SKU no puede estar vacío.");
    } else {
      performAction("search", query);
    }
  });

  syncButton.addEventListener("click", function () {
    performAction("sync");
  });

  deleteButton.addEventListener("click", function () {
    performAction("delete");
  });

  actionForm.addEventListener("submit", function (event) {
    event.preventDefault();
  });
});
