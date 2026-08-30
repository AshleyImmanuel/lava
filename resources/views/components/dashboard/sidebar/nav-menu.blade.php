<nav class="space-y-2">
    <!-- Overview -->
    <button @click="tab = 'overview'" 
            :class="{ 'bg-white/10 text-white border-white/20': tab === 'overview', 'hover:bg-white/5 text-gray-400 border-transparent': tab !== 'overview' }"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-[#f97316]': tab === 'overview', 'text-gray-500 group-hover:text-gray-300': tab !== 'overview' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">Overview</span>
    </button>

    <!-- My Team -->
    <button @click="tab = 'team'" 
            :class="{ 'bg-white/10 text-white border-white/20': tab === 'team', 'hover:bg-white/5 text-gray-400 border-transparent': tab !== 'team' }"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-[#f97316]': tab === 'team', 'text-gray-500 group-hover:text-gray-300': tab !== 'team' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">My Team</span>
    </button>

    <!-- History -->
    <button @click="tab = 'history'" 
            :class="{ 'bg-white/10 text-white border-white/20': tab === 'history', 'hover:bg-white/5 text-gray-400 border-transparent': tab !== 'history' }"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-[#f97316]': tab === 'history', 'text-gray-500 group-hover:text-gray-300': tab !== 'history' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">History</span>
    </button>

    <!-- Settings -->
    <button @click="tab = 'settings'" 
            :class="{ 'bg-white/10 text-white border-white/20': tab === 'settings', 'hover:bg-white/5 text-gray-400 border-transparent': tab !== 'settings' }"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-[#f97316]': tab === 'settings', 'text-gray-500 group-hover:text-gray-300': tab !== 'settings' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">Settings</span>
    </button>
</nav>

<!-- Admin Tabs (Only for Admins) -->
@if(Auth::user()->isAdmin())
<div class="pt-6 border-t border-white/10 space-y-2">
    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-600 px-4 mb-1">Admin</p>
    <button @click="tab = 'admin-users'" 
            :class="{ 'bg-red-500/15 text-red-400 border-red-500/25': tab === 'admin-users', 'hover:bg-white/5 text-gray-400 border-transparent': tab !== 'admin-users' }"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-red-400': tab === 'admin-users', 'text-gray-500 group-hover:text-gray-300': tab !== 'admin-users' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">Users</span>
    </button>
    <button @click="tab = 'admin-events'" 
            :class="{ 'bg-red-500/15 text-red-400 border-red-500/25': tab === 'admin-events', 'hover:bg-white/5 text-gray-400 border-transparent': tab !== 'admin-events' }"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-red-400': tab === 'admin-events', 'text-gray-500 group-hover:text-gray-300': tab !== 'admin-events' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">Events</span>
    </button>
    <button @click="tab = 'admin-teams'" 
            :class="{ 'bg-red-500/15 text-red-400 border-red-500/25': tab === 'admin-teams', 'hover:bg-white/5 text-gray-400 border-transparent': tab !== 'admin-teams' }"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0" :class="{ 'text-red-400': tab === 'admin-teams', 'text-gray-500 group-hover:text-gray-300': tab !== 'admin-teams' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">Teams</span>
    </button>
</div>
@endif

<!-- Admin Panel Link (Only for Admins) -->
@if(Auth::user()->isAdmin())
<div class="pt-4">
    <a href="{{ route('admin.users.index') }}" 
       class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border border-red-500/20 bg-red-500/10 text-red-500 hover:bg-red-500/20 transition-all duration-200 group">
        <svg class="w-5 h-5 flex-shrink-0 text-red-400 group-hover:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">Admin Panel</span>
    </a>
</div>
@endif

<!-- Recruitment Center (Only for Recruiters) -->
@if(Auth::user()->isRecruiter())
<div class="pt-6 border-t border-white/10">
    <button @click="tab = 'recruitment'" 
       :class="{ 'bg-orange-500/20 text-orange-400 border-orange-500/30': tab === 'recruitment', 'bg-orange-500/10 border-orange-500/20 text-orange-400 hover:bg-orange-500/20': tab !== 'recruitment' }"
       class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-all duration-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
        </svg>
        <span class="text-sm font-bold uppercase tracking-wider">Recruitment</span>
    </button>
</div>
@endif

