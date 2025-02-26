<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('ASIGNACIÓN DE ROLES') }}
        </h2>
    </x-slot>

    <body>
        <div class="py-12 bg-gray-100 min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                    <body>
                        <div class="px-10 py-10">
                            <div>
                                <form>
                                    <div
                                        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-50 p-4 rounded-t-lg border-b border-gray-300">

                                        <div class="relative">
                                            <label for="table-search"
                                                class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="text" id="table-search-users"
                                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Buscar Usuario">
                                        </div>
                                        <!-- boton para el modal de nuevo Rol -->
                                        <button type="button" onclick="OpenModalCrear()"
                                            class="mt-4 right-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-base font-semibold px-6 py-3 text-center inline-flex items-center shadow-lg">
                                            Nuevo Rol
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200">


                                <table class="w-full text-sm text-left text-gray-700" id="user-table">
                                    <thead class="w-full text-xs text-black uppercase">
                                        <tr>
                                            <th scope="col" class="w-1/2 px-6 py-3">Roles</th>
                                            <th class="w-1/2 px-4 py-3 text-center" colspan="2">acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody id="user-results" class="relative">
                                        @foreach ($roles as $role)
                                            <tr class="bg-white border-b hover:bg-gray-100 transition duration-300 ease-in-out">
                                                <td class="px-6 py-4 text-gray-900 font-medium">
                                                    {{ $role->name }}
                                                </td>
                                              
                                                <td class="px-4 py-4 text-center">
                                                    <form>
                                                    <button type="button" onclick="abrirModal('{{ $role->id }}', '{{ $role->name }}')"
                                                        class="font-medium text-blue-600 hover:underline">
                                                        Modificar
                                                    </button>
                                                    </form>
                                                </td>
                                                <td class="px-4 py-4 text-center">
                                                    <form>
                                                    <button type="button" onclick="abrirModalEliminar('{{ $role->id }}', '{{ $role->name }}')" 
                                                    class="font-medium text-red-600 hover:underline">
                                                        Eliminar
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </body>
                    {{--paginación--}}
                   
<div class="flex justify-center mt-4">
                <ul class="flex items-center space-x-2">
                    @if ($roles->hasPages())
                    <div class="flex space-x-1 justify-center mt-4">
                        {{-- Botón "Prev" --}}
                        @if ($roles->onFirstPage())
                        <button class="rounded-md border border-gray-300 py-2 px-3 text-center text-sm shadow-sm text-gray-600 bg-gray-200 cursor-not-allowed opacity-50">
                            Prev
                        </button>
                        @else
                        <a href="{{ $roles->previousPageUrl() }}" class="rounded-md border border-azul-secundario py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-azul-afac hover:text-white hover:bg-azul-afac hover:border-azul-afac focus:text-white focus:bg-azul-afac focus:border-azul-afac active:border-azul-afac active:text-white active:bg-azul-afac ml-2">
                            Prev
                        </a>
                        @endif

                        {{-- Números de Página --}}
                        @foreach ($roles->links()->elements[0] as $page => $url)
                        @if ($page == $roles->currentPage())
                        <a href="{{ $url }}" class="min-w-9 rounded-md bg-azul-afac py-2 px-3 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-azul-secundario focus:shadow-none active:bg-azul-secundario hover:bg-azul-secundario active:shadow-none ml-2">
                            {{ $page }}
                        </a>
                        @else
                        <a href="{{ $url }}" class="min-w-9 rounded-md border border-azul-secundario py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-azul-afac hover:text-white hover:bg-azul-afac hover:border-azul-afac focus:text-white focus:bg-azul-afac focus:border-azul-afac active:border-azul-afac active:text-white active:bg-azul-afac ml-2">
                            {{ $page }}
                        </a>
                        @endif
                        @endforeach

                        {{-- Botón "Next" --}}
                        @if ($roles->hasMorePages())
                        <a href="{{ $roles->nextPageUrl() }}" class="rounded-md border border-azul-secundario py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-azul-afac hover:text-white hover:bg-azul-afac hover:border-azul-afac focus:text-white focus:bg-azul-afac focus:border-azul-afac active:border-azul-afac active:text-white active:bg-azul-afac ml-2">
                            Next
                        </a>
                        @else
                        <button class="rounded-md border border-gray-300 py-2 px-3 text-center text-sm shadow-sm text-gray-600 bg-gray-200 cursor-not-allowed opacity-50">
                            Next
                        </button>
                        @endif
                    </div>
                    @endif
                </ul>
