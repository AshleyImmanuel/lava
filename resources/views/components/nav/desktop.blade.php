<div class="hidden lg:flex items-center gap-10 flex-1 justify-center">
    <a href="{{ route('home') }}" 
       class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('home') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
        HOME
    </a>
    <a href="{{ route('about') }}" 
       class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('about') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
        ABOUT
    </a>
    <a href="{{ route('teams.index') }}" 
       class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('teams.*') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
        OUR ROSTER
    </a>
    <a href="{{ route('mini-games') }}" 
       class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('mini-games') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
        MINI GAMES
    </a>
    <a href="{{ route('events.index') }}" 
       class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('events.*') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
        EVENTS
    </a>
    <a href="{{ route('contact') }}" 
       class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('contact') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
        CONTACT
    </a>
</div>
