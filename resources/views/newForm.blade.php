<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('NUEVO REGISTRO') }}
        </h2>
    </x-slot>

    <body class="bg-white">
        <div class="px-14 py-14 ">
            <div class="p-7 lg:p-8 bg-white border-b border-gray-200">
                <form id="registroForm" class="p-6 bg-white shadow-md rounded-lg"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <div class="grid grid-cols-1">
                            {{-- Folio --}}
                            <div class="mb-5">
                                <label for="folio" class="block mb-2 text-sm font-medium text-gray-900">Folio</label>
                                <input type="text" id="disabled-input" aria-label="disabled input" name="folio"
                                    class="uppercase font-bold mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                                    value="{{ $folio }}" disabled>
                            </div>
                            {{-- Fecha de creación --}}
                            <div class="mb-5">
                                <label for="application_date"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de
                                    creacion</label>
                                <input type="text" id="application_date" aria-label="disabled input"
                                    name="application_date"
                                    class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                                    value="{{ $date }}" disabled>
                            </div>
                            {{-- Area --}}
                            <div class="mb-5">
                                <label for="area" class="block mb-2 text-sm font-medium text-gray-900">Área</label>
                                <select id="area" name="area"
                                    class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="" class="uppercase">--Selecciona un área--</option>
                                    @foreach ($area as $ar)
                                    <option class="uppercase" value="{{ $ar->id }}">{{ $ar->areas_name }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                            {{-- sistema --}}
                            <div class="mb-5">
                                <label for="system"
                                    class="block mb-2 text-sm font-medium text-gray-900">Sistema</label>
                                <select id="system" name="system"
                                    class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                    <option value="" class="uppercase">--Selecciona un sistema--</option>
                                    @foreach ($system as $sys)
                                    <option class="uppercase" value="{{ $sys->id }}">
                                        {{ $sys->systems_name }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            {{-- Tipo --}}
                            <div class="mb-5">
                                <label for="type_report" class="block mb-2 text-sm font-medium text-gray-900 ">Tipo
                                    de reporte</label>
                                <select id="type_report" name="type_report"
                                    class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                    <option value="" class="uppercase">--Selecciona el tipo--</option>
                                    @foreach ( $type as $ty)
                                    <option class="uppercase" value="{{ $ty->id }}">
                                        {{ $ty->name_types_reports }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            {{-- Fecha reporte --}}
                            <div class="mb-5">
                                <label for="report_date" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha
                                    del reporte</label>
                                <input type="date" id="report_date" name="report_date"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required />
                            </div>
                            {{-- Usuario --}}
                            <div class="mb-5">
                                <label for="report_user"
                                    class="block mb-2 text-sm font-medium text-gray-900">Usuario</label>
                                <input type="text" id="report_user" name="report_user"
                                    class="uppercase shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full "
                                    placeholder="Ingresa aquí" required />
                            </div>
                            {{-- Descripcion --}}
                            <div class="mb-5">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Descripción</label>
                                <input type="textarea" id="description" name="description"
                                    class="uppercase shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-10"
                                    placeholder="Ingresa aquí" required />
                            </div>
                            {{-- Evidencia --}}

                            <div class="col-span-full">
                                <label for="file" class="block text-sm font-medium text-gray-900">Subir
                                    Evidencia</label>

                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M1.5 6a2.25 2.25 0 011.75-2.25h17.5A2.25 2.25 0 0123 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6ZM3 16.06V18a.75.75 0 00.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 01-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0Z" />
                                        </svg>
                                        <div class="mt-4 flex text-sm text-gray-600">
                                            <label for="file"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600">
                                                <span>Upload a file</span>
                                                <input id="file" name="file" type="file" >
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de enviar -->
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="submit">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fondo oscurecido -->
        <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-40 backdrop-filter-none z-40"></div>

        <!-- Modal de Éxito -->
        <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto  ">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">REGISTRO EXITOSO</p>

                </div>
                <!-- Cuerpo del modal -->
                <div class="p-4 justify-center">
                    <p class="text-gray-700 mt-2 text-center">¡Reporte generado con éxito!</p>
                    <p class="text-gray-700 mt-2 text-center">Número de folio:</p>
                    <p class="text-gray-700 mt-2 text-center font-semibold" id="successModalMessage"></p> 
                </div>
                <!-- Pie del modal -->
                <div class="flex justify-end p-4 border-t ">
                    <button onclick="closeModal('successModal')" class="mt-4 bg-azul-afac text-white px-4 py-2 rounded-md">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>


        <!-- Modal de Error -->
        <div id="errorModal" class="flex items-center justify-center  hidden fixed inset-0  z-50">
            <div class="bg-white rounded-lg shadow-lg p-4 w-80 relative border-t-4 border-red-600">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="white">
                        <circle cx="12" cy="12" r="10" fill="#F87171" />
                        <path fill="white" d="M8 8L16 16M16 8L8 16" stroke="white" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <div class="ml-3">
                        <h2 class="text-red-600 font-semibold text-xl text-center">ERROR</h2>
                    </div>
                </div>
                <div class="mb-4 justify-center">
                    <p class="text-black text-sm text-center" id="errorModalMessage"></p>
                </div>
                <div class="flex justify-end mt-2">
                    <button onclick="closeModal('errorModal')" class="px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Intentar de nuevo
                    </button>
                </div>
            </div>
        </div>

        <script>
            var addReportUrl = "{{ route('addreport') }}"; // Definir URL para JavaScript
        </script>
    </body>
    <script src="{{ asset('js/newForm.js') }}"></script>

</x-app-layout>
