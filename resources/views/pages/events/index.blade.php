@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <!-- Background Elements -->
    <!-- Background Elements (Removed to use Global Layout) -->

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16 space-y-4">
            <h1 class="text-5xl md:text-7xl font-black text-white font-[Orbitron] tracking-tight">
                UPCOMING <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#ef4444] to-[#f97316]">EVENTS</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Compete in our premium tournaments and prove your dominance.
            </p>
        </div>

        <!-- Filter/Search Bar -->
        <div class="mb-12 flex flex-col md:flex-row gap-4 justify-between items-center bg-white/5 border border-white/10 p-4 rounded-2xl">
            <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto">
                <a href="{{ route('events.index') }}" class="filter-tab px-6 py-2 rounded-xl {{ !request('status') && !request('tab') ? 'bg-lava-600 text-white' : 'bg-white/5 text-gray-400' }} font-bold text-sm tracking-widest hover:bg-lava-500 hover:text-white transition-all">ALL</a>
                <a href="{{ route('events.index', ['status' => 'upcoming']) }}" class="filter-tab px-6 py-2 rounded-xl {{ request('status') == 'upcoming' ? 'bg-lava-600 text-white' : 'bg-white/5 text-gray-400' }} font-bold text-sm tracking-widest hover:bg-white/10 hover:text-white transition-all">UPCOMING</a>
                <a href="{{ route('events.index', ['status' => 'live']) }}" class="filter-tab px-6 py-2 rounded-xl {{ request('status') == 'live' ? 'bg-lava-600 text-white' : 'bg-white/5 text-gray-400' }} font-bold text-sm tracking-widest hover:bg-white/10 hover:text-white transition-all">LIVE</a>
                <a href="{{ route('events.index', ['status' => 'completed']) }}" class="filter-tab px-6 py-2 rounded-xl {{ request('status') == 'completed' ? 'bg-lava-600 text-white' : 'bg-white/5 text-gray-400' }} font-bold text-sm tracking-widest hover:bg-white/10 hover:text-white transition-all">PAST</a>
                <a href="{{ route('recruitment.index') }}" data-recruitment="true" class="filter-tab px-6 py-2 rounded-xl {{ request('tab') == 'recruitment' ? 'bg-orange-600 text-white' : 'bg-white/5 text-orange-400 border border-orange-500/30' }} font-bold text-sm tracking-widest hover:bg-orange-500 hover:text-white transition-all flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg> RECRUITMENT</a>
            </div>
            
            <form action="{{ route('events.index') }}" method="GET" class="relative w-full md:w-64">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search events..." class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-2 pl-10 text-white placeholder-gray-500 focus:outline-none focus:border-lava-500 transition-colors">
                <svg class="w-4 h-4 text-gray-500 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
        </div>

        <!-- Events Grid -->
        <!-- Events Grid -->
        <div id="events-container">
            @include('pages.events._events_grid')
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('events-container');
        const filterTabs = document.querySelectorAll('.filter-tab');

        function fetchContent(url) {
            container.style.opacity = '0.5';
            
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                container.innerHTML = html;
                container.style.opacity = '1';
                window.history.pushState({}, '', url);
            })
            .catch(error => {
                console.error('Error:', error);
                container.style.opacity = '1';
            });
        }

        function setActiveTab(clickedTab) {
            filterTabs.forEach(tab => {
                tab.classList.remove('bg-lava-600', 'bg-orange-600', 'text-white', 'border-orange-500/30', 'text-orange-400');
                if (tab.dataset.recruitment) {
                    tab.classList.add('bg-white/5', 'text-orange-400', 'border', 'border-orange-500/30');
                } else {
                    tab.classList.add('bg-white/5', 'text-gray-400');
                }
            });

            clickedTab.classList.remove('bg-white/5', 'text-gray-400', 'text-orange-400', 'border-orange-500/30');
            if (clickedTab.dataset.recruitment) {
                clickedTab.classList.add('bg-orange-600', 'text-white');
            } else {
                clickedTab.classList.add('bg-lava-600', 'text-white');
            }
        }

        // Handle Filter Tab Clicks
        filterTabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                setActiveTab(this);
                fetchContent(this.href);
            });
        });

        // Handle Search Form
        const searchForm = document.querySelector('form[action*="events"]');
        if (searchForm) {
            let timeout = null;
            const input = searchForm.querySelector('input[name="search"]');

            input.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    const url = new URL(searchForm.action);
                    url.searchParams.set('search', this.value);
                    
                    const currentUrl = new URL(window.location.href);
                    if (currentUrl.searchParams.has('status')) {
                        url.searchParams.set('status', currentUrl.searchParams.get('status'));
                    }

                    fetchContent(url.toString());
                }, 500);
            });

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
            });
        }

        // Handle Pagination (Event Delegation)
        container.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination a');
            if (link) {
                e.preventDefault();
                fetchContent(link.href);
            }
        });
        
        // Handle Back/Forward Browser Buttons
        window.addEventListener('popstate', function() {
            fetchContent(window.location.href);
        });
    });
</script>
    </div>
</div>
@endsection
