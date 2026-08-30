<style>
    /* ===== MAIN CONTENT TRANSITIONS ===== */
    .main-wrap { opacity: 0; }
    .main-wrap.show { animation: mainIn 0.5s ease-out forwards; }
    @keyframes mainIn { to { opacity: 1; } }

    /* Nav items */
    .nav-item { opacity: 0; transform: translateY(-20px); }
    .nav-item.show { animation: navDrop 0.4s ease-out forwards; }
    @keyframes navDrop { to { opacity: 1; transform: translateY(0); } }

    /* Landing page elements - triggered after intro */
    .reveal { opacity: 0; transform: translateY(40px); }
    .reveal.show { animation: revealUp 0.7s ease-out forwards; }
    @keyframes revealUp { to { opacity: 1; transform: translateY(0); } }

    .reveal-scale { opacity: 0; transform: scale(0.9); }
    .reveal-scale.show { animation: revealScale 0.6s ease-out forwards; }
    @keyframes revealScale { to { opacity: 1; transform: scale(1); } }

    .reveal-left { opacity: 0; transform: translateX(-40px); }
    .reveal-left.show { animation: revealLeft 0.6s ease-out forwards; }
    @keyframes revealLeft { to { opacity: 1; transform: translateX(0); } }

    /* PERFORMANCE OPTIMIZATIONS */
    /* Removed excessive will-change - let browser decide */
    .slide-left, .slide-right, .slide-up, .reveal-right, .split-reveal span, .pixelate, .stagger-children > * {
        backface-visibility: hidden;
    }
    
    /* Add containment for scroll sections */
    section {
        contain: layout style paint;
    }
    
    /* Reduce motion for accessibility */
    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
            animation-duration: 0.01ms !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Reveal animations */
    .reveal-right { opacity: 0; transform: translateX(40px); }
    .reveal-right.show { animation: revealRight 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes revealRight { to { opacity: 1; transform: translateX(0); } }

    /* Slide animations */
    .slide-left { opacity: 0; transform: translateX(-50px); }
    .slide-left.show { animation: slideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes slideLeft { to { opacity: 1; transform: translateX(0); } }

    .slide-right { opacity: 0; transform: translateX(50px); }
    .slide-right.show { animation: slideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes slideRight { to { opacity: 1; transform: translateX(0); } }

    .slide-up { opacity: 0; transform: translateY(40px); }
    .slide-up.show { animation: slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes slideUp { to { opacity: 1; transform: translateY(0); } }

    /* Split text reveal */
    .split-reveal { overflow: hidden; }
    .split-reveal span { display: inline-block; transform: translateY(100%); }
    .split-reveal.show span { animation: splitUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes splitUp { to { transform: translateY(0); } }

    /* Enhanced Pixelate formation */
    .pixelate { 
        opacity: 0; 
        transform: scale(0.95);
    }
    .pixelate.show { 
        animation: pixelEffect 0.6s steps(10) forwards; 
    }
    @keyframes pixelEffect {
        0% { opacity: 0; mask-image: repeating-linear-gradient(45deg, #000 0px, #000 2px, transparent 2px, transparent 8px); transform: scale(1.1); filter: grayscale(1); }
        20% { opacity: 0.5; mask-image: repeating-linear-gradient(45deg, #000 0px, #000 4px, transparent 4px, transparent 8px); }
        40% { opacity: 0.8; mask-image: repeating-linear-gradient(45deg, #000 0px, #000 10px, transparent 10px, transparent 12px); transform: scale(1.02); }
        60% { mask-image: none; filter: grayscale(0.5); }
        100% { opacity: 1; transform: scale(1); filter: grayscale(0); mask-image: none; }
    }

    /* Stagger children */
    .stagger-children.show > * { animation: staggerIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .stagger-children > *:nth-child(1) { animation-delay: 0s; }
    .stagger-children > *:nth-child(2) { animation-delay: 0.05s; }
    .stagger-children > *:nth-child(3) { animation-delay: 0.1s; }
    .stagger-children > *:nth-child(4) { animation-delay: 0.15s; }
    .stagger-children > *:nth-child(5) { animation-delay: 0.2s; }
    .stagger-children > *:nth-child(6) { animation-delay: 0.25s; }
    .stagger-children > * { opacity: 0; transform: translateY(20px); }
    @keyframes staggerIn { to { opacity: 1; transform: translateY(0); } }

    /* Optimized 3D tilt - disable on scroll/mobile to prevent lag */
    @media (pointer: fine) {
        .tilt-card { transition: transform 0.1s linear; transform-style: preserve-3d; }
    }

    /* Horizontal scroll line */
    .line-grow { width: 0; height: 2px; background: linear-gradient(90deg, transparent, #dc2626, #f97316, transparent); }
    .line-grow.show { animation: lineGrowAnim 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes lineGrowAnim { to { width: 100%; } }

    .counter { font-variant-numeric: tabular-nums; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // ===== SCROLL TRIGGER ANIMATIONS =====
        const scrollElements = document.querySelectorAll('.slide-left, .slide-right, .slide-up, .split-reveal, .pixelate, .stagger-children, .glow-on-scroll, .line-grow, .tilt-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    // Optional: unobserve after triggering
                    // observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2, rootMargin: '0px 0px -50px 0px' });

        scrollElements.forEach(el => observer.observe(el));

        // Counter animation for stats
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.target) || 0;
            const duration = 2000;
            const start = performance.now();
            
            const updateCounter = (timestamp) => {
                const progress = Math.min((timestamp - start) / duration, 1);
                counter.textContent = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(updateCounter);
                else counter.textContent = counter.dataset.suffix ? target + counter.dataset.suffix : target;
            };
            
            const counterObserver = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    requestAnimationFrame(updateCounter);
                    counterObserver.disconnect();
                }
            }, { threshold: 0.5 });
            
            counterObserver.observe(counter);
        });
    });
</script>
