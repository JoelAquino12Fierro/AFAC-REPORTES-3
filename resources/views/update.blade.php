<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Registros') }}
        </h2>
    </x-slot>

    {{-- <body class="bg-white">
         --}}
           
<body>
    <div class="mt-4 px-50 ">
    @yield('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-semibold text-center mb-4">EDITAR REPORTE</h2>
            <form action="{{ route('reports.update', $reporte->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Folio del reporte -->
                <div class="mb-4">
                    <label for="folio" class="block text-sm font-medium text-gray-700">Folio</label>
                    <input type="text" name="folio" id="folio" value="{{ old('folio', $reporte->folio) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('folio')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Fecha reporte-->
                <div class="mb-4">
                    <label for="report_date" class="block text-sm font-medium text-gray-700">Fecha de reporte</label>
                    <input type="report_date" name="report_date" id="report_date" value="{{ old('report_date', $reporte->report_date) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('report_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Área --}}
                <div class="mb-4">
                    <label for="area" class="block text-sm font-medium text-gray-700">Área</label>
                    <input type="area" name="area" id="area" value="{{ old('area', $reporte->area) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('area')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sistema --}}
                <div class="mb-4">
                    <label for="system" class="block text-sm font-medium text-gray-700">Sistema</label>
                    <input type="system" name="system" id="system" value="{{ old('system', $reporte->system) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('system')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{--  Tipo--}}
                <div class="mb-4">
                    <label for="type_report" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <input type="type_report" name="type_report" id="type_report" value="{{ old('type_report', $reporte->type_report) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('type_report')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Usuario --}}
                <div class="mb-4">
                    <label for="reporting_user" class="block text-sm font-medium text-gray-700">Usuario</label>
                    <input type="reporting_user" name="reporting_user" id="reporting_user" value="{{ old('reporting_user', $reporte->reporting_user) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('reporting_user')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                
                {{-- Actions --}}
                <div class="mb-4">
                    <label for="actions" class="block text-sm font-medium text-gray-700">Acción</label>
                    <input type="actions" name="actions" id="actions" value="{{ old('actions', $reporte->actions) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('actions')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Description --}}
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <input type="description" name="description" id="description" value="{{ old('description', $reporte->description) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Evidence --}}
                <div class="mb-4">
                    <label for="evidence" class="block text-sm font-medium text-gray-700">Evidencia</label>
                    <input type="evidence" name="evidence" id="evidence" value="{{ old('evidence', $reporte->evidence) }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('evidence')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones para guardar o cancelar -->
                <div class="flex justify-between items-center mt-6">
                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Guardar Cambios
                    </button>
                </div>
            </form>
            <!-- Botón para regresar a la lista de usuarios -->
            <div class="mt-4 text-center">
                <a href="{{ route('table.index') }}" class="text-indigo-600 hover:text-indigo-800">cancelar</a>
            </div>
        </div>
    </div>
</body>
</x-app-layout>