<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('REGISTRO') }}
        </h2>
    </x-slot>

    <body class="bg-white">
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
                                @livewire('ver-detalles-modal')
                            </td>
                            {{--DELETE--}}
                            <td>
                                <form action="{{ route('reports.destroy', $reporte->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-bold p-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out hover:bg-red-600 active:bg-red-700">
                                    
                                        Eliminar
                                    </button>
                                </form>
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
                                    <!-- <button type="submit" class="border-2 border-azul-afac text-azul-afac font-bold py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-300 ease-in-out hover:bg-azul-afac hover:text-white active:bg-azul-afac active:border-azul-afac active:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                                        </svg>
                                        <span>Descargar PDF</span>
                                    </button> -->


                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>






    </body>

</x-app-layout>