<div>


    <div x-data="{ open: @entangle('open') }">
        <x-button @click="open = true">
            Ejemplo
        </x-button>

        <x-dialog-modal x-show="open" wire:model="open">
            <x-slot name="title">
                Título del Modal
            </x-slot>

            <x-slot name="content">
                Contenido del modal aquí...
            </x-slot>

            <x-slot name="footer">
                <x-button @click="open = false">
                    Cerrar
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </div> 

</div>

