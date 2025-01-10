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


<!-- Modal toggle -->
<button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>
  
  
  
        {{-- Modal de eliminar --}}
    </body>
</x-app-layout>
