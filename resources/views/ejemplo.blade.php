<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('USUARIOS') }}
        </h2>
    </x-slot>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <body>
        <button id="modal" name="modal">Modal</button>
        <!-- Modal Editar Usuario -->
        <div id="editModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-auto max-w-2xl">
                <!-- Encabezado -->
                <div class="flex items-center justify-between p-4 border-b">
                    <img src="{{ asset('img/AFAC_azul.png') }}" alt="logo" class="h-20 mr-2">
                    <p class="text-center text-azul-afac font-bold text-xl ml-2">EDITAR USUARIO</p>
                </div>
                <!-- Cuerpo del Modal con Formulario -->
                <div class="p-4">
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="flex justify-end p-4 border-t">
                    <button id="guardar" name="guardar"> Guardar </button>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset(path: 'js/ejemplo.js') }}"></script>
</x-app-layout>