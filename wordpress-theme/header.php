<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?></title>
    
    <!-- Google Fonts for elite premium aesthetics -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap font-display=swap" rel="stylesheet">
    
    <!-- TailWind CSS via official CDN for fast standalone WordPress implementation -->
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

    <!-- Native inline styles to prevent layout shifts -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAFAF8;
        }
        /* Style customized scrollbars */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #FAFAF8;
        }
        ::-webkit-scrollbar-thumb {
            background: #1A1A2E;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #FFD700;
        }
    </style>

    <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen flex flex-col justify-between'); ?>>

<!-- Navigation Header -->
<header class="bg-white border-b border-gray-150 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 group">
            <span class="w-10 h-10 bg-navyPrimary text-goldAccent rounded-lg flex items-center justify-center font-extrabold text-lg border border-goldAccent/25 shadow-sm">
                DF
            </span>
            <div class="leading-none">
                <span class="text-sm font-black text-navyPrimary tracking-tighter uppercase block">DEREK FLOW</span>
                <span class="text-[9px] font-bold text-gray-400 tracking-widest uppercase block">SEO & AUTOMATION</span>
            </div>
        </a>

        <!-- Classic WordPress dynamic menu navigation mapping -->
        <nav class="hidden md:flex items-center gap-6">
            <?php
            if (has_nav_menu('primary-menu')) {
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'flex gap-6 text-xs font-bold uppercase tracking-wider text-gray-600',
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false
                ]);
            } else {
                // Static elegant fallback layout
                ?>
                <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="text-[11px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-[#FFD700] transition-colors animate-pulse">DỊCH VỤ</a>
                <a href="<?php echo esc_url(home_url('/gioi-thieu')); ?>" class="text-[11px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-[#FFD700] transition-colors">GIỚI THIỆU</a>
                <a href="<?php echo esc_url(home_url('/case-study')); ?>" class="text-[11px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-[#FFD700] transition-colors">CASE STUDY</a>
                <a href="<?php echo esc_url(home_url('/gia')); ?>" class="text-[11px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-[#FFD700] transition-colors">GIÁ</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="text-[11px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-[#FFD700] transition-colors">BLOG</a>
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="text-[11px] font-bold uppercase tracking-wider text-goldAccent font-extrabold">LIÊN HỆ</a>
                <?php
            }
            ?>
        </nav>

        <!-- Dynamic CTA Button with gold highlights -->
        <div class="flex items-center gap-3">
            <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="bg-navyPrimary text-white hover:bg-goldAccent hover:text-navyPrimary text-[10px] sm:text-[11px] font-bold uppercase tracking-wider px-4 sm:px-5 py-2.5 rounded-lg transition-all duration-300 shadow-sm">
                TƯ VẤN NGAY
            </a>
        </div>
    </div>
</header>
