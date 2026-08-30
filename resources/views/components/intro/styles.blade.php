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
        filter: blur(50px);
        opacity: 0;
        animation: orbPulse 1.5s ease-out forwards;
    }
    .intro-orb.red { width: 300px; height: 300px; background: #dc2626; top: 20%; left: 20%; }
    .intro-orb.orange { width: 250px; height: 250px; background: #f97316; bottom: 20%; right: 20%; animation-delay: 0.2s; }
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
        animation: lineGrow 1s ease-out forwards;
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
