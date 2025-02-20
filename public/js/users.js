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
    let userAreaUrl = "";

    // ✅ Al cambiar de área, cargar los cargos disponibles
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

        console.log(`📌 Cargando usuario con ID: ${userId}`);
        await loadAreas();

        // **Obtener el Área y Cargo del Usuario**
        
        console.log("📌 Consultando área y cargo con URL:", userAreaUrl); // ✅ Debug
        try {
            let response = await fetch(userAreaUrl);
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
            let data = await response.json();
            console.log("📌 Área y cargo del usuario:", data);

            selectArea.value = data.areas;
            await loadPositions(data.areas);
            selectPosition.value = data.positions;

        } catch (error) {
            console.error("❌ Error al obtener el área y cargo del usuario:", error);
        }

        // Mostrar el modal y el fondo semitransparente
        editModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
    };
    // Función para cerrar el modal de edición
    window.closeDetailsModal = function () {
        editModal.classList.add("hidden");
        overlay.classList.add("hidden");
    };


    console.log("📌 Consultando área y cargo con URL:", userAreaUrl); // ✅ Debug

    // ✅ Función para cargar todas las áreas
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
            console.error("❌ Error al obtener áreas:", error);
        }
    }

    // ✅ Cargar Cargos según Área
    // ✅ Función para cargar posiciones según área seleccionada
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
            console.error("❌ Error al obtener posiciones:", error);
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
        let areaId = document.getElementById("NUarea").value;  // ✅ Definir correctamente
        let areaText = document.getElementById("NUarea").selectedOptions[0].text;
        let positionId = document.getElementById("NUposition").value;  // ✅ Definir correctamente
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
        let url = `${possi}/${selectArea.value}`;
        try {
            let response = await fetch(url);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            let data = await response.json();
            // Limpiar opciones previas
            selectPosition.innerHTML = '<option value="">Selecciona un cargo</option>';
            // Agregar nuevas opciones al select
            data.forEach(position => {
                let option = document.createElement("option");
                option.value = position.id;
                option.textContent = position.name; // 
                selectPosition.appendChild(option);
            });


        } catch (error) {
            console.error(" Error al obtener posiciones:", error);
        }
    }





    // DELETEEEEEEEE-------

    // window.openModal = function (button) {
    //     let deleteUrl = button.getAttribute("data-url");
    //     if (!deleteUrl) {
    //         console.error("❌ Error: No se encontró la URL de eliminación.");
    //         return;
    //     }
    //     deleteForm.setAttribute("action", deleteUrl);
    //     deleteModal.classList.remove("hidden");
    //     overlay.classList.remove("hidden");
    // };



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
        if (successModalMessage && successModal) {
            successModalMessage.innerHTML = message;
            successModal.classList.remove("hidden");
            overlay.classList.remove("hidden");
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
    // DELETE
    window.openModal = function (button) {
        let deleteUrl = button.getAttribute("data-url");
        if (!deleteUrl) {
            console.error("❌ Error: No se encontró la URL de eliminación.");
            return;
        }
        document.getElementById("deleteForm").setAttribute("action", deleteUrl);
        document.getElementById("deleteModal").classList.remove("hidden");
        document.getElementById("modalOverlay").classList.remove("hidden");
    };



    window.closeModal = function () {
        deleteModal.classList.add("hidden");
        overlay.classList.add("hidden");
    };

});



