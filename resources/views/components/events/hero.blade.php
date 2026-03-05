@props(['event'])

<!-- Banner Image -->
<div class="relative h-64 md:h-96 rounded-3xl overflow-hidden border border-white/10">
    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent z-10"></div>
    @if($event->image_url)
        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
    @else
        @php
            $gameBanners = [
                'VALORANT' => '/images/events/valorant-banner.svg',
                'Counter-Strike 2' => '/images/events/cs2-banner.svg',
                'Free Fire' => '/images/events/freefire-banner.svg',
            ];
            $gameName = $event->game->name ?? '';
            $bannerUrl = $gameBanners[$gameName] ?? null;
        @endphp
        @if($bannerUrl)
            <img src="{{ $bannerUrl }}" alt="{{ $gameName }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gradient-to-br from-lava-600/40 via-lava-900/30 to-black flex items-center justify-center">
                <svg class="w-24 h-24 text-white/10" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 2c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4-3c-.83 0-1.5-.67-1.5-1.5S18.67 9 19.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                </svg>
            </div>
        @endif
    @endif
    
    <div class="absolute bottom-6 left-6 z-20">
        <span class="px-3 py-1 rounded-lg bg-lava-600 text-white text-xs font-bold tracking-widest uppercase pixelate mb-2 inline-block">
            {{ $event->game->name ?? 'ESPORTS' }}
        </span>
        <h1 class="text-3xl md:text-5xl font-black text-white font-[Orbitron] mt-2">{{ $event->title }}</h1>
    </div>
</div>
