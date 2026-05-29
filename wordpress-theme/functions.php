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
    // Hỗ trợ fallback lấy từ get_post_meta nếu không có get_field hoặc trường chưa được lưu bằng ACF
    $meta_val = get_post_meta(get_the_ID(), $field_name, true);
    if (!empty($meta_val)) {
        return $meta_val;
    }
    return $default_fallback;
}

/**
 * 3. ĐĂNG KÝ BẢNG QUẢN LÝ CASE STUDY (CUSTOM POST TYPE & TAXONOMY)
 * Tạo bảng quản lý thuận tiện cho người dùng đăng bài Case Study/Dự án.
 */
function derek_flow_register_cpt_and_tax() {
    // 3.1. Register Custom Post Type "case_study"
    register_post_type('case_study', [
        'labels' => [
            'name'               => 'Case Studies',
            'singular_name'      => 'Case Study',
            'menu_name'          => 'Quản lý Case Studies',
            'all_items'          => 'Tất cả Case Study',
            'add_new'            => 'Thêm Case Study mới',
            'add_new_item'       => 'Thêm Case Study mới',
            'edit_item'          => 'Chỉnh sửa Case Study',
            'new_item'           => 'Case Study mới',
            'view_item'          => 'Xem Case Study',
            'search_items'       => 'Tìm kiếm Case Study',
            'not_found'          => 'Không có Case Study nào',
            'not_found_in_trash' => 'Không tìm thấy Case Study trong thùng rác',
        ],
        'public'             => true,
        'has_archive'        => true,
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'          => 'dashicons-portfolio',
        'rewrite'            => ['slug' => 'du-an', 'with_front' => false],
        'show_in_rest'       => true,
    ]);

    // 3.2. Register Custom Taxonomy "case_category"
    register_taxonomy('case_category', 'case_study', [
        'labels' => [
            'name'              => 'Chuyên mục Dự án',
            'singular_name'     => 'Chuyên mục Dự án',
            'search_items'      => 'Tìm chuyên mục',
            'all_items'         => 'Tất cả chuyên mục',
            'parent_item'       => 'Chuyên mục cha',
            'parent_item_colon' => 'Chuyên mục cha:',
            'edit_item'         => 'Chỉnh sửa chuyên mục',
            'update_item'       => 'Cập nhật chuyên mục',
            'add_new_item'      => 'Thêm chuyên mục mới',
            'new_item_name'     => 'Tên chuyên mục mới',
            'menu_name'         => 'Chuyên mục Dự án',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'danh-muc-du-an'],
        'show_in_rest'      => true,
    ]);
}
add_action('init', 'derek_flow_register_cpt_and_tax');

/**
 * 4. TỰ ĐỘNG KHỞI TẠO BẢNG ĐIỀU KHIỂN ACF - ACF FIELD GROUPS CODES
 * Đăng ký sẵn cấu trúc chuẩn ACF thông qua mã PHP. Admin chỉ cần cài plugin ACF (Free/Pro)
 * là các Fields nhập liệu cực kỳ trực quan này sẽ tự động xuất hiện chuẩn 100% trong WP Admin!
 */
