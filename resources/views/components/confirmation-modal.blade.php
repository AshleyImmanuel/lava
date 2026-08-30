<div 
    x-data="{ show: false, title: '', message: '', action: null }"
    @open-confirmation-modal.window="
        show = true; 
        title = $event.detail.title; 
        message = $event.detail.message; 
        action = $event.detail.action;
    "
    class="relative z-50"
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true"
    x-show="show"
    x-cloak
>
    <!-- Background backdrop -->
    <div 
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity"
    ></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel -->
            <div 
                x-show="show"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                @click.away="show = false"
                class="relative transform overflow-hidden rounded-2xl bg-[#0f0f0f] border border-white/10 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
            >
                <div class="px-6 py-6">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-900/30 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-lg font-bold leading-6 text-white font-[Orbitron]" id="modal-title" x-text="title"></h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-400" x-text="message"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-black/20 px-6 py-4 sm:flex sm:flex-row-reverse sm:px-6 gap-3">
                    <button 
                        type="button" 
                        @click="
                            if(typeof action === 'function') action(); 
                            else if(typeof action === 'string') document.getElementById(action).submit();
                            show = false;
                        "
                        class="inline-flex w-full justify-center rounded-xl bg-red-600 px-3 py-2 text-sm font-bold text-white shadow-sm hover:bg-red-500 sm:w-auto transition-colors uppercase tracking-wider"
                    >
                        Confirm
                    </button>
                    <button 
                        type="button" 
                        @click="show = false" 
                        class="mt-3 inline-flex w-full justify-center rounded-xl bg-white/5 border border-white/10 px-3 py-2 text-sm font-bold text-gray-300 shadow-sm hover:bg-white/10 sm:mt-0 sm:w-auto transition-colors uppercase tracking-wider"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