</div>
                    <!--    I  N   I   C   I   O       D   E       M   O   D   A   L   E   S   -->
                    

                    <!-- Modal -->
                    <!-- Modal A    C    T  U   A   L   I   Z   A   R       E   L       R   O   L (Oculto por defecto) -->
                        <div id="miModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                                        <!-- Contenido del Modal -->
                                <h2 class="text-lg text-center font-bold mb-4">Modificar Rol de Usuario</h2>

                                <form id="editForm" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Importante para actualizar registros -->
                                    <input type="hidden" id="rolId" name="rol_Id">

                                    <!-- Nombre del Usuario -->
                                    <label id="RolLabel" class="block text-gray-700 text-center font-semibold mb-2"></label>

                                    <!-- Nombre del Rol -->
                                    <label id="RolLabel" class="block text-gray-700 text-center font-semibold mb-2"></label>
                                    <input type="text" id="RoleName" name="role_name" class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Nuevo nombre del rol" required>


                                    <!-- Botón de Guardar Cambios -->
                                    <button type="submit" class="mt-4 bg-[#003764] text-white w-full p-4 rounded-lg hover:bg-[#002b4b]">
                                        Guardar Cambios
                                    </button>
                                </form>

                            </div>
                        </div>




                        <!-- MODAL ELIMINAR (oculto por defecto) -->
                        <div id="abrirModalEliminar" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                                <div class="flex flex-col items-center justify-center text-center">
                                    <div class="flex size-12 items-center justify-center rounded-full bg-[#e70909]/20 sm:size-16">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-6 sm:size-8 bi bi-plus-square" viewBox="0 0 16 16">
                                            <g fill="#da0000">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="mt-2 text-lg font-semibold text-gray-900">ELIMINAR ROL</p>
                                </div>
                                <p id="RolName" class="text-gray-600"></p>

                                <form id="deleteForm" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex justify-end mt-4">
                                        <button type="button" onclick="cerrarModalEliminar()" class="flex-1 mr-1 inline-flex items-center border border-transparent rounded-md justify-center p-2 text-base font-semibold text-black bg-white hover:bg-gray-100 focus:ring-gray-300">
                                            Cancelar
                                        </button>
                                        <button type="submit" class="flex-1 ml-1 inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Eliminar
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>



                        <!-- M   O   D   A   L       N   U   E   V   O      R   O   L   (oculto por defecto) -->
                        
                        <div id="NewRole" class="bg-gray-800 bg-opacity-50 fixed inset-0 flex items-center justify-center hidden">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-auto">
                                    <!-- Encabezado -->
                                    <div class="flex items-center justify-between p-4 border-b">
                                        <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                                        <p class="text-center text-azul-afac font-bold text-xl ml-2">NUEVO ROL</p>
                                    </div>
                                    <!-- Cuerpo del modal -->
                                    <div class="p-4">
                                        <form id="newRoleForm" action="{{ route('roles.store') }}" method="POST">
                                            @csrf
                                            @method('POST')

                                            <!-- Cuerpo del modal (inputs y selects) -->
                                            <div class="w-full">
                                                
                                                <!-- Nombre -->
                                                <div>
                                                    <label for="rol" class="block text-sm font-medium text-gray-700">Nombre del Rol</label>
                                                    <input type="text" id="rol" name="rol" 
                                                    class="mt-2  block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac " placeholder="Nombre del rol"
                                                    required>
                                                </div>
                                            </div>
                                            <!-- Pie del modal -->
                                            <!-- <div class="w-full flex justify-between mt-4">
                                                <button type="button" onclick="closeNewRole()" class="w-1/2 px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-2">
                                                    Cerrar
                                                </button>
                                                <button type="submit" class="w-1/2 bg-azul-afac hover:bg-[#002b4b] text-white font-semibold py-2 px-4 rounded-lg">
                                                    Guardar
                                                </button>
                                            </div> -->
                                            <div class="flex justify-end mt-4">
                                                <button type="button" onclick="closeNewRole()" class="flex-1 mr-1 inline-flex items-center rounded-lg justify-center p-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="flex-1 ml-1 inline-flex items-center justify-center px-4 py-2 bg-azul-afac hover:bg-[#002b4b] text-white font-semibold rounded-lg">
                                                    Eliminar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>

                </div>
            </div>
        </div>
        <script>
            // MODAL DE MODIFICAR 
            function abrirModal(id, name, role) {
                document.getElementById("rolId").value = id;  // ID correcto
                document.getElementById("RolLabel").textContent = "Rol: " + name;  // Etiqueta para mostrar el rol actual
                document.getElementById("RoleName").value = name;  // Rellenar el campo de texto con el nombre actual

                document.getElementById("editForm").action = "/roles/" + id;  // Configurar la URL de la acción del formulario

                document.getElementById("miModal").classList.remove("hidden");  // Mostrar el modal
            }

            function cerrarModal() {
                document.getElementById("miModal").classList.add("hidden");
            }
            // Cerrar modal con la tecla ESC
                document.addEventListener("keydown", function(event) {
                if (event.key === "Escape") { 
                    cerrarModal();
                }
            });



            // MODAL ELIMINAR 
            function abrirModalEliminar(id, name) {
                document.getElementById("RolName").textContent = "¿Estás seguro de que deseas eliminar este rol? " + name;
    
            let form = document.getElementById("deleteForm");
                form.action = "/roles/" + id;  // Establecer la ruta correcta para eliminar

            document.getElementById("abrirModalEliminar").classList.remove("hidden");
            }


            function cerrarModalEliminar() {
                document.getElementById("abrirModalEliminar").classList.add("hidden"); // ID corregido
            }

            // Cerrar modales al hacer clic fuera del contenido
            window.addEventListener("click", function(event) {
                let modalModificar = document.getElementById("miModal");
                let modalEliminar = document.getElementById("abrirModalEliminar");
                let modalCrear = document.getElementById("NewRole");

                if (event.target === modalModificar) {
                    cerrarModal();
                }
                if (event.target === modalEliminar) {
                    cerrarModalEliminar();
                }
                if (event.target === modalCrear) {
                    cerrarModalCrear();
                }
            });

            // Cerrar modal ELIMINAR con la tecla ESC
            document.addEventListener("keydown", function(event) {
                if (event.key === "Escape") { 
                    cerrarModalEliminar();
                }
            });


            // MODAL DE CREACIÓN DE NUEVO ROL 
            function OpenModalCrear() {
            document.getElementById("NewRole").classList.remove("hidden");
            }

            function closeNewRole() { // Nombre de función corregido
                document.getElementById("NewRole").classList.add("hidden");
            }

            document.addEventListener("keydown", function (event) {
                if (event.key === "Escape") {
                    closeNewRole();
                }
            });

            document.getElementById("newRoleForm").addEventListener("submit", function (event) {
            console.log("Formulario enviado");  
            });
        </script>

    </body>
</x-app-layout>





