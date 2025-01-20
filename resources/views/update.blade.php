<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Ver detalles') }}
        </h2>
    </x-slot>

    <body>
        <div class="mt-4 ">
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
                            <input type="text" name="folio" id="folio"
                                value="{{ old('folio', $reporte->folio) }}"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('folio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Fecha reporte-->
                        <div class="mb-4">
                            <label for="report_date" class="block text-sm font-medium text-gray-700">Fecha de
                                reporte</label>
                            <input type="report_date" name="report_date" id="report_date"
                                value="{{ old('report_date', $reporte->report_date) }}"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('report_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Área --}}
                        <div class="mb-4">
                            <label for="area" class="block text-sm font-medium text-gray-700">Área</label>
                            {{-- <input type="area" name="area" id="area" value="{{ old('area', $reporte->area) }}" --}}
                            <select id="area"
                                class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                                {{-- <option value="" class="uppercase">--Selecciona una área--</option> --}}
                                <option {{ old('area') == $key ? "selected" : "" }} value="{{ $value }}">
                                @foreach ($area as $area)
                                    <option class="uppercase" value="{{ $area->id }}">{{ $area->areas_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Sistema --}}
                        <div class="mb-4">
                            <label for="system" class="block text-sm font-medium text-gray-700">Sistema</label>
                            {{-- <input type="system" name="system" id="system" value="{{ old('system', $reporte->system) }}"> --}}
                            <select id="system"
                                class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                                <option value="" class="uppercase">--Selecciona un sistema--</option>
                                @foreach ($system as $system)
                                    <option class="uppercase" value="{{ $system->id }}">{{ $system->systems_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{--  Tipo --}}
                        <div class="mb-4">
                            <label for="type_report" class="block text-sm font-medium text-gray-700">Tipo</label>
                            {{-- <input type="type_report" name="type_report" id="type_report" value="{{ old('type_report', $reporte->type_report) }}"> --}}
                            <select id="type_report"
                                class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">

                                <option value="" class="uppercase">--Selecciona el tipo--</option>
                                @foreach ($type as $type)
                                    <option class="uppercase" value="{{ $type->id }}">
                                        {{ $type->name_types_reports }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Usuario --}}
                        <div class="mb-4">
                            <label for="reporting_user" class="block text-sm font-medium text-gray-700">Usuario</label>
                            <select id="reporting_user"
                                class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                                <option value="" class="uppercase">--Selecciona al usuario--</option>
                                @foreach ($user as $user)
                                    <option class="uppercase" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        {{-- Actions --}}
                        <div class="mb-4">
                            <label for="actions" class="block text-sm font-medium text-gray-700">Acción</label>
                            <input type="actions" name="actions" id="actions"
                                value="{{ old('actions', $reporte->actions) }}"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('actions')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <input type="description" name="description" id="description"
                                value="{{ old('description', $reporte->description) }}"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Evidence --}}
                        <div class="mb-4">
                            <label for="evidence" class="block text-sm font-medium text-gray-700">Evidencia</label>
                            {{-- <input type="evidence" name="evidence" id="evidence" value="{{ old('evidence', $reporte->evidence) }}" --}}
                            {{-- class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"> --}}
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M1.5 6a2.25 2.25 0 011.75-2.25h17.5A2.25 2.25 0 0123 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6ZM3 16.06V18a.75.75 0 00.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 01-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0Z" />
                                    </svg>
                                    <div class="mt-4 flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
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
                        <a href="{{ route('table.index') }}"
                            class="text-indigo-600 hover:text-indigo-800">Cancelar</a>
                    </div>
                </div>
            </div>
    </body>
</x-app-layout>
