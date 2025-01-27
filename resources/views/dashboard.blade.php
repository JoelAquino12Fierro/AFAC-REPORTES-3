<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('BIENVENIDO AL SISTEMA DE INCIDENCIAS') }}
        </h2>
    </x-slot>

    {{-- Esto afecta lo que esta debajo del último recuadro de dashboard --}}
    <div class="py-12 px-12 ">
        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

            {{-- Primer apartado --}}
            <a {{-- id="docs-card" --}}
                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#1729c7] lg:pb-10">
                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#0000FF]/10 sm:size-16">
                    {{-- Este es el icono --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-5 sm:size-6" viewBox="0 0 16 16"><g fill="#003764"><path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/><path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/></g></svg>
                </div>

                <div class="relative flex items-center gap-6 lg:items-end">
                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                        <div class="pt-3 sm:pt-5 ">
                            <h2 class="text-xl font-semibold text-black">Ver registros</h2>

                            <p class="mt-4 text-sm/relaxed">
                                En este apartado podras visualizar todos tus registros generados
                            </p>
                        </div>
                    </div>
                    {{-- Para redirigir --}}
                    <form action="{{ route('table.index') }}" method="GET">
                        @csrf
                        
                        <button type="submit">Ir al módulo</button>
                    </form>
                </div>
                <svg class="size-6 shrink-0 self-center stroke-[#003764]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
            </a>





            {{-- Segundo apartado --}}


            <a {{-- id="docs-card" --}}
            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#1729c7] lg:pb-10">
            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#0000FF]/10 sm:size-16">
                {{-- Este es el icono --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-5 sm:size-6 bi bi-plus-square" viewBox="0 0 16 16"><g fill="#003764"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/></g></svg>
            </div>

            <div class="relative flex items-center gap-6 lg:items-end">
                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                    <div class="pt-3 sm:pt-5 ">
                        <h2 class="text-xl font-semibold text-black">Nuevo reporte</h2>

                        <p class="mt-4 text-sm/relaxed">
                            En este apartado podras generar  el reporte que deseas realizar
                        </p>
                    </div>
                </div>
                {{-- Para redirigir --}}
                <form action="{{ route('table.index') }}" method="GET">
                    @csrf
                    <button type="submit">Ir al módulo</button>
                </form>
            </div>
            <svg class="size-6 shrink-0 self-center stroke-[#003764]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
        </a>
            


        </div>
    </div>
</x-app-layout>
