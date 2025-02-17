
// document.addEventListener("DOMContentLoaded", function () {
//     const form = document.getElementById("registroForm");

//     if (!form) {
//         console.error("Error: No se encontró el formulario con id 'registroForm'");
//         return;
//     }
//     form.addEventListener("submit", async function (event) {
//         event.preventDefault();
//         console.log("Formulario enviado correctamente."); // Debugging
//     });
//     form.addEventListener("submit", async function (event) {
//         event.preventDefault(); // Evitar el envío por defecto
//         const formData = new FormData(this); // Capturar datos del formulario
//         try {
//             const response = await fetch(addReportUrl, { // Usar variable de Blade
//                 method: "POST",
//                 body: formData,
//                 headers: {
//                     "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
//                 }
//             });

//             const data = await response.json();
//             if (data.success) {
//                 // Mostrar modal de éxito
//                 showModal('successModal', ` ${data.folio}`);
//             } else {
//                 // Mostrar modal de error
//                 showModal('errorModal', 'Error al generar el reporte');
//             }
//         } catch (error) {
//             console.error("Error:", error);
//             // Mostrar modal de error en caso de fallo en la solicitud
//             showModal('errorModal', 'Ocurrió un error en la solicitud.');
//         }


//     });

//     // Función para mostrar el modal con el mensaje correspondiente
//     function showModal(modalId, message) {
//         const modal = document.getElementById(modalId);
//         const modalMessage = modal.querySelector(`#${modalId}Message`);
//         const overlay = document.getElementById('modalOverlay');
//         modalMessage.textContent = message;
//         modal.classList.remove("hidden");  // Mostrar modal
//         overlay.classList.remove("hidden"); //Fondo 

//     }

//     // Función para cerrar los modales
//     function closeModal(modalId) {
//         const modal = document.getElementById(modalId);
//         const overlay = document.getElementById('modalOverlay');
//         modal.classList.add("hidden");  // Ocultar modal
//         overlay.classList.add("hidden"); //FOndo
//     }

//     // Añadir la función de cerrar a los botones de los modales
//     const closeButtons = document.querySelectorAll('button[onclick^="closeModal"]');
//     closeButtons.forEach(button => {
//         button.addEventListener("click", function () {
//             const modalId = button.getAttribute("onclick").split("'")[1];
//             closeModal(modalId);
//         });
//     });
// });

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

