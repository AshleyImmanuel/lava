<div class="lg:col-span-3">
    <div class="relative">
        <!-- Form Glow Effect -->
        <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-lava-500/15 to-[#f97316]/15 blur-lg opacity-40"></div>
        
        <div class="relative rounded-3xl border border-white/10 bg-black/80 p-8 md:p-10">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-lg bg-lava-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-lava-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold font-[Orbitron] text-white">Send Message</h3>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Name</label>
                        <input type="text" name="name" required class="w-full bg-white/10 border border-white/10 rounded-xl px-5 py-4 text-white placeholder-gray-500 focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300" placeholder="Your name">
                        @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Email</label>
                        <input type="email" name="email" required class="w-full bg-white/10 border border-white/10 rounded-xl px-5 py-4 text-white placeholder-gray-500 focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300" placeholder="your@email.com">
                        @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Subject</label>
                    <div class="relative" x-data="{ 
                        open: false, 
                        selected: '', 
                        selectedLabel: 'Select a subject', 
                        options: [
                            { value: 'general', label: 'General Inquiry' },
                            { value: 'join', label: 'Join as Player' },
                            { value: 'sponsorship', label: 'Sponsorship' },
                            { value: 'media', label: 'Media Request' }
                        ],
                        select(value, label) {
                            this.selected = value;
                            this.selectedLabel = label;
                            this.open = false;
                            // Update hidden input manually just in case
                            $refs.subjectInput.value = value;
                        }
                    }">
                        <!-- Hidden Input for Form Submission -->
                        <input type="hidden" name="subject" x-ref="subjectInput" :value="selected" required>

                        <!-- Custom Select Trigger -->
                        <button type="button" 
                            @click="open = !open" 
                            @click.away="open = false"
                            class="w-full bg-white/10 border border-white/10 rounded-xl px-5 py-4 text-left flex items-center justify-between focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300 group"
                            :class="{'border-lava-500 ring-2 ring-lava-500/20': open}">
                            <span class="text-white block truncate" x-text="selectedLabel"></span>
                            <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown List -->
                        <div x-show="open" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2"
                            class="absolute z-50 w-full mt-2 bg-[#0f172a] border border-white/10 rounded-xl shadow-xl overflow-hidden"
                            style="display: none;">
                            <div class="py-1">
                                <template x-for="option in options" :key="option.value">
                                    <div @click="select(option.value, option.label)" 
                                        class="px-5 py-3 cursor-pointer text-white hover:bg-lava-500 hover:text-white transition-colors duration-200 flex items-center justify-between group/item">
                                        <span x-text="option.label"></span>
                                        <svg x-show="selected === option.value" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    @error('subject') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Message</label>
                    <textarea name="message" required rows="5" class="w-full bg-white/10 border border-white/10 rounded-xl px-5 py-4 text-white placeholder-gray-500 focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300 resize-none" placeholder="Tell us what's on your mind..."></textarea>
                    @error('message') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                
                <button type="submit" 
                    class="w-full relative overflow-hidden rounded-xl py-4 font-bold text-white uppercase tracking-widest transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-lava-500/25 group">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#dc2626] to-[#ea580c] transition-all duration-300 group-hover:from-[#ef4444] group-hover:to-[#f97316]"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300" style="background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.2) 45%, rgba(255,255,255,0.2) 55%, transparent 60%);"></div>
                    <span class="relative flex items-center justify-center gap-2">
                        <span>Send Message</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>
