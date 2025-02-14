<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('USUARIOS') }}
        </h2>
    </x-slot>

    <body>

        <!-- Modal Eliminar-->
        <!-- El id modalOverlay Funciona como un fondo semitransparente detrás del modal. -->
        <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-40 backdrop-filter-none z-40"></div>
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
                    <p class="mt-2 text-lg font-semibold text-gray-900">ELIMINAR REPORTE</p>
                </div>
                <div class="flex w-full gap-4"></div>
                <p class="text-gray-600">¿Estás seguro de que deseas eliminar este reporte?</p>

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
                                    <button type="submit" class="mt-4 right-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-base font-semibold px-6 py-3 text-center inline-flex items-center shadow-lg">Nuevo</button>
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
                                                <button type="submit" class="font-semibold text-base">Editar</button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <form>

                                                <button type="submit" class="font-medium text-red-600 hover:underline" onclick="openModal(this)" >Eliminar</button>

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Formulario para editar usuario (inicialmente oculto) -->


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </body>

    <script src="{{ asset(path: 'js/users.js') }}"></script>

</x-app-layout>