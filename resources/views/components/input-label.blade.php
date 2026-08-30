@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-400 font-[Orbitron] tracking-wide']) }}>
    {{ $value ?? $slot }}
</label>
