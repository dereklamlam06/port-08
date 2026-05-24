<?php
/**
 * Derek Flow - WordPress Theme Functions and Support Code
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
 * Filter the excerpt length to match Derek Flow premium grid visuals
 */
function derek_lam_custom_excerpt_length($length) {
    return 25; // Compact excerpt length
}
add_filter('excerpt_length', 'derek_lam_custom_excerpt_length', 999);

function derek_lam_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'derek_lam_excerpt_more');

/**
 * =========================================================================
 * DEREK LÂM - CHUYÊN GIA TỐI ƯU HOÁ WP (ACF CODES & BẢO TRÌ SỬ DỤNG)
 * =========================================================================
 */

/**
 * 1. TRANG BẢO TRÌ AUTO-ROUTER (CHẾ ĐỘ FIX WEB AN TOÀN)
 * Cách dùng:
 * - Để BẬT chế độ bảo trì toàn trang, bạn chỉ cần đổi 'false' thành 'true' ở dòng dưới.
 * - Khi bật, khách truy cập thường sẽ thấy trang Bảo Trì Đẳng Cấp, riêng Admin (Bạn) vẫn vào chỉnh web bình thường!
 */
define('DEREK_LAM_MAINTENANCE_MODE', true); 

function derek_lam_maintenance_redirect() {
    if (defined('DEREK_LAM_MAINTENANCE_MODE') && DEREK_LAM_MAINTENANCE_MODE) {
        // Chỉ chặn người dùng chưa đăng nhập hoặc không phải Administrator
        if (!current_user_can('manage_options') && !is_user_logged_in()) {
            $maintenance_template = locate_template('page-maintenance.php');
            if ($maintenance_template) {
                include($maintenance_template);
                exit;
            }
        }
    }
}
add_action('template_redirect', 'derek_lam_maintenance_redirect', 1);


/**
 * 2. HELPER GRACEFUL ACF FIELDS (CHÈN HÌNH & CHỮ CỰC DỄ)
 * Hàm giúp bạn liên kết Advanced Custom Fields (ACF) nhanh gọn lẹ.
 * Tự động nhận diện & xử lý thông minh cả 3 kiểu dữ liệu hình ảnh (Array, URL, ID) và Văn bản.
 * PHP sẽ không bao giờ bị lỗi trắng trang (White Screen) khi chưa cài ACF.
 * Cách dùng: echo dl_field('ten_field_acf', 'Nội dung/Ảnh mặc định');
 */
function dl_field($field_name, $default_fallback = '') {
    if (function_exists('get_field')) {
        $acf_val = get_field($field_name);
        if ($acf_val !== null && $acf_val !== false && $acf_val !== '') {
            // 2.1. Nếu là dạng MẢNG hình ảnh (ACF Image Array)
            if (is_array($acf_val)) {
                if (isset($acf_val['url'])) {
                    return $acf_val['url'];
                }
                return reset($acf_val);
            }
            // 2.2. Nếu là dạng ID hình ảnh (ACF Image ID) - lấy link ảnh gốc
            if (is_numeric($acf_val)) {
                $img_url = wp_get_attachment_url($acf_val);
                if ($img_url) {
                    return $img_url;
                }
            }
            // 2.3. Trả về giá trị chữ hoặc link ảnh dạng chuỗi (ACF Plain Text, URL, Wysiwyg...)
            return $acf_val;
        }
    }
    return $default_fallback;
}

