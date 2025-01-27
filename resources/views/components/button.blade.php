<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-4 right-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-3 text-center inline-flex items-center shadow-lg']) }}>
    {{ $slot }}
</button>
