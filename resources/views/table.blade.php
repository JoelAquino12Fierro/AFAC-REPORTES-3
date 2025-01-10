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
                    <form action="{{ route('register') }}">
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
                        <tr class=" bg-white dark:bg-white dark:text-black-400 text-sm ">

                            <td class="px-6 py-3">2021</th>
                            <td class="px-6 py-3">10/01/2025 </th>
                            <td class="px-6 py-3">10/01/2025 </th>
                            <td class="px-6 py-3">Área </th>
                            <td class="px-6 py-3">Sistema</th>
                            <td class="px-6 py-3">Tipo de reporte</th>
                            <td class="px-6 py-3">Leslie Mendoza </th>

                                {{--  botones --}}
                                {{-- Ver detalles --}}
                            <td>
                                <form action="" method="">
                                    @csrf
                                    <button type="submit"
                                        class="w-1/8 py-3 px-6 single-line inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                        Ver detalles
                                    </button>
                                </form>
                            </td>

                            {{-- Eminiar --}}
                            <td>
                                <form action="" method="">
                                    @csrf
                                    {{-- @method('DELETE') --}}
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
                                    <button type="submit"
                                        class="w-1/8 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-700">
                                        PDF
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </ul>
                </tbody>
            </table>
        </div>

        {{-- Modal de ver detalles --}}
        <!-- Main modal -->
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Static modal
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="static-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for
                            its citizens, companies around the world are updating their terms of service agreements to
                            comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May
                            25 and is meant to ensure a common set of data rights in the European Union. It requires
                            organizations to notify users as soon as possible of high-risk data breaches that could
                            personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="static-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal de eliminar --}}
    </body>
</x-app-layout>
