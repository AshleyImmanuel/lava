<style>
    /* ===== INTRO ===== */
    .intro {
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        overflow: hidden;
    }
    .intro.exit {
        animation: introExit 0.8s ease-in-out forwards;
    }
    @keyframes introExit {
        0% { clip-path: inset(0 0 0 0); }
        100% { clip-path: inset(0 0 100% 0); }
    }

    /* Glowing orbs background */
    .intro-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0;
        animation: orbPulse 2s ease-out forwards;
    }
    .intro-orb.red { width: 400px; height: 400px; background: #dc2626; top: 20%; left: 20%; }
    .intro-orb.orange { width: 300px; height: 300px; background: #f97316; bottom: 20%; right: 20%; animation-delay: 0.3s; }
    @keyframes orbPulse {
        0% { opacity: 0; transform: scale(0.5); }
        50% { opacity: 0.3; }
        100% { opacity: 0.15; transform: scale(1); }
    }

    /* Logo */
    .intro-logo {
        position: relative;
        z-index: 2;
        opacity: 0;
        transform: scale(0.3);
        animation: logoIn 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s forwards;
    }
    @keyframes logoIn {
        to { opacity: 1; transform: scale(1); }
    }
    .intro-logo svg {
        width: 200px;
        height: 200px;
        filter: drop-shadow(0 0 80px rgba(239, 68, 68, 0.8));
    }

    /* Rotating ring */
    .intro-ring {
        position: absolute;
        width: 320px;
        height: 320px;
        border: 1px solid rgba(220, 38, 38, 0.3);
        border-radius: 50%;
        opacity: 0;
        animation: ringIn 1s ease-out 0.5s forwards, ringSpin 8s linear 1.5s infinite;
    }
    @keyframes ringIn { to { opacity: 1; } }
    @keyframes ringSpin { to { transform: rotate(360deg); } }
    .intro-ring::before {
        content: '';
        position: absolute;
        top: -4px;
        left: 50%;
        width: 8px;
        height: 8px;
        background: #f97316;
        border-radius: 50%;
        box-shadow: 0 0 20px #f97316;
    }

    /* Brand text */
    .intro-brand {
        position: relative;
        z-index: 2;
        margin-top: 50px;
        text-align: center;
        opacity: 0;
        transform: translateY(30px);
        animation: brandIn 0.8s ease-out 1s forwards;
    }
    @keyframes brandIn {
        to { opacity: 1; transform: translateY(0); }
    }
    .intro-brand h1 {
        font-size: clamp(4rem, 15vw, 7rem);
        font-weight: 900;
        letter-spacing: 0.4em;
        margin-right: -0.4em;
        background: linear-gradient(135deg, #fff 0%, #fbbf24 50%, #f97316 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 0 80px rgba(249, 115, 22, 0.5);
    }
    .intro-brand p {
        color: #444;
        font-size: 0.8rem;
        letter-spacing: 0.6em;
        margin-top: 15px;
    }

    /* Fire lines */
    .intro-line {
        position: absolute;
        top: 50%;
        height: 1px;
        background: linear-gradient(90deg, transparent, #dc2626 30%, #f97316 50%, #dc2626 70%, transparent);
        opacity: 0;
    }
    .intro-line.left { right: 55%; }
    .intro-line.right { left: 55%; }
    .intro-line.animate {
        animation: lineGrow 1s ease-out forwards;
    }
    @keyframes lineGrow {
        to { opacity: 1; width: 40%; }
    }
</style>

<!-- ===== INTRO HTML ===== -->
<div class="intro" id="intro">
    <!-- Background orbs -->
    <div class="intro-orb red"></div>
    <div class="intro-orb orange"></div>

    <!-- Fire lines -->
    <div class="intro-line left" style="width: 0;"></div>
    <div class="intro-line right" style="width: 0;"></div>

    <!-- Ring -->
    <div class="intro-ring"></div>

    <!-- Logo -->
    <div class="intro-logo">
        <svg viewBox="0 0 24 24" fill="none">
            <path d="M12 22c4.97 0 9-4.03 9-9 0-5.97-5.5-11-9-13-3.5 2-9 7.03-9 13 0 4.97 4.03 9 9 9z" fill="url(#ig1)"/>
            <path d="M12 22c2.76 0 5-2.24 5-5 0-3.5-3-6.5-5-8-2 1.5-5 4.5-5 8 0 2.76 2.24 5 5 5z" fill="url(#ig2)"/>
            <path d="M12 22c1.38 0 2.5-1.12 2.5-2.5 0-1.75-1.5-3.25-2.5-4-1 .75-2.5 2.25-2.5 4 0 1.38 1.12 2.5 2.5 2.5z" fill="url(#ig3)"/>
            <defs>
                <linearGradient id="ig1" x1="12" y1="22" x2="12" y2="0" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#dc2626"/><stop offset="1" stop-color="#f97316"/>
                </linearGradient>
                <linearGradient id="ig2" x1="12" y1="22" x2="12" y2="9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#f97316"/><stop offset="1" stop-color="#fbbf24"/>
                </linearGradient>
                <linearGradient id="ig3" x1="12" y1="22" x2="12" y2="15.5" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#fbbf24"/><stop offset="1" stop-color="#fef3c7"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Brand -->
    <div class="intro-brand">
        <h1>LAVA</h1>
        <p>RISE FROM THE FLAMES</p>
    </div>
</div>

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
