@auth
    <div class="relative group">
        <button class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-500 to-orange-600 flex items-center justify-center text-xs font-bold text-white border-2 border-red-400/50">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        
        <div class="absolute right-0 top-full mt-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-[60]">
            <div class="bg-zinc-900 border border-white/10 rounded-lg overflow-hidden shadow-xl py-1">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-gray-400 hover:text-white hover:bg-white/5 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                
                <div class="h-px bg-white/5 my-1"></div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-red-500 hover:bg-red-500/10 transition-colors text-left">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4-4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
@else
    <div class="flex items-center gap-1 text-[11px] font-bold tracking-wider whitespace-nowrap">
        <a href="{{ route('login') }}" class="text-white hover:text-gray-300 transition-colors">LOGIN</a>
        <span class="text-gray-500">/</span>
        <a href="{{ route('register') }}" class="text-white hover:text-gray-300 transition-colors">REGISTER</a>
    </div>
@endauth
