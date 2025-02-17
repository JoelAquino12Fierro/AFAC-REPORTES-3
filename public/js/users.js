

document.addEventListener("DOMContentLoaded", function () {
    const editModal = document.getElementById("editModal"); // Contenedor del modal
    const overlay = document.getElementById("modalOverlay"); // Fondo semitransparente
    const successModal = document.getElementById("successModal"); // Modal de éxito
    const editForm = document.getElementById("editForm"); // Formulario dentro del modal


    // Función para abrir el modal de edición
    window.openDetailsModal = function (button) {
        // Obtener los datos del usuario desde el botón
        const userId = button.getAttribute("data-id");
        const userName = button.getAttribute("data-name");
        const userEmail = button.getAttribute("data-email");
        const userRole = button.getAttribute("data-role");
        const userStatus = button.getAttribute("data-status");
        const userApeP = button.getAttribute("data-apeP");
        const userApeM = button.getAttribute("data-apeM");

        // Asignar los valores a los campos del formulario
        document.getElementById("userId").value = userId;
        document.getElementById("name").value = userName;
        document.getElementById("email").value = userEmail;
        document.getElementById("role").value = userRole;
        document.getElementById("status").value = userStatus;
        document.getElementById("apeP").value = userApeP;
        document.getElementById("apeM").value = userApeM;
        document.getElementById("number").value = userId;

        // Mostrar el modal y el fondo semitransparente
        editModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
    };

    // Función para cerrar el modal de edición
    window.closeDetailsModal = function () {
        editModal.classList.add("hidden");
        overlay.classList.add("hidden");
    };

    // Función para mostrar el modal de éxito
    function showSuccessModal() {
        successModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        location.reload(); // Recargar la página para ver los cambios
    }

    // Función para cerrar el modal de éxito
    window.closeSuccessModal = function () {
        successModal.classList.add("hidden");
        overlay.classList.add("hidden");
        location.reload(); // Recargar la página para ver los cambios
    };
});