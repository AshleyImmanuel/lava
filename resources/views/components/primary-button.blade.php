<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-3 bg-lava-600 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-lava-500 active:bg-lava-700 focus:outline-none focus:ring-2 focus:ring-lava-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-[0_0_15px_rgba(220,38,38,0.3)] hover:shadow-[0_0_25px_rgba(220,38,38,0.5)]']) }}>
    {{ $slot }}
</button>
