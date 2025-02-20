<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('USUARIOS') }}
        </h2>
    </x-slot>

    <body>
        <!-- El id modalOverlay Funciona como un fondo semitransparente detrás del modal. -->
        <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-40 backdrop-filter-none z-40"></div>
        <!-- Modal Eliminar-->
        <div id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex flex-col items-center justify-center text-center">
                    <div class="flex size-12 items-center justify-center rounded-full bg-[#e70909]/20 sm:size-16">
                        {{-- Icono centrado --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-6 sm:size-8 bi bi-plus-square" viewBox="0 0 16 16">
                            <g fill="#da0000">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </g>
                        </svg>
                    </div>
                    {{-- Título centrado debajo del icono --}}
                    <p class="mt-2 text-lg font-semibold text-gray-900">ELIMINAR USUARIO</p>
                </div>
                <div class="flex w-full gap-4"></div>
                <p class="text-gray-600">¿Estás seguro de que deseas eliminar este usuario?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeModal()" class="flex-1 mr-1 inline-flex items-center border border-transparent rounded-md justify-center p-2 text-base font-semibold text-black text-center bg-white hover:bg-gray-100 focus:ring-gray-300">Cancelar</button>
                        <button type="submit" class="flex-1 ml-1 inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-base text-white tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal de éxito -->
        <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">OPERACIÓN EXITOSA</p>
                </div>
                <!-- Cuerpo del modal -->
                <div class="p-4 justify-center">
                    <p class="text-gray-700 mt-2 text-center " id="successModalMessage"></p> <!-- Asegurar este ID -->
                </div>
                <!-- Pie del modal -->
                <div class="flex justify-end p-4 border-t ">
                    <button onclick="closeSuccessModal()" class="mt-4 bg-azul-afac text-white px-4 py-2 rounded-md">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal Editar Usuario -->
        <div id="editModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto max-w-2xl">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">EDITAR USUARIO</p>
                </div>
                <!-- Cuerpo del Modal con Formulario -->
                <div class="p-4">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- ID oculto del usuario -->
                        <input type="hidden" id="userId" name="userId">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Número de empleado -->
                            <div>
                                <label for="number" class="block text-sm font-medium text-gray-700">Número de empleado</label>
                                <input type="text" id="number" name="number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-500 cursor-not-allowed opacity-50" placeholder="Nombre del usuario" readonly>
                            </div>
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" id="name" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac">
                            </div>
                            <!-- Apellido Paterno -->
                            <div>
                                <label for="apeP" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                                <input type="text" id="apeP" name="apeP" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="Nombre del usuario">
                            </div>
                            <!-- Apellido Materno -->
                            <div>
                                <label for="apeM" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                                <input type="text" id="apeM" name="apeM" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="Nombre del usuario">
                            </div>
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac">
                            </div>
                            <!-- Área -->
                            <div>
                                <label for="editArea" class="block text-sm font-medium text-gray-700">Departamento</label>
                                <select id="editArea" name="editArea" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac">
                                    <option value=""></option>
                                </select>
                            </div>
                            <!-- Cargo -->
                            <div>
                                <label for="editPosition" class="block text-sm font-medium text-gray-700">Cargo</label>
                                <select id="editPosition" name="editPosition" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac">
                                    <option value=""></option>
                                </select>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- Pie del Modal -->
                <div class="flex justify-end p-4 border-t">
                    <button onclick="closeDetailsModal()" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-2">
                        Cerrar
                    </button>
                    <button type="submit" form="editForm" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal nuevo usuario -->
        <div div id="newModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto  ">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">NUEVO USUARIO</p>
                </div>
                <!-- Cuerpo del modal -->
                <div class="p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Numero de empleado -->
                        <div>
                            <label for="NUnumber" class="block text-sm font-medium text-gray-700">Número de empleado</label>
                            <input type="text" id="NUnumber" name="NUnumber" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="Número de empleado">
                        </div>
                        <!-- Nombre -->
                        <div>
                            <label for="NUname" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="NUname" name="NUname" class="mt-1  block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac " placeholder="Nombre del usuario">
                        </div>
                        <!-- Apellido Paterno -->
                        <div>
                            <label for="NUapeP" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                            <input type="text" id="NUapeP" name="NUapeP" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="Apellido paterno">
                        </div>
                        <!-- Apellido Materno -->
                        <div>
                            <label for="NUapeM" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                            <input type="text" id="NUapeM" name="NUapeM" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="Apellido Materno">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="NUemail" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <input type="email" id="NUemail" name="NUemail" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="correo@ejemplo.mx">
                        </div>
                        <!-- Password -->
                        <div>
                            <label for="NUpassword" class="block text-sm font-medium text-gray-700">Contraseña</label>
                            <input type="password" id="NUpassword" name="NUpassword" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="Ingresa la contraseña">
                        </div>

                        <!-- Password Confirmation -->
                        <div>
                            <label for="NUpasswordc" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                            <input type="password" id="NUpasswordc" name="NUpasswordc" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac" placeholder="Repite la contraseña">
                        </div>

                        <!-- Area -->
                        <div>
                            <label for="NUarea" class="block text-sm font-medium text-gray-700">Departamento</label>
                            <select id="NUarea" name="NUarea" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac">
                                <option value="">Selecciona un departamento</option>
                            </select>
                        </div>

                        <!-- Position -->
                        <div>
                            <label for="NUposition" class="block text-sm font-medium text-gray-700">Cargo</label>
                            <select id="NUposition" name="NUposition" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-azul-afac focus:border-azul-afac">
                                <option value="">Selecciona un cargo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="flex justify-end p-4 border-t">
                    <button onclick="closenewModal(this)" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-2">
                        Cerrar
                    </button>
                    <button id="newuser" name="newuser" class="bg-azul-afac hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg" type="button">
                        Guardar
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal de error -->
        <div id="errorModal" class="flex items-center justify-center  hidden fixed inset-0  z-50">
            <div class="bg-white rounded-lg shadow-lg p-4 w-80 relative border-t-4 border-red-600">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="white">
                        <circle cx="12" cy="12" r="10" fill="#F87171" />
                        <path fill="white" d="M8 8L16 16M16 8L8 16" stroke="white" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <div class="ml-3">
                        <h2 class="text-red-600 font-semibold text-xl text-center">ERROR</h2>
                    </div>
                </div>
                <div class="mb-4 justify-center">
                    <p class="text-black text-sm text-center" id="errorModalMessage"></p>
                </div>
                <div class="flex justify-end mt-2">
                    <button onclick="closeErrorModal(this)" class="px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Intentar de nuevo
                    </button>
                </div>
            </div>
        </div>


        <!-- Terminan modales -->
        <div class="py-12 bg-gray-100 min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">


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
                                    <button type="button" onclick="newModal(this)" id="new" name="new" class="mt-4 right-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-base font-semibold px-6 py-3 text-center inline-flex items-center shadow-lg">Nuevo</button>
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
                                    @foreach ($user as $us)
                                    <tr class="bg-white border-b hover:bg-gray-100 transition duration-300 ease-in-out">
                                        <td class="px-6 py-4 text-gray-900 font-medium">
                                            {{ $us->id }}
                                        </td>
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold text-gray-700">
                                                    {{ $us->name }}
                                                </div>
                                                <div class="font-normal text-gray-500">
                                                    {{ $us->email }}
                                                </div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            React Developer
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <button type="button" class="font-semibold text-base" onclick="openDetailsModal(this)"
                                                data-id="{{ $us->id }}"
                                                data-name="{{ $us->name }}"
                                                data-email="{{ $us->email }}"
                                                data-apeP="{{ $us->paternal_surname }}"
                                                data-apeM="{{ $us->maternal_surname}}"
                                                data-url="{{ route('editUser', $us->id) }}">
                                                Editar
                                            </button>
                                            <!-- Nombre de la bariable -> campos de la BD -->
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <button onclick="openModal(this)" data-url="{{ route('deleteUser', $us->id) }}" class="font-medium text-red-600 hover:underline">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Paginación -->
                    <div class="flex justify-center ">
                        <ul class="flex items-center space-x-2">
                            @if ($user->hasPages())
                            <div class="flex space-x-1 justify-center mt-4">
                                {{-- Botón "Prev" --}}
                                @if ($user->onFirstPage())
                                <button class="rounded-md border border-gray-300 py-2 px-3 text-center text-sm shadow-sm text-gray-600 bg-gray-200 cursor-not-allowed opacity-50">
                                    Prev
                                </button>
                                @else
                                <a href="{{ $user->previousPageUrl() }}" class="rounded-md border border-azul-secundario py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-azul-afac hover:text-white hover:bg-azul-afac hover:border-azul-afac focus:text-white focus:bg-azul-afac focus:border-azul-afac active:border-azul-afac active:text-white active:bg-azul-afac ml-2">
                                    Prev
                                </a>
                                @endif

                                {{-- Números de Página --}}
                                @foreach ($user->links()->elements[0] as $page => $url)
                                @if ($page == $user->currentPage())
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
                                @if ($user->hasMorePages())
                                <a href="{{ $user->nextPageUrl() }}" class="rounded-md border border-azul-secundario py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-azul-afac hover:text-white hover:bg-azul-afac hover:border-azul-afac focus:text-white focus:bg-azul-afac focus:border-azul-afac active:border-azul-afac active:text-white active:bg-azul-afac ml-2">
                                    Next
                                </a>
                                @else
                                <button class="rounded-md border border-gray-300 py-2 px-3 text-center text-sm shadow-sm text-gray-600 bg-gray-200 cursor-not-allowed opacity-50">
                                    Next
                                </button>
                                @endif
                            </div>
                            @endif
                    </div>

                </div>


            </div>


            </ul>
        </div>
        <script>
document.addEventListener("DOMContentLoaded", function () {
    window.openModal = function (button) {
        let deleteUrl = button.getAttribute("data-url");
        if (!deleteUrl) {
            console.error("❌ Error: No se encontró la URL de eliminación.");
            return;
        }
        document.getElementById("deleteForm").setAttribute("action", deleteUrl);
        document.getElementById("deleteModal").classList.remove("hidden");
    };

    window.closeModal = function () {
        document.getElementById("deleteModal").classList.add("hidden");
    };
});
</script>
        <script>
            var adduser = "{{ route('adduser') }}";
            var area = "{{ route('areauser') }}";
            var possi = "{{ url('/positions') }}";
            var responsibilitiesUrl = "{{ route('responsibilities.store') }}";
            var getUserAreaUrl = "{{ route('getUserArea', ['id' => ':id']) }}";
            var getPositionsUrl = "{{ route('positions.byArea', ':areaId') }}";
            var areaUrl = "{{ route('areauser') }}";
        </script>
    </body>
    <script src="{{ asset(path: 'js/users.js') }}"></script>
</x-app-layout>