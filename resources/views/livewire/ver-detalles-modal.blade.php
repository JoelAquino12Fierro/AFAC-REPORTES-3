<div>
    {{-- MODAL PARA VER LOS DETALLES DE LA TABLA DE REGISTROS. --}}

    <x-button 
    class="bg-teal-500 text-white font-bold py-2 px-4 rounded-lg flex-1 mr-4 items-center space-x-2 transition duration-300 ease-in-out hover:bg-teal-600 active:bg-teal-700"
    wire:click="$set('detalles', true)">
        Ver detalles
    </x-button>

    <x-dialog-modal wire:model="detalles">
        <x-slot name="title">
            
        </x-slot>

        <x-slot name="content">
    <div class="w-full h-full">
        <div class="p-4 lg:p-6 bg-white">
            <form name="formA" id="formA" class="w-full" action="" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-12">
                    <div class="grid grid-cols-1">
                        {{-- Module --}}
                        <div class="mb-5">
                            <label for="module" class="block mb-2 text-sm font-medium text-gray-900">Módulo</label>
                            <select id="module" name="module" class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" class="uppercase">--Selecciona el módulo--</option>
                                
                            </select>
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                            <textarea id="description" name="description" class="uppercase shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingresa aquí" required></textarea>
                        </div>

                        {{-- Evidencia --}}
                        <div class="col-span-full">
                            <label for="evidence" class="block text-sm font-medium text-gray-900">Subir Evidencia</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M1.5 6a2.25 2.25 0 011.75-2.25h17.5A2.25 2.25 0 0123 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6ZM3 16.06V18a.75.75 0 00.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 01-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0Z"/>
                                    </svg>
                                    <div class="mt-4 flex text-sm text-gray-600">
                                        <label for="evidence" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600">
                                            <span>Subir archivo</span>
                                            <input id="evidence" name="evidence" type="file" accept=".png, .jpg, .jpeg, .gif">
                                        </label>
                                        <p class="pl-1">o arrastrar y soltar</p>
                                    </div>
                                    <p class="text-xs text-gray-600">PNG, JPG, GIF hasta 10MB</p>
                                </div>
                            </div>
                        </div>

                        {{-- Responsable --}}
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="col-span-3 mt-4 relative z-0 w-full mb-5 group">
                                <label for="responsable" class="block mb-2 text-sm font-medium text-gray-900">Responsable</label>
                                <input type="text" name="responsable" id="responsable" class="uppercase shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Nombre del responsable" required>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-slot>


        <x-slot name="footer">
            <div class="flex gap-4">
                <x-button wire:click="$set('detalles', false)" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg">Cancelar</x-button>
                <x-button wire:click="confirmar" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg">Guardar</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>

    {{--modalParaConfirmaciónDeGuardarRegistro--}}

    <x-dialog-modal wire:model="confirmSaveReport">
    <x-slot name="title">
            Confirmar Acción
        </x-slot>
        <x-slot name="content">
            <p>¿Estás seguro de que deseas crear este usuario?</p>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-between w-full">
                <div>
                    <button wire:click="backFirstModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Atrás</button>
                </div>
                <div>
                    <button wire:click="" class="bg-green-500 text-white px-4 py-2 rounded-lg">Confirmar</button>
                </div>
            </div>
        </x-slot>
    </x-dialog-modal>

</div>
