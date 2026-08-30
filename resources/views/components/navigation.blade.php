<!-- Navigation Matching Reference Design -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-black border-b border-white/10">
    <div class="flex items-center h-12">
        
        <!-- Left: Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 px-6 h-full bg-red-600 hover:bg-red-700 transition-colors">
            <x-application-logo class="w-6 h-6 text-white" />
            <span class="text-base font-black text-white tracking-tight">LAVA</span>
        </a>

        <!-- Center: Navigation Links -->
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
            <a href="{{ route('events.index') }}" 
               class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('events.*') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
                EVENTS
            </a>
            <a href="{{ route('contact') }}" 
               class="text-[11px] font-semibold tracking-[0.15em] {{ request()->routeIs('contact') ? 'text-red-500' : 'text-gray-400 hover:text-white' }} transition-colors">
                CONTACT
            </a>
        </div>

        <!-- Right: Live + Auth -->
        <div class="flex items-center gap-6 pr-6 ml-auto">
            <!-- Live Indicator -->
            <div class="hidden md:flex items-center gap-2">
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                <span class="text-[10px] font-medium text-gray-500 tracking-widest">LIVE</span>
            </div>

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
                           @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-red-400 hover:bg-white/5 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    Admin Panel
                                </a>
                            @endif
                            
                            @if(Auth::user()->isRecruiter())
                                <a href="{{ route('invitations.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-orange-400 hover:bg-white/5 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                    Recruitment
                                </a>
                            @endif

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
