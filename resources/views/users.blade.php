<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <body>
                    <div class="px-10 py-10"> 
                        <div>
                            <form>
                                <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-50 p-4 rounded-t-lg border-b border-gray-300"> 
        
                                    <div class="relative">
                                        <label for="table-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="table-search-users" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar Usuario">
                                    </div>
                                    <!-- boton para el modal de nuevo usuario -->
                                    @livewire('new-user-modal')
                                </div>
                            </form>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200">


                            <table class="w-full text-sm text-left text-gray-700" id="user-table">
                                <thead class="text-xs text-black uppercase">
                                    <tr>
                                        <th scope="col" class="px-6 py-3"> Número de empleado</th>
                                        <th scope="col" class="px-6 py-3"> Nombre</th>
                                        <th scope="col" class="px-6 py-3"> Rol</th>
                                        <th class="px-4 py-3 text-center" colspan="2">acciones</th>
                                    </tr>
                                </thead>

                                <tbody id="user-results">
                                    @foreach ($user as $user)
                                    <tr class="bg-white border-b hover:bg-gray-100 transition duration-300 ease-in-out">
                                        <td class="px-6 py-4 text-gray-900 font-medium">
                                            {{ $user->id }}
                                        </td>
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold text-gray-700">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="font-normal text-gray-500">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            React Developer
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <form>
                                                @livewire('edit-user-modal')
                                            </form>
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <form>
                                                <button type="submit" class="font-medium text-red-600 hover:underline">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
<!-- Formulario para editar usuario (inicialmente oculto) -->


                        </div>
                    </div>
                    
                </body>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('table-search-users').addEventListener('input', function() {
        let query = this.value.trim();  // Elimina espacios vacíos

        fetch(`/search-users?query=${encodeURIComponent(query)}`, {
            method: 'GET'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            let resultsTable = document.getElementById('user-results');
            resultsTable.innerHTML = ''; // Limpiar la tabla

            if (data.length === 0) {
                resultsTable.innerHTML = '<tr><td colspan="5" class="text-center py-4 text-gray-500">No se encontraron resultados</td></tr>';
                return;
            }

            data.forEach(user => {
                let row = `
                    <tr>
                        <td class="px-4 py-4">${user.id}</td>
                        <td class="px-4 py-4">${user.name}</td>
                        <td class="px-4 py-4">React Developer</td>
                        <td class="px-2 py-4"><button class="text-blue-600 hover:underline">Editar</button></td>
                        <td class="px-2 py-4"><button class="text-red-600 hover:underline">Eliminar</button></td>
                    </tr>
                `;
                resultsTable.innerHTML += row;
            });
        })
        .catch(error => console.error('Error:', error));
    });

    function showAddForm() {
        document.getElementById('addUserForm').classList.remove('hidden');
        document.getElementById('editUserForm').classList.add('hidden');
    }

    function showEditForm(id, name, email) {
        document.getElementById('editUserForm').classList.remove('hidden');
        document.getElementById('addUserForm').classList.add('hidden');

        // Rellenar los datos del formulario de edición
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;

        // Actualizar la acción del formulario con la URL correcta
        document.getElementById('editForm').action = `/users/${id}`;
    }
</script>
</x-app-layout>
