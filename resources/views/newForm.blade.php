<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('NUEVO REGISTRO') }}
        </h2>
    </x-slot>
    {{-- <div class="px-18 py-14 ">

        <form class="max-w-sm mx-auto">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                <h2 class=" mb-4 text-center"> Nuevo reporte</h2>
                <div class="mb-5">
                    <label for="area"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área</label>
                    <input type="area" id="area" name="area"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Ingresa aquí" required />
                </div>
                <div class="mb-5">
                    <label for="system"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sistema</label>
                    <input type="system" id="system" name="system"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Ingresa aquí" required />
                </div>
                <div class="mb-5">
                    <label for="type_report" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo
                        de reporte</label>
                    <input type="type_report" id="type_report" name="type_report"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Ingresa aquí" required />
                </div>
                <div class="mb-5">
                    <label for="report_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                        del reporte</label>
                    <input type="date" id="report_date" name="report_date"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required />
                </div>

                <div class="mb-5">
                    <label for="report_user"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                    <input type="string" id="report_user" name="report_user"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Ingresa aquí..." required />
                </div>
                <div class="mb-5">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                    <input type="textarea" id="description" name="description"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Ingresa aquí" required />
                </div>
                <div class="col-span-full">
                    <label for="file-upload" class="block text-sm font-medium text-gray-900">Subir Evidencia</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
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
                </div>
            <div>
                <button class=" mt-4 w-1/8 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-700 text-white hover:bg-blue-800 ">
                    Enviar
                </button>
            </div>
    </div>
    </form>


    </div>


</x-app-layout> --}}














    <div class="px-14 py-14 ">
        <div class="p-7 lg:p-8 bg-white border-b border-gray-200">
            <form name="formRegister" id="formRegister">
                <div class="space-y-12">
                    <div class="grid grid-cols-1">
                        {{-- Folio --}}
                        <div class="mb-5">
                            <label for="folio"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folio</label>
                            <input type="text" id="disabled-input" aria-label="disabled input" name="folio"
                                class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="DTIARS-" disabled>
                        </div>
                        {{-- Fecha de creación --}}
                        <div class="mb-5">
                            <label for="application_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                                creacion</label>
                            <input type="date" id="application_date" aria-label="disabled input"
                                name="application_date"
                                class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="22/12/2004" disabled>
                        </div>
                        {{-- Area --}}
                        <div class="mb-5">
                            <label for="area"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área</label>
                            <select id="area"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option></option>

                            </select>
                        </div>
                        {{-- sistema --}}
                        <div class="mb-5">
                            <label for="system"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sistema</label>
                            <select id="system"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option></option>

                            </select>
                        </div>
                        {{-- Tipo --}}
                        <div class="mb-5">
                            <label for="type_report"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo
                                de reporte</label>
                            <select id="type_report"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option></option>

                            </select>
                        </div>
                        {{-- Fecha reporte --}}
                        <div class="mb-5">
                            <label for="report_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                del reporte</label>
                            <input type="date" id="report_date" name="report_date"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required />
                        </div>
                        {{-- Usuario --}}
                        <div class="mb-5">
                            <label for="report_user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                            <select id="report_user"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option></option>

                            </select>
                        </div>
                        {{-- Descripcion --}}
                        <div class="mb-5">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <input type="textarea" id="description" name="description"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Ingresa aquí" required />
                        </div>
                        {{-- Evidencia --}}
                        <div class="col-span-full">
                            <label for="file-upload" class="block text-sm font-medium text-gray-900">Subir
                                Evidencia</label>
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
                        </div>



                        <!-- Lista de las áreas -->
                        {{-- <label for="firstList" class="block text-sm font-medium text-gray-900">Seleccione el
                            área</label>
                        <select id="firstList"
                            class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                            <option value="">--Selecciona una opción--</option>
                            <option value="desarrollo_estrategico">Desarrollo estratégico</option>
                            <option value="recursos_humanos">Recursos humanos</option>
                            <option value="ventanilla">Ventanilla</option>
                        </select>
                        <br> --}}

                        <!-- Lista de los sistemas -->
                        {{-- <label for="secondList" class="block text-sm font-medium text-gray-900">Seleccione el
                            sistema</label>
                        <select id="secondList"
                            class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                            <option value="">--Selecciona una opción--</option>
                        </select>
                        <br> --}}

                        <!-- Lista de los tipos de reporte -->
                        {{-- <label for="thirdList" class="block text-sm font-medium text-gray-900">Seleccione el tipo de
                            reporte</label>
                        <select id="thirdList"
                            class="w-full rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900">
                            <option value="">--Selecciona una opción--</option>
                            <option value="incidencia">Incidencia</option>
                            <option value="falla">Falla</option>
                            <option value="solicitud">Solicitud</option>
                        </select>
                        <br><br> --}}

                        <!-- Campo de fecha -->
                        {{-- <div class="flex justify-end">
                            <input type="date" class="rounded-md">
                        </div>
                        <br><br> --}}

                        <!-- Campo de descripción -->
                        {{-- <textarea class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900" placeholder="Descripción..."></textarea>
                        <p class="mt-3 text-sm text-gray-600">Describe la Solicitud.</p> --}}

                        <!-- Subir evidencia -->
                        {{-- <div class="col-span-full">
                            <label for="file-upload" class="block text-sm font-medium text-gray-900">Subir
                                Evidencia</label>
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
                        </div> --}}

                        <!-- Botón de enviar -->
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit"
                                class="rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold  border border-transparent  text-white hover:bg-blue-800">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
