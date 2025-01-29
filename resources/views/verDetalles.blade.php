<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Ver detalles') }}
        </h2>
    </x-slot>

    <body>
        <div class="px-14 py-14 ">
            <div class="p-7 lg:p-8 bg-white border-b border-gray-200">
              
                <form name="formA" id="formA" class="max-w-md mx-auto " action="{{ route('reports.detalles', $reporte->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-12">
                        <div class="grid grid-cols-1">
                             {{-- Module --}}
                            <div class="mb-5">
                                <label for="module"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Módulo</label>
                                <select id="module" name="module"
                                    class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <option value=""  class="uppercase">--Selecciona el módulo--
                                    </option>
                                    @foreach ($modules_system as $modules)
                                    <option class="uppercase" name="module" value="{{$modules->modules}}">{{$modules->module->modules_name}}</option>
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
                                <label for="evidence" class="block text-sm font-medium text-gray-900">Subir
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
                                            <label for="evidence"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600">
                                                <span>Upload a file</span>
                                                <input id="evidence" name="evidence" type="file"
                                                    >
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Responsable --}}
                            <div class="grid md:grid-cols-4 md:gap-6">
                                <div class="col-span-3  mt-4 relative z-0 w-full mb-5 group">
                                    <label for="responsable"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Responsable</label>
                                    <input type="text" name="responsable" id="responsable"
                                        class="uppercase shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                        placeholder=" " required />

                                </div>
                                <div class="mt-11 relative z-0 w-full mb-5 group right-0">
                                    <button type="submit">
                                        <!-- <x-fluentui-add-square-24-o class="h-9 w-9 text-gray-600" /> -->
                                    </button>

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
    </body>
</x-app-layout>
