<?php
/**
 * Template Name: Derek Flow Maintenance Webpage
 * Description: An ultra-premium, fully-responsive, self-contained full-screen maintenance notice template with active Zalo and Hotline contacts.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Đang Bảo Trì Nâng Cấp - Derek Flow</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- TailWind CSS via CDN for standalone WordPress page rendering -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navyPrimary: '#1A1A2E',
                        navyDeep: '#0D0D1A',
                        goldAccent: '#FFD700',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0D0D1A;
        }
        /* Custom animation for rotating elements smoothly */
        @keyframes custom-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-custom-spin {
            animation: custom-spin 12s linear infinite;
        }
        
        /* Strict CSS Isolation for icons and cards to prevent Theme / Plugin overrides */
        .dl-isolate-container, .dl-isolate-container * {
            box-sizing: border-box !important;
        }
        .dl-isolate-container svg:not(.dl-branding-logo-svg) {
            width: 20px !important;
            height: 20px !important;
            min-width: 20px !important;
            max-width: 20px !important;
            min-height: 20px !important;
            max-height: 20px !important;
            position: static !important;
            transform: none !important;
            display: inline-block !important;
            margin: 0 !important;
            padding: 0 !important;
            opacity: 1 !important;
            visibility: visible !important;
            box-shadow: none !important;
            background: transparent !important;
        }
        .dl-isolate-container svg.dl-branding-logo-svg {
            width: 100% !important;
            height: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            min-height: 100% !important;
            max-height: 100% !important;
            display: block !important;
        }
        .dl-isolate-container .dl-gear-wrapper svg {
            width: 18px !important;
            height: 18px !important;
            min-width: 18px !important;
            max-width: 18px !important;
            min-height: 18px !important;
            max-height: 18px !important;
            animation: custom-spin 12s linear infinite !important;
            display: inline-block !important;
        }
        
        /* Premium Background Rockets & Trajectories Container */
        .dl-rockets-background {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 1;
        }
        
        /* General styling for background rockets - enlarged by 40% (24px to 34px) */
        .dl-rocket {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 12px;
            will-change: transform, opacity;
            pointer-events: none;
            opacity: 0;
        }
        .dl-rocket-ship {
            position: relative;
            color: #FFD700;
            filter: drop-shadow(0 0 12px rgba(255, 215, 0, 0.75));
            width: 34px !important;
            height: 34px !important;
            min-width: 34px !important;
            max-width: 34px !important;
            min-height: 34px !important;
            max-height: 34px !important;
            display: inline-block !important;
        }
        .dl-rocket-ship svg {
            width: 100% !important;
            height: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            min-height: 100% !important;
            max-height: 100% !important;
            display: block !important;
        }
        .dl-rocket-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            color: #FFD700;
            background: rgba(13, 13, 26, 0.9);
            border: 1px solid rgba(255, 215, 0, 0.4);
            padding: 4px 10px;
            border-radius: 6px;
            white-space: nowrap;
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.4);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .dl-rocket-engine {
            position: absolute;
            bottom: -7px;
            left: 50%;
            transform: translateX(-50%);
            width: 7px;
            height: 14px;
            background: linear-gradient(to top, rgba(255, 69, 0, 0), rgba(255, 120, 0, 0.85), #FFD700);
            border-radius: 50%;
            filter: blur(1px);
            opacity: 0.82;
            animation: engine-flicker 0.1s infinite alternate;
        }
        @keyframes engine-flicker {
            0% { height: 8px; opacity: 0.6; }
            100% { height: 16px; opacity: 1; }
        }

        /* 
           Highly Coordinated Adaptive Background Rocket Lanes (Synchronized Phase 20s).
           To avoid intersecting with DEREK / FLOW letter squads during hover, 
           the secondary rockets cruise horizontally ONLY in safe upper and lower flight decks.
           At 83% - 85%, they rotate vertical (0deg) and rocket launch UP, following the main squadron!
        */
        .dl-path-lower-left {
            animation: sync-flight-lower-left 20s linear infinite;
        }
        .dl-path-lower-right {
            animation: sync-flight-lower-right 20s linear infinite;
        }
        .dl-path-upper-left {
            animation: sync-flight-upper-left 20s linear infinite;
        }
        .dl-path-upper-right {
            animation: sync-flight-upper-right 20s linear infinite;
        }

        @keyframes sync-flight-lower-left {
            0% { left: -160px; bottom: 12vh; transform: rotate(90deg); opacity: 0; }
            3% { opacity: 0.75; }
            40% { left: 45vw; bottom: 12vh; transform: rotate(90deg); opacity: 0.75; }
            55% { left: 45vw; bottom: 12vh; transform: rotate(90deg); opacity: 0; }
            82% { left: 45vw; bottom: 12vh; transform: rotate(90deg); opacity: 0; }
            /* Rotate vertically straight up at 83% */
            83% { left: 45vw; bottom: 12vh; transform: rotate(0deg); opacity: 0.85; }
            85% { left: 45vw; bottom: 12vh; transform: rotate(0deg) translateY(0); opacity: 0.95; }
            86% { left: 45vw; bottom: 12vh; transform: rotate(0deg) translateY(5px); opacity: 0.95; }
            /* Rocket launching AFTER letter squads launch */
            94% { left: 45vw; bottom: 12vh; transform: rotate(0deg) translateY(-142vh); opacity: 0; }
            100% { left: -160px; bottom: 12vh; transform: rotate(90deg); opacity: 0; }
        }

        @keyframes sync-flight-lower-right {
            0% { right: -160px; bottom: 15vh; transform: rotate(-90deg); opacity: 0; }
            15% { opacity: 0; }
            18% { opacity: 0.75; }
            58% { right: 45vw; bottom: 15vh; transform: rotate(-90deg); opacity: 0.75; }
            70% { right: 45vw; bottom: 15vh; transform: rotate(-90deg); opacity: 0; }
            82% { right: 45vw; bottom: 15vh; transform: rotate(-90deg); opacity: 0; }
            /* Rotate vertically straight up at 83% */
            83% { right: 18vw; bottom: 15vh; transform: rotate(0deg); opacity: 0.85; }
            85% { right: 18vw; bottom: 15vh; transform: rotate(0deg) translateY(0); opacity: 0.95; }
            86% { right: 18vw; bottom: 15vh; transform: rotate(0deg) translateY(5px); opacity: 0.95; }
            94% { right: 18vw; bottom: 15vh; transform: rotate(0deg) translateY(-142vh); opacity: 0; }
            100% { right: -160px; bottom: 15vh; transform: rotate(-90deg); opacity: 0; }
        }

        @keyframes sync-flight-upper-left {
            0% { left: -160px; top: 10vh; transform: rotate(90deg); opacity: 0; }
            8% { opacity: 0; }
            11% { opacity: 0.75; }
            50% { left: 40vw; top: 10vh; transform: rotate(90deg); opacity: 0.75; }
            65% { left: 40vw; top: 10vh; transform: rotate(90deg); opacity: 0; }
            82% { left: 40vw; top: 10vh; transform: rotate(90deg); opacity: 0; }
            /* Rotate vertically straight up at 83% */
            83% { left: 12vw; top: 10vh; transform: rotate(0deg); opacity: 0.85; }
            85% { left: 12vw; top: 10vh; transform: rotate(0deg) translateY(0); opacity: 0.95; }
            86% { left: 12vw; top: 10vh; transform: rotate(0deg) translateY(5px); opacity: 0.95; }
            94% { left: 12vw; top: 10vh; transform: rotate(0deg) translateY(-142vh); opacity: 0; }
            100% { left: -160px; top: 10vh; transform: rotate(90deg); opacity: 0; }
        }

        @keyframes sync-flight-upper-right {
            0% { right: -160px; top: 8vh; transform: rotate(-90deg); opacity: 0; }
            22% { opacity: 0; }
            25% { opacity: 0.75; }
            65% { right: 40vw; top: 8vh; transform: rotate(-90deg); opacity: 0.75; }
            75% { right: 40vw; top: 8vh; transform: rotate(-90deg); opacity: 0; }
            82% { right: 40vw; top: 8vh; transform: rotate(-90deg); opacity: 0; }
            /* Rotate vertically straight up at 83% */
            83% { right: 28vw; top: 8vh; transform: rotate(0deg); opacity: 0.85; }
            85% { right: 28vw; top: 8vh; transform: rotate(0deg) translateY(0); opacity: 0.95; }
            86% { right: 28vw; top: 8vh; transform: rotate(0deg) translateY(5px); opacity: 0.95; }
            94% { right: 28vw; top: 8vh; transform: rotate(0deg) translateY(-142vh); opacity: 0; }
            100% { right: -160px; top: 8vh; transform: rotate(-90deg); opacity: 0; }
        }

        /* 
           Military-grade B-2 Stealth Bomber Chevron Formations.
           Two multi-plane formations glide slowly across the background (z-index: 1), 
           with 5 warplanes structured in a tidy tactical V-shape.
        */
        .dl-b2-formation {
            position: absolute;
            width: 320px;
            height: 180px;
            will-change: transform;
            pointer-events: none;
            opacity: 0;
            z-index: 1;
        }
        .dl-b2-plane {
            position: absolute;
            color: rgba(30, 41, 59, 0.75); /* slate-850 sleek dark metal coating */
            filter: drop-shadow(0 0 8px rgba(255, 215, 0, 0.18));
        }
        .dl-b2-lead {
            width: 68px;
            left: 126px;
            top: 0;
            z-index: 5;
            color: rgba(46, 59, 78, 0.85); /* Slightly darker flagship */
        }
        .dl-b2-left-1 {
            width: 50px;
            left: 65px;
            top: 45px;
            z-index: 4;
        }
        .dl-b2-right-1 {
            width: 50px;
            left: 205px;
            top: 45px;
            z-index: 4;
        }
        .dl-b2-left-2 {
            width: 42px;
            left: 10px;
            top: 85px;
            z-index: 3;
        }
        .dl-b2-right-2 {
            width: 42px;
            left: 268px;
            top: 85px;
            z-index: 3;
        }

        .dl-b2-formation-1 {
            left: -420px;
            bottom: -220px;
            transform: rotate(35deg);
            animation: b2-glide-diagonal 36s linear infinite;
            animation-delay: 1s;
        }
        .dl-b2-formation-2 {
            right: -420px;
            top: 24%;
            transform: rotate(-90deg);
            animation: b2-glide-horizontal 42s linear infinite;
            animation-delay: 15s;
        }

        @keyframes b2-glide-diagonal {
            0% { transform: translate(0, 0) rotate(35deg); opacity: 0; }
            5% { opacity: 0.25; }
            95% { opacity: 0.25; }
            100% { transform: translate(122vw, -122vh) rotate(35deg); opacity: 0; }
        }

        @keyframes b2-glide-horizontal {
            0% { transform: translate(0, 0) rotate(-90deg); opacity: 0; }
            5% { opacity: 0.18; }
            95% { opacity: 0.18; }
            100% { transform: translate(-122vw, 0) rotate(-90deg); opacity: 0; }
        }

        /* DEREK Rocket Squadron Container */
        .dl-derek-squad-container {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 2;
        }
        .dl-squad-member {
            position: absolute;
            bottom: -140px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            will-change: transform, opacity;
            animation: squad-launch 20s cubic-bezier(0.25, 1, 0.45, 1) infinite;
        }

        /* Horizontal layout tracks: "DEREK" on the left wing (4vw to 28vw) and "FLOW" on the right wing (68vw to 86vw) to avoid card overlap symmetrical alignment */
        .dl-squad-d  { left: 4vw; --target-y: -74vh; animation-delay: 0s; }
        .dl-squad-e1 { left: 10vw; --target-y: -74vh; animation-delay: 0.15s; }
        .dl-squad-r  { left: 16vw; --target-y: -74vh; animation-delay: 0.3s; }
        .dl-squad-e2 { left: 22vw; --target-y: -74vh; animation-delay: 0.45s; }
        .dl-squad-k  { left: 28vw; --target-y: -74vh; animation-delay: 0.6s; }

        .dl-squad-f  { left: 68vw; --target-y: -74vh; animation-delay: 0.75s; }
        .dl-squad-l  { left: 74vw; --target-y: -74vh; animation-delay: 0.9s; }
        .dl-squad-o  { left: 80vw; --target-y: -74vh; animation-delay: 1.05s; }
        .dl-squad-w  { left: 86vw; --target-y: -74vh; animation-delay: 1.2s; }

        @keyframes squad-launch {
            0% {
                transform: translateY(0);
                opacity: 0;
            }
            1.5% {
                opacity: 0;
            }
            11% {
                transform: translateY(var(--target-y));
                opacity: 0.95;
            }
            /* Hover / Gentle Constellation Bobbing spelling out D-E-R-E-K - F-L-O-W */
            11%, 82% {
                transform: translateY(var(--target-y));
                opacity: 0.95;
            }
            25%, 45%, 65% {
                transform: translateY(calc(var(--target-y) - 15px));
                opacity: 0.95;
            }
            35%, 55%, 75% {
                transform: translateY(calc(var(--target-y) + 5px));
                opacity: 0.95;
            }
            /* Ignition pre-blast recoil shake */
            85% {
                transform: translateY(calc(var(--target-y) + 12px));
                opacity: 1;
            }
            92% {
                transform: translateY(-135vh);
                opacity: 0;
            }
            100% {
                transform: translateY(-135vh);
                opacity: 0;
            }
        }

        /* Spelling letters badge above rocket nose - scaled neatly to 44px */
        .dl-squad-letter {
            font-family: 'JetBrains Mono', monospace;
            font-size: 18px;
            font-weight: 900;
            color: #FFD700;
            background: rgba(13, 13, 26, 0.96);
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 215, 0, 0.6);
            box-shadow: 0 0 12px rgba(255, 215, 0, 0.5);
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.85);
            animation: pulse-letter-glow 2.5s infinite alternate;
        }
        @keyframes pulse-letter-glow {
            0% {
                box-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
                border-color: rgba(255, 215, 0, 0.35);
            }
            100% {
                box-shadow: 0 0 18px rgba(255, 215, 0, 0.75);
                border-color: rgba(255, 215, 0, 0.85);
            }
        }

        /* Complete responsive isolation for ultra-crisp mobile and tablet layouts */
        @media (max-width: 1024px) {
            .dl-derek-squad-container,
            .dl-rockets-background,
            .dl-b2-formation {
                display: none !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>
<body class="min-h-screen bg-navyDeep text-white relative flex flex-col overflow-y-auto antialiased">

    <!-- Ambient glowing backgrounds to match Derek's Luxury high-tech style -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute top-[10%] left-[5%] w-[250px] h-[250px] sm:w-[350px] sm:h-[350px] bg-goldAccent/5 rounded-full blur-[100px] sm:blur-[130px] saturate-150 animate-pulse"></div>
        <div class="absolute bottom-[15%] right-[5%] w-[300px] h-[300px] sm:w-[450px] sm:h-[450px] bg-[#0068FF]/5 rounded-full blur-[110px] sm:blur-[150px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:32px_32px] opacity-[0.05]"></div>
        
        <!-- Coordinated Military-grade B-2 Stealth Bomber Formations -->
        <div class="dl-b2-formation dl-b2-formation-1">
            <!-- Rear Left 2 -->
            <div class="dl-b2-plane dl-b2-left-2">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Rear Left 1 -->
            <div class="dl-b2-plane dl-b2-left-1">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Rear Right 1 -->
            <div class="dl-b2-plane dl-b2-right-1">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Rear Right 2 -->
            <div class="dl-b2-plane dl-b2-right-2">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Lead Ship -->
            <div class="dl-b2-plane dl-b2-lead">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                    <circle cx="80" cy="15" r="2" fill="#FFD700" class="shadow-lg shadow-goldAccent/50 animate-pulse" />
                </svg>
            </div>
        </div>

        <div class="dl-b2-formation dl-b2-formation-2">
            <!-- Rear Left 2 -->
            <div class="dl-b2-plane dl-b2-left-2">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Rear Left 1 -->
            <div class="dl-b2-plane dl-b2-left-1">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Rear Right 1 -->
            <div class="dl-b2-plane dl-b2-right-1">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Rear Right 2 -->
            <div class="dl-b2-plane dl-b2-right-2">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                </svg>
            </div>
            <!-- Lead Ship -->
            <div class="dl-b2-plane dl-b2-lead">
                <svg viewBox="0 0 160 81" fill="currentColor">
                    <path d="M80,3 L160,54 L146,58 L128,50 L108,66 L94,56 L80,63 L66,56 L52,66 L32,50 L14,58 L0,54 Z" />
                    <circle cx="80" cy="15" r="2" fill="#FFD700" class="shadow-lg shadow-goldAccent/50 animate-pulse" />
                </svg>
            </div>
        </div>

        <!-- Animated custom dynamic rockets background requested by user -->
        <div class="dl-rockets-background">
            <!-- Flight Lane 1: Lower Left-to-Right -->
            <div class="dl-rocket dl-path-lower-left">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
            
            <!-- Flight Lane 2: Lower Right-to-Left -->
            <div class="dl-rocket dl-path-lower-right">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>

            <!-- Flight Lane 3: Upper Left-to-Right -->
            <div class="dl-rocket dl-path-upper-left">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>

            <!-- Flight Lane 4: Upper Right-to-Left -->
            <div class="dl-rocket dl-path-upper-right">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
        </div>

        <!-- Coordinated "DEREK" Constellation Rocket Squadron -->
        <div class="dl-derek-squad-container">
            <!-- Rocket 1: D -->
            <div class="dl-squad-member dl-squad-d">
                <div class="dl-squad-letter shadow-lgshadow-goldAccent/10">D</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 2: E -->
            <div class="dl-squad-member dl-squad-e1">
                <div class="dl-squad-letter">E</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 3: R -->
            <div class="dl-squad-member dl-squad-r">
                <div class="dl-squad-letter">R</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 4: E -->
            <div class="dl-squad-member dl-squad-e2">
                <div class="dl-squad-letter">E</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 5: K -->
            <div class="dl-squad-member dl-squad-k">
                <div class="dl-squad-letter">K</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 6: F -->
            <div class="dl-squad-member dl-squad-f">
                <div class="dl-squad-letter">F</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 7: L -->
            <div class="dl-squad-member dl-squad-l">
                <div class="dl-squad-letter">L</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 8: O -->
            <div class="dl-squad-member dl-squad-o">
                <div class="dl-squad-letter">O</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>

            <!-- Rocket 9: W -->
            <div class="dl-squad-member dl-squad-w">
                <div class="dl-squad-letter">W</div>
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Wrapper with auto centering & proper vertical paddings to avoid cutoff on small devices -->
    <div class="flex-1 w-full max-w-sm sm:max-w-md mx-auto flex flex-col justify-center items-center px-4 py-8 sm:py-12 relative z-10 my-auto dl-isolate-container" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; width: 100% !important; max-width: 440px !important; box-sizing: border-box !important; margin: auto !important; padding: 16px !important; min-height: calc(100vh - 80px) !important;">
        
        <!-- Main Card Container -->
        <div id="dl-maintenance-card" class="w-full bg-white/[0.03] border border-white/[0.08] p-6 sm:p-8 rounded-3xl shadow-2xl text-center space-y-6 sm:space-y-8 backdrop-blur-xl" style="display: flex !important; flex-direction: column !important; width: 100% !important; max-width: 440px !important; box-sizing: border-box !important; background-color: rgba(0, 0, 0, 0.2) !important; border: 1px solid rgba(255, 255, 255, 0.08) !important; border-radius: 24px !important; padding: 24px !important; gap: 24px !important; text-align: center !important;">
            
            <!-- Animated Icon Indicator -->
            <div class="relative w-[282px] h-32 mx-auto flex items-center justify-center" style="display: flex !important; align-items: center !important; justify-content: center !important; width: 282px !important; height: 128px !important; min-width: 282px !important; min-height: 128px !important; position: relative !important; margin: 0 auto !important;">
                <!-- Central branding custom badge with high-fidelity SVG logo -->
                <div class="w-64 h-[102px] flex items-center justify-center relative z-10 select-none overflow-hidden" style="display: flex !important; align-items: center !important; justify-content: center !important; width: 256px !important; height: 102px !important; min-width: 256px !important; min-height: 102px !important; position: relative !important; z-index: 10 !important;">
                    <?php
                    // Hỗ trợ logo tùy chỉnh được tải lên
                    $custom_logo_url = dl_field('maintenance_logo_url', '');
                    if (empty($custom_logo_url)) {
                        // Thử tìm tại thư mục uploads
                        $theme_dir = get_stylesheet_directory();
                        $theme_uri = get_stylesheet_directory_uri();
                        if (file_exists($theme_dir . '/uploads/maintenance_logo.png')) {
                            $custom_logo_url = $theme_uri . '/uploads/maintenance_logo.png';
                        } elseif (file_exists(dirname($theme_dir) . '/uploads/maintenance_logo.png')) {
                            $custom_logo_url = dirname($theme_uri) . '/uploads/maintenance_logo.png';
                        }
                    }
                    if (!empty($custom_logo_url)): ?>
                        <img src="<?php echo esc_url($custom_logo_url); ?>" alt="Branding Logo" class="w-full h-full object-cover" style="width: 100% !important; height: 100% !important; object-fit: cover !important;" />
                    <?php else: ?>
                        <svg viewBox="0 0 400 160" class="w-full h-full fill-none dl-branding-logo-svg" style="width: 100% !important; height: 100% !important; display: block !important;" xmlns="http://www.w3.org/2000/svg">
                            <rect x="10" y="10" width="380" height="140" rx="28" stroke="#FFD700" stroke-width="8" fill="transparent" />
                            <circle cx="50" cy="45" r="10" fill="#FF5F56" />
                            <circle cx="85" cy="45" r="10" fill="#FFBD2E" />
                            <circle cx="120" cy="45" r="10" fill="#27C93F" />
                            <path d="M 50 82 L 70 95 L 50 108" stroke="#FFD700" stroke-width="9" stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="82" y1="108" x2="102" y2="108" stroke="#FFD700" stroke-width="9" stroke-linecap="round" />
                            <text x="125" y="107" fill="#D1D5DB" font-family="ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace" font-size="38" font-weight="bold" letter-spacing="1">derek.flow</text>
                            <rect x="358" y="78" width="18" height="30" fill="#FFD700" />
                        </svg>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Heading description -->
            <div class="space-y-3.5" style="display: block !important; width: 100% !important; margin: 0 auto !important; text-align: center !important;">
                <span class="text-[10px] sm:text-[11px] font-bold tracking-widest uppercase text-goldAccent bg-goldAccent/10 px-4 py-1.5 rounded-full font-mono inline-block border border-goldAccent/15" style="display: inline-block !important; white-space: nowrap !important; margin-bottom: 8px !important;">
                    <?php echo esc_html(dl_field('maintenance_tag', 'Nâng cấp hạ tầng tối ưu')); ?>
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white leading-tight" style="display: block !important; width: 100% !important; font-size: 24px !important; font-weight: 800 !important; line-height: 1.25 !important; color: white !important; margin: 8px 0 !important;">
                    <?php echo esc_html(dl_field('maintenance_title', 'Hệ Thống Đang Bảo Trì')); ?>
                </h1>
                <p class="text-xs sm:text-[13px] text-gray-400 leading-relaxed max-w-sm mx-auto" style="display: block !important; max-width: 320px !important; margin: 0 auto !important; color: #9CA3AF !important; font-size: 13px !important; line-height: 1.5 !important;">
                    <?php echo esc_html(dl_field('maintenance_desc', 'Website Derek Flow hiện đang được xây dựng hệ quản trị tự động hóa thông qua AI Agents. Tớ sẽ sớm trở lại sau.')); ?>
                </p>
            </div>

            <!-- Progress Indicator -->
            <div class="space-y-3 bg-white/[0.02] border border-white/[0.05] p-3.5 sm:p-4 rounded-2xl" style="display: block !important; width: 100% !important; box-sizing: border-box !important;">
                <div class="flex items-center justify-between text-[11px] font-mono text-gray-400" style="display: flex !important; align-items: center !important; justify-content: space-between !important; width: 100% !important;">
                    <span class="font-bold tracking-wider" style="font-size: 11px !important;">
                        <?php echo esc_html(dl_field('maintenance_progress_label', 'TIẾN ĐỘ THỰC HIỆN')); ?>
                    </span>
                    <span class="text-goldAccent font-black" style="font-size: 11px !important; color: #FFD700 !important; font-weight: 900 !important;">
                        <?php echo esc_html(dl_field('maintenance_progress_percent', '95% HOÀN TẤT')); ?>
                    </span>
                </div>
                <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden" style="width: 100% !important; height: 8px !important; background-color: rgba(255,255,255,0.1) !important; border-radius: 9999px !important; overflow: hidden !important; display: block !important; margin: 8px 0 !important;">
                    <?php $progress_val = intval(dl_field('maintenance_progress_num', '95')); ?>
                    <div class="h-full bg-gradient-to-r from-goldAccent to-[#FFC400] rounded-full animate-pulse transition-all duration-300" style="width: <?php echo esc_attr($progress_val); ?>% !important; height: 100% !important; border-radius: 9999px !important; background: linear-gradient(to right, #FFD700, #FFC400) !important; display: block !important;"></div>
                </div>
                <p class="text-[10px] text-gray-400/85 italic font-medium leading-relaxed" style="font-size: 10px !important; color: rgba(156,163,175,0.85) !important;">
                    <?php echo esc_html(dl_field('maintenance_progress_subtext', 'ĐANG BẬN LÀM DỰ ÁN TRĂM TỶ, NÀO RẢNH BUILD NỐT 5% CÒN LẠI')); ?>
                </p>
            </div>

            <!-- Separation divider and bottom options -->
            <div class="border-t border-white/[0.08] pt-6 space-y-4" style="border-top: 1px solid rgba(255,255,255,0.08) !important; width: 100% !important; display: block !important;">
                <span class="text-[10px] uppercase font-bold tracking-widest text-goldAccent/90 block font-mono" style="font-size: 10px !important; color: rgba(255,215,0,0.9) !important; margin-bottom: 12px !important; display: block !important;">
                    <?php echo esc_html(dl_field('maintenance_support_label', 'RỦ ĐI CÀ PHÊ')); ?>
                </span>
                
                <!-- Contact options (Beautiful, robust, and highly responsive buttons) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-[13px]" style="display: flex !important; flex-flow: row wrap !important; gap: 12px !important; width: 100% !important; box-sizing: border-box !important;">
                    <!-- Zalo link -->
                    <?php 
                    $zalo_url = dl_field('maintenance_zalo_url', 'https://zalo.me/093x9x4xxx');
                    $zalo_text = dl_field('maintenance_zalo_text', 'Chat qua Zalo');
                    ?>
                    <a href="<?php echo esc_url($zalo_url); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 px-4 bg-[#0068FF] hover:bg-[#005AE0] text-white rounded-xl transition-all font-bold shadow-lg duration-300 hover:-translate-y-0.5 active:translate-y-0 h-12 uppercase tracking-wider text-[11px] sm:text-xs" style="display: inline-flex !important; flex: 1 1 160px !important; align-items: center !important; justify-content: center !important; gap: 8px !important; height: 48px !important; box-sizing: border-box !important; color: white !important; font-weight: bold !important; text-decoration: none !important; text-transform: uppercase !important; border-radius: 12px !important; background-color: #0068FF !important;">
                        <!-- Strict containment wrapper to prevent layout distortion from global Theme rules -->
                        <span style="width: 20px !important; height: 20px !important; min-width: 20px !important; max-width: 20px !important; min-height: 20px !important; max-height: 20px !important; display: inline-flex !important; overflow: hidden !important; align-items: center; justify-content: center; transform: none !important; position: relative !important;" class="shrink-0">
                            <!-- Premium sharp custom Zalo icon SVG with strict inline style isolation -->
                            <svg viewBox="0 0 24 24" width="20" height="20" class="shrink-0" style="width: 20px !important; height: 20px !important; min-width: 20px !important; max-width: 20px !important; min-height: 20px !important; max-height: 20px !important; display: block !important;" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 5.86 2 10.63c0 2.58 1.34 4.89 3.49 6.38l-.73 2.73c-.09.34.25.62.55.43l3.23-2.01c1.08.31 2.24.48 3.46.48 5.52 0 10-3.86 10-8.63S17.52 2 12 2z" fill="#FFFFFF" />
                                <path d="M9.63 13.2v-1.2l3.41-4.9H9.78V5.94h4.94V7.6l-3.41 4.9h3.41v1.2H9.63z" fill="#0068FF" />
                            </svg>
                        </span>
                        <span><?php echo esc_html($zalo_text); ?></span>
                    </a>

                    <!-- Phone Hotline link -->
                    <?php 
                    $hotline_num = dl_field('maintenance_hotline_number', '093x9x4xxx');
                    $hotline_text = dl_field('maintenance_hotline_text', 'Hotline');
                    ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $hotline_num)); ?>" class="flex items-center justify-center gap-2 px-4 bg-gradient-to-r from-goldAccent to-[#E6C200] hover:brightness-110 text-navyDeep rounded-xl transition-all font-black shadow-lg duration-300 hover:-translate-y-0.5 active:translate-y-0 h-12 uppercase tracking-wider text-[11px] sm:text-xs" style="display: inline-flex !important; flex: 1 1 160px !important; align-items: center !important; justify-content: center !important; gap: 8px !important; height: 48px !important; box-sizing: border-box !important; color: #0D0D1A !important; font-weight: 900 !important; text-decoration: none !important; text-transform: uppercase !important; border-radius: 12px !important; background: linear-gradient(to right, #FFD700, #E6C200) !important;">
                        <!-- Strict containment wrapper to prevent layout distortion from global Theme rules -->
                        <span style="width: 20px !important; height: 20px !important; min-width: 20px !important; max-width: 20px !important; min-height: 20px !important; max-height: 20px !important; display: inline-flex !important; overflow: hidden !important; align-items: center; justify-content: center; transform: none !important; position: relative !important;" class="shrink-0">
                            <svg width="20" height="20" class="text-navyDeep shrink-0" style="width: 20px !important; height: 20px !important; min-width: 20px !important; max-width: 20px !important; min-height: 20px !important; max-height: 20px !important; display: block !important; position: static !important; transform: none !important; margin: 0 !important; padding: 0 !important;" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27c1.12.44 2.33.68 3.58.68a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.24 2.46.68 3.58a1 1 0 0 1-.27 1.11z"/>
                            </svg>
                        </span>
                        <span><?php echo esc_html($hotline_text); ?></span>
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- Minimal credits with spacing margin/padding -->
    <div class="text-center text-[10px] text-gray-500 font-mono tracking-widest relative z-10 pb-6 pt-2 shrink-0">
        &copy; <?php echo date('Y'); ?> DEREK FLOW STUDIO &bull; PRIVACY & SECURITY AUTOMATION
    </div>

    <?php wp_footer(); ?>
</body>
</html>
