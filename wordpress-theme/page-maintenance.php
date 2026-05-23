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
    <title>Hệ thống Đang Bảo Trì Nâng Cấp - Derek Lâm</title>
    
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
    </style>
    <?php wp_head(); ?>
</head>
<body class="min-h-screen flex flex-col items-center justify-between bg-navyDeep text-white px-4 py-8 relative overflow-hidden select-none">

    <!-- Ambient glowing backgrounds to match Derek's Luxury high-tech style -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute top-[15%] left-[5%] w-[250px] h-[250px] sm:w-[350px] sm:h-[350px] bg-goldAccent/5 rounded-full blur-[100px] sm:blur-[130px] saturate-150 animate-pulse"></div>
        <div class="absolute bottom-[20%] right-[5%] w-[300px] h-[300px] sm:w-[450px] sm:h-[450px] bg-[#0068FF]/5 rounded-full blur-[110px] sm:blur-[150px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:32px_32px] opacity-[0.06]"></div>
    </div>

    <!-- Empty top spacer to perfectly align the core card dynamically -->
    <div></div>

    <!-- Main Card Container -->
    <div class="w-full max-w-md bg-white/[0.03] border border-white/[0.08] p-6 sm:p-8 rounded-3xl shadow-2xl relative z-10 text-center space-y-6 sm:space-y-8 backdrop-blur-xl my-auto">
        
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
            <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-[#0068FF] rounded-full flex items-center justify-center border-2 border-navyDeep shadow-lg">
                <svg class="w-4.5 h-4.5 text-white animate-custom-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>

        <!-- Heading description -->
        <div class="space-y-3.5">
            <span class="text-[10px] font-bold tracking-widest uppercase text-goldAccent bg-goldAccent/10 px-4 py-1.5 rounded-full font-mono inline-block border border-goldAccent/10">
                Nâng cấp hạ tầng tối ưu
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white leading-tight">Hệ Thống Đang Bảo Trì</h1>
            <p class="text-xs sm:text-[13px] text-gray-400 leading-relaxed max-w-sm mx-auto">
                Website của Chuyên gia SEO Derek Lâm hiện đang được tối ưu hóa tốc độ load trang, cấu trúc mã nguồn Core Web Vitals và lắp ráp hệ quản trị tự động hóa thông qua AI Agents. Chúng tôi sẽ sớm trở lại ngay lập tức.
            </p>
        </div>

        <!-- Progress Indicator -->
        <div class="space-y-3 max-w-xs mx-auto bg-white/[0.02] border border-white/[0.05] p-3.5 rounded-2xl">
            <div class="flex items-center justify-between text-[11px] font-mono text-gray-400">
                <span class="font-bold tracking-wider">TIẾN ĐỘ THỰC HIỆN</span>
                <span class="text-goldAccent font-black">95% HOÀN TẤT</span>
            </div>
            <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-goldAccent to-[#FFC400] rounded-full animate-pulse transition-all duration-300" style="width: 95%"></div>
            </div>
            <p class="text-[10px] text-gray-400/80 italic font-medium">Bàn giao & kích hoạt lại trong 15-30 phút tới</p>
        </div>

        <!-- Separation divider and bottom options -->
        <div class="border-t border-white/[0.08] pt-6 space-y-4">
            <span class="text-[10px] uppercase font-bold tracking-widest text-goldAccent/90 block font-mono">
                HỖ TRỢ TƯ VẤN KHẨN CẤP
            </span>
            
            <!-- Contact options (Beautiful, robust, and highly responsive buttons) -->
            <div class="flex flex-col sm:flex-row gap-3 text-xs sm:text-[13px]">
                <!-- Zalo link -->
                <a href="https://zalo.me/0945143701" target="_blank" rel="noopener noreferrer" class="flex-1 flex items-center justify-center gap-2.5 px-4 py-3.5 bg-[#0068FF] hover:bg-[#005AE0] text-white rounded-xl transition-all font-bold shadow-lg duration-300 hover:-translate-y-0.5 active:translate-y-0">
                    <!-- Premium sharp custom Zalo icon SVG or high quality placeholder -->
                    <svg viewBox="0 0 24 24" class="w-4.5 h-4.5 fill-current" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 5.86 2 10.63c0 2.58 1.34 4.89 3.49 6.38l-.73 2.7c-.1.35.26.63.56.44l3.23-2.02c1.08.31 2.24.48 3.45.48 5.52 0 10-3.86 10-8.63S17.52 2 12 2zm3.33 11.2H11.2l-.63.93h2.64v1.16H9.41v-.91l1.83-2.61H9.68V10.6h3.48v.91l-1.83 2.60H13.6c.16 0 .3-.13.3-.3v-.3c0-.17-.14-.3-.3-.3h-.91v-1.16h.91c.8 0 1.46.65 1.46 1.46v.3c0 .8-.66 1.46-1.46 1.46zm-2.27-5.04c.54 0 .98.44.98.98s-.44.98-.98.98a.98.98 0 01-.98-.98c0-.54.44-.98.98-.98z" />
                    </svg>
                    <span class="whitespace-nowrap">Chuyện trò qua Zalo</span>
                </a>

                <!-- Phone Hotline link -->
                <a href="tel:0945143701" class="flex-1 flex items-center justify-center gap-2 px-4 py-3.5 bg-gradient-to-r from-goldAccent to-[#E6C200] hover:brightness-110 text-navyDeep rounded-xl transition-all font-black shadow-lg duration-300 hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-4.5 h-4.5 text-navyDeep" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27c1.12.44 2.33.68 3.58.68a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.24 2.46.68 3.58a1 1 0 0 1-.27 1.11z"/>
                    </svg>
                    <span class="whitespace-nowrap">Hotline: 0945.143.701</span>
                </a>
            </div>
        </div>

    </div>

    <!-- Minimal credits -->
    <div class="text-center text-[10px] text-gray-500 font-mono tracking-widest relative z-10 pt-4">
        &copy; <?php echo date('Y'); ?> DEREK LÂM STUDIO &bull; PRIVACY & SECURITY AUTOMATION
    </div>

    <?php wp_footer(); ?>
</body>
</html>
