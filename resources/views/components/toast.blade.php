<div 
    x-data="{ 
        show: false, 
        message: '', 
        type: 'success',
        init() {
            @if(session('success'))
                this.showToast('{{ session('success') }}', 'success');
            @endif
            @if(session('error'))
                this.showToast('{{ session('error') }}', 'error');
            @endif

            @if(session('status'))
                let statusMsg = '{{ session('status') }}';
                if (statusMsg === 'profile-updated') statusMsg = 'Profile Updated';
                if (statusMsg === 'password-updated') statusMsg = 'Password Updated';
                if (statusMsg === 'verification-link-sent') statusMsg = 'Verification link sent';
                this.showToast(statusMsg, 'success');
            @endif

            window.addEventListener('notify', event => {
                this.showToast(event.detail.message, event.detail.type);
            });
        },
        showToast(message, type = 'success') {
            this.message = message;
            this.type = type;
            this.show = true;
            setTimeout(() => this.show = false, 4000);
        }
    }" 
    x-init="init()"
    class="fixed bottom-6 right-6 z-50 flex flex-col gap-2"
>
    <div 
        x-show="show"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="min-w-[300px] max-w-sm rounded-xl p-4 shadow-2xl border backdrop-blur-md flex items-center gap-3 relative overflow-hidden"
        :class="{
            'bg-green-900/80 border-green-500/30 text-green-100': type === 'success',
            'bg-red-900/80 border-red-500/30 text-red-100': type === 'error'
        }"
    >
        <!-- Icon -->
        <div class="shrink-0">
            <template x-if="type === 'success'">
                <svg class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </template>
            <template x-if="type === 'error'">
                <svg class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </template>
        </div>

        <!-- Content -->
        <div class="flex-1">
            <p class="text-sm font-medium" x-text="message"></p>
        </div>

        <!-- Close Button -->
        <button @click="show = false" class="shrink-0 text-white/50 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 h-1 bg-white/20 animate-[progress_4s_linear_forwards]" style="width: 100%"></div>
    </div>
</div>

<style>
@keyframes progress {
    from { width: 100%; }
    to { width: 0%; }
}
</style>
