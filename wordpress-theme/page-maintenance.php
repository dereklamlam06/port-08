<?php
/**
 * Template Name: Derek Lâm Maintenance Webpage
 * Description: A gorgeous, self-contained full-screen maintenance notice template with active Zalo and Hotline contacts.
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap font-display=swap" rel="stylesheet">
    
    <!-- TailWind CSS via CDN for standalone WordPress page rendering -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navyPrimary: '#1A1A2E',
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
            background-color: #1A1A2E;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-navyPrimary text-white px-6 py-12 relative overflow-hidden select-none">

    <!-- Ambient glowing backgrounds to match Derek's Luxury high-tech style -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute top-[20%] left-[10%] w-[300px] h-[300px] bg-goldAccent/5 rounded-full blur-[120px] saturate-150 animate-pulse"></div>
        <div class="absolute bottom-[20%] right-[10%] w-[400px] h-[400px] bg-white/5 rounded-full blur-[140px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:40px_40px] opacity-10"></div>
    </div>

    <!-- Main Card Container -->
    <div class="w-full max-w-lg bg-white/5 border border-white/10 p-8 md:p-10 rounded-2xl shadow-2xl relative z-10 text-center space-y-8 backdrop-blur-md">
        
        <!-- Animated Icon Indicator -->
        <div class="relative w-24 h-24 mx-auto flex items-center justify-center">
            <!-- Pulsing outer ring -->
            <span class="absolute inset-0 rounded-full border-2 border-goldAccent/30 animate-ping opacity-75"></span>
            
            <!-- Central branding badge -->
            <div class="w-16 h-16 bg-goldAccent text-navyPrimary rounded-2xl flex items-center justify-center font-extrabold text-2xl border border-white/20 shadow-lg relative z-10 select-none">
                DL
            </div>
            
            <!-- Gear/Tools badge overlay -->
            <div class="absolute -bottom-1 -right-1 w-7 h-7 bg-[#0068FF] text-white rounded-full flex items-center justify-center text-xs font-bold border-2 border-navyPrimary shadow animate-bounce">
                🛠️
            </div>
        </div>

        <!-- Heading description -->
        <div class="space-y-3">
            <span class="text-[10px] sm:text-[11px] font-bold tracking-widest uppercase text-goldAccent bg-white/10 px-3.5 py-1.5 rounded-full font-mono inline-block">
                Nâng cấp hạ tầng tối ưu
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">Hệ Thống Đang Bảo Trì</h1>
            <p class="text-xs sm:text-[13px] text-gray-400 leading-relaxed max-w-sm mx-auto">
                Website hiện đang được tối ưu hóa tốc độ load trang, cấu trúc mã nguồn Core Web Vitals và nâng cấp hệ quản trị tự động hóa AI. Chúng tôi sẽ trở lại ngay lập tức với trải nghiệm hoàn mỹ nhất.
            </p>
        </div>

        <!-- Progress Indicator -->
        <div class="space-y-2 max-w-xs mx-auto">
            <div class="flex items-center justify-between text-[11px] font-mono text-gray-400">
                <span>TIẾN ĐỘ TỐI ƯU</span>
                <span class="text-goldAccent font-bold">95% HOÀN TẤT</span>
            </div>
            <div class="w-full h-1.5 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-goldAccent rounded-full animate-pulse transition-all duration-300" style="width: 95%"></div>
            </div>
            <p class="text-[10px] text-gray-400 italic">Dự kiến hoàn thành trong vòng 15-30 phút tới</p>
        </div>

        <div class="border-t border-white/10 pt-6">
            <span class="text-[10px] uppercase font-bold tracking-widest text-[#FFD700] block mb-4">Hỗ trợ tư vấn khẩn cấp</span>
            
            <!-- Contact options -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                <!-- Zalo link -->
                <a href="https://zalo.me/0945143701" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 p-3.5 bg-[#0068FF] hover:bg-[#005AE0] text-white rounded-xl transition-all font-bold shadow-sm duration-300 transform hover:-translate-y-0.5">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 fill-white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 5.86 2 10.63c0 2.58 1.34 4.89 3.49 6.38l-.73 2.7c-.1.35.26.63.56.44l3.23-2.02c1.08.31 2.24.48 3.45.48 5.52 0 10-3.86 10-8.63S17.52 2 12 2zm3.33 11.2H11.2l-.63.93h2.64v1.16H9.41v-.91l1.83-2.61H9.68V10.6h3.48v.91l-1.83 2.60H13.6c.16 0 .3-.13.3-.3v-.3c0-.17-.14-.3-.3-.3h-.91v-1.16h.91c.8 0 1.46.65 1.46 1.46v.3c0 .8-.66 1.46-1.46 1.46zm-2.27-5.04c.54 0 .98.44.98.98s-.44.98-.98.98a.98.98 0 01-.98-.98c0-.54.44-.98.98-.98z" />
                    </svg>
                    <span>Liên hệ qua Zalo</span>
                </a>

                <!-- Phone Hotline link -->
                <a href="tel:0945143701" class="flex items-center justify-center gap-2 p-3.5 bg-goldAccent hover:bg-[#E6C200] text-navyPrimary rounded-xl transition-all font-extrabold shadow-sm duration-300 transform hover:-translate-y-0.5">
                    <svg class="w-4.5 h-4.5 text-navyPrimary" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27c1.12.44 2.33.68 3.58.68a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.24 2.46.68 3.58a1 1 0 0 1-.27 1.11z"/>
                    </svg>
                    <span>Hotline: 0945.143.701</span>
                </a>
            </div>
        </div>

    </div>

    <!-- Minimal credits -->
    <div class="mt-8 text-center text-[10px] text-gray-500 font-mono tracking-widest relative z-10">
        &copy; <?php echo date('Y'); ?> DEREK LÂM STUDIO • BACKEND SERVICES SECURITY ACTIVE
    </div>

    <?php wp_footer(); ?>
</body>
</html>
