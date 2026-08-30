@extends('layouts.app')

@section('title', 'About Us - LAVA ESPORTS')

@section('content')
    <!-- Hero Banner -->
    <section class="relative pt-32 pb-24 overflow-hidden">
        <!-- Background Depth -->
        <div class="absolute inset-0 bg-neutral-950"></div>
        
        <!-- Magma Glow Effects -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-red-900/20 blur-[120px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-orange-900/10 blur-[100px] rounded-full pointer-events-none"></div>
        
        <!-- Grid Texture -->
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100 contrast-150 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-grid-white/[0.03] bg-[length:30px_30px]"></div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Glass Card Container -->
            <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-3xl p-12 shadow-2xl relative overflow-hidden group">
                <!-- Hover Glow -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                
                <span class="relative inline-block py-1 px-3 rounded-full bg-white/5 border border-white/10 text-red-400 font-bold uppercase tracking-[0.2em] text-xs mb-6 backdrop-blur-md">
                    Who We Are
                </span>
                
                <h1 class="relative text-6xl md:text-8xl font-black font-[Orbitron] text-white mb-8 tracking-tight">
                    ABOUT <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-600 drop-shadow-sm">LAVA</span>
                </h1>
                
                <p class="relative text-xl md:text-2xl text-gray-300 max-w-2xl mx-auto leading-relaxed font-light">
                    Building champions, fostering talent, and igniting passion in the world of competitive gaming.
                </p>
            </div>
        </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div>
                    <span class="text-red-500 font-bold uppercase tracking-widest text-sm">Our Story</span>
                    <h2 class="section-title text-4xl md:text-5xl text-white mt-4 mb-8">
                        Born from <span class="gradient-text">Passion</span>
                    </h2>
                    <div class="space-y-6 text-gray-300 text-lg leading-relaxed">
                        <p>
                            <span class="text-white font-semibold">LAVA ESPORTS</span> was founded in 2024 with a singular vision: 
                            to create a professional esports organization that nurtures talent and competes at the highest levels 
                            of competitive gaming.
                        </p>
                        <p>
                            Starting with just a small team of dedicated gamers, we've grown into a multi-game organization 
                            with professional rosters competing across <span class="text-red-400 font-bold">Valorant</span>, 
                            <span class="text-orange-400 font-bold">CS2</span>, <span class="text-purple-400 font-bold">Free Fire</span>, and more.
                        </p>
                        <p>
                            Our name represents our spirit – like lava, we are unstoppable, dynamic, and leave a lasting 
                            impact wherever we compete. We rise from the flames of competition, stronger than ever.
                        </p>
                    </div>
                </div>

                <!-- Visual -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-red-600/20 to-orange-600/20 blur-2xl rounded-full opacity-30"></div>
                    <div class="relative bg-white/5 border border-white/10 backdrop-blur-sm rounded-2xl p-8 aspect-video flex flex-col items-center justify-center group overflow-hidden">
                        <!-- Decor -->
                        <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-neutral-800 to-black border border-white/10 flex items-center justify-center mb-6 shadow-2xl relative z-10">
                            <div class="absolute inset-0 bg-red-500/20 blur-xl rounded-full opacity-50"></div>
                            <x-application-logo class="w-12 h-12 text-white relative z-10" />
                        </div>
                        
                        <div class="text-center relative z-10">
                            <h3 class="text-2xl font-black font-[Orbitron] text-white tracking-widest uppercase flex items-center gap-2">
                                LAVA <span class="text-orange-500">ESPORTS</span>
                            </h3>
                            <p class="text-gray-400 font-medium tracking-widest text-sm mt-2 opacity-80">Est. 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-ash-950 via-lava-950/20 to-ash-950"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-ember-500 font-semibold uppercase tracking-widest text-sm">Our Purpose</span>
                <h2 class="section-title text-4xl md:text-5xl text-white mt-4">Mission & Vision</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Mission -->
                <div class="glass-card rounded-2xl p-10 hover-lift border-l-4 border-lava-500">
                    <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6" style="background: rgba(249, 115, 22, 0.3);">
                        <svg class="w-8 h-8" style="color: #fb923c;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold font-[Orbitron] mb-4" style="color: #ffffff;">Our Mission</h3>
                    <p class="text-lg leading-relaxed" style="color: #e5e5e5;">
                        To discover, develop, and support exceptional gaming talent while building a world-class 
                        esports organization that competes for championships across multiple titles. We strive to 
                        create opportunities for gamers to pursue their passion professionally.
                    </p>
                </div>

                <!-- Vision -->
                <div class="glass-card rounded-2xl p-10 hover-lift border-l-4 border-ember-500">
                    <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6" style="background: rgba(251, 191, 36, 0.3);">
                        <svg class="w-8 h-8" style="color: #fbbf24;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold font-[Orbitron] mb-4" style="color: #ffffff;">Our Vision</h3>
                    <p class="text-lg leading-relaxed" style="color: #e5e5e5;">
                        To become the most recognized and respected esports organization in the region, known for 
                        excellence in competition, innovation in content, and commitment to our community. We envision 
                        LAVA as a beacon for aspiring esports professionals.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-lava-500 font-semibold uppercase tracking-widest text-sm">What Drives Us</span>
                <h2 class="section-title text-4xl md:text-5xl text-white mt-4">Our Core Values</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Excellence', 'desc' => 'Striving for the best in everything we do, from gameplay to content.'],
                    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Teamwork', 'desc' => 'United we stand, together we dominate every battlefield.'],
                    ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'Passion', 'desc' => 'Gaming is not just what we do; it\'s who we are.'],
                    ['icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z', 'title' => 'Integrity', 'desc' => 'Fair play and sportsmanship in every competition.'],
                ] as $value)
                <div class="glass-card rounded-2xl p-8 text-center hover-lift">
                    <div class="w-16 h-16 mx-auto rounded-xl flex items-center justify-center mb-6" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.2), rgba(255, 152, 0, 0.2));">
                        <svg class="w-8 h-8" style="color: #f87171;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-[Orbitron] mb-3" style="color: #ffffff;">{{ $value['title'] }}</h3>
                    <p style="color: #a3a3a3;">{{ $value['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-ash-950 via-lava-950/10 to-ash-950"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-ember-500 font-semibold uppercase tracking-widest text-sm">The People Behind</span>
                <h2 class="section-title text-4xl md:text-5xl text-white mt-4">Leadership Team</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                @foreach([
                    ['name' => 'Aman Antony', 'nickname' => 'FELIX', 'role' => 'Founder & CEO', 'bio' => 'Former Pro Player Turned Visionary Leader.'],
                    ['name' => 'Abhishek B', 'nickname' => 'FireStorm', 'role' => 'COO', 'bio' => 'Operations Expert With 10+ Years In Esports.'],
                    ['name' => 'Abhiram K', 'nickname' => 'RedBeast', 'role' => 'Head Coach', 'bio' => 'Championship-Winning Strategist And Mentor.'],
                ] as $leader)
                <div class="glass-card rounded-2xl p-8 text-center hover-lift">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #f44336, #fb8c00);">
                        <span class="text-3xl font-bold font-[Orbitron]" style="color: #ffffff;">{{ substr($leader['name'], 0, 1) }}</span>
                    </div>
                    <h3 class="text-xl font-bold mb-1" style="color: #ffffff;">{{ $leader['name'] }}</h3>
                    <p class="text-sm mb-2" style="color: #a3a3a3;">Better known as <span class="font-bold" style="color: #f87171;">"{{ $leader['nickname'] }}"</span></p>
                    <p class="font-medium mb-3" style="color: #f87171;">{{ $leader['role'] }}</p>
                    <p class="text-sm" style="color: #a3a3a3;">{{ $leader['bio'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-lava-500 font-semibold uppercase tracking-widest text-sm">Our Track Record</span>
                <h2 class="section-title text-4xl md:text-5xl text-white mt-4">Achievements</h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach([
                    ['number' => '25+', 'label' => 'Tournament Wins'],
                    ['number' => '₹4Cr+', 'label' => 'Prize Money'],
                    ['number' => '100K+', 'label' => 'Social Followers'],
                    ['number' => '50+', 'label' => 'Active Players'],
                ] as $stat)
                <div class="stat-card rounded-2xl p-8 text-center hover-lift">
                    <div class="text-4xl md:text-5xl font-bold font-[Orbitron] gradient-text mb-3">{{ $stat['number'] }}</div>
                    <p class="uppercase tracking-wider text-sm" style="color: #a3a3a3;">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 lava-bg"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-ash-950 via-transparent to-ash-950"></div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="section-title text-4xl md:text-5xl mb-6" style="color: #ffffff;">
                Want to be Part of <span class="gradient-text">LAVA?</span>
            </h2>
            <p class="text-xl mb-10" style="color: #d4d4d4;">
                We're always looking for talented players, content creators, and passionate individuals to join our growing family.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="btn-lava px-10 py-4 rounded-xl font-bold text-lg text-white glow-red">
                    Join the Team
                </a>
                <a href="/" class="btn-outline px-10 py-4 rounded-xl font-bold text-lg">
                    Back to Home
                </a>
            </div>
        </div>
    </section>
@endsection
