<button {{ $attributes->class(['mt-4 right-2 font-medium rounded-lg text-sm px-6 py-3 text-center inline-flex items-center shadow-lg']) }}>
    {{ $slot }}
</button>
<!-- DIFERENCIAS, MERGE FUN DE LAS CLASES Y LA CLASE QUE NO ESTA LA AGREGA, EN CAMBIO EL METODO class AGREGA LAS CLASES QUE NO ESTAN DEFINIDAS -->

<!-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> -->