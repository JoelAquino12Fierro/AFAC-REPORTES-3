document.addEventListener("DOMContentLoaded", function () {
    const editModal = document.getElementById("editModal");
    const overlay = document.getElementById("modalOverlay");
    const successModal = document.getElementById("successModal");
    const editForm = document.getElementById("editForm");
    const newModal = document.getElementById("newModal");
    const btNewUser = document.getElementById("newuser");
    const successModalMessage = document.getElementById("successModalMessage");
    const errorModal = document.getElementById("errorModal");
    const errorModalMessage = document.getElementById("errorModalMessage");
    const deleteModal = document.getElementById("deleteModal");
    const deleteForm = document.getElementById("deleteForm");
    const selectArea = document.getElementById("editArea");
    const selectPosition = document.getElementById("editPosition");
    const btn_edit = document.getElementById("btn_edit");
    let userAreaUrl = "";

    selectArea.addEventListener("change", async function () {
        let areaId = this.value;
        if (areaId) {
            await loadPositions(areaId);
        } else {
            selectPosition.innerHTML = '<option value="">Selecciona un cargo</option>';
        }
    });
    // MODIFY-----------------------------------------------------
    window.openDetailsModal = async function (button) {

        // Obtener los datos del usuario desde el botón
        const userId = button.getAttribute("data-id");
        let userAreaUrl = getUserAreaUrl.replace(':id', userId);
        let updateUrl = editUserUrl.replace(':id', userId); // Generar la URL de actualización
        //  Asignar la URL al formulario para que Laravel reciba el ID correcto
        document.getElementById("editForm").setAttribute("action", updateUrl);
        const userName = button.getAttribute("data-name");
        const userEmail = button.getAttribute("data-email");
        const userApeP = button.getAttribute("data-apeP");
        const userApeM = button.getAttribute("data-apeM");

        // Asignar los valores a los campos del formulario
        document.getElementById("userId").value = userId;
        document.getElementById("name").value = userName;
        document.getElementById("email").value = userEmail;
        document.getElementById("apeP").value = userApeP;
        document.getElementById("apeM").value = userApeM;
        document.getElementById("number").value = userId;


        await loadAreas();

        try {
            let response = await fetch(userAreaUrl);
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
            let data = await response.json();
            // Verificar si el usuario tiene un área asignada
            if (data.areas) {
                selectArea.value = data.areas;
                await loadPositions(data.areas);
            } else {
                selectArea.value = "";
                selectPosition.innerHTML = '<option value="">Selecciona un cargo</option>'; 
            }
            // Verificar si el usuario tiene un cargo asignado
            if (data.positions) {
                selectPosition.value = data.positions;
            }
        } catch (error) {
        }

        // Mostrar el modal y el fondo semitransparente
        editModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
    };
    document.getElementById("editForm").addEventListener("submit", async function (event) {
        event.preventDefault(); // Evitar recarga de la página
    
        let form = this;
        let userId = document.getElementById("userId").value; 
        let updateUrl = editUserUrl.replace(":id", userId); 
        let formData = new FormData(form);
    
        // Asegurar que Laravel reciba correctamente el método PUT
        formData.append("_method", "PUT");
    
        
    
        try {
            let response = await fetch(updateUrl, {
                method: "POST", 
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
            });
            let text = await response.text();
            try {
                let result = JSON.parse(text); // Intentar parsear JSON
                if (result.success) {
                    let userName = result.user_name || "Usuario";
                    closeDetailsModal();
                    showSuccessModal(` Usuario actualizado:<br><strong>${userName.toUpperCase()}</strong>`);
                } else {
                    showErrorModal(" Error al actualizar el usuario");
                }
            } catch (jsonError) {
                showErrorModal(" Error inesperado");
            }
        } catch (error) {
        
            showErrorModal(" No se pudo actualizar el usuario.");
        }
    });
    
    // Función para cerrar el modal de edición
    window.closeDetailsModal = function () {
        editModal.classList.add("hidden");
        overlay.classList.add("hidden");
    };

    // Carga areas
    async function loadAreas() {
        try {
            let response = await fetch(areaUrl);
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
            let data = await response.json();

            selectArea.innerHTML = '<option value="">Selecciona un departamento</option>';
            data.forEach(area => {
                let option = document.createElement("option");
                option.value = area.id;
                option.textContent = area.areas_name;
                selectArea.appendChild(option);
            });
        } catch (error) {

        }
    }


    async function loadPositions(areaId) {
        let url = getPositionsUrl.replace(':areaId', areaId);
        try {
            let response = await fetch(url);
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
            let data = await response.json();

            selectPosition.innerHTML = '<option value="">Selecciona un cargo</option>';
            data.forEach(position => {
                let option = document.createElement("option");
                option.value = position.id;
                option.textContent = position.name;
                selectPosition.appendChild(option);
            });
        } catch (error) {
        }
    }


    // ---------------------------------------------------------------------

    // NEW USER ---------------------------------------------
    window.newModal = async function () {
        newModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        await Areas();
    }

    window.closenewModal = function () {
        newModal.classList.add("hidden");
        overlay.classList.add("hidden");
    }

    btNewUser.addEventListener("click", async function (event) {
        event.preventDefault();
        let number = document.getElementById("NUnumber").value;
        let name = document.getElementById("NUname").value;
        let apeP = document.getElementById("NUapeP").value;
        let apeM = document.getElementById("NUapeM").value;
        let email = document.getElementById("NUemail").value;
        let password = document.getElementById("NUpassword").value.trim();
        let passwordc = document.getElementById("NUpasswordc").value.trim();
        let areaId = document.getElementById("NUarea").value;  
        let areaText = document.getElementById("NUarea").selectedOptions[0].text;
        let positionId = document.getElementById("NUposition").value;  
        let positionText = document.getElementById("NUposition").selectedOptions[0].text;
        // Validación básica
        if (!number || !name || !apeP || !email || !password || !passwordc || !areaId || !positionId) {
            showErrorModal(" Todos los campos son obligatorios.");
            return;
        }
        // Verificar que las contraseñas coinciden
        if (password !== passwordc) {
            showErrorModal("Las contraseñas no coinciden intentalo de nuevo");
            return;
        }
        let formData = new FormData();
        formData.append("number", number);
        formData.append("name", name);
        formData.append("apeP", apeP);
        formData.append("apeM", apeM);
        formData.append("email", email);
        formData.append("password", password);
        formData.append("password_confirmation", passwordc);
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
        let url = adduser;
        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Accept": "application/json"
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let userId = data.user_id;
                    let userName = data.user_name;
                    registerResponsibility(userId, userName, areaId, areaText, positionId, positionText);
                } else {
                    showErrorModal("Error al crear el usuario.");
                }
            })
            .catch(error => console.error(" Error al crear usuario:", error));
    })

    async function registerResponsibility(userId, userName, areaId, areaText, positionId, positionText) {
        let url = responsibilitiesUrl;
        let formData = new FormData();
        formData.append("user_id", userId);
        formData.append("area_id", areaId);
        formData.append("position_id", positionId);
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Accept": "application/json"
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closenewModal();
                    showSuccessModal(`Usuario creado con éxito:<br>
                        <strong>${userName.toUpperCase()}</strong><br>  
                        Departamento: <strong>${areaText.toUpperCase()}</strong><br>  
                        Cargo: <strong>${positionText.toUpperCase()}</strong>`);
                } else {
                    showErrorModal("Error al registrar la responsabilidad.");
                }
            })
            .catch(error => console.error(" Error al registrar responsibility:", error));
    }
    async function Areas() {
        let selectArea = document.getElementById("NUarea");
        try {
            let response = await fetch(area);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            let data = await response.json();
            // Limpiar opciones previas
            selectArea.innerHTML = '<option value="">Selecciona un departamento</option>';
            // Agregar las nuevas opciones
            data.forEach(areaItem => {
                let option = document.createElement("option");
                option.value = areaItem.id;
                option.textContent = areaItem.areas_name;
                selectArea.appendChild(option);
            });
        } catch (error) {
            console.error("Error al obtener áreas:", error);
        }
    }


    async function Positions(areaId) {
        let selectPosition = document.getElementById("NUposition");
        let url = `${possi}/${areaId}`; 
    
        try {
            let response = await fetch(url);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            let data = await response.json();
    
            selectPosition.innerHTML = '<option value="">Selecciona un cargo</option>';
    
            data.forEach(position => {
                let option = document.createElement("option");
                option.value = position.id;
                option.textContent = position.name;
                selectPosition.appendChild(option);
            });
        } catch (error) {        
        }
    }

    document.getElementById("NUarea").addEventListener("change", async function () {
        let areaId = this.value;
        if (areaId) {
            await Positions(areaId);
        } else {
            document.getElementById("NUposition").innerHTML = '<option value="">Selecciona un cargo</option>';
        }
    });

    // Para eliminar
    deleteForm.addEventListener("submit", function (event) {
        event.preventDefault();

        let deleteUrl = deleteForm.getAttribute("action");

        fetch(deleteUrl, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Accept": "application/json"
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal();
                    showSuccessModal(`Usuario eliminado correctamente.`);
                } else {
                    showErrorModal(" Error al eliminar usuario.");
                }
            })
            .catch(error => console.error(" Error al eliminar usuario:", error));
    });

    // EXITO------------------------------------------

    window.showSuccessModal = function (message) {
        let successModal = document.getElementById("successModal");
        let successModalMessage = document.getElementById("successModalMessage");
    
        if (successModal && successModalMessage) {
            successModalMessage.innerHTML = message; 
            successModal.classList.remove("hidden");
            overlay.classList.remove("hidden");
        } else {
            
        }
    };

    window.closeSuccessModal = function () {
        successModal.classList.add("hidden");
        overlay.classList.add("hidden");
        location.reload(); // Recargar la página para ver los cambios
    };
    // -----------------------
    // WRONG--------------------------------------------

    // Open
    window.showErrorModal = function (message) {
        errorModalMessage.innerHTML = message;
        errorModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
    }

    // Close
    window.closeErrorModal = function () {
        errorModal.classList.add("hidden");
        // overlay.classList.add("hidden");
        // location.reload(); // Recargar la página para ver los cambios
    };
    // ---------------------------------------
    // DELETE
    window.openModal = function (button) {
        let deleteUrl = button.getAttribute("data-url");
        if (!deleteUrl) {

            return;
        }
        document.getElementById("deleteForm").setAttribute("action", deleteUrl);
        document.getElementById("deleteModal").classList.remove("hidden");
        document.getElementById("modalOverlay").classList.remove("hidden");
    };
    // Close
    window.closeModal = function () {
        deleteModal.classList.add("hidden");
        overlay.classList.add("hidden");
    };

});



