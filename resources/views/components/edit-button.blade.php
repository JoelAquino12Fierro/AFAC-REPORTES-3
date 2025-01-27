<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 font-medium text-blue-600 hover:underline']) }}>
    {{ $slot }}
</button>