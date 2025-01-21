<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('NUEVO REGISTRO') }}
        </h2>
    </x-slot>
 
    <div class="px-14 py-14 ">
        <div class="p-7 lg:p-8 bg-white border-b border-gray-200">
            <form name="formRegister" id="formRegister" action="{{route('addreport')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="grid grid-cols-1">
                        {{-- Folio --}}
                        <div class="mb-5">
                            <label for="folio"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folio</label>
                            <input type="text" id="disabled-input" aria-label="disabled input" name="folio"
                                class="uppercase font-bold mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{$folio}}" disabled>
                        </div>
                        {{-- Fecha de creación --}}
                        <div class="mb-5">
                            <label for="application_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                                creacion</label>
                            <input type="date" id="application_date" aria-label="disabled input"
                                name="application_date"
                                class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="" disabled>
                        </div>
                        {{-- Area --}}
                        <div class="mb-5">
                            <label for="area"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área</label>
                            <select id="area"
                                class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="" class="uppercase">--Selecciona un área--</option>
                                @foreach($area as $area)
                                <option class="uppercase" value="{{$area->id}}">{{$area->areas_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- sistema --}}
                        <div class="mb-5">
                            <label for="system"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sistema</label>
                            <select id="system"
                                class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="" class="uppercase">--Selecciona un sistema--</option>
                                @foreach($system as $system)
                                <option class="uppercase" value="{{$system->id}}">{{$system->systems_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        {{-- Tipo --}}
                        <div class="mb-5">
                            <label for="type_report"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo
                                de reporte</label>
                            <select id="type_report"
                                class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="" class="uppercase">--Selecciona el tipo--</option>
                                @foreach($type as $type)
                                <option class="uppercase" value="{{$type->id}}">{{$type->name_types_reports}}</option>
                                @endforeach

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
                                class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="" class="uppercase">--Selecciona al usuario--</option>
                                @foreach($user as $user)
                                <option class="uppercase" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        {{-- Descripcion --}}
                        <div class="mb-5">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <input type="textarea" id="description" name="description"
                                class="uppercase shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Ingresa aquí" required />
                        </div>
                        {{-- Evidencia --}}
                        <div class="col-span-full">
                            <label for="file-upload" class="block text-sm font-medium text-gray-900">Subir
                                Evidencia</label>
                                {{-- <input id="file-upload" name="file-upload" type="file" > --}}
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
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
                            <button type="submit"
                                class="rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold  border border-transparent  text-white hover:bg-blue-800">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
