<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('REGISTRO') }}
        </h2>
    </x-slot>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Agregar Dropzone -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />


    </head>

    <body class="bg-white">


        <!-- El id modalOverlay Funciona como un fondo semitransparente detrás del modal. -->
        <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-40 backdrop-filter-none z-40"></div>
        <!-- Modal Eliminar-->
        <!-- Modal de Eliminación -->
        <div id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex flex-col items-center justify-center text-center">
                    <div class="flex size-12 items-center justify-center rounded-full bg-[#e70909]/20 sm:size-16">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-6 sm:size-8 bi bi-plus-square" viewBox="0 0 16 16">
                            <g fill="#da0000">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </g>
                        </svg>
                    </div>
                    <p class="mt-2 text-lg font-semibold text-gray-900">ELIMINAR REPORTE</p>
                </div>
                <p class="text-gray-600 text-center">¿Estás seguro de que deseas eliminar este reporte?</p>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeModal('deleteModal')" class="mr-2 px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500">
                            Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <!-- Modal de Éxito -->
        <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">¡REGISTRO ÉXITOSO!</p>
                </div>
                <!-- Cuerpo del modal -->
                <div class="p-4 justify-center">
                    <p class="text-gray-700 mt-2 text-center" id="successModalMessage"></p>
                </div>
                <!-- Pie del modal -->
                <div class="flex justify-end p-4 border-t">
                    <button onclick="closeModal('successModal')" class="mt-4 bg-azul-afac text-white px-4 py-2 rounded-md">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>


        <!-- Modal de Ver Detalles -->
        <div id="editModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <!-- Agregar un campo oculto para almacenar el ID -->
            <input type="hidden" id="reporte_id">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto  ">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">SEGUIMIENTO DE LA SOLICITUD</p>
                </div>
                <!-- Cuerpo del modal -->
                <div class="p-4">
                    <!-- Selección de Módulo -->
                    <div class="mt-4">
                        <label for="modulos" class="block text-sm font-medium text-gray-900">Seleccionar Módulo</label>
                        <select id="modulos" name="modulos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Selecciona un módulo</option>
                        </select>
                    </div>
                    <!-- Descripción -->
                    <div class="mt-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-900">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingresa aquí" required></textarea>
                    </div>
                    <!-- Carga de Evidencia -->
                    <div class="mt-4">
                        <label for="evidence" class="block text-sm font-medium text-gray-900">Cargar Evidencia</label>
                        <input type="file" id="evidence" name="evidence" accept="image/png, image/jpeg, image/jpg"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                            focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <!-- Selección de Responsables (Áreas) -->
                    <div class="mt-4">
                        <label for="responsables" class="block text-sm font-medium text-gray-900">Seleccionar Responsable (Área)</label>
                        <select id="responsables" name="responsables" class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Selecciona un área</option>
                        </select>
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

                    
                        <button
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
                        @foreach ($reporte as $repo)
                        <tr
                            class="bg-white border-b hover:bg-gray-50">
                            <th scope="row"
                                class="uppercase px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $repo->folio }}
                            </th>
                            <td class="px-6 py-4 uppercase">
                                {{ $repo->application_date->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $repo->report_date->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $repo->area->areas_name}}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $repo->system->systems_name}}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{ $repo->typeReport->name_types_reports}}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                {{-- como se define el foreach->la funcion del modelo->lo que se quiere traer --}}
                                {{ $repo->report_user }}
                            </td>
                            {{-- VER DETALLES --}}
                            <td>
                                <button class="btn btn-primary btn-editar font-bold py-2 px-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out 
    @if($repo->status == 0) bg-teal-500 text-white hover:bg-teal-600 active:bg-teal-700 hover:scale-105 
    @else bg-teal-300 text-white cursor-not-allowed opacity-50 
    @endif"
                                    @if($repo->status != 0) disabled @endif
                                    data-id="{{ $repo->id }}"
                                    data-descripcion="{{ $repo->descripcion }}"
                                    data-responsables="{{ $repo->responsibles }}"
                                    data-system="{{ $repo->systems }}"
                                    data-route="{{ route('ejemplo.update', $repo->id) }}">
                                    Editar
                                </button>
                               



                            </td>
                            {{--DELETE--}}
                            <td>
                                <button onclick="openModal(this)" data-url="{{ route('reports.destroy', $repo->id) }}"
                                    class="btn btn-delete font-bold py-2 px-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out hover:scale-105 bg-red-500 text-white hover:bg-red-600 active:bg-red-700">
                                    Eliminar
                                </button>
                            </td>
                            {{-- PDF --}}
                            <td>
                                <form action="{{ route('pdf', $repo->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="bg-azul-afac  text-white font-bold py-2 px-4 rounded-lg flex mr-4 items-center space-x-2  ease-in-out transform 
                                        @if ($repo->status == 0)
                                        bg-azul-secundario cursor-not-allowed 
                                        @else
                                        bg-azul-afac hover:bg-azul-afac  transition duration-300 hover:scale-105
                                        @endif"
                                        @if ($repo->status == 0)
                                        disabled
                                        @endif
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                                        </svg>
                                        <span> PDF</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




            <!-- Paginación -->
            <div class="flex justify-center mt-4">
                <ul class="flex items-center space-x-2">
                    @if ($reporte->hasPages())
                    <div class="flex space-x-1 justify-center mt-4">
                        {{-- Botón "Prev" --}}
                        @if ($reporte->onFirstPage())
                        <button class="rounded-md border border-gray-300 py-2 px-3 text-center text-sm shadow-sm text-gray-600 bg-gray-200 cursor-not-allowed opacity-50">
                            Prev
                        </button>
                        @else
                        <a href="{{ $reporte->previousPageUrl() }}" class="rounded-md border border-azul-secundario py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-azul-afac hover:text-white hover:bg-azul-afac hover:border-azul-afac focus:text-white focus:bg-azul-afac focus:border-azul-afac active:border-azul-afac active:text-white active:bg-azul-afac ml-2">
                            Prev
                        </a>
                        @endif

                        {{-- Números de Página --}}
                        @foreach ($reporte->links()->elements[0] as $page => $url)
                        @if ($page == $reporte->currentPage())
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
                        @if ($reporte->hasMorePages())
                        <a href="{{ $reporte->nextPageUrl() }}" class="rounded-md border border-azul-secundario py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-azul-afac hover:text-white hover:bg-azul-afac hover:border-azul-afac focus:text-white focus:bg-azul-afac focus:border-azul-afac active:border-azul-afac active:text-white active:bg-azul-afac ml-2">
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

        </div>
        <script>
            var baseUrl = "{{ url('/') }}"; // Obtiene la URL base del sitio
            var updateReporteUrl = "{{ url('/actualizar-reporte') }}/";
            var getModulesUrl = "{{ url('/get-modules') }}/";
            var getAreasUrl = "{{ url('/get-areas') }}";
        </script>


    </body>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

</x-app-layout>