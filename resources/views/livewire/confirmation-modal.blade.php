<div>
    {{-- MODAL PARA CONFIRMACIONES. --}}
    <x-button class="mt-4 right-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-3 text-center inline-flex items-center shadow-lg"
        wire:click="$set('open', true)">
        Nuevo
    </x-button>

    <x-dialog-modal wire:model="confirmOpen">
        <x-slot name="title">
            Confirmar Acción
        </x-slot>
        <x-slot name="content">
            <p>¿Estás seguro de que deseas crear este usuario?</p>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="createUser" class="bg-green-500 text-white px-4 py-2 rounded-lg">Confirmar</button>
            <button wire:click="$set('confirmOpen', false)" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Atrás</button>
        </x-slot>
    </x-dialog-modal>
</div>
