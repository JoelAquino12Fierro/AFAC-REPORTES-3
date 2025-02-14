<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('CATÁLOGOS') }}
        </h2>
    </x-slot>

    <body>
        <!-- Fondo oscurecido -->
        <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-40 backdrop-filter-none z-40"></div>

        <!-- Modal de Éxito -->
        <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto  ">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">¡REGISTRO ÉXITOSO!</p>

                </div>
                <!-- Cuerpo del modal -->
                <div class="p-4 justify-center">
                    <p class="text-gray-700 mt-2 text-center " id="successModalMessage"></p> <!-- Asegurar este ID -->
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
                        <div class="text-black text-sm text-center" id="errorModalMessage"></div>
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

        <div class="px-4 py-10 md:px-10 md:py-14 flex flex-col md:flex-row gap-4 rounded-md">
            <div class="basis-1/3 mr-2 bg-white rounded-md p-4">
                <a href="#" onclick="showForm('area-form')"
                    class=" flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3">ÁREAS</span>
                </a>
                <a href="#" onclick="showForm('module-form')"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                        <path
                            d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                    </svg>

                    <span class="ms-3">MÓDULOS Y SISTEMAS </span>
                </a>
                <a href="#" onclick="showForm('system-form')"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                    </svg>
                    <span class="ms-3">SISTEMAS</span>
                </a>
                <a href="#" onclick="showForm('create-module-form')"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                        <path
                            d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                    </svg>

                    <span class="ms-3">MÓDULOS</span>
                </a>
            </div>


            {{-- Formularios --}}
            <!-- AREA -->
            <div class="flex-1 bg-white rounded-md p-6" id="area-form">
                <!-- <form action="{{ route('register.area') }}" method="POST"> -->
                <form id="f-area-form">
                    @csrf
                    <label for="area" class="block mb-2 text-sm font-medium text-gray-900">NOMBRE ÁREA</label>
                    <input type="text" id="area" name="area"
                        class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Ingresa aquí..." required />
                    <button type="submit"
                        class=" mt-4 text-white bg-[#003764] hover:bg-[#002b4b] focus:ring-[#002b4b] focus-visible:outline-[#002b4b] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Registrar</button>
                </form>
            </div>

            <!-- SISTEMA-MODULE -->

            <div class="flex-1 bg-white rounded-md p-6 hidden" id="module-form">
                <!-- <form action="{{ route('register.sysmod') }}" method="POST"> -->
                <form id="f-module-sys-form">
                    @csrf
                    <label for="system" class="block mb-2 text-sm font-medium text-gray-900">SISTEMA</label>
                    <select id="system" name="system" onchange="updateModules()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        {{-- <option value="">Selecciona un sistema</option> --}}

                        @foreach($systems as $system)
                        <option value="{{ $system->id }}">{{ $system->systems_name }}</option>
                        @endforeach
                    </select>

                    <label for="module" class="block mt-4 mb-2 text-sm font-medium text-gray-900">MÓDULO</label>
                    <select id="module" name="module"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->modules_name }}</option>
                        @endforeach
                    </select>

                    <button type="submit"
                        class="mt-4 text-white bg-[#003764] hover:bg-[#002b4b] focus:ring-[#002b4b] focus-visible:outline-[#002b4b] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Registrar</button>
                </form>
            </div>
            <!-- SISTEMA -->
            <div class="flex-1 bg-white rounded-md p-6 hidden" id="system-form">
                <!-- <form action="{{ route('register.system') }}" method="POST"> -->
                <form id="f-system-form">
                    @csrf
                    <label for="system" class="block mb-2 text-sm font-medium text-gray-900">NOMBRE DEL
                        SISTEMA</label>
                    <input type="text" id="system" name="system"
                        class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Ingresa aquí..." required />
                    <button type="submit"
                        class="mt-4 text-white bg-[#003764] hover:bg-[#002b4b] focus:ring-[#002b4b] focus-visible:outline-[#002b4b] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Registrar</button>
                </form>
            </div>

            <div class="flex-1 bg-white rounded-md p-6 hidden" id="create-module-form">
                <!-- <form action="{{ route('register.module') }}" method="POST"> -->
                <form id="module-form">
                    @csrf
                    <label for="newModule" class="block mb-2 text-sm font-medium text-gray-900">NOMBRE DEL
                        MÓDULO</label>
                    <input type="text" id="module" name="module"
                        class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Ingresa aquí..." required />
                    <button type="submit"
                        class="mt-4 text-white bg-[#003764] hover:bg-[#002b4b] focus:ring-[#002b4b] focus-visible:outline-[#002b4b] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Registrar</button>
                </form>
            </div>

        </div>
        <script>
            var formRoutes = {
                "f-area-form": "{{ url('newArea') }}",
                "f-module-sys-form": "{{ url('systeModule') }}",
                "f-system-form": "{{ url('newSystem') }}",
                "module-form": "{{ url('newModule') }}"
            };
        </script>



    </body>
</x-app-layout>