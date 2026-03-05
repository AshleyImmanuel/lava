<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('teams-container');
        const searchForm = document.querySelector('form[action="{{ route('teams.index') }}"]');

        function fetchTeams(url) {
            // Add loading state
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
                
                // Update URL in browser
                window.history.pushState({}, '', url);
            })
            .catch(error => {
                console.error('Error:', error);
                container.style.opacity = '1';
            });
        }

        // Handle Filter Links
        const filterLinks = document.querySelectorAll('a[href^="{{ route('teams.index') }}"]');
        filterLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Update active class styles
                filterLinks.forEach(l => {
                    if(l.classList.contains('bg-lava-600')) {
                        l.classList.remove('bg-lava-600', 'text-white');
                        l.classList.add('bg-white/5', 'text-gray-400');
                    }
                });
                // Note: Logic to toggle specific classes might need finetuning depending on exact structure, 
                // but this pattern matches the "Events" implementation.
                // Simple toggle for the clicked element:
                this.classList.remove('bg-white/5', 'text-gray-400', 'hover:bg-white/10'); 
                this.classList.add('bg-lava-600', 'text-white', 'hover:bg-lava-500');

                fetchTeams(this.href);
            });
        });

        // Handle Search Form
        if (searchForm) {
            let timeout = null;
            const input = searchForm.querySelector('input[name="search"]');

            input.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    const url = new URL(searchForm.action);
                    url.searchParams.set('search', this.value);
                    
                    // Maintain current game_id filter if exists
                    const currentUrl = new URL(window.location.href);
                    if (currentUrl.searchParams.has('game_id')) {
                        url.searchParams.set('game_id', currentUrl.searchParams.get('game_id'));
                    }

                    fetchTeams(url.toString());
                }, 500); // Debounce search
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
                fetchTeams(link.href);
            }
        });
        
        // Handle Back/Forward Browser Buttons
        window.addEventListener('popstate', function() {
            fetchTeams(window.location.href);
        });
    });
</script>
