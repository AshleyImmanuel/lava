<div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-sm">
    <div class="flex items-center gap-4 mb-6">
        <div class="p-3 rounded-xl bg-orange-500/10 text-[#f97316]">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-white font-[Orbitron]">Profile Info</h3>
    </div>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Display Name</label>
            <div class="relative">
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" 
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316] transition-colors outline-none
                       {{ (Auth::user()->google_id || is_null(Auth::user()->password)) ? 'opacity-50 cursor-not-allowed' : '' }}"
                       {{ (Auth::user()->google_id || is_null(Auth::user()->password)) ? 'readonly' : '' }} required>
                
                @if(Auth::user()->google_id || is_null(Auth::user()->password))
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                @endif
            </div>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Email Address</label>
            <div class="relative">
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316] transition-colors outline-none
                       {{ (Auth::user()->google_id || is_null(Auth::user()->password)) ? 'opacity-50 cursor-not-allowed' : '' }}"
                       {{ (Auth::user()->google_id || is_null(Auth::user()->password)) ? 'readonly' : '' }} required>
                       
                @if(Auth::user()->google_id || is_null(Auth::user()->password))
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                @endif
            </div>
            @if(Auth::user()->google_id || is_null(Auth::user()->password))
                <p class="text-xs text-gray-500 mt-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    Linked to Google Account
                </p>
            @endif
        </div>

        <!-- Role (Read Only) -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Role</label>
            <div class="w-full bg-black/20 border border-white/5 rounded-xl px-4 py-3 text-gray-400 font-mono tracking-wider">
                {{ strtoupper(Auth::user()->role) }}
            </div>
        </div>

        <!-- Actions -->
        <div class="pt-4 flex items-center justify-end gap-4">
            @if(session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-400">
                    Saved successfully.
                </p>
            @endif

            @if(!Auth::user()->google_id && !is_null(Auth::user()->password))
                <button type="submit" class="px-6 py-2 rounded-lg bg-[#f97316] hover:bg-orange-600 text-white font-bold uppercase tracking-wider transition-all">
                    Save Changes
                </button>
            @else
                <a href="https://myaccount.google.com/" target="_blank" 
                   class="relative overflow-hidden group flex items-center gap-3 px-8 py-4 rounded-xl bg-gradient-to-br from-red-600 to-orange-600 hover:from-red-500 hover:to-orange-500 border border-white/10 text-white font-bold uppercase tracking-wider transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_0_20px_rgba(234,88,12,0.5)] shadow-lg shadow-red-900/20">
                    
                    <!-- Shine Effect -->
                    <div class="absolute inset-0 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite] bg-gradient-to-r from-transparent via-white/10 to-transparent z-0"></div>
                    
                    <div class="relative z-10 flex items-center gap-3">
                        <svg class="w-5 h-5 transition-transform group-hover:rotate-12" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.545 10.239v3.821h5.445c-0.712 2.315-2.647 3.972-5.445 3.972-3.332 0-6.033-2.701-6.033-6.032s2.701-6.032 6.033-6.032c1.498 0 2.866 0.549 3.921 1.453l2.814-2.814c-1.79-1.677-4.184-2.702-6.735-2.702-5.522 0-10 4.478-10 10s4.478 10 10 10c8.396 0 10.249-7.85 9.426-11.748l-9.426 0.048z"/>
                        </svg>
                        <span>Manage Google Account</span>
                    </div>
                </a>
            @endif
        </div>
    </form>
</div>
