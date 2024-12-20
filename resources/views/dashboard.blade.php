<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Esto afecta lo que esta debajo del último recuadro de dashboard --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Primer apartado --}}
                <div class="flex-">
                </div>

                {{-- Segundo apartado --}}
            </div>
        </div>
    </div>
</x-app-layout>
