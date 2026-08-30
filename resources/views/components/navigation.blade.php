<!-- Navigation Matching Reference Design -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-black border-b border-white/10">
    <div class="flex items-center h-12">
        
        <!-- Left: Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 px-6 h-full bg-red-600 hover:bg-red-700 transition-colors">
            <x-application-logo class="w-6 h-6 text-white" />
            <span class="text-base font-black text-white tracking-tight">LAVA</span>
        </a>

        <!-- Center: Navigation Links -->
        <x-nav.desktop />

        <!-- Right: Live + Auth -->
        <div class="flex items-center gap-6 pr-6 ml-auto">
            <!-- Live Indicator -->
            <div class="hidden md:flex items-center gap-2">
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                <span class="text-[10px] font-medium text-gray-500 tracking-widest">LIVE</span>
            </div>

            <!-- User Auth Dropdown -->
            <x-nav.user-dropdown />

            <!-- Mobile Menu Button -->
            <button onclick="document.getElementById('mobile-menu').classList.remove('translate-x-full')" class="lg:hidden p-2 text-gray-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<x-nav.mobile />
