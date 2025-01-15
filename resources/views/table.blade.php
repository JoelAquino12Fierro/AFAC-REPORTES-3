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

<div class=" mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reporte->folio }}
                </th>
                <td class="px-6 py-4">
                    {{ $reporte->application_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $reporte->report_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $reporte->area }}
                </td>
                <td class="px-6 py-4">
                    {{ $reporte->system }}
                </td>
                <td class="px-6 py-4">
                    {{ $reporte->type_report }}
                </td>
                <td class="px-6 py-4">
                    {{ $reporte->reporting_user }}
                </td>
                
            
            <td>
                <form action="{{ route('reports.edit', $reporte->id) }}" method="GET">
                    @csrf
                    <button type="submit">
                        {{-- class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Verdetalles --}}
                        <x-codicon-eye class="h-7 w-7 text-azul-afac" />

                    </button>
                </form>
            </td>
            <td>
                <form action="{{ route('reports.destroy', $reporte->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <x-uiw-delete  class="h-7 w-7 text-red-600"/>
                        {{-- class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Eliminar --}}
                    </button>
                </form>
            </td>
            {{-- PDF --}}
            <td>
                <form action="{{ route('pdf') }}" method="GET" >
                    @csrf
                    {{-- @method('DELETE') --}}
                    <button type="submit" >
                    <x-bi-file-pdf class=" h-7 w-7 text-dorado-afac"  />
                    </button>
                    {{-- <button type="sumbit" --}}
                    
                        {{-- class="text-orange-400 hover:text-white border border-orange-400 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-orange-300 dark:text-orange-300 dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-yellow-900">PDF</button> --}}
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>




  

    </body>

</x-app-layout>


