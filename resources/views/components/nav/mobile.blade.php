<div id="mobile-menu" class="fixed inset-0 z-[100] bg-black transform translate-x-full transition-transform duration-300 lg:hidden">
    <div class="flex flex-col h-full p-8">
        <div class="flex items-center justify-between mb-12">
            <span class="text-2xl font-black text-white">MENU</span>
            <button onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')" class="p-2 text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <div class="flex-1 flex flex-col gap-6">
            <a href="{{ route('home') }}" class="text-3xl font-black {{ request()->routeIs('home') ? 'text-red-500' : 'text-white/30 hover:text-white' }} transition-colors">HOME</a>
            <a href="{{ route('about') }}" class="text-3xl font-black {{ request()->routeIs('about') ? 'text-red-500' : 'text-white/30 hover:text-white' }} transition-colors">ABOUT</a>
            <a href="{{ route('teams.index') }}" class="text-3xl font-black {{ request()->routeIs('teams.*') ? 'text-red-500' : 'text-white/30 hover:text-white' }} transition-colors">OUR ROSTER</a>
            <a href="{{ route('mini-games') }}" class="text-3xl font-black {{ request()->routeIs('mini-games') ? 'text-red-500' : 'text-white/30 hover:text-white' }} transition-colors">MINI GAMES</a>
            <a href="{{ route('events.index') }}" class="text-3xl font-black {{ request()->routeIs('events.*') ? 'text-red-500' : 'text-white/30 hover:text-white' }} transition-colors">EVENTS</a>
            <a href="{{ route('contact') }}" class="text-3xl font-black {{ request()->routeIs('contact') ? 'text-red-500' : 'text-white/30 hover:text-white' }} transition-colors">CONTACT</a>
        </div>
        
        <div class="space-y-3 mt-auto">
            @guest
                <a href="{{ route('register') }}" class="block w-full py-4 bg-red-600 text-center text-sm font-bold text-white uppercase tracking-widest rounded-lg">JOIN NOW</a>
                <a href="{{ route('login') }}" class="block w-full py-4 bg-white/5 text-center text-sm font-bold text-white uppercase tracking-widest rounded-lg border border-white/10">LOGIN</a>
            @else
                <a href="{{ route('dashboard') }}" class="block w-full py-4 bg-white/5 text-center text-sm font-bold text-white uppercase tracking-widest rounded-lg border border-white/10">DASHBOARD</a>
            @endguest
        </div>
    </div>
</div>
