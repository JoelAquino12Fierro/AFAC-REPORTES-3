<div>
    {{-- MODAL PARA CONFIRMACIÓN DE ELIMINACIÓN. --}}
    <x-danger-button wire:click="$set('item', true)" class="mr-4">
        eliminar
    </x-danger-button>

    <x-dialog-modal wire:model="item">

    <x-slot name="title">
        <div class="flex flex-col items-center justify-center text-center">
        <div class="flex size-12 items-center justify-center rounded-full bg-[#e70909]/20 sm:size-16">
    {{-- Icono centrado --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-6 sm:size-8 bi bi-plus-square" viewBox="0 0 16 16">
                <g fill="#da0000">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </g>
            </svg>
        </div>

            {{-- Título centrado debajo del icono --}}
            <p class="mt-2 text-lg font-semibold text-gray-900">ELIMINAR USUARIO</p>
        </div>    
    </x-slot>
    <x-slot name="content">
        <p class="text-center">
            ¿Estás seguro de que deseas eliminar este elemento?
        </p>
    </x-slot>
    <x-slot name="footer">
    <div class="flex w-full gap-4">
        <x-button wire:click="$set('item', false)" class="flex-1 inline-flex items-center justify-center p-2 text-base font-semibold text-black text-center bg-white hover:bg-gray-100 focus:ring-gray-300">
            Atras
        </x-button>
        <x-button class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-base text-white tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Eliminar
        </x-button>
    </div>
</x-slot>
    </x-dialog-modal>
</div>
