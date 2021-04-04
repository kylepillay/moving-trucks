<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-lg justify-center px-5 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
