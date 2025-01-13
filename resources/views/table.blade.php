<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Registros') }}
        </h2>
    </x-slot>

    <body class="bg-white">
        <div class="px-14 py-14">
            @yield('content')

            <div class="flex flex-row">
                <div class="basis-1/7 mb-4 mr-2">
                    <form action="{{ route('newform') }}">
                        @csrf
                        <button type="submit"
                            class="w-1/8 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-sky-500 text-white hover:bg-sky-700 ">Nuevo
                            reporte</button>
                    </form>
                </div>
                <div class="basic -1/7 mb-4 ">
                    <button type="button"
                        class="w-1/8 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-500 text-white hover:bg-green-700 ">Exportar
                        a Excel</button>
                </div>
            </div>




            <form>
                <label for="search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>



            <table class="w-full text-sm text-left rtl:text-right text-gray-900 dark:text-gray-400 px-5 py-5">
                <thead class="texto-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="texto-lg text-black-700 uppercase bg-gray-100 dark:bg-gray-400 dark:text-black-400 py-2">
                        <th class="px-6 py-3">FOLIO</th>
                        <th class="px-6 py-3">FECHA DE SOLICITUD </th>
                        <th class="px-6 py-3">FECHA DE REPORTE </th>
                        <th class="px-6 py-3">ÁREA </th>
                        <th class="px-6 py-3">SISTEMA</th>
                        <th class="px-6 py-3">TIPO DE REPORTE</th>
                        <th class="px-6 py-3">USUARIO QUE REPORTA </th>
                        {{-- Cabecerea de botones --}}
                        {{-- @role('admin') --}}
                        <th class="px-10 py-3"></th>
                        <th class="px-6 py-3"></th>
                        <th class="px-6 py-3"></th>

                        {{-- @endrole --}}
                    </tr>
                </thead>
                <tbody>
                    <ul>
                        @foreach ($reporte as $reporte)
                            <tr class=" bg-white dark:bg-white dark:text-black-400 text-sm ">

                                <td class="px-6 py-3">{{ $reporte->folio }}</td>
                                <td class="px-6 py-3">{{ $reporte->application_date }} </td>
                                <td class="px-6 py-3">{{ $reporte->report_date }} </td>
                                <td class="px-6 py-3">{{ $reporte->area }} </td>
                                <td class="px-6 py-3">{{ $reporte->system }}</td>
                                <td class="px-6 py-3">{{ $reporte->type_report }}</td>
                                <td class="px-6 py-3">{{ $reporte->reporting_user }} </td>

                                {{--  botones --}}

                                {{-- Ver detalles --}}
                                <td>
                                    <form action="{{ route('reports.edit', $reporte->id) }}" method="GET">
                                        @csrf
                                        <button type="submit"
                                            class="w-1/8 py-3 px-6 single-line inline-flex text-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                            Verdetalles
                                        </button>
                                    </form>
                                </td>
                                {{-- <td>
                                    <button type="button" data-id="{{ $reporte->id }}"
                                        class="view-details w-1/8 py-3 px-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                        Ver Detalles
                                    </button>
                                </td> --}}

                                {{-- Eliminiar --}}
                                <td>
                                    <form action="{{ route('reports.destroy', $reporte->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-1/8 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                                {{-- PDF --}}
                                <td>
                                    <form action="" method="">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="button"
                                            class="text-orange-400 hover:text-white border border-orange-400 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-orange-300 dark:text-orange-300 dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-yellow-900">PDF</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </ul>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        {{-- <div id="deleteModal" class="fixed inset-0 items-center">

        </div> --}}






        {{-- Modal ver detalles --}}

        {{-- <div id="detailsModal" class="fixed inset-0 flex items-center justify-center z-50 ">
            <div class="bg-white w-1/3 rounded-lg shadow-lg ">
                <div class="p-4 border-b">
                    <h3 class="text-lg font-semibold">Detalles del Reporte</h3>
                </div>
                <div class="p-4">
                    <p><strong>Folio:</strong> <span id="modalFolio"></span></p>
                    <p><strong>Fecha de Solicitud:</strong> <span id="modalApplicationDate"></span></p>
                    <p><strong>Fecha de Reporte:</strong> <span id="modalReportDate"></span></p>
                    <p><strong>Área:</strong> <span id="modalArea"></span></p>
                    <p><strong>Sistema:</strong> <span id="modalSystem"></span></p>
                    <p><strong>Tipo de Reporte:</strong> <span id="modalTypeReport"></span></p>
                    <p><strong>Usuario que Reporta:</strong> <span id="modalReportingUser"></span></p>
                </div>
</div>
                <div class="p-4 border-t flex justify-end">
                    <button id="closeModal"
                        class="py-2 px-4 bg-red-500 text-white rounded-lg hover:bg-red-700">Cerrar</button>
                </div>
            </div>
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div> --}}
    </body>

</x-app-layout>

{{-- Modal de ver detalles --}}










{{-- Modal de eliminar --}}
