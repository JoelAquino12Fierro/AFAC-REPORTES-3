<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('NUEVO REGISTRO') }}
        </h2>
    </x-slot>

    <div class="py-12 px-12">
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <form name="formRegister" id="formRegister"  method="POST" action="{{ route('newform.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="grid grid-cols-1">
                        <h2 class="text-base font-semibold text-gray-900">Folio:</h2>
                        <h2 class="text-base font-semibold text-gray-900">Fecha de creación:</h2>

                        <!-- Lista de las áreas -->
                        <label for="area" class="block text-sm font-medium text-gray-900">Seleccione el área</label>
                        <select name="area" id="area" class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                            <option value="">--Selecciona una opción--</option>
                            <option value="desarrollo_estrategico">Desarrollo estratégico</option>
                            <option value="recursos_humanos">Recursos humanos</option>
                            <option value="ventanilla">Ventanilla</option>
                        </select>
                        <br>

                        <!-- Lista de los sistemas -->
                        <label for="system" class="block text-sm font-medium text-gray-900">Seleccione el sistema</label>
                        <select name="system" id="system" class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                            <option value="">--Selecciona una opción--</option>
                            <option value="sitema1">Sistema 1</option>
                            <option value="sistema2">Sistema 2</option>
                            <option value="sistema3">Sistema 3</option>
                        </select>
                        <br>

                        <!-- Lista de los tipos de reporte -->
                        <label for="type_report" class="block text-sm font-medium text-gray-900">Seleccione el tipo de reporte</label>
                        <select name="type_report" id="type_report" class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                            <option value="">--Selecciona una opción--</option>
                            <option value="incidencia">Incidencia</option>
                            <option value="falla">Falla</option>
                            <option value="solicitud">Solicitud</option>
                        </select>
                        <br><br>

                        <!-- Campo de fecha -->
                        <div class="flex justify-end">
                            <input type="date" name="report_date" id="report_date" class="rounded-md">
                        </div>
                        <br><br>

                        <!-- Campo de descripción -->
                        <textarea name="description" id="description" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900" placeholder="Descripción..."></textarea>
                        <p class="mt-3 text-sm text-gray-600">Describe la Solicitud.</p>

                        <!-- Subir evidencia -->
                        <div class="col-span-full">
                            <label for="evidence" class="block text-sm font-medium text-gray-900">Subir Evidencia</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M1.5 6a2.25 2.25 0 011.75-2.25h17.5A2.25 2.25 0 0123 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6ZM3 16.06V18a.75.75 0 00.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 01-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0Z"/>
                                    </svg>
                                    <div class="mt-4 flex text-sm text-gray-600">
                                        <label for="evidence" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600">
                                            <span>Upload a file</span>
                                            <input name="evidence" id="evidence" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>

                        <!-- Botón de enviar -->
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
