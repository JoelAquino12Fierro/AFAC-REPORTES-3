<button {{ $attributes->class(['mt-4 text-white bg-[#003764] hover:bg-[#002b4b] focus:ring-[#002b4b] focus-visible:outline-[#002b4b] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center']) }}>
    {{ $slot }}
</button>
<!-- DIFERENCIAS, MERGE FUN DE LAS CLASES Y LA CLASE QUE NO ESTA LA AGREGA, EN CAMBIO EL METODO class AGREGA LAS CLASES QUE NO ESTAN DEFINIDAS -->

<!-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> -->