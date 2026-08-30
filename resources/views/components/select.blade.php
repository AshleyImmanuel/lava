@props(['options' => [], 'placeholder' => 'Select an option', 'value' => null])

@php
    $fieldName = $attributes->get('name');
    $initialValueRaw = old($fieldName, $value);
    $initialValue = is_null($initialValueRaw) ? '' : (string) $initialValueRaw;

    $normalizedOptions = [];
    foreach ($options as $optionValue => $optionLabel) {
        $normalizedOptions[(string) $optionValue] = (string) $optionLabel;
    }

    $initialLabel = $normalizedOptions[$initialValue] ?? '';
@endphp

<div x-data="{ open: false, selected: @js($initialValue), selectedLabel: @js($initialLabel) }" class="relative">
    <button 
        type="button" 
        @click="open = !open" 
        @click.away="open = false"
        class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-left flex items-center justify-between focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors"
        :class="{ 'text-white': selected, 'text-gray-500': !selected }"
    >
        <span x-text="selectedLabel || '{{ $placeholder }}'"></span>
        <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <input type="hidden" {{ $attributes->merge(['value' => $initialValue]) }} x-model="selected">

    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 w-full mt-2 bg-zinc-900/95 border border-white/20 rounded-xl shadow-2xl overflow-hidden max-h-60 overflow-y-auto backdrop-blur-sm"
        style="display: none;"
    >
        @foreach($normalizedOptions as $optionValue => $optionLabel)
            <div 
                @click='selected = @js($optionValue); selectedLabel = @js($optionLabel); open = false'
                class="px-4 py-3 cursor-pointer hover:bg-red-500/20 hover:text-red-200 transition-colors text-white"
                :class='{ "bg-red-500/15 text-red-200": selected === @js($optionValue) }'
            >
                {{ $optionLabel }}
            </div>
        @endforeach
    </div>
</div>
