<?php
/**
 * Template Name: Derek Lâm Maintenance Webpage
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
        .dl-isolate-container svg {
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
        
        /* General styling for background rockets */
        .dl-rocket {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 10px;
            will-change: transform, opacity;
            pointer-events: none;
            opacity: 0;
        }
        .dl-rocket-ship {
            position: relative;
            color: #FFD700;
            filter: drop-shadow(0 0 8px rgba(255, 215, 0, 0.65));
            width: 24px !important;
            height: 24px !important;
            min-width: 24px !important;
            max-width: 24px !important;
            min-height: 24px !important;
            max-height: 24px !important;
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
            background: rgba(13, 13, 26, 0.85);
            border: 1px solid rgba(255, 215, 0, 0.35);
            padding: 3px 8px;
            border-radius: 6px;
            white-space: nowrap;
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.4);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .dl-rocket-engine {
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 5px;
            height: 10px;
            background: linear-gradient(to top, rgba(255, 69, 0, 0), rgba(255, 120, 0, 0.85), #FFD700);
            border-radius: 50%;
            filter: blur(1px);
            opacity: 0.8;
            animation: engine-flicker 0.1s infinite alternate;
        }
        @keyframes engine-flicker {
            0% { height: 6px; opacity: 0.6; }
            100% { height: 12px; opacity: 1; }
        }

        /* Flight Path 1: Diagonal Up-Right (Angle: +45 degrees) */
        .dl-path-ur-1 {
            left: -100px;
            top: 85%;
            transform: rotate(45deg);
            animation: flight-ur 15s linear infinite;
        }
        .dl-path-ur-2 {
            left: -100px;
            top: 55%;
            transform: rotate(45deg);
            animation: flight-ur 13s linear infinite;
            animation-delay: 4.5s;
        }
        @keyframes flight-ur {
            0% { transform: translate(0, 0) rotate(45deg); opacity: 0; }
            4% { opacity: 0.7; }
            94% { opacity: 0.7; }
            100% { transform: translate(115vw, -115vw) rotate(45deg); opacity: 0; }
        }

        /* Flight Path 2: Diagonal Up-Left (Angle: -45 degrees) */
        .dl-path-ul-1 {
            right: -100px;
            top: 90%;
            transform: rotate(-45deg);
            animation: flight-ul 16s linear infinite;
            animation-delay: 2.5s;
        }
        .dl-path-ul-2 {
            right: -100px;
            top: 60%;
            transform: rotate(-45deg);
            animation: flight-ul 14s linear infinite;
            animation-delay: 7.5s;
        }
        @keyframes flight-ul {
            0% { transform: translate(0, 0) rotate(-45deg); opacity: 0; }
            4% { opacity: 0.65; }
            94% { opacity: 0.65; }
            100% { transform: translate(-115vw, -115vw) rotate(-45deg); opacity: 0; }
        }

        /* Flight Path 3: Horizontal Left-to-Right (Angle: +90 degrees) */
        .dl-path-lr-1 {
            left: -100px;
            top: 35%;
            transform: rotate(90deg);
            animation: flight-lr 18s linear infinite;
            animation-delay: 1s;
        }
        .dl-path-lr-2 {
            left: -100px;
            top: 65%;
            transform: rotate(90deg);
            animation: flight-lr 15s linear infinite;
            animation-delay: 9s;
        }
        @keyframes flight-lr {
            0% { transform: translate(0, 0) rotate(90deg); opacity: 0; }
            4% { opacity: 0.75; }
            94% { opacity: 0.75; }
            100% { transform: translate(115vw, 0) rotate(90deg); opacity: 0; }
        }

        /* Flight Path 4: Horizontal Right-to-Left (Angle: -90 degrees) */
        .dl-path-rl-1 {
            right: -100px;
            top: 45%;
            transform: rotate(-90deg);
            animation: flight-rl 17s linear infinite;
            animation-delay: 5s;
        }
        .dl-path-rl-2 {
            right: -100px;
            top: 75%;
            transform: rotate(-90deg);
            animation: flight-rl 19s linear infinite;
            animation-delay: 11s;
        }
        @keyframes flight-rl {
            0% { transform: translate(0, 0) rotate(-90deg); opacity: 0; }
            4% { opacity: 0.6; }
            94% { opacity: 0.6; }
            100% { transform: translate(-115vw, 0) rotate(-90deg); opacity: 0; }
        }

        /* Flight Path 5: Straight Up-Vertical (Angle: 0 degrees) */
        .dl-path-up-1 {
            left: 20%;
            bottom: -100px;
            transform: rotate(0deg);
            animation: flight-up 11s linear infinite;
            animation-delay: 3s;
        }
        .dl-path-up-2 {
            left: 80%;
            bottom: -100px;
            transform: rotate(0deg);
            animation: flight-up 12s linear infinite;
            animation-delay: 8s;
        }
        @keyframes flight-up {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            5% { opacity: 0.7; }
            95% { opacity: 0.7; }
            100% { transform: translateY(-115vh) rotate(0deg); opacity: 0; }
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
            bottom: -120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            will-change: transform, opacity;
            animation: squad-launch 20s cubic-bezier(0.25, 1, 0.45, 1) infinite;
        }

        /* Horizontal layout tracks spanning screen width nicely */
        .dl-squad-d  { left: 10vw; --target-y: -78vh; animation-delay: 0s; }
        .dl-squad-e1 { left: 28vw; --target-y: -78vh; animation-delay: 0.2s; }
        .dl-squad-r  { left: 48vw; --target-y: -78vh; animation-delay: 0.4s; }
        .dl-squad-e2 { left: 68vw; --target-y: -78vh; animation-delay: 0.6s; }
        .dl-squad-k  { left: 86vw; --target-y: -78vh; animation-delay: 0.8s; }

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
            /* Hover / Gentle Constellation Bobbing spelling out D-E-R-E-K */
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

        /* Spelling letters badge above the rocket nose */
        .dl-squad-letter {
            font-family: 'JetBrains Mono', monospace;
            font-size: 15px;
            font-weight: 900;
            color: #FFD700;
            background: rgba(13, 13, 26, 0.96);
            width: 34px;
            height: 34px;
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

        /* Screen responses to keep DEREK squad clean on small screens */
        @media (max-width: 640px) {
            .dl-squad-letter {
                width: 25px;
                height: 25px;
                font-size: 11px;
                border: 1.2px solid rgba(255, 215, 0, 0.5);
            }
            .dl-squad-d  { left: 5vw; --target-y: -78vh; }
            .dl-squad-e1 { left: 23vw; --target-y: -78vh; }
            .dl-squad-r  { left: 48vw; --target-y: -78vh; }
            .dl-squad-e2 { left: 73vw; --target-y: -78vh; }
            .dl-squad-k  { left: 88vw; --target-y: -78vh; }
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
        
        <!-- Animated custom dynamic rockets background requested by user -->
        <div class="dl-rockets-background">
            <!-- Flight Path 1: Diagonal Up-Right -->
            <div class="dl-rocket dl-path-ur-1">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
            <div class="dl-rocket dl-path-ur-2">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
            
            <!-- Flight Path 2: Diagonal Up-Left -->
            <div class="dl-rocket dl-path-ul-1">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
            <div class="dl-rocket dl-path-ul-2">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>

            <!-- Flight Path 3: Horizontal Left-to-Right -->
            <div class="dl-rocket dl-path-lr-1">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
            <div class="dl-rocket dl-path-lr-2">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>

            <!-- Flight Path 4: Horizontal Right-to-Left -->
            <div class="dl-rocket dl-path-rl-1">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
            <div class="dl-rocket dl-path-rl-2">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>

            <!-- Flight Path 5: Straight Up -->
            <div class="dl-rocket dl-path-up-1">
                <div class="dl-rocket-ship">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C11.5,4,10,8.5,10,12v4l-4,3v2l4-1v2h4v-2l4,1v-2l-4-3V12C14,8.5,12.5,4,12,2z" />
                    </svg>
                    <div class="dl-rocket-engine"></div>
                </div>
                <div class="dl-rocket-label">Derek Flow</div>
            </div>
            <div class="dl-rocket dl-path-up-2">
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
        </div>
    </div>

    <!-- Main Wrapper with auto centering & proper vertical paddings to avoid cutoff on small devices -->
    <div class="flex-1 w-full max-w-sm sm:max-w-md mx-auto flex flex-col justify-center items-center px-4 py-8 sm:py-12 relative z-10 my-auto dl-isolate-container">
        
        <!-- Main Card Container -->
        <div id="dl-maintenance-card" class="w-full bg-white/[0.03] border border-white/[0.08] p-6 sm:p-8 rounded-3xl shadow-2xl text-center space-y-6 sm:space-y-8 backdrop-blur-xl">
            
            <!-- Animated Icon Indicator -->
            <div class="relative w-24 h-24 mx-auto flex items-center justify-center">
                <!-- Pulsing outer ring -->
                <span class="absolute inset-0 rounded-full border-2 border-goldAccent/20 animate-ping opacity-60"></span>
                <span class="absolute inset-2 rounded-full border border-goldAccent/30 animate-pulse opacity-80"></span>
                
                <!-- Central branding custom badge -->
                <div class="w-16 h-16 bg-gradient-to-br from-goldAccent to-[#E6C200] text-navyDeep rounded-2xl flex items-center justify-center font-black text-2xl border border-white/20 shadow-2xl relative z-10 select-none">
                    DL
                </div>
                
                <!-- Gear/Tools badge overlay with rotating vector SVG (Replacing Emoji for premium visual output) -->
                <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-[#0068FF] rounded-full flex items-center justify-center border-2 border-navyDeep shadow-lg dl-gear-wrapper">
                    <svg width="18" height="18" class="text-white animate-custom-spin" style="width: 18px !important; height: 18px !important; min-width: 18px !important; max-width: 18px !important; min-height: 18px !important; max-height: 18px !important; display: inline-block !important; animation: custom-spin 12s linear infinite !important; position: static !important; transform-origin: center !important;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                    <!-- Heading description -->
            <div class="space-y-3.5">
                <span class="text-[10px] sm:text-[11px] font-bold tracking-widest uppercase text-goldAccent bg-goldAccent/10 px-4 py-1.5 rounded-full font-mono inline-block border border-goldAccent/15">
                    <?php echo esc_html(dl_field('maintenance_tag', 'Nâng cấp hạ tầng tối ưu')); ?>
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white leading-tight">
                    <?php echo esc_html(dl_field('maintenance_title', 'Hệ Thống Đang Bảo Trì')); ?>
                </h1>
                <p class="text-xs sm:text-[13px] text-gray-400 leading-relaxed max-w-sm mx-auto">
                    <?php echo esc_html(dl_field('maintenance_desc', 'Website Derek Flow hiện đang được xây dựng hệ quản trị tự động hóa thông qua AI Agents. Tớ sẽ sớm trở lại sau.')); ?>
                </p>
            </div>

            <!-- Progress Indicator -->
            <div class="space-y-3 bg-white/[0.02] border border-white/[0.05] p-3.5 sm:p-4 rounded-2xl">
                <div class="flex items-center justify-between text-[11px] font-mono text-gray-400">
                    <span class="font-bold tracking-wider">
                        <?php echo esc_html(dl_field('maintenance_progress_label', 'TIẾN ĐỘ THỰC HIỆN')); ?>
                    </span>
                    <span class="text-goldAccent font-black">
                        <?php echo esc_html(dl_field('maintenance_progress_percent', '95% HOÀN TẤT')); ?>
                    </span>
                </div>
                <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                    <?php $progress_val = intval(dl_field('maintenance_progress_num', '95')); ?>
                    <div class="h-full bg-gradient-to-r from-goldAccent to-[#FFC400] rounded-full animate-pulse transition-all duration-300" style="width: <?php echo esc_attr($progress_val); ?>%"></div>
                </div>
                <p class="text-[10px] text-gray-400/85 italic font-medium leading-relaxed">
                    <?php echo esc_html(dl_field('maintenance_progress_subtext', 'ĐANG BẬN LÀM DỰ ÁN TRĂM TỶ, NÀO RẢNH BUILD NỐT 5% CÒN LẠI')); ?>
                </p>
            </div>

            <!-- Separation divider and bottom options -->
            <div class="border-t border-white/[0.08] pt-6 space-y-4">
                <span class="text-[10px] uppercase font-bold tracking-widest text-goldAccent/90 block font-mono">
                    <?php echo esc_html(dl_field('maintenance_support_label', 'RỦ ĐI CÀ PHÊ')); ?>
                </span>
                
                <!-- Contact options (Beautiful, robust, and highly responsive buttons) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-[13px]">
                    <!-- Zalo link -->
                    <?php 
                    $zalo_url = dl_field('maintenance_zalo_url', 'https://zalo.me/093x9x4xxx');
                    $zalo_text = dl_field('maintenance_zalo_text', 'Chat qua Zalo');
                    ?>
                    <a href="<?php echo esc_url($zalo_url); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 px-4 bg-[#0068FF] hover:bg-[#005AE0] text-white rounded-xl transition-all font-bold shadow-lg duration-300 hover:-translate-y-0.5 active:translate-y-0 h-12 uppercase tracking-wider text-[11px] sm:text-xs">
                        <!-- Strict containment wrapper to prevent layout distortion from global Theme rules -->
                        <span style="width: 20px !important; height: 20px !important; min-width: 20px !important; max-width: 20px !important; min-height: 20px !important; max-height: 20px !important; display: inline-flex !important; overflow: hidden !important; align-items: center; justify-content: center; transform: none !important; position: relative !important;" class="shrink-0">
                            <!-- Premium sharp custom Zalo icon SVG with strict inline style isolation -->
                            <svg viewBox="0 0 24 24" width="20" height="20" class="fill-current shrink-0" style="width: 20px !important; height: 20px !important; min-width: 20px !important; max-width: 20px !important; min-height: 20px !important; max-height: 20px !important; display: block !important; position: static !important; transform: none !important; margin: 0 !important; padding: 0 !important;" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 5.86 2 10.63c0 2.58 1.34 4.89 3.49 6.38l-.73 2.7c-.1.35.26.63.56.44l3.23-2.02c1.08.31 2.24.48 3.45.48 5.52 0 10-3.86 10-8.63S17.52 2 12 2zm3.33 11.2H11.2l-.63.93h2.64v1.16H9.41v-.91l1.83-2.61H9.68V10.6h3.48v.91l-1.83 2.60H13.6c.16 0 .3-.13.3-.3v-.3c0-.17-.14-.3-.3-.3h-.91v-1.16h.91c.8 0 1.46.65 1.46 1.46v.3c0 .8-.66 1.46-1.46 1.46zm-2.27-5.04c.54 0 .98.44.98.98s-.44.98-.98.98a.98.98 0 01-.98-.98c0-.54.44-.98.98-.98z" />
                            </svg>
                        </span>
                        <span><?php echo esc_html($zalo_text); ?></span>
                    </a>

                    <!-- Phone Hotline link -->
                    <?php 
                    $hotline_num = dl_field('maintenance_hotline_number', '093x9x4xxx');
                    $hotline_text = dl_field('maintenance_hotline_text', 'Hotline');
                    ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $hotline_num)); ?>" class="flex items-center justify-center gap-2 px-4 bg-gradient-to-r from-goldAccent to-[#E6C200] hover:brightness-110 text-navyDeep rounded-xl transition-all font-black shadow-lg duration-300 hover:-translate-y-0.5 active:translate-y-0 h-12 uppercase tracking-wider text-[11px] sm:text-xs">
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
        &copy; <?php echo date('Y'); ?> DEREK LÂM STUDIO &bull; PRIVACY & SECURITY AUTOMATION
    </div>

    <?php wp_footer(); ?>
</body>
</html>
