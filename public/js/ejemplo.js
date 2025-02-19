


document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ El script ejemplo.js ha sido cargado correctamente.");

    let modal = document.getElementById("editModal");
    let inputDescripcion = document.getElementById("descripcion");
    let inputId = document.getElementById("reporte_id"); // Campo oculto para el ID
    let btnGuardar = document.querySelector("#editModal button[type='submit']");
    let inputResponsables = document.getElementById("responsables");
    let selectModulos = document.getElementById("modulos");
    let inputEvidencia = document.getElementById("evidence"); // ✅ Se declara aquí




    document.querySelectorAll(".btn-editar").forEach(button => {
        button.addEventListener("click", function () {
            let descripcion = this.getAttribute("data-descripcion");
            let reporteId = this.getAttribute("data-id"); // Obtener ID del reporte
            let responsables = this.getAttribute("data-responsables");
            let systemId = this.getAttribute("data-system");

            console.log("Botón Editar presionado. ID:", reporteId, "Descripción:", descripcion, "Responsables:", responsables, "Sistema:", systemId);

            inputDescripcion.value = descripcion;
            inputId.value = reporteId; // Guardar ID en el campo oculto
            inputResponsables.value = responsables ?? ""; // Manejo de null
            obtenerAreas();
            obtenerModulos(systemId);

            modal.classList.remove("hidden");
            document.getElementById("modalOverlay").classList.remove("hidden");
        });
    });

    window.closeDetailsModal = function () {
        console.log("Cerrando modal...");
        modal.classList.add("hidden");
    };

    function obtenerModulos(systemId) {
        console.log("📌 Ejecutando obtenerModulos con ID del Sistema:", systemId);

        if (!systemId) {
            console.error("⚠️ No se encontró el ID del sistema.");
            return;
        }

        // Asegurar que el select está siendo referenciado correctamente
        let selectModulos = document.getElementById("modulos");
        if (!selectModulos) {
            console.error("❌ No se encontró el elemento <select> con id 'modulos'.");
            return;
        }

        fetch(`/AFAC-REPORTES-3/public/get-modules/${systemId}`)
            .then(response => response.json())
            .then(data => {
                console.log("📌 Módulos recibidos:", data);

                // Limpiar opciones previas
                selectModulos.innerHTML = '<option value="">Selecciona un módulo</option>';

                // Agregar las nuevas opciones
                data.forEach(modulo => {
                    let option = document.createElement("option");
                    option.value = modulo.id;
                    option.textContent = modulo.nombre;
                    selectModulos.appendChild(option);
                });

                console.log("✅ Opciones insertadas en el select.");
            })
            .catch(error => console.error("❌ Error al obtener módulos:", error));
    }
    function obtenerAreas() {
        let selectResponsables = document.getElementById("responsables");

        fetch(`/AFAC-REPORTES-3/public/get-areas`)
            .then(response => response.json())
            .then(data => {
                console.log("📌 Áreas recibidas:", data);

                // Limpiar opciones previas
                selectResponsables.innerHTML = '<option value="">Selecciona un área</option>';

                // Agregar las nuevas opciones
                data.forEach(area => {
                    let option = document.createElement("option");
                    option.value = area.id;
                    option.textContent = area.nombre;
                    selectResponsables.appendChild(option);
                });

                console.log("✅ Opciones insertadas en el select de responsables.");
            })
            .catch(error => console.error("❌ Error al obtener áreas:", error));
    }



    // Evento para el botón "Guardar"
    btnGuardar.addEventListener("click", function (event) {
        event.preventDefault(); // Evitar recargar la página

        let reporteId = inputId.value;
        let nuevaDescripcion = inputDescripcion.value;
        let nuevaResponsable = inputResponsables.value;
        let moduloSeleccionado = selectModulos.value;
        let evidenciaArchivo = inputEvidencia.files[0]; // Obtener la imagen seleccionada

        let formData = new FormData();
        formData.append("descripcion", nuevaDescripcion);
        formData.append("responsables", nuevaResponsable);
        formData.append("modulo", moduloSeleccionado);
        formData.append("evidence", evidenciaArchivo);
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

        console.log("📌 Enviando datos al servidor:", {
            descripcion: nuevaDescripcion,
            responsables: nuevaResponsable,
            modulo: moduloSeleccionado,
            evidence: evidenciaArchivo ? evidenciaArchivo.name : "No se seleccionó archivo"
        });

        fetch(`/AFAC-REPORTES-3/public/actualizar-reporte/${reporteId}`, {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log("✅ Reporte actualizado con éxito:", data);
                alert("Reporte actualizado correctamente.");
                modal.classList.add("hidden");
                location.reload();
            })
            .catch(error => console.error("❌ Error al actualizar reporte:", error));
    });
});




