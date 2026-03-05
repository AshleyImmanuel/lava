<style>
    /* ===== MAIN CONTENT TRANSITIONS ===== */
    .main-wrap { opacity: 0; }
    .main-wrap.show { animation: mainIn 0.5s ease-out forwards; }
    .main-wrap.no-intro { opacity: 1; } /* Show immediately when no intro */
    @keyframes mainIn { to { opacity: 1; } }
    
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Nav items */
    .nav-item { opacity: 0; transform: translateY(-20px); }
    .nav-item.show { animation: navDrop 0.4s ease-out forwards; }
    @keyframes navDrop { to { opacity: 1; transform: translateY(0); } }

    /* Landing page elements - triggered after intro */
    .reveal { opacity: 0; transform: translateY(30px); }
    .reveal.show { animation: revealUp 0.5s ease-out forwards; }
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

    /* Optimized Pixelate - simplified for performance */
    .pixelate { 
        opacity: 0; 
        transform: scale(0.98);
    }
    .pixelate.show { 
        animation: pixelEffect 0.4s ease-out forwards; 
    }
    @keyframes pixelEffect {
        0% { opacity: 0; transform: scale(0.98); }
        100% { opacity: 1; transform: scale(1); }
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
        
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    obs.unobserve(entry.target); // Unobserve after triggering for performance
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -30px 0px' });

        scrollElements.forEach(el => observer.observe(el));

        // Optimized counter animation - fewer frames, eased timing
        const counters = document.querySelectorAll('.counter');
        const easeOut = t => 1 - Math.pow(1 - t, 3); // Cubic ease-out
        
        const counterObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.dataset.target) || 0;
                    const suffix = counter.dataset.suffix || '';
                    const duration = 1500; // Faster animation
                    let start = null;
                    
                    const animate = (time) => {
                        if (!start) start = time;
                        const progress = Math.min((time - start) / duration, 1);
                        counter.textContent = Math.floor(easeOut(progress) * target) + (progress === 1 ? suffix : '');
                        if (progress < 1) requestAnimationFrame(animate);
                    };
                    requestAnimationFrame(animate);
                    obs.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(c => counterObserver.observe(c));
    });
</script>
