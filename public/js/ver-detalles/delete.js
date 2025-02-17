
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("deleteModal");
    const overlay = document.getElementById("modalOverlay");
    const form = document.getElementById("deleteForm");
    const detailsModal = document.getElementById("verdetallesModal");

// FUNCION DEL MODAL ELIMINAR ABRIR
    window.openModal = function (button) {
        const deleteUrl = button.getAttribute("data-url"); // Obtener la URL del botón
        form.action = deleteUrl; // Asignar la URL al formulario

        // Mostrar modal y overlay
        modal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        document.body.classList.add("overflow-hidden"); //Se bloquea el scroll de la página

    };
    
// FUNCIONAL DEL MODAL ELIMINAR (CERRAR)
    window.closeModal = function () {
        modal.classList.add("hidden");
        overlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    };

    // ABRIR MODAL DE DETALLES
    window.openDetailsModal = function (button) {
        detailsModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    };
        // CERRAR MODAL DE DETALLES
        window.closeDetailsModal = function () {
            detailsModal.classList.add("hidden");
            overlay.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        };
});

