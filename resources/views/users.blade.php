<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <body>

        <div class="px-10 py-10 ">

            <div class=" relative overflow-x-auto shadow-md sm:rounded-lg">

                <div
                    class=" flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">

                    {{-- Buscador de usuarios --}}
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search-users"
                            class=" mt-4 left-2 block  p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Buscar usuarios">
                    </div>


                    <div class="top-0 righ-0 mt-2">
                        <form>
                            <button type="button"
                                class="mt-4 right-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <x-ik-add class="h-6 w-6" />
                                Nuevo
                            </button>
                        </form>
                    </div>
                </div>



                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rol
                            </th>

                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                    <div class="ps-3">
                                        {{-- Nombre --}}
                                        <div class="text-base font-semibold">
                                            {{ $user->name }}

                                        </div>
                                        {{-- Correo electronico --}}
                                        <div class="font-normal text-gray-500">
                                            {{ $user->email }}

                                        </div>
                                    </div>
                                </th>
                                {{-- Rols --}}
                                <td class="px-6 py-4 ">
                                    React Developer
                                </td>
                                {{-- Action buttom edit --}}
                                <td class="px-6 py-4">
                                    <form>
                                        <button type="submit"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> Editar
                                        </button>
                                    </form>
                                </td>
                                {{-- Delete --}}
                                <td class="px-6 py-4">
                                    <form>
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </body>
</x-app-layout>
