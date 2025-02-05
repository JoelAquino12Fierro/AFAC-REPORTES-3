<div>
    {{-- MODAL PARA VER LOS DETALLES DE LA TABLA DE REGISTROS. --}}

    <x-button class="text-left font-medium text-blue-600 hover:underline">
        Ver detalles
    </x-button>

    <x-dialog-modal>
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">
            <div>
                
            </div>
        </x-slot>

        <x-slot name="footer">
            <div>
                <x-button>Cancelar</x-button>
                <x-button>guardar</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
