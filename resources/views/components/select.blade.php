@props(['options' => [], 'placeholder' => 'Select an option'])

<div x-data="{ open: false, selected: '', selectedLabel: '' }" class="relative">
    <button 
        type="button" 
        @click="open = !open" 
        @click.away="open = false"
        class="w-full bg-ash-900 border border-ash-700 rounded-lg px-4 py-3 text-left flex items-center justify-between focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors"
        :class="{ 'text-white': selected, 'text-ash-500': !selected }"
    >
        <span x-text="selectedLabel || '{{ $placeholder }}'"></span>
        <svg class="w-5 h-5 text-ash-500 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <input type="hidden" {{ $attributes }} x-model="selected">

    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 w-full mt-2 bg-ash-900 border border-ash-700 rounded-lg shadow-xl overflow-hidden max-h-60 overflow-y-auto"
        style="display: none;"
    >
        @foreach($options as $value => $label)
            <div 
                @click="selected = '{{ $value }}'; selectedLabel = '{{ $label }}'; open = false"
                class="px-4 py-3 cursor-pointer hover:bg-lava-600/20 hover:text-lava-500 transition-colors text-white"
                :class="{ 'bg-lava-600/10 text-lava-500': selected === '{{ $value }}' }"
            >
                {{ $label }}
            </div>
        @endforeach
    </div>
</div>
