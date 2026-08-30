@extends('layouts.app')

@section('title', 'Contact - LAVA ESPORTS')

@section('content')
    <!-- Hero Section - Compact & Impactful -->
    <section class="relative min-h-[40vh] flex items-center justify-center overflow-hidden pt-24 pb-12">
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-lava-600/20 via-transparent to-transparent"></div>
            <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-lava-500/10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-[400px] h-[400px] bg-purple-600/10 rounded-full blur-[100px]"></div>
        </div>
        
        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 50px 50px;"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-lava-500/10 border border-lava-500/30 mb-6">
                <span class="w-2 h-2 rounded-full bg-lava-500 animate-pulse"></span>
                <span class="text-lava-400 font-medium uppercase tracking-widest text-xs">Get in Touch</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold font-[Orbitron] mb-4">
                <span style="color: #ffffff;">CONTACT</span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-lava-500 to-orange-400"> US</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Ready to dominate the competition? Let's talk.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-5 gap-12">
                <!-- Contact Info - Left Column -->
                <div class="lg:col-span-2 space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold font-[Orbitron] mb-4" style="color: #ffffff;">Let's Connect</h2>
                        <p class="text-lg leading-relaxed" style="color: #9ca3af;">
                            Have questions about joining our teams, sponsorship opportunities, or just want to say hello? 
                            We'd love to hear from you.
                        </p>
                    </div>

                    <!-- Contact Cards -->
                    <div class="space-y-4">
                        @php
                            $contacts = [
                                ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Email', 'value' => 'contact@lavaesports.com', 'color' => '#ef4444'],
                                ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z', 'label' => 'Location', 'value' => 'Gaming Hub, Digital City', 'color' => '#f97316'],
                                ['icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'label' => 'Discord', 'value' => 'discord.gg/lavaesports', 'color' => '#8b5cf6'],
                            ];
                        @endphp
                        
                        @foreach($contacts as $contact)
                        <div class="group relative overflow-hidden">
                            <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="background: linear-gradient(135deg, {{ $contact['color'] }}15, transparent);"></div>
                            <div class="relative flex items-center gap-5 p-5 rounded-2xl border border-white/10 bg-black/40 backdrop-blur-sm hover:border-white/20 transition-all duration-300">
                                <div class="w-14 h-14 rounded-xl flex items-center justify-center shrink-0" style="background: {{ $contact['color'] }}20;">
                                    <svg class="w-6 h-6" style="color: {{ $contact['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $contact['icon'] }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs uppercase tracking-widest font-bold mb-1" style="color: #6b7280;">{{ $contact['label'] }}</div>
                                    <div class="font-semibold text-lg" style="color: #ffffff;">{{ $contact['value'] }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Social Links -->
                    <div class="pt-6 border-t border-white/10">
                        <div class="text-xs uppercase tracking-widest font-bold mb-4" style="color: #6b7280;">Follow Us</div>
                        <div class="flex gap-3">
                            @php
                                $socials = [
                                    ['name' => 'Twitter', 'color' => '#1da1f2', 'path' => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
                                    ['name' => 'Discord', 'color' => '#5865f2', 'path' => 'M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z'],
                                    ['name' => 'YouTube', 'color' => '#ff0000', 'path' => 'M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z'],
                                    ['name' => 'Twitch', 'color' => '#9146ff', 'path' => 'M11.571 4.714h1.715v5.143H11.57zm4.715 0H18v5.143h-1.714zM6 0L1.714 4.286v15.428h5.143V24l4.286-4.286h3.428L22.286 12V0zm14.571 11.143l-3.428 3.429h-3.429l-3 3v-3H6.857V1.714h13.714z'],
                                ];
                            @endphp
                            @foreach($socials as $social)
                            <a href="#" class="group/social w-12 h-12 rounded-xl flex items-center justify-center border border-white/10 bg-black/40 hover:border-white/30 transition-all duration-300 relative overflow-hidden">
                                <div class="absolute inset-0 opacity-0 group-hover/social:opacity-100 transition-opacity duration-300" style="background: {{ $social['color'] }}30;"></div>
                                <svg class="w-5 h-5 relative z-10 transition-colors duration-300" style="color: #9ca3af;" fill="currentColor" viewBox="0 0 24 24" onmouseover="this.style.color='{{ $social['color'] }}'" onmouseout="this.style.color='#9ca3af'">
                                    <path d="{{ $social['path'] }}"/>
                                </svg>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Contact Form - Right Column -->
                <div class="lg:col-span-3">
                    <div class="relative">
                        <!-- Form Glow Effect -->
                        <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-lava-500/20 to-purple-600/20 blur-xl opacity-50"></div>
                        
                        <div class="relative rounded-3xl border border-white/10 bg-black/60 backdrop-blur-xl p-8 md:p-10">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-lava-500 to-orange-500 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold font-[Orbitron]" style="color: #ffffff;">Send a Message</h3>
                            </div>
                            
                            <form class="space-y-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Name</label>
                                        <input type="text" class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-4 text-white placeholder-gray-500 focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300" placeholder="Your name">
                                    </div>
                                    <div>
                                        <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Email</label>
                                        <input type="email" class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-4 text-white placeholder-gray-500 focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300" placeholder="your@email.com">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Subject</label>
                                    <div class="relative">
                                        <select class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300 appearance-none cursor-pointer">
                                            <option value="" class="bg-gray-900">Select a subject</option>
                                            <option value="general" class="bg-gray-900">General Inquiry</option>
                                            <option value="join" class="bg-gray-900">Join as Player</option>
                                            <option value="sponsorship" class="bg-gray-900">Sponsorship</option>
                                            <option value="media" class="bg-gray-900">Media Request</option>
                                        </select>
                                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-xs uppercase tracking-widest font-bold mb-3" style="color: #9ca3af;">Message</label>
                                    <textarea rows="5" class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-4 text-white placeholder-gray-500 focus:border-lava-500 focus:ring-2 focus:ring-lava-500/20 focus:outline-none transition-all duration-300 resize-none" placeholder="Tell us what's on your mind..."></textarea>
                                </div>
                                
                                <button type="submit" class="group w-full relative overflow-hidden rounded-xl py-4 font-bold text-white uppercase tracking-widest transition-all duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-r from-lava-600 to-lava-500 transition-all duration-300 group-hover:from-lava-500 group-hover:to-orange-500"></div>
                                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300" style="box-shadow: inset 0 0 30px rgba(255,255,255,0.2);"></div>
                                    <span class="relative flex items-center justify-center gap-2">
                                        <span>Send Message</span>
                                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
