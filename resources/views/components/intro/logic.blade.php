<script>
    document.addEventListener('DOMContentLoaded', () => {
        const intro = document.getElementById('intro');
        const main = document.getElementById('main');
        const lines = document.querySelectorAll('.intro-line');
        const navItems = document.querySelectorAll('.nav-item');
        const reveals = document.querySelectorAll('.reveal, .reveal-scale, .reveal-left, .reveal-right');

        // Check if intro has played
        if (!sessionStorage.getItem('introPlayed')) {
            // Play Intro
            setTimeout(() => lines.forEach(l => l.classList.add('animate')), 1200);

            // Exit intro, show main
            setTimeout(() => {
                intro.classList.add('exit');
                main.classList.add('show');
                // Stagger nav items
                navItems.forEach((el, i) => {
                    setTimeout(() => el.classList.add('show'), 200 + i * 80);
                });
            }, 2800);

            // Stagger landing page reveals after intro
            reveals.forEach((el, i) => {
                const delay = el.dataset.delay || (i * 100);
                setTimeout(() => el.classList.add('show'), 3200 + parseInt(delay));
            });

            // Remove intro and set session
            setTimeout(() => {
                intro.remove();
                sessionStorage.setItem('introPlayed', 'true');
            }, 3800);
        } else {
            // Skip Intro
            intro.remove();
            main.classList.add('show');
            navItems.forEach(el => el.classList.add('show'));
            reveals.forEach(el => el.classList.add('show'));
        }
    });
</script>
