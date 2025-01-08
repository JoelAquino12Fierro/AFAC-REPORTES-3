document.addEventListener("DOMContentLoaded", function () {
    console.log("script cargado");
    const firstList = document.getElementById("firstList");
    const secondList = document.getElementById("secondList");

    const options = {
        desarrollo_estrategico: ["sistema de incidencias", "sistema de citas", "sistema medico"],
        recursos_humanos: ["Sistema de alta", "Sistema de baja", "Sistema financiero"],
        ventanilla: ["Pago", "Facturación", "Aclaración"]
    };

    firstList.addEventListener("change", function () {
        const selectedCategory = firstList.value;

        // Limpiar la lista secundaria
        secondList.innerHTML = "";

        // Si hay una categoría válida seleccionada
        if (selectedCategory && options[selectedCategory]) {
            options[selectedCategory].forEach(item => {
                const option = document.createElement("option");
                option.value = item;
                option.textContent = item;
                secondList.appendChild(option);
            });
        } else {
            const defaultOption = document.createElement("option");
            defaultOption.textContent = "--Selecciona una categoría primero--";
            secondList.appendChild(defaultOption);
        }
    });
});
