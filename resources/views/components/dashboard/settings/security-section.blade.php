<div class="space-y-8">
    
    <!-- Google Link Status -->
    @if(Auth::user()->google_id || is_null(Auth::user()->password))
    <div class="bg-blue-600/10 border border-blue-500/20 rounded-3xl p-8 backdrop-blur-sm">
        <div class="flex items-center gap-4 mb-4">
            <div class="p-3 rounded-xl bg-blue-500/20 text-blue-400">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.545 10.239v3.821h5.445c-0.712 2.315-2.647 3.972-5.445 3.972-3.332 0-6.033-2.701-6.033-6.032s2.701-6.032 6.033-6.032c1.498 0 2.866 0.549 3.921 1.453l2.814-2.814c-1.79-1.677-4.184-2.702-6.735-2.702-5.522 0-10 4.478-10 10s4.478 10 10 10c8.396 0 10.249-7.85 9.426-11.748l-9.426 0.048z"/></svg>
            </div>
            <div>
                <h3 class="text-xl font-bold text-white font-[Orbitron]">Google Account</h3>
                <p class="text-gray-400 text-sm">Your account is secured via Google.</p>
            </div>
        </div>
        <div class="flex items-center gap-2 text-sm text-blue-300 bg-blue-500/10 px-4 py-2 rounded-lg border border-blue-500/10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span>Securely connected</span>
        </div>
    </div>
    @endif

    <!-- Update Password (Only for non-Google users) -->
    @if(!is_null(Auth::user()->password))
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-sm">
        <div class="flex items-center gap-4 mb-6">
            <div class="p-3 rounded-xl bg-purple-500/10 text-purple-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <div>
                <h3 class="text-xl font-bold text-white font-[Orbitron]">Update Password</h3>
                <p class="text-gray-400 text-sm">Ensure your account uses a long, random password.</p>
            </div>
        </div>

        <form method="post" action="{{ route('password.update') }}" class="space-y-4">
            @csrf
            @method('put')
            
            <div>
                <input type="password" name="current_password" placeholder="Current Password" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors outline-none">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
            <div>
                <input type="password" name="password" placeholder="New Password" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors outline-none">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors outline-none">
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-6 py-2 rounded-lg bg-purple-600 hover:bg-purple-700 text-white font-bold uppercase tracking-wider transition-all">
                    Update
                </button>
            </div>
        </form>
    </div>
    @endif


</div>
