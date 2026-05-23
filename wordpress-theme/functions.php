<?php
/**
 * Derek Lâm - WordPress Theme Functions and Support Code
 */

if (!function_exists('derek_lam_theme_setup')) {
    function derek_lam_theme_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in header location.
        register_nav_menus([
            'primary-menu' => esc_html__('Primary Menu', 'derek-lam'),
        ]);

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);
    }
}
add_action('after_setup_theme', 'derek_lam_theme_setup');

/**
 * Register widget area.
 */
function derek_lam_widgets_init() {
    register_sidebar([
        'name'          => esc_html__('Sidebar Widget Area', 'derek-lam'),
        'id'            => 'sidebar-primary',
        'description'   => esc_html__('Add widgets here to appear in your blog sidebar.', 'derek-lam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s bg-white border border-gray-150 p-6 rounded-xl shadow-xs space-y-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="text-xs font-black uppercase tracking-widest text-navyPrimary border-b border-gray-100 pb-3">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'derek_lam_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function derek_lam_scripts() {
    // We import Google Fonts and Tailwind inside header.php to maintain rapid clean previewing,
    // but standard core styling can be loaded here if needed.
    wp_enqueue_style('derek-lam-core-style', get_stylesheet_uri(), [], '1.0.0');
}
add_action('wp_enqueue_scripts', 'derek_lam_scripts');

/**
 * Filter the excerpt length to match Derek Lâm premium grid visuals
 */
function derek_lam_custom_excerpt_length($length) {
    return 25; // Compact excerpt length
}
add_filter('excerpt_length', 'derek_lam_custom_excerpt_length', 999);

function derek_lam_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'derek_lam_excerpt_more');
