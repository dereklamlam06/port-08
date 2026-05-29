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
            background-color: #FAFAF7; /* Use beautiful light warm cream as default */
        }
        /* Style customized scrollbars */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #FAFAF7;
        }
        ::-webkit-scrollbar-thumb {
            background: #1A1A2E;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #FFD700;
        }
    </style>

    <!-- Synced dynamic theme engine matching the client-side selection exactly -->
    <script>
        (function() {
            var themes = {
                "oolong-milk": { bg: "#E8E4D9", card: "#F4F1E6", border: "#CEBFAC", dark: false },
                "dim-matcha": { bg: "#1C1D1F", card: "#242629", border: "#33373D", dark: true },
                "jasmine-pale": { bg: "#E2E5DF", card: "#EDF0EA", border: "#C9CEBF", dark: false },
                "night-comfort": { bg: "#0E131F", card: "#161E30", border: "#232F4A", dark: true },
                "eink-reader": { bg: "#0B0C0E", card: "#121417", border: "#1D2025", dark: true }
            };
            var activeId = localStorage.getItem("derek-bg-theme") || "oolong-milk";
            var theme = themes[activeId] || themes["oolong-milk"];
            
            var styleEl = document.createElement('style');
            
            function generateCSS(t) {
                var textCustom = t.dark ? "#FFFFFF" : "#111424";
                var textMuted = t.dark ? "#F1F5F9" : "#2E3B4E";
                var textLighter = t.dark ? "#E2E8F0" : "#4B5563";
                var textFaint = t.dark ? "#CBD5E1" : "#5A6E85";
                var accent = t.dark ? "#FFD700" : "#AA7500";
                
                var goldStart = t.dark ? "#262520" : "#FAFAF7";
                var goldEnd = t.dark ? "#1B1915" : "#F5F0E8";
                var goldText = t.dark ? "#F1F5F9" : "#111424";
                var goldMuted = t.dark ? "#CBD5E1" : "#4B5563";
                
                return [
                    'body, .bg-\\[\\#F4EFE6\\], .bg-\\[\\#FDFBF7\\], section.bg-\\[\\|\\#F4EFE6\\|\\], div.bg-\\[\\#F4EFE6\\], .bg-\\[\\#FAFAF8\\], .bg-\\[\\#FAFAF7\\] {',
                    '    background-color: ' + t.bg + ' !important;',
                    '}',
                    'body {',
                    '    color: ' + textCustom + ' !important;',
                    '    --app-accent-custom: ' + accent + ' !important;',
                    '    --app-text-muted: ' + textMuted + ' !important;',
                    '    --app-text-lighter: ' + textLighter + ' !important;',
                    '    --app-text-custom: ' + textCustom + ' !important;',
                    '}',
                    '.derek-gold-card {',
                    '    background-image: linear-gradient(to top right, ' + goldStart + ', ' + goldEnd + ') !important;',
                    '    border-color: #FFD700 !important;',
                    '}',
                    '.derek-gold-card h1, .derek-gold-card h2, .derek-gold-card h3, .derek-gold-card h4, .derek-gold-card h5, .derek-gold-card h6,',
                    '.derek-gold-card p, .derek-gold-card li, .derek-gold-card span, .derek-gold-card strong {',
                    '    color: ' + goldText + ' !important;',
                    '}',
                    '.derek-gold-card .text-gray-400, .derek-gold-card .text-gray-500, .derek-gold-card .text-slate-500, .derek-gold-card .text-slate-400 {',
                    '    color: ' + goldMuted + ' !important;',
                    '}',
                    '.text-navyPrimary, .text-\\[\\#1A1A2E\\], h1, h2, h3, h4, h5, h6, strong, li {',
                    '    color: ' + textCustom + ' !important;',
                    '}',
                    '.text-goldAccent, .text-\\[\\#FFD700\\], span.text-goldAccent, .text-amber-500, .text-yellow-500 {',
                    '    color: ' + accent + ' !important;',
                    '}',
                    'svg.text-\\[\\#FFD700\\] {',
                    '    stroke: ' + accent + ' !important;',
                    '}',
                    '.text-gray-950, .text-slate-950, .text-gray-900, .text-slate-900, .text-gray-800, .text-slate-800, .text-gray-700, .text-slate-700 {',
                    '    color: ' + textCustom + ' !important;',
                    '}',
                    '.text-gray-650, .text-gray-600, .text-slate-650, .text-slate-600 {',
                    '    color: ' + textMuted + ' !important;',
                    '}',
                    '.text-gray-550, .text-gray-500, .text-slate-500 {',
                    '    color: ' + textLighter + ' !important;',
                    '}',
                    '.text-gray-450, .text-gray-400, .text-slate-400 {',
                    '    color: ' + textFaint + ' !important;',
                    '}',
                    '.bg-\\[\\#1D1F23\\], .bg-gray-950, .bg-black, footer, .bg-\\[\\#1A1A2E\\], #technical-standards, .bg-\\[\\#121315\\] {',
                    '    --app-text-custom: #F8FAFC !important;',
                    '    --app-text-muted: #CBD5E1 !important;',
                    '    --app-text-lighter: #94A3B8 !important;',
                    '    --app-accent-custom: #FFD700 !important;',
                    '}',
                    '.bg-\\[\\#1A1A2E\\] h1, .bg-\\[\\#1A1A2E\\] h2, .bg-\\[\\#1A1A2E\\] h3, .bg-\\[\\#1A1A2E\\] h4, .bg-\\[\\#1A1A2E\\] h5, .bg-\\[\\#1A1A2E\\] h6,',
                    '.bg-\\[\\#1A1A2E\\] p, .bg-\\[\\#1A1A2E\\] li, .bg-\\[\\#1A1A2E\\] strong, .bg-\\[\\#1A1A2E\\] a,',
                    '.bg-\\[\\#121315\\] h1, .bg-\\[\\#121315\\] h2, .bg-\\[\\#121315\\] h3, .bg-\\[\\#121315\\] h4, .bg-\\[\\#121315\\] h5, .bg-\\[\\#121315\\] h6,',
                    '.bg-\\[\\#121315\\] p, .bg-\\[\\#121315\\] li, .bg-\\[\\#121315\\] strong, .bg-\\[\\#121315\\] a,',
                    '#technical-standards h1, #technical-standards h2, #technical-standards h3, #technical-standards h4, #technical-standards h5, #technical-standards h6,',
                    '#technical-standards p, #technical-standards li, #technical-standards strong, #technical-standards a,',
                    'footer, footer h1, footer h2, footer h3, footer h4, footer h5, footer h6, footer p, footer li, footer a, footer strong {',
                    '    color: #F8FAFC !important;',
                    '}',
                    '.bg-\\[\\#1A1A2E\\] .text-gray-300, .bg-\\[\\#1A1A2E\\] .text-gray-400,',
                    '.bg-\\[\\#121315\\] .text-gray-300, .bg-\\[\\#121315\\] .text-gray-400,',
                    '#technical-standards .text-gray-300, #technical-standards .text-gray-400,',
                    'footer .text-gray-400, footer .text-slate-400 {',
                    '    color: #CBD5E1 !important;',
                    '}',
                    '.bg-\\[\\#1A1A2E\\] .text-\\[\\#FFD700\\], .bg-\\[\\#1A1A2E\\] svg.text-\\[\\#FFD700\\],',
                    '.bg-\\[\\#121315\\] .text-\\[\\#FFD700\\], .bg-\\[\\#121315\\] svg.text-\\[\\#FFD700\\],',
                    '#technical-standards .text-\\[\\#FFD700\\], #technical-standards svg.text-\\[\\#FFD700\\],',
                    'footer .text-\\[\\#FFD700\\], footer svg.text-\\[\\#FFD700\\] {',
                    '    color: #FFD700 !important;',
                    '    stroke: #FFD700 !important;',
                    '}',
                    '.bg-\\[\\#FFD700\\], .bg-yellow-400, .bg-[#FFD700] {',
                    '    --app-text-custom: #111424 !important;',
                    '    --app-text-muted: #2E3B4E !important;',
                    '    --app-text-lighter: #4B5563 !important;',
                    '}',
                    '.bg-\\[\\#FFD700\\] h1, .bg-\\[\\#FFD700\\] h2, .bg-\\[\\#FFD700\\] h3, .bg-\\[\\#FFD700\\] h4, .bg-\\[\\#FFD700\\] p,',
                    '.bg-\\[\\#FFD700\\] span, .bg-\\[\\#FFD700\\] button, .bg-\\[\\#FFD700\\] a {',
                    '    color: #111424 !important;',
                    '}',
                    '.bg-white, .bg-\\[\\#FDFBF7\\], header.bg-white, .bg-\\[\\#F5F0E8\\], div.bg-\\[\\#F5F0E8\\], .bg-gray-50 {',
                    '    background-color: ' + t.card + ' !important;',
                    '    border-color: ' + t.border + ' !important;',
                    '}',
                    '.border-gray-200, .border-gray-150, .border-gray-100 {',
                    '    border-color: ' + t.border + ' !important;',
                    '}',
                    '.border-\\[\\#1A1A2E\\] {',
                    '    border-color: ' + textCustom + ' !important;',
                    '}',
                    'div, section, header, main, aside, button, article, p, h1, h2, h3, h4, h5, h6, span, svg {',
                    '    transition: background-color 300ms ease-out, border-color 300ms ease-out, color 300ms ease-out, stroke 300ms ease-out !important;',
                    '}'
                ].join('\n');
            }

            styleEl.innerHTML = generateCSS(theme);
            document.head.appendChild(styleEl);

            // Listen for runtime theme change event from React
            window.addEventListener("derek-theme-changed", function(e) {
                var newTheme = themes[e.detail] || themes["oolong-milk"];
                styleEl.innerHTML = generateCSS(newTheme);
            });
        })();
    </script>

    <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen flex flex-col justify-between'); ?>>

