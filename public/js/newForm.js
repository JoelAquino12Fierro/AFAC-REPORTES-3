
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registroForm").addEventListener("submit", async function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        try {
            let response = await fetch(addReportUrl, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
            });

            let result = await response.json();

            if (response.ok) {
                document.getElementById("successModalMessage").textContent = result.folio;
                showModal("successModal");
            } else {
                document.getElementById("errorModalMessage").textContent = result.message || "Hubo un error.";
                showModal("errorModal");
            }
        } catch (error) {
            document.getElementById("errorModalMessage").textContent = "Error de conexión.";
            showModal("errorModal");
        }
    });

    function showModal(modalId) {
        document.getElementById("modalOverlay").classList.remove("hidden");
        document.getElementById(modalId).classList.remove("hidden");
    }

    window.closeModal = function (modalId) {
        document.getElementById("modalOverlay").classList.add("hidden");
        document.getElementById(modalId).classList.add("hidden");
    };
});

