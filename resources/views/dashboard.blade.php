<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('BIENVENIDO AL SISTEMAS DE INCIDENCIAS') }}
        </h2>
    </x-slot>

    {{-- Esto afecta lo que esta debajo del último recuadro de dashboard --}}
    <div class="py-12 px-12 ">
        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

            {{-- Primer apartado --}}
            <a
                {{-- id="docs-card" --}}
                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#1729c7] lg:pb-10"
            >
            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#1729c7]/10 sm:size-16">
                {{-- Este es el icono --}}
                {{-- <svg class="size-5 sm:size-6"  fill="none" viewBox="0 0 24 24"><g fill="#1729c7"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg> --}}
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
                    <form action="{{route('reports')}}">
                        @csrf 
                        <button type="submit">Ir al módulo</button>
                    </form>
                </div>
            </a>


            {{-- Segundo apartado --}}
            <a
               
                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#1729c7] lg:pb-10"
            >
                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#1729c7]/10 sm:size-16">
                    {{-- Este es el icono --}}
                    {{-- <svg class="size-5 sm:size-6"  fill="none" viewBox="0 0 24 24"><g fill="#1729c7"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg> --}}
                </div>

                <div class="pt-3 sm:pt-5">
                    <h2 class="text-xl font-semibold text-black">Nuevo Registro</h2>

                    <p class="mt-4 text-sm/relaxed">
                        En este apartado podras generar un nuevo registro
                    </p>
                </div>
                 {{-- Para redirigir --}}
                 {{-- <form action="{{route('reports')}}">  --}}
                    {{-- @csrf  --}}
                    <button type="submit">Ir al módulo</button>
                {{-- </form> --}}
                
            </a>


        </div>
    </div>
</x-app-layout>
