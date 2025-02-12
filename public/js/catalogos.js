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

            try {
                const response = await fetch(actionUrl, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                });

                const result = await response.json();

                if (response.ok) {
                    showSuccessModal("Registro exitoso");
                    this.reset(); // Limpiar formulario después de registrar
                } else {
                    showErrorModal(result.message || "Ocurrió un error. Inténtalo de nuevo.");
                }
            } catch (error) {
                showErrorModal("Error de conexión. Inténtalo más tarde.");
            }
        });
    });
});

// Función para mostrar el modal de éxito
function showSuccessModal(message) {
    document.getElementById("successModalMessage").textContent = message;
    document.getElementById("successModal").classList.remove("hidden");
    document.getElementById("modalOverlay").classList.remove("hidden");
}

// Función para mostrar el modal de error
function showErrorModal(message) {
    document.getElementById("errorModalMessage").textContent = message;
    document.getElementById("errorModal").classList.remove("hidden");
    document.getElementById("modalOverlay").classList.remove("hidden");
}

// Función para cerrar los modales
function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
    document.getElementById("modalOverlay").classList.add("hidden");
}




// document.addEventListener("DOMContentLoaded", function () {
//     // Seleccionamos todos los formularios dentro del contenedor principal
//     const forms = document.querySelectorAll("form");

//     forms.forEach((form) => {
//         form.addEventListener("submit", async function (event) {
//             event.preventDefault(); // Evitar la recarga de la página

//             const formData = new FormData(this);
//             const action = this.getAttribute("action");

//             try {
//                 const response = await fetch(action, {
//                     method: "POST",
//                     body: formData,
//                     headers: {
//                         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
//                     },
//                 });

//                 const result = await response.json();

//                 if (response.ok) {
//                     showModal("successModal", result.message || "Registro exitoso.");
//                     this.reset(); // Limpiar formulario tras éxito
//                 } else {
//                     showModal("errorModal", result.message || "Ocurrió un error.");
//                 }
//             } catch (error) {
//                 showModal("errorModal", "Error de conexión con el servidor.");
//             }
//         });
//     });
// });

// // Función para mostrar los modales dinámicamente
// function showModal(modalId, message) {
//     document.getElementById(modalId).classList.remove("hidden");
//     document.getElementById("modalOverlay").classList.remove("hidden");

//     if (modalId === "successModal") {
//         document.getElementById("successModalMessage").innerText = message;
//     } else if (modalId === "errorModal") {
//         document.getElementById("errorModalMessage").innerText = message;
//     }
// }

// // Función para cerrar modales
// function closeModal(modalId) {
//     document.getElementById(modalId).classList.add("hidden");
//     document.getElementById("modalOverlay").classList.add("hidden");
// }
