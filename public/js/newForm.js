document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registroForm");

    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        let formData = new FormData(form);

        try {
            let response = await fetch(addReportUrl, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            });

            let result = await response.json();

            if (result.status === "success") {
                document.getElementById("successModalMessage").innerText = result.folio;
                document.getElementById("successModal").classList.remove("hidden");
            } else {
                document.getElementById("errorModalMessage").innerText = result.message;
                document.getElementById("errorModal").classList.remove("hidden");
            }
        } catch (error) {
            document.getElementById("errorModalMessage").innerText = "Hubo un error en la conexión.";
            document.getElementById("errorModal").classList.remove("hidden");
        }
    });
});

// Función para cerrar los modales
function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
}
