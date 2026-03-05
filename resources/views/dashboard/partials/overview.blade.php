<!-- Quick Stats & Clock Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- System Clock -->
    <div class="md:col-span-1 bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-sm">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400">SYSTEM TIME</h3>
            <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
        </div>
        <div class="text-center py-2">
            <div id="dashboard-clock" class="text-3xl font-black text-white font-[Orbitron] tracking-widest leading-none">
                00:00:00
            </div>
            <div id="dashboard-date" class="text-xs font-bold uppercase tracking-widest mt-2 text-[#f97316]">
                LOADING...
            </div>
        </div>
    </div>

    <!-- Career Stats -->
    <div class="md:col-span-2 bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-sm">
        <h3 class="text-xs font-bold uppercase tracking-widest mb-4 text-gray-400">CAREER HIGHLIGHTS</h3>
        <div class="flex justify-between items-center text-center divide-x divide-white/10">
            <div class="px-2 w-1/3">
                <div class="text-2xl font-black text-white font-[Orbitron]">{{ $eventsCount }}</div>
                <div class="text-[10px] uppercase tracking-wider mt-1 text-gray-400">Events</div>
            </div>
            <div class="px-2 w-1/3">
                <div class="text-2xl font-black font-[Orbitron] text-[#f97316]">{{ $eventsCount }}</div>
                <div class="text-[10px] uppercase tracking-wider mt-1 text-gray-400">Matches</div>
            </div>
            <div class="px-2 w-1/3">
                <div class="text-2xl font-black text-white font-[Orbitron]">{{ data_get(Auth::user()->rank_info, 'rank', '-') }}</div>
                <div class="text-[10px] uppercase tracking-wider mt-1 text-gray-400">Rank</div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-8">
    <!-- Active Team Status -->
    @include('dashboard.partials.team-status')

    <!-- Upcoming Events -->
    @include('dashboard.partials.upcoming-events')
</div>

<script>
    function updateDashboardClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', { hour12: false });
        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const dateString = now.toLocaleDateString('en-US', dateOptions);
        
        const clockElement = document.getElementById('dashboard-clock');
        const dateElement = document.getElementById('dashboard-date');
        
        if (clockElement) {
            clockElement.textContent = timeString;
        }
        if (dateElement) {
            dateElement.textContent = dateString;
        }
    }
    
    // Update immediately and then every second
    updateDashboardClock();
    setInterval(updateDashboardClock, 1000);
</script>