function derek_flow_register_acf_fields_programmatically() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // --- 4.1. FIELD GROUP: TRANG CHỦ (HOMEPAGE FIELDS) ---
    acf_add_local_field_group([
        'key' => 'group_homepage_fields',
        'title' => '⚙️ Cấu Hình Trang Chủ (Homepage)',
        'fields' => [
            [
                'key' => 'field_home_hero_slogan_tag',
                'label' => 'Slogan nhỏ phía trên Hero Title',
                'name' => 'hero_slogan_tag',
                'type' => 'text',
                'default_value' => 'SEO & AI Automation Specialist',
            ],
            [
                'key' => 'field_home_hero_title_1',
                'label' => 'Dòng tiêu đề thứ nhất (Hero Title Line 1)',
                'name' => 'hero_title_1',
                'type' => 'text',
                'default_value' => 'Đưa Website Của Bạn',
            ],
            [
                'key' => 'field_home_hero_title_2',
                'label' => 'Dòng tiêu đề vàng nổi bật (Hero Title Line 2)',
                'name' => 'hero_title_2',
                'type' => 'text',
                'default_value' => 'Lên Đỉnh Cao Mới',
            ],
            [
                'key' => 'field_home_hero_desc',
                'label' => 'Đoạn mô tả chi tiết (Hero Description)',
                'name' => 'hero_desc',
                'type' => 'textarea',
                'default_value' => 'Kết hợp sức mạnh vượt trội của <strong>SEO thực chiến chuyên sâu</strong> và giải pháp <strong>Tự động hóa bằng AI Agents</strong> để gia tăng gấp bội lượng traffic tự nhiên, tối ưu hóa tỷ lệ chuyển đổi và giải phóng nguồn lực tối đa.',
            ],
            [
                'key' => 'field_home_hero_btn_text',
                'label' => 'Chữ hiển thị trên Nút CTA chính',
                'name' => 'hero_btn_text',
                'type' => 'text',
                'default_value' => 'Liên Hệ Tư Vấn Ngay',
            ],
            [
                'key' => 'field_home_benefit_1',
                'label' => 'Lợi ích nhỏ 1 (Benefit Tag 1)',
                'name' => 'benefit_1',
                'type' => 'text',
                'default_value' => 'Bứt phá thứ hạng từ khóa',
            ],
            [
                'key' => 'field_home_benefit_2',
                'label' => 'Lợi ích nhỏ 2 (Benefit Tag 2)',
                'name' => 'benefit_2',
                'type' => 'text',
                'default_value' => 'Tích hợp AI trợ lý 24/7',
            ],
            [
                'key' => 'field_home_benefit_3',
                'label' => 'Lợi ích nhỏ 3 (Benefit Tag 3)',
                'name' => 'benefit_3',
                'type' => 'text',
                'default_value' => 'Cam kết vận hành chuẩn SEO',
            ],
            [
                'key' => 'field_home_hero_image',
                'label' => 'Ảnh đại diện Hero (Tùy chọn tải lên)',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ],
            [
                'key' => 'field_home_tech_specs_title',
                'label' => 'Tiêu đề Phần Chuẩn Kỹ Thuật (Tech Specs Title)',
                'name' => 'tech_specs_title',
                'type' => 'text',
                'default_value' => 'Bản Vẽ Thực Thi & Tiêu Chuẩn Cam Kết',
            ],
            [
                'key' => 'field_home_tech_specs_desc',
                'label' => 'Mô tả Phần Chuẩn Kỹ Thuật (Tech Specs Desc)',
                'name' => 'tech_specs_desc',
                'type' => 'textarea',
                'default_value' => 'Thay vì sử dụng các feedback văn bản khó kiểm chứng từ tài khoản ảo, Derek Flow tự tin phơi bày toàn bộ triết lý xây dựng kỹ thuật thực tế giúp dự án của bạn tăng trưởng bền vững trước mọi thuật toán.',
            ],
            // TAB 1
            [
                'key' => 'field_home_tech_t1_badge',
                'label' => 'Nhãn Tab 1 (Tối ưu tốc độ)',
                'name' => 'tech_spec_t1_badge',
                'type' => 'text',
                'default_value' => 'Performance Index',
            ],
            [
                'key' => 'field_home_tech_t1_title',
                'label' => 'Tiêu đề Tab 1',
                'name' => 'tech_spec_t1_title',
                'type' => 'text',
                'default_value' => 'Tối Ưu Tốc Độ Tải Trang (Core Web Vitals)',
            ],
            [
                'key' => 'field_home_tech_t1_desc',
                'label' => 'Mô tả Tab 1',
                'name' => 'tech_spec_t1_desc',
                'type' => 'textarea',
                'default_value' => 'Website tải nhanh, mượt mà kể cả dựng bằng code tay gọn nhẹ hay Elementor kéo thả thông qua việc dọn dẹp asset dư thừa, tải lười hình ảnh thế hệ mới.',
            ],
            [
                'key' => 'field_home_tech_t1_std',
                'label' => 'Cách làm phổ thông trên thị trường (Tab 1)',
                'name' => 'tech_spec_t1_std',
                'type' => 'textarea',
                'default_value' => 'Sử dụng quá nhiều plugin dư thừa hoặc không cấu hình tối ưu tài nguyên, không nén ảnh và không dọn rác CSS/JS dẫn đến tốc độ load chậm chạp.',
            ],
            [
                'key' => 'field_home_tech_t1_derek',
                'label' => 'Giải pháp của Derek Flow (Tab 1)',
                'name' => 'tech_spec_t1_derek',
                'type' => 'textarea',
                'default_value' => 'Tối ưu hóa sâu mã nguồn WordPress custom theme hoặc Elementor kéo thả sạch sẽ, dọn bỏ asset không dùng, tối ưu Cache máy chủ vận hành mượt mà.',
            ],
            [
                'key' => 'field_home_tech_t1_image',
                'label' => 'Ảnh minh họa Tab 1 (Từ máy)',
                'name' => 'tech_spec_t1_image',
                'type' => 'image',
                'return_format' => 'url',
            ],

            // TAB 2
            [
                'key' => 'field_home_tech_t2_badge',
                'label' => 'Nhãn Tab 2 (Schema Thực thể)',
                'name' => 'tech_spec_t2_badge',
                'type' => 'text',
                'default_value' => 'Entity & Schema',
            ],
            [
                'key' => 'field_home_tech_t2_title',
                'label' => 'Tiêu đề Tab 2',
                'name' => 'tech_spec_t2_title',
                'type' => 'text',
                'default_value' => 'Lập Chỉ Mục Thực Thể & JSON-LD Khắt Khe',
            ],
            [
                'key' => 'field_home_tech_t2_desc',
                'label' => 'Mô tả Tab 2',
                'name' => 'tech_spec_t2_desc',
                'type' => 'textarea',
                'default_value' => 'Khai báo dữ liệu có cấu trúc đúng biểu đồ tri thức (Knowledge Graph) giúp Google Bot nhận diện thương hiệu của bạn chuẩn xác.',
            ],
            [
                'key' => 'field_home_tech_t2_std',
                'label' => 'Cách làm phổ thông trên thị trường (Tab 2)',
                'name' => 'tech_spec_t2_std',
                'type' => 'textarea',
                'default_value' => 'Cài đặt chung chung thông qua các plugin SEO tự động dẫn đến xung đột cú pháp, thiếu định danh tác giả (Author) và giấy phép xuất bản chính thống.',
            ],
            [
                'key' => 'field_home_tech_t2_derek',
                'label' => 'Giải pháp của Derek Flow (Tab 2)',
                'name' => 'tech_spec_t2_derek',
                'type' => 'textarea',
                'default_value' => 'Xây dựng sơ đồ thực thể thực tế tùy biến độc bản, gắn kết hồ sơ LinkedIn/Github thực tế, thiết lập quan hệ cha-con mạch lạc cho mạng lưới từ khóa.',
            ],
            [
                'key' => 'field_home_tech_t2_image',
                'label' => 'Ảnh minh họa Tab 2 (Từ máy)',
                'name' => 'tech_spec_t2_image',
                'type' => 'image',
                'return_format' => 'url',
            ],

            // TAB 3
            [
                'key' => 'field_home_tech_t3_badge',
                'label' => 'Nhãn Tab 3 (SILO Link Juice)',
                'name' => 'tech_spec_t3_badge',
                'type' => 'text',
                'default_value' => 'Crawl Optimization',
            ],
            [
                'key' => 'field_home_tech_t3_title',
                'label' => 'Tiêu đề Tab 3',
                'name' => 'tech_spec_t3_title',
                'type' => 'text',
                'default_value' => 'Phân Dòng Liên Kết SILO & Crawl Budget',
            ],
            [
                'key' => 'field_home_tech_t3_desc',
                'label' => 'Mô tả Tab 3',
                'name' => 'tech_spec_t3_desc',
                'type' => 'textarea',
                'default_value' => 'Điều hướng dòng chảy sức mạnh website (Link Juice) đi đúng trọng tâm bán hàng thay vì phân tán vào các trang rác vô giá trị.',
            ],
            [
                'key' => 'field_home_tech_t3_std',
                'label' => 'Cách làm phổ thông trên thị trường (Tab 3)',
                'name' => 'tech_spec_t3_std',
                'type' => 'textarea',
                'default_value' => 'Để liên kết tự do vô tội vạ, robot Google lãng phí ngân sách cào dữ liệu (Crawl Budget) vào các trang trùng lặp, URL rác hoặc tham số truy vấn.',
            ],
            [
                'key' => 'field_home_tech_t3_derek',
                'label' => 'Giải pháp của Derek Flow (Tab 3)',
                'name' => 'tech_spec_t3_derek',
                'type' => 'textarea',
                'default_value' => 'Cấu trúc danh sách liên kết hình phễu chuẩn chỉ, chặn tuyệt đối luồng vô giá trị thông qua file Robots.txt chặt chẽ và sitemap phân nhánh phân tần.',
            ],
            [
                'key' => 'field_home_tech_t3_image',
                'label' => 'Ảnh minh họa Tab 3 (Từ máy)',
                'name' => 'tech_spec_t3_image',
                'type' => 'image',
                'return_format' => 'url',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ],
            ],
            [
                [
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
    ]);

    // --- 4.2. FIELD GROUP: BÀI VIẾT BLOG ---
    acf_add_local_field_group([
        'key' => 'group_blog_post_fields',
        'title' => '✍️ Cấu Hình Bài Viết (Blog Post Meta)',
        'fields' => [
            [
                'key' => 'field_blog_read_time',
                'label' => 'Thời gian đọc (ví dụ: "5 phút đọc")',
                'name' => 'read_time',
                'type' => 'text',
                'default_value' => '5 phút đọc',
            ],
            [
                'key' => 'field_blog_author_title',
                'label' => 'Chức danh Tác giả (ví dụ: "Specialist Consultant")',
                'name' => 'author_title',
                'type' => 'text',
                'default_value' => 'Specialist Consultant',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
    ]);

    // --- 4.3. FIELD GROUP: CASE STUDIES ---
    acf_add_local_field_group([
        'key' => 'group_case_studies_fields',
        'title' => '🏆 Cấu Hình Chỉ Số Case Study',
        'fields' => [
            [
                'key' => 'field_case_client_industry',
                'label' => 'Lĩnh vực Khách hàng / Ngành nghề (ví dụ: "F&B Industry", "E-Commerce")',
                'name' => 'client_industry',
                'type' => 'text',
                'default_value' => 'E-Commerce',
            ],
            [
                'key' => 'field_case_project_year',
                'label' => 'Năm dự án / Phiên bản (ví dụ: "2024 Project")',
                'name' => 'project_year',
                'type' => 'text',
                'default_value' => '2024 Project',
            ],
            [
                'key' => 'field_case_graphic_type',
                'label' => 'Kiểu Biển Biểu Đồ Minh Họa (Graphic Type)',
                'name' => 'graphic_type',
                'type' => 'select',
                'choices' => [
                    'f_b' => 'SEO Report (F&B)',
                    'ai_bot' => 'AI System Dialog',
                    'real_estate' => 'Web Speed Performance Grid',
                    'saas' => 'Crawler Indexing Nodes',
                    'none' => 'Sử dụng Ảnh Đại diện tiêu chuẩn (Featured Image)',
                ],
                'default_value' => 'f_b',
            ],
            // Metric 1
            [
                'key' => 'field_case_metric_1_lbl',
                'label' => 'Nhãn chỉ số 1',
                'name' => 'metric_1_lbl',
                'type' => 'text',
                'default_value' => 'TRAFFIC GROWTH',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_case_metric_1_val',
                'label' => 'Giá trị chỉ số 1',
                'name' => 'metric_1_val',
                'type' => 'text',
                'default_value' => '+250%',
                'wrapper' => ['width' => '50%'],
            ],
            // Metric 2
            [
                'key' => 'field_case_metric_2_lbl',
                'label' => 'Nhãn chỉ số 2',
                'name' => 'metric_2_lbl',
                'type' => 'text',
                'default_value' => 'NEW LEADS',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_case_metric_2_val',
                'label' => 'Giá trị chỉ số 2',
                'name' => 'metric_2_val',
                'type' => 'text',
                'default_value' => '1.2k/Mo',
                'wrapper' => ['width' => '50%'],
            ],
            // Metric 3
            [
                'key' => 'field_case_metric_3_lbl',
                'label' => 'Nhãn chỉ số 3',
                'name' => 'metric_3_lbl',
                'type' => 'text',
                'default_value' => 'ROI CHUYỂN ĐỔI',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_case_metric_3_val',
                'label' => 'Giá trị chỉ số 3',
                'name' => 'metric_3_val',
                'type' => 'text',
                'default_value' => '3.5x',
                'wrapper' => ['width' => '50%'],
            ],
            // 4 Fixed Blog Sections
            [
                'key' => 'field_case_initial_state',
                'label' => '1. Ban đầu / Nhận web',
                'name' => 'initial_state',
                'type' => 'textarea',
                'instructions' => 'Trạng thái ban đầu của website khách hàng khi nhận bàn giao.',
                'default_value' => '',
            ],
            [
                'key' => 'field_case_problem',
                'label' => '2. Vấn đề',
                'name' => 'problem',
                'type' => 'textarea',
                'instructions' => 'Các vấn đề, rào cản kỹ thuật hay lỗi gặp phải cần xử lý.',
                'default_value' => '',
            ],
            [
                'key' => 'field_case_fix',
                'label' => '3. Cách khắc phục / Fix',
                'name' => 'fix',
                'type' => 'textarea',
                'instructions' => 'Phương án sửa lỗi, quy trình setup, tối ưu hoặc tích hợp AI.',
                'default_value' => '',
            ],
            [
                'key' => 'field_case_results',
                'label' => '4. Kết quả đạt được (Cách nhau bằng ký tự |)',
                'name' => 'results',
                'type' => 'textarea',
                'instructions' => 'Mỗi kết quả là một dòng riêng biệt, phân tách bằng dấu gạch đứng | (Ví dụ: Tốc độ tải trang dưới 0.8s|Đạt top 1 từ khóa ngành)',
                'default_value' => '',
            ],
            // 4 Fixed Section Proof Images for Trust Hardening
            [
                'key' => 'field_case_proof_image_initial',
                'label' => 'Ảnh minh chứng 1. Ban đầu / Nhận web',
                'name' => 'proof_image_initial',
                'type' => 'image',
                'instructions' => 'Upload ảnh chụp màn hình minh họa thực trạng ban đầu của website trước tối ưu.',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ],
            [
                'key' => 'field_case_proof_image_problem',
                'label' => 'Ảnh minh chứng 2. Vấn đề',
                'name' => 'proof_image_problem',
                'type' => 'image',
                'instructions' => 'Upload ảnh minh họa các lỗi nặng, thông báo phạt từ Google hay các rào cản từ khách hàng.',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ],
            [
                'key' => 'field_case_proof_image_fix',
                'label' => 'Ảnh minh chứng 3. Khắc phục / Sửa lỗi',
                'name' => 'proof_image_fix',
                'type' => 'image',
                'instructions' => 'Upload ảnh minh họa quá trình code tối ưu kỹ thuật, sơ đồ hệ thống hoăc cấu hình automation.',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ],
            [
                'key' => 'field_case_proof_image_results',
                'label' => 'Ảnh minh chứng 4. Kết quả đạt được',
                'name' => 'proof_image_results',
                'type' => 'image',
                'instructions' => 'Upload ảnh minh họa minh chứng hiệu suất vượt trội (Báo cáo traffic GSC tăng vọt, Điểm Lighthouse 100/100, CRM chốt đơn).',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'case_study',
                ],
            ],
        ],
    ]);

    // --- 4.4. FIELD GROUP: TRANG GIỚI THIỆU (ABOUT PAGE FIELDS) ---
    acf_add_local_field_group([
        'key' => 'group_about_fields',
        'title' => '⚙️ Cấu Hình Trang Giới Thiệu (About Page)',
        'fields' => [
            [
                'key' => 'field_about_custom_avatar_url',
                'label' => 'Ảnh đại diện cá nhân (Avatar / Profile Image)',
                'name' => 'custom_avatar_url',
                'type' => 'image',
                'instructions' => 'Tải lên ảnh chân dung cá nhân hoặc logo từ máy tính của bạn lên WordPress (Khuyên dùng tỷ lệ 4:5 dọc).',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-about.php',
                ],
            ],
        ],
    ]);

    // --- 4.5. FIELD GROUP: CHUYÊN MỤC BLOG (CATEGORY SEO & BANNER GROUP) ---
    acf_add_local_field_group([
        'key' => 'group_category_seo_fields',
        'title' => '📁 Cấu Hình SEO & Banner Chuyên Mục (Category SEO)',
        'fields' => [
            [
                'key' => 'field_category_meta_title',
                'label' => 'Tiêu đề SEO Chuyên Mục (Meta Title)',
                'name' => 'category_meta_title',
                'type' => 'text',
                'instructions' => 'Nhập tiêu đề tối ưu SEO chuyên sâu cho chuyên mục này (Ví dụ: Kiến Thức SEO Web 2026 | Derek Flow).',
                'default_value' => '',
            ],
            [
                'key' => 'field_category_meta_desc',
                'label' => 'Mô tả SEO Chuyên Mục (Meta Description)',
                'name' => 'category_meta_desc',
                'type' => 'textarea',
                'instructions' => 'Nhập đoạn mô tả ngắn (150-160 ký tự) xuất hiện trên trang kết quả Google.',
                'default_value' => '',
            ],
            [
                'key' => 'field_category_banner_image',
                'label' => 'Ảnh Banner Chuyên Mục (Tải từ máy)',
                'name' => 'category_banner_image',
                'type' => 'image',
                'instructions' => 'Ảnh hiển thị đại diện khi người dùng bấm xem bài viết thuộc danh mục này.',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ],
            [
                'key' => 'field_category_schema_markup',
                'label' => 'Cấu trúc Schema tùy chỉnh / JSON-LD',
                'name' => 'category_schema_markup',
                'type' => 'textarea',
                'instructions' => 'Mã JSON-LD Schema dạng script để tối ưu kết quả hiển thị trên Google SERP.',
                'default_value' => '',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'category',
                ],
            ],
        ],
    ]);
}
add_action('acf/init', 'derek_flow_register_acf_fields_programmatically');

/**
 * 5. TỰ ĐỘNG INJECT SCHEMA CUSTOM CHO CHUYÊN MỤC
 */
function derek_flow_inject_seo_schema() {
    if (is_category()) {
        $term_id = get_queried_object_id();
        $term_obj = 'category_' . $term_id;
        if (function_exists('get_field')) {
            $schema_markup = get_field('category_schema_markup', $term_obj);
            if (!empty($schema_markup)) {
                echo "\n<!-- Global Schema Markup from ACF Category -->\n";
                echo $schema_markup . "\n";
            }
        }
    }
}
add_action('wp_head', 'derek_flow_inject_seo_schema', 100);

