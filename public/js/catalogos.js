// // Para ir mostrando cada formulario
function showForm(formId) {
    document.getElementById('area-form').classList.add('hidden');
    document.getElementById('module-form').classList.add('hidden');
    document.getElementById('system-form').classList.add('hidden');
    document.getElementById('create-module-form').classList.add('hidden');
    document.getElementById(formId).classList.remove('hidden');
}


document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");

    forms.forEach((form) => {
        form.addEventListener("submit", async function (event) {
            event.preventDefault(); // Prevenir el envío tradicional del formulario

            const formData = new FormData(this);
            const formId = this.id; // Obtener el ID del formulario
            const actionUrl = formRoutes[formId]; // Obtener la URL de acción desde formRoutes

            // Verificar si es el formulario de relación sistema-módulo
            if (formId === "f-module-sys-form") {
                // Extraer valores manualmente en JSON
                const systemId = document.getElementById("system").value;
                const moduleId = document.getElementById("module").value;

                // Construcción del JSON manualmente
                const requestData = JSON.stringify({
                    system: systemId,
                    module: moduleId
                });

                try {
                    const response = await fetch(actionUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: requestData
                    });

                    const result = await response.json();
                    console.log("Respuesta JSON del servidor:", result); // Verificar respuesta en consola

                    if (response.ok) {
                        showSuccessModal(result.message); // Pasar mensaje dinámico del backend
                        this.reset(); // Limpiar formulario después de registrar
                    } else {
                        showErrorModal(result.message || "Ocurrió un error. Inténtalo de nuevo.");
                    }
                } catch (error) {
                    showErrorModal("Error de conexión. Inténtalo más tarde.");
                }
            } else {
                // Envío normal para otros formularios con FormData
                try {
                    const response = await fetch(actionUrl, {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        },
                    });

                    const result = await response.json();
                    console.log("Respuesta JSON del servidor:", result); // Verificar respuesta en consola

                    if (response.ok) {
                        showSuccessModal(result.message);
                        this.reset();
                    } else {
                        showErrorModal(result.message || "Ocurrió un error. Inténtalo de nuevo.");
                    }
                } catch (error) {
                    showErrorModal("Error de conexión. Inténtalo más tarde.");
                }
            }
        });
    });
});


// Función para mostrar el modal de éxito
function showSuccessModal(message) {
    document.getElementById("successModalMessage").innerHTML = message; // Permitir HTML
    document.getElementById("successModal").classList.remove("hidden");
    document.getElementById("modalOverlay").classList.remove("hidden");
}

// Función para mostrar el modal de error
function showErrorModal(message) {
    console.log("Mensaje recibido:", message);
    document.getElementById("errorModalMessage").innerHTML = message;  // Permitir HTML
    document.getElementById("errorModal").classList.remove("hidden");
    document.getElementById("modalOverlay").classList.remove("hidden");
}

// Función para cerrar los modales
function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
    document.getElementById("modalOverlay").classList.add("hidden");
}






