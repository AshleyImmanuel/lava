@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full bg-white/5 border border-white/10 focus:border-red-500 focus:ring-1 focus:ring-red-500 rounded-md px-4 py-3 text-white placeholder-gray-500 shadow-sm transition-all duration-300']) }}>
