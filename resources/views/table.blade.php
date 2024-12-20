<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Registros') }}
        </h2>
    </x-slot>
    <div class="px-14 py-14">
        @yield('content')
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 px-5 py-5">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-xs text-black-700 uppercase bg-white dark:bg-white dark:text-black-400 py-2">
                    <th class="px-6 py-3">FOLIO</th>
                    <th class="px-6 py-3">FECHA DE SOLICITUD </th>
                    <th class="px-6 py-3">FECHA DE REPORTE </th>
                    <th class="px-6 py-3">ÁREA </th>
                    <th class="px-6 py-3">SISTEMA</th>
                    <th class="px-6 py-3">TIPO DE REPORTE</th>
                    <th class="px-6 py-3">USUARIO QUE REPORTA </th>
                    {{-- Cabecerea de botones --}}
                    {{-- @role('admin') --}}
                        <th class="px-6 py-3"></th>
                        <th class="px-6 py-3"></th>
                        <th class="px-6 py-3"></th>
                        
                    {{-- @endrole --}}
                    </tr>
            </thead>
            <tbody >
                <ul>
                     
                </ul>
            </tbody>
        </table>    
</x-app-layout>    
