<div>
    {{-- MODAL PARA LA CREACIÓN DE UN NUEVO REPORTE --}}
    <x-button class="rounded-md bg-[#003764] px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-[#002b4b] focus:ring-[#002b4b] focus-visible:outline-[#002b4b]"
        wire:click="$set('confirmReport', true)">
        Guardar
    </x-button>

    <x-dialog-modal wire:model="confirmReport">
        <x-slot name="title">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="flex size-12 items-center justify-center rounded-full bg-[#003764]/20 sm:size-16">
                    {{-- Icono centrado --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-6 sm:size-8 bi bi-plus-square" viewBox="0 0 16 16">
                        <g fill="#003764">
                            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z" />
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1" />
                        </g>
                    </svg>
                </div>

                {{-- Título centrado debajo del icono --}}
                <p class="mt-2 text-lg font-semibold text-gray-900">CREAR REPORTE</p>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="text-center">
                <p>¿Estas seguro de crear un nuevo reporte?</p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex w-full gap-4">
                {{-- Botón Cancelar con borde gris tenue --}}
                <button class="w-1/2 px-4 py-2 border border-gray-300 text-black rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
                    wire:click="$set('confirmReport', false)">
                    Cancelar
                </button>
                {{-- Botón Confirmar con color azul --}}
                <button class="w-1/2 px-4 py-2 bg-[#003764] text-white rounded-md border-2 border-transparent hover:bg-[#002b4b] hover:border-[#003764] focus:outline-none focus:ring-2 focus:ring-[#003764] focus:ring-offset-2">
                    Confirmar
                </button>

            </div>
        </x-slot>
    </x-dialog-modal>
</div>