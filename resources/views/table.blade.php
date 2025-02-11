<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('REGISTRO') }}
        </h2>
    </x-slot>

    <body class="bg-white">

        <!-- Modal Eliminar-->
        <!-- El id modalOverlay Funciona como un fondo semitransparente detrás del modal. -->
        <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm z-40"></div>
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


        <!-- Modal de Ver Detalles -->
        <div id="verdetallesModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto  ">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">SEGUIMIENTO DE LA SOLICITUD</p>
                    <button onclick="closeDetailsModal()" class=" ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" stroke="currentColor" stroke-width="2" class="bi bi-x-lg text-gray-500 hover:text-gray-700 " viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="p-4">
                    <div class="p-4">
                        <form name="formA" id="formA" class="w-full" action="" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="space-y-6">
                                <!-- Módulo -->
                                <div>
                                    <label for="module" class="block text-sm font-medium text-gray-900">Módulo</label>
                                    <select id="module" name="module" class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="" class="uppercase">--Selecciona el módulo--</option>
                                    </select>
                                </div>

                                <!-- Descripción -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-900">Descripción</label>
                                    <textarea id="description" name="description" class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingresa aquí" required></textarea>
                                </div>

                                <!-- Evidencia -->
                                <div>
                                    <label for="evidence" class="block text-sm font-medium text-gray-900">Subir Evidencia</label>
                                    <div
                                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                        <div class="text-center">
                                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M1.5 6a2.25 2.25 0 011.75-2.25h17.5A2.25 2.25 0 0123 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6ZM3 16.06V18a.75.75 0 00.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 01-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0Z" />
                                            </svg>
                                            <div class="mt-4 flex text-sm text-gray-600">
                                                <label for="evidence"
                                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600">
                                                    <span>Upload a file</span>
                                                    <input id="evidence" name="evidence" type="file">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Responsable -->
                                <div>
                                    <label for="responsable" class="block text-sm font-medium text-gray-900">Responsable</label>
                                    <input type="text" name="responsable" id="responsable" class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Nombre del responsable" required>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <!-- Pie del modal -->
                <div class="flex justify-end p-4 border-t">
                    <button onclick="closeDetailsModal()" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-2">
                        Cerrar
                    </button>
                    <button class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg" type="submit">
                        Guardar
                    </button>
                </div>
            </div>
        </div>


        <!-- TERMINAN MODAAAAALEEEES -->

        <div class="px-14 py-14">
            @yield('content')

            <div class="flex flex-row">
                <div class="basis-1/7 mb-4 mr-2">
                    <form action="{{ route('newform') }}" method="GET">
                        @csrf
                        <button type="submit"
                            class="w-1/8 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-700 text-white hover:bg-blue-800 ">Nuevo
                            reporte</button>
                    </form>
                </div>
                <div class="basic -1/7 mb-4 ">
                    <button type="button"
                        class="w-1/8 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-700 text-white hover:bg-green-800 ">Exportar
                        a Excel</button>
                </div>
            </div>

            <form>
                <label for="search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>

            <div class=" mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                FOLIO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FECHA DE SOLICITUD
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FECHA DE REPORTE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ÁREA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SISTEMA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TIPO DE REPORTE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                USUARIO QUE REPORTA
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reporte as $reporte)
                        <tr
                            class="bg-white border-b hover:bg-gray-50">
                            <th scope="row"
                                class="uppercase px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $reporte->folio }}
                            </th>
                            <td class="px-6 py-4 uppercase">
                                {{ $reporte->application_date }}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $reporte->report_date }}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $reporte->area->areas_name}}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $reporte->system->systems_name}}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $reporte->type->name_types_reports}}

                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{-- como se define el foreach->la funcion del modelo->lo que se quiere traer --}}
                                {{ $reporte->report_user }}
                            </td>

                            {{-- VER DETALLES --}}
                            <td>
                                <!-- <form action="{{ route('reports.edit', $reporte->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="bg-teal-500 text-white font-bold py-2 px-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out hover:bg-teal-600 active:bg-teal-700">
                                        Ver detalles
                                    </button>

                                </form> -->
                                <!-- En el onclick se puede asignar cualquier nombre para despues usarlo en el JS -->
                                <button onclick="openDetailsModal(this)" data-url="{{ route('reports.edit', $reporte->id) }}"
                                    class="bg-teal-500 text-white font-bold py-2 px-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out hover:bg-teal-600 active:bg-teal-700">
                                    Ver detalles
                                </button>



                            </td>
                            {{--DELETE--}}
                            <td>
                                <!-- <form action="{{ route('reports.destroy', $reporte->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-bold p-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out hover:bg-red-600 active:bg-red-700">
                                    
                                        Eliminar
                                    </button>
                                </form> -->
                                <button onclick="openModal(this)" data-url="{{ route('reports.destroy', $reporte->id) }}"
                                    class="bg-red-500 text-white font-bold p-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out hover:bg-red-600 active:bg-red-700">
                                    Eliminar
                                </button>

                            </td>



                            {{-- PDF --}}
                            <td>

                                <form action="{{ route('pdf', $reporte->id) }}" method="GET">
                                    @csrf

                                    <button type="submit" class="bg-azul-afac hover:bg-azul-afac text-white font-bold py-2 px-4 rounded-lg flex mr-4 items-center space-x-2 transition duration-300 ease-in-out transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                                        </svg>
                                        <span>Descargar PDF</span>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </body>
    <script src="{{ asset('js/ver-detalles/delete.js') }}"></script>

</x-app-layout>