<!-- Navigation Header with gold top-border -->
<header class="bg-white border-b border-gray-150 sticky top-0 z-50 border-t-4 border-goldAccent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2.5 group">
            <?php 
            $custom_logo = '';
            if (function_exists('get_field')) {
                // Try fetching global ACF field 'header_logo' from frontpage
                $custom_logo = get_field('header_logo', 'option') ?: get_field('header_logo', get_option('page_on_front'));
            }
            if (empty($custom_logo)) {
                $custom_logo = dl_field('header_logo', '');
            }
            
            if (!empty($custom_logo)): ?>
                <img src="<?php echo esc_url($custom_logo); ?>" alt="<?php bloginfo('name'); ?>" class="h-10 max-w-[160px] object-contain transition-all hover:opacity-90" style="max-height: 42px;" />
            <?php else: ?>
                <span class="w-10 h-10 bg-navyPrimary text-goldAccent rounded-lg flex items-center justify-center font-extrabold text-lg border border-goldAccent/25 shadow-sm">
                    DF
                </span>
                <div class="leading-none">
                    <span class="text-sm font-black text-navyPrimary tracking-tighter uppercase block">DEREK FLOW</span>
                    <span class="text-[9px] font-bold text-gray-400 tracking-widest uppercase block">SEO & AUTOMATION</span>
                </div>
            <?php endif; ?>
        </a>

        <!-- Classic WordPress dynamic menu navigation mapping -->
        <nav class="hidden md:flex items-center gap-6 h-full">
            <?php
            if (has_nav_menu('primary-menu')) {
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'flex gap-6 text-[13px] font-extrabold uppercase tracking-widest text-[#1A1A2E]',
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false
                ]);
            } else {
                // Static elegant fallback layout with robust hover, line-height, active-indicator triggers
                ?>
                <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="nav-menu-link text-[12px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent transition-all relative py-2 border-b-2 border-transparent">DỊCH VỤ</a>
                <a href="<?php echo esc_url(home_url('/gioi-thieu')); ?>" class="nav-menu-link text-[12px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent transition-all relative py-2 border-b-2 border-transparent">GIỚI THIỆU</a>
                <a href="<?php echo esc_url(home_url('/case-study')); ?>" class="nav-menu-link text-[12px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent transition-all relative py-2 border-b-2 border-transparent">CASE STUDY</a>
                <a href="<?php echo esc_url(home_url('/gia')); ?>" class="nav-menu-link text-[12px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent transition-all relative py-2 border-b-2 border-transparent">GIÁ</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="nav-menu-link text-[12px] font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent transition-all relative py-2 border-b-2 border-transparent">BLOG</a>
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="nav-menu-link text-[12px] font-extrabold uppercase tracking-wider text-goldAccent hover:text-navyPrimary transition-all relative py-2 border-b-2 border-transparent">LIÊN HỆ</a>
                <?php
            }
            ?>
        </nav>

        <!-- Dynamic CTA Button on right & Mobile menu trigger -->
        <div class="flex items-center gap-3">
            <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="hidden sm:inline-block bg-navyPrimary text-white hover:bg-goldAccent hover:text-navyPrimary text-[11px] font-bold uppercase tracking-wider px-5 py-3 rounded-lg transition-all duration-350 shadow-md hover:shadow-lg">
                TƯ VẤN NGAY
            </a>

            <!-- Mobile Menu Toggle Button (Hamburger) -->
            <button id="mobile-menu-trigger" aria-label="Toggle Menu" class="md:hidden p-2 text-navyPrimary focus:outline-none focus:ring-2 focus:ring-goldAccent rounded-lg transition-colors bg-gray-100 hover:bg-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path class="burger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer Sub-Menu (UX optimized for comfortable touch targets 44px) -->
    <div id="mobile-menu-drawer" class="hidden md:hidden bg-white border-t border-gray-150 py-4 px-6 animate-fade-in block">
        <nav class="flex flex-col gap-3.5">
            <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="mobile-menu-link block text-sm font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent py-2.5 border-b border-gray-50">DỊCH VỤ</a>
            <a href="<?php echo esc_url(home_url('/gioi-thieu')); ?>" class="mobile-menu-link block text-sm font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent py-2.5 border-b border-gray-50">GIỚI THIỆU</a>
            <a href="<?php echo esc_url(home_url('/case-study')); ?>" class="mobile-menu-link block text-sm font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent py-2.5 border-b border-gray-50">CASE STUDY</a>
            <a href="<?php echo esc_url(home_url('/gia')); ?>" class="mobile-menu-link block text-sm font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent py-2.5 border-b border-gray-50">GIÁ</a>
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="mobile-menu-link block text-sm font-bold uppercase tracking-wider text-[#1A1A2E] hover:text-goldAccent py-2.5 border-b border-gray-50">BLOG</a>
            <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="mobile-menu-link block text-sm font-extrabold uppercase tracking-wider text-goldAccent hover:text-navyPrimary py-2.5">LIÊN HỆ</a>
            
            <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="w-full text-center bg-navyPrimary text-white py-3 rounded-lg text-xs font-bold uppercase tracking-widest mt-2 hover:bg-goldAccent hover:text-navyPrimary transition-colors">
                Đăng Ký Tư Vấn
            </a>
        </nav>
    </div>

    <!-- Active Highlighting Script with resilient path extraction -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            var trigger = document.getElementById('mobile-menu-trigger');
            var drawer = document.getElementById('mobile-menu-drawer');
            if (trigger && drawer) {
                trigger.addEventListener('click', function() {
                    drawer.classList.toggle('hidden');
                });
            }

            // Path-based dynamic navigation highlighting
            var currentPath = window.location.pathname.replace(/\/$/, "");
            var menuLinks = document.querySelectorAll('.nav-menu-link, .mobile-menu-link');
            
            menuLinks.forEach(function(link) {
                var linkHref = link.getAttribute('href');
                if (linkHref) {
                    var linkPath = new URL(linkHref, window.location.origin).pathname.replace(/\/$/, "");
                    
                    // Match current pathname or homepage fallback
                    if (currentPath === linkPath || (currentPath === "" && linkPath === "")) {
                        link.classList.add('text-goldAccent', 'font-extrabold');
                        if (link.classList.contains('nav-menu-link')) {
                            link.classList.remove('border-transparent');
                            link.classList.add('border-goldAccent');
                        }
                    }
                }
            });
        });
    </script>
</header>
