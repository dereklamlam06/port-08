<?php
/**
 * Template Name: Derek Flow Case Studies Webpage
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative bg-[#FAFAF7]">
    <div class="max-w-7xl mx-auto space-y-12">
        <!-- Header content -->
        <div class="text-center max-w-2xl mx-auto space-y-4">
            <span class="text-[11px] font-bold tracking-widest uppercase text-[#FFD700] bg-[#1A1A2E] px-3 py-1 rounded inline-block font-mono">Dự án thực tế tiêu biểu</span>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-[#1A1A2E]">Báo Cáo Phân Tích Case Study</h1>
            <p class="text-xs sm:text-sm text-gray-550 leading-relaxed max-w-xl mx-auto">
                Xem cách Derek Flow hỗ trợ các nhãn hàng xử lý dứt điểm rào cản kỹ thuật để bứt phá doanh số vượt giới hạn. Bấm trực tiếp vào từng bài để xem phân tích chi tiết.
            </p>
        </div>

        <!-- Filter Toolbar Buttons (Consistent with React SPA) -->
        <div class="flex flex-wrap items-center justify-center gap-2">
            <button onclick="filterPortfolio('all')" id="filter-btn-all" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-[#1A1A2E] text-white border-[#1A1A2E]">
                Tất Cả Dự Án
            </button>
            <button onclick="filterPortfolio('seo')" id="filter-btn-seo" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]">
                Dịch Vụ SEO
            </button>
            <button onclick="filterPortfolio('web')" id="filter-btn-web" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]">
                Thiết Kế Web
            </button>
            <button onclick="filterPortfolio('automation')" id="filter-btn-automation" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]">
                Tự Động Hóa
            </button>
        </div>

        <!-- Case Studies Grid with Pre-configured Static Fallbacks and WP Posts Integration -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4" id="portfolio-grid">
            
            <?php
            // Static default case studies matching the React component's visual assets and the 4 fixed sections
            $static_studies = [
                [
                    'id' => 'case_1',
                    'title' => 'Chiến Dịch SEO Tổng Thể Ngành Thực Phẩm',
                    'category' => 'seo',
                    'projectYear' => '2024 Project',
                    'clientIndustry' => 'F&B Industry',
                    'description' => 'Tái cấu trúc toàn diện kiến trúc thông tin, tối ưu hóa Technical On-page và triển khai chiến dịch Content Cluster bám đuổi hành vi mua sắm người dùng.',
                    'initialState' => 'Lúc mới bàn giao, website ở trong tình trạng trì trệ kéo dài. Chỉ có lẻ tẻ vài bài viết chưa tối ưu chuẩn SEO, cấu trúc code lộn xộn, không có sơ đồ trang web (Sitemap) rõ ràng làm Googlebot khó thu thập thông tin và lập chỉ mục.',
                    'problem' => 'Website từng bị phạt nhẹ do spam liên kết từ hệ thống cũ. Tốc độ tải trang đo bằng Google Lighthouse đặc biệt kém (chỉ đạt 32/100 điểm), tỷ lệ thoát trang giữ ở mức báo động hơn 75% khiến phễu mua hàng gần như tê liệt.',
                    'fix' => 'Gỡ bỏ các backlink độc hại cũ và làm sạch Profile liên kết. Nén toàn bộ mã nguồn CSS/JS dư thừa, tối ưu hóa hình ảnh sang định dạng WebP thế hệ mới để đẩy nhanh tốc độ load dưới 1.2s. Triển khai cấu trúc Content Hub 45 bài dạng Topic Cluster tập trung dứt điểm vào từ khóa có ý định giao dịch (Transactional Intent).',
                    'results' => 'Lượng Organic Traffic tự nhiên bứt phá tăng hơn 250% sau đúng 4 tháng.|Xếp hạng top 1-3 bền vững cho hơn 120 từ khóa cạnh tranh gắt gao nhất ngành thực phẩm.|Tỷ lệ chuyển đổi mua hàng thành công trực tiếp tăng vọt gấp 3.5 lần.',
                    'metrics' => [
                        ['label' => 'TRAFFIC GROWTH', 'value' => '+250%'],
                        ['label' => 'NEW LEADS', 'value' => '1.2k/Mo'],
                        ['label' => 'ROI CHUYỂN ĐỔI', 'value' => '3.5x']
                    ],
                    'graphic_type' => 'f_b'
                ],
                [
                    'id' => 'case_2',
                    'title' => 'Tự Động Hóa Chăm Sóc Khách Hàng AI',
                    'category' => 'automation',
                    'projectYear' => '2023 Project',
                    'clientIndustry' => 'E-Commerce',
                    'description' => 'Xây dựng hệ thống Chatbot AI tự động hóa và đồng bộ hóa CRM, tự sinh câu hỏi giải đáp và bám đuổi phễu bán hàng theo thời gian thực.',
                    'initialState' => 'Cửa hàng vận hành hoàn toàn thủ công. Đội ngũ trực Fanpage thường xuyên rơi vào cảnh quá tải tin nhắn ngoài giờ hành chính, dẫn đến việc bỏ quên hoặc phản hồi trễ các yêu cầu tư vấn nóng của khách hàng.',
                    'problem' => 'Nghiên cứu kỹ dữ liệu cho thấy hơn 40% lượng khách hàng tiềm năng inbox vào khung giờ đêm muộn bị thất thoát do không có phản hồi tức thì. Nhân viên trực ca ngày mệt mỏi vì liên tục phải giải đáp các câu hỏi lặp đi lặp lại về thông số, size số sản phẩm.',
                    'fix' => 'Thiết kế & huấn luyện Trợ lý ảo AI thông minh sử dụng kiến trúc RAG tích hợp sâu vào tài liệu sản phẩm riêng của shop. Kết nối Webhook tự động đồng bộ mọi dữ liệu Lead nóng về Google Sheets, đồng thời đẩy thông báo khẩn qua Telegram cho Sale xử lý ngay.',
                    'results' => 'Chatbot AI phản hồi tư vấn chính xác mọi thông số sản phẩm 24/7 dưới 2 giây với độ chính xác trên 95%.|Tiết kiệm 40% chi phí tuyển dụng & quản lý nhân sự trực Page ca tối.|Tỷ lệ chốt đơn từ tệp khách hàng truy cập ban đêm tăng gấp 2 lần.',
                    'metrics' => [
                        ['label' => 'EFFICIENCY', 'value' => '+80%'],
                        ['label' => 'COST REDUCTION', 'value' => '40%'],
                        ['label' => 'LEAD GEN INDEX', 'value' => '2x']
                    ],
                    'graphic_type' => 'ai_bot'
                ],
                [
                    'id' => 'case_3',
                    'title' => 'Website Bất Động Sản Cao Cấp',
                    'category' => 'web',
                    'projectYear' => '2024 Project',
                    'clientIndustry' => 'Real Estate',
                    'description' => 'Phát triển nền tảng giới thiệu dự án cao cấp trên React/Vite, tối ưu hóa điểm số Core Web Vitals tối đa đem lại trải nghiệm mượt mà vượt bậc.',
                    'initialState' => 'Trang thông tin dự án cũ xây dựng trên nền tảng lỗi thời, dung lượng trang phình to không cần thiết, tài nguyên máy chủ cấu hình yếu và thường xuyên nghẽn mạng khi quảng cáo có traffic lớn tràn vào.',
                    'problem' => 'Mỗi khi khách hàng VIP mở xem hình ảnh thiết kế 3D căn hộ, trang web cũ mất tới 8 giây để hiển thị đầy đủ, làm giảm nghiêm trọng trải nghiệm người dùng cao cấp và khiến tỷ lệ đăng ký tư vấn sụt giảm mạnh.',
                    'fix' => 'Tái cấu trúc và lập trình lại hoàn toàn bằng React và Vite tối tân. Áp dụng kỹ thuật Lazy Loading phân chia tài nguyên thông minh, tự động tối ưu hóa hiển thị ảnh chất lượng cao theo kích thước màn hình người dùng, nén code tối ưu CSS.',
                    'results' => 'Điểm kiểm toán hiệu năng Google Lighthouse đạt mốc 100/100 điểm tuyệt đối.|Thời gian tải trang tức thì giảm xuống chỉ còn dưới 0.8 giây.|Tỷ lệ khách hàng VIP giữ chân xem lâu tăng gấp 3 lần, lượng form đăng ký tăng 15%.',
                    'metrics' => [
                        ['label' => 'LOAD TIME CORES', 'value' => '0.8s'],
                        ['label' => 'CVR ĐĂNG KÝ', 'value' => '+15%'],
                        ['label' => 'ENGAGEMENT', 'value' => '3x']
                    ],
                    'graphic_type' => 'real_estate'
                ],
                [
                    'id' => 'case_4',
                    'title' => 'Tăng Trưởng Người Dùng Đa Kênh SAAS',
                    'category' => 'seo',
                    'projectYear' => '2023 Project',
                    'clientIndustry' => 'SaaS Startup',
                    'description' => 'Thực thi kiểm toán cấu trúc hạ tầng từ khóa SEO, tối ưu SEO thực chiến sâu rộng kết hợp phễu dẫn nguồn tự phát từ Automation.',
                    'initialState' => 'Hệ thống phần mềm SaaS mới ra mắt thị trường chưa có độ phủ thương hiệu lớn. Kênh tiếp cận khách hàng phụ thuộc hoàn toàn vào chạy quảng cáo trả phí Google Ads và Facebook Ads với chi phí ngày càng đắt đỏ.',
                    'problem' => 'Chi phí để tiếp cận thành công một khách hàng mới (CAC) quá cao, tiệm cận mức hòa vốn. Lượng lượt truy cập tự nhiên (Organic Traffic) gần như bằng không do nội dung mỏng và cấu trúc liên kết lộn xộn.',
                    'fix' => 'Xây dựng sơ đồ phân tầng liên kết chặt chẽ theo cấu trúc SILO mô hình hóa từng cụm tính năng của phần mềm. Áp dụng kỹ thuật Onsite SEO tối ưu hóa chuyên sâu các thẻ Schema JSON-LD định dạng dữ liệu có cấu trúc cho bot tìm kiếm dễ hiểu.',
                    'results' => 'Đạt mốc bứt phá hơn 12,000 lượt truy cập tìm kiếm tự nhiên của người dùng mục tiêu mỗi ngày.|Chi phí CAC (tiếp cận khách hàng mới) giảm mạnh tới 35% nhờ phễu tìm kiếm tự nhiên bổ trợ.|Duy trì tỷ lệ khách hàng đăng ký sử dụng thử dịch vụ chuyển sang gói trả phí ổn định ở mức 68%.',
                    'metrics' => [
                        ['label' => 'DAILY USERS', 'value' => '+12k'],
                        ['label' => 'CAC INDEX', 'value' => '-35%'],
                        ['label' => 'RETENTION RATE', 'value' => '68%']
                    ],
                    'graphic_type' => 'saas'
                ]
            ];

            if (!function_exists('render_mock_graphic_php')) {
                // Helper to render beautiful visual gradients mirroring the Lucide icons and aesthetics in React
                function render_mock_graphic_php($type, $title) {
                    switch($type) {
                        case 'f_b':
                            return '
                            <div class="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-slate-800 flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-900 select-none">
                                <svg class="w-10 h-10 text-[#FFD700] mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v5.25c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 18.375v-5.25zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125v-9.75zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v14.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                                <span class="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold font-mono">SEO Rank Report Active</span>
                                <span class="text-xs text-gray-400 mt-1">Google Search Console Overlapping</span>
                            </div>';
                        case 'ai_bot':
                            return '
                            <div class="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-300 select-none">
                                <svg class="w-10 h-10 text-[#FFD700] mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m11.142 0L21.75 12l-4.179-2.25M12 5.75L21.75 12 12 18.25 2.25 12 12 5.75z"/></svg>
                                <span class="text-[10px] uppercase tracking-widest text-[#1A1A2E] font-bold font-mono">AI Workflow Connected</span>
                                <span class="text-xs text-gray-550 mt-1">N8N & Pinecone Vectors active</span>
                            </div>';
                        case 'real_estate':
                            return '
                            <div class="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-amber-950/20 flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-950 select-none">
                                <svg class="w-10 h-10 text-[#FFD700] mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9s2.015-9 4.5-9m0 0a9.004 9.004 0 018.716 6.747M12 3a9.004 9.004 0 00-8.716 6.747M3 12h18"/></svg>
                                <span class="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold font-mono">Lighthouse 100/100 Speed</span>
                                <span class="text-xs text-gray-400 mt-1">Pure Vite + React ESM architecture</span>
                            </div>';
                        case 'saas':
                        default:
                            return '
                            <div class="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-200 select-none">
                                <svg class="w-10 h-10 text-[#FFD700] mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" /></svg>
                                <span class="text-[10px] uppercase tracking-widest text-gray-650 font-bold font-mono">Crawler Indexer Nodes</span>
                                <span class="text-xs text-gray-500 mt-1">Data sync automatons on Cron</span>
                            </div>';
                    }
                }
            }

            // Render default mock case studies
            foreach ($static_studies as $study) {
                ?>
                <div class="case-study-card bg-white border border-gray-200 rounded-lg overflow-hidden hover:border-[#FFD700] hover:shadow-lg transition-all flex flex-col justify-between group duration-300 cursor-pointer"
                    onclick="openPortfolioModal(this)"
                    data-category="<?php echo esc_attr($study['category']); ?>"
                    data-title="<?php echo esc_attr($study['title']); ?>"
                    data-industry="<?php echo esc_attr($study['clientIndustry']); ?>"
                    data-year="<?php echo esc_attr($study['projectYear']); ?>"
                    data-desc="<?php echo esc_attr($study['description']); ?>"
                    data-initial-state="<?php echo esc_attr($study['initialState']); ?>"
                    data-problem="<?php echo esc_attr($study['problem']); ?>"
                    data-fix="<?php echo esc_attr($study['fix']); ?>"
                    data-results="<?php echo esc_attr($study['results']); ?>"
                    data-m1-lbl="<?php echo esc_attr($study['metrics'][0]['label']); ?>" data-m1-val="<?php echo esc_attr($study['metrics'][0]['value']); ?>"
                    data-m2-lbl="<?php echo esc_attr($study['metrics'][1]['label']); ?>" data-m2-val="<?php echo esc_attr($study['metrics'][1]['value']); ?>"
                    data-m3-lbl="<?php echo esc_attr($study['metrics'][2]['label']); ?>" data-m3-val="<?php echo esc_attr($study['metrics'][2]['value']); ?>">
                    
                    <!-- Image Graphics representation -->
                    <div class="pointer-events-none">
                        <?php echo render_mock_graphic_php($study['graphic_type'], $study['title']); ?>
                    </div>

                    <div class="p-6 md:p-8 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#FFD700] bg-[#F5F0E8] px-2.5 py-1 rounded">
                                <?php echo esc_html($study['clientIndustry']); ?>
                            </span>
                            <span class="text-xs text-gray-400 font-mono font-medium">
                                <?php echo esc_html($study['projectYear']); ?>
                            </span>
                        </div>

                        <h3 class="text-base sm:text-lg font-bold text-[#1A1A2E] tracking-tight group-hover:text-[#FFD700] transition-colors font-sans">
                            <?php echo esc_html($study['title']); ?>
                        </h3>

                        <p class="text-xs sm:text-[13px] text-gray-550 leading-relaxed text-justify line-clamp-3">
                            <?php echo esc_html($study['description']); ?>
                        </p>

                        <div class="text-[11px] font-bold text-[#AA7500] flex items-center gap-1 group-hover:translate-x-1 transition-transform pt-1">
                            Xem bài viết phân tích chi tiết dự án &rarr;
                        </div>

                        <!-- Metrics boxes -->
                        <div class="grid grid-cols-3 gap-3 pt-4 border-t border-gray-100 bg-[#F5F0E8] p-3 rounded">
                            <?php foreach ($study['metrics'] as $metric) { ?>
                                <div class="text-center space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-gray-400 block tracking-tight truncate">
                                        <?php echo esc_html($metric['label']); ?>
                                    </span>
                                    <span class="text-xs sm:text-sm font-extrabold text-[#1A1A2E] tracking-tight block">
                                        <?php echo esc_html($metric['value']); ?>
                                    </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
            }

            // Dynamically query from the custom post type 'case_study' and standard posts
            $args = array(
                'post_type'      => array('case_study', 'post'),
                'posts_per_page' => 12,
                'tax_query'      => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'case_category',
                        'field'    => 'slug',
                        'operator' => 'EXISTS',
                    ),
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => array('portfolio', 'du-an'),
                    ),
                ),
            );
            $portfolio_query = new WP_Query($args);

            if ($portfolio_query->have_posts()) {
                while ($portfolio_query->have_posts()) {
                    $portfolio_query->the_post();
                    
                    // Determine category slug for CSS dynamic filters
                    $cat_slug = 'all';
                    $case_tax_cats = wp_get_post_terms(get_the_ID(), 'case_category');
                    if (!empty($case_tax_cats) && !is_wp_error($case_tax_cats)) {
                        $cat_slug = $case_tax_cats[0]->slug;
                        if (in_array($cat_slug, ['seo', 'web', 'automation'])) {
                            // Valid filters
                        } else {
                            $cat_slug = 'seo'; // default filter bucket
                        }
                    } else {
                        // Fallback to standard tags or category slug
                        $post_tags = wp_get_post_tags(get_the_ID());
                        if (!empty($post_tags)) {
                            foreach ($post_tags as $tag) {
                                if (in_array($tag->slug, ['seo', 'web', 'automation'])) {
                                    $cat_slug = $tag->slug;
                                    break;
                                }
                            }
                        }
                    }

                    // Map Custom Fields using dl_field() (loads ACF fields cleanly with programmatically registered fallbacks)
                    $industry = dl_field('client_industry', 'Business Industry');
                    $year = dl_field('project_year', '2024 Project');
                    $metric_1_lbl = dl_field('metric_1_lbl', 'TRAFFIC');
                    $metric_1_val = dl_field('metric_1_val', '+150%');
                    $metric_2_lbl = dl_field('metric_2_lbl', 'LEADS');
                    $metric_2_val = dl_field('metric_2_val', '+45%');
                    $metric_3_lbl = dl_field('metric_3_lbl', 'ROI');
                    $metric_3_val = dl_field('metric_3_val', '2.8x');
                    $graphic_type = dl_field('graphic_type', 'f_b');

                    $initial_state = dl_field('initial_state', 'Chưa có thông tin trạng thái ban đầu của dự án.');
                    $problem = dl_field('problem', 'Đang cập nhật phân tích chi tiết thách thức kinh doanh và rào cản từ đối tác.');
                    $fix = dl_field('fix', 'Đang cập nhật quy trình và phương án lập trình tối ưu hóa / tích hợp tự động hóa của Derek Flow.');
                    $results_list = dl_field('results', 'Phát triển Organic Traffic bền vững.|Xử lý thành công rào cản kỹ thuật dứt điểm.|Tối ưu chi phí nhân sự thành công.');
                    
                    $proof_initial = dl_field('proof_image_initial', '');
                    $proof_problem = dl_field('proof_image_problem', '');
                    $proof_fix = dl_field('proof_image_fix', '');
                    $proof_results = dl_field('proof_image_results', '');

                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    ?>
                    <div class="case-study-card bg-white border border-gray-200 rounded-lg overflow-hidden hover:border-[#FFD700] hover:shadow-lg transition-all flex flex-col justify-between group duration-300 cursor-pointer"
                        onclick="openPortfolioModal(this)"
                        data-category="<?php echo esc_attr($cat_slug); ?>"
                        data-title="<?php echo esc_attr(get_the_title()); ?>"
                        data-industry="<?php echo esc_attr($industry); ?>"
                        data-year="<?php echo esc_attr($year); ?>"
                        data-desc="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 28)); ?>"
                        data-initial-state="<?php echo esc_attr($initial_state); ?>"
                        data-problem="<?php echo esc_attr($problem); ?>"
                        data-fix="<?php echo esc_attr($fix); ?>"
                        data-results="<?php echo esc_attr($results_list); ?>"
                        data-proof-initial="<?php echo esc_attr($proof_initial); ?>"
                        data-proof-problem="<?php echo esc_attr($proof_problem); ?>"
                        data-proof-fix="<?php echo esc_attr($proof_fix); ?>"
                        data-proof-results="<?php echo esc_attr($proof_results); ?>"
                        data-m1-lbl="<?php echo esc_attr($metric_1_lbl); ?>" data-m1-val="<?php echo esc_attr($metric_1_val); ?>"
                        data-m2-lbl="<?php echo esc_attr($metric_2_lbl); ?>" data-m2-val="<?php echo esc_attr($metric_2_val); ?>"
                        data-m3-lbl="<?php echo esc_attr($metric_3_lbl); ?>" data-m3-val="<?php echo esc_attr($metric_3_val); ?>">
                        
                        <?php if ($thumbnail_url) { ?>
                            <div class="w-full h-48 overflow-hidden border-b border-gray-100 pointer-events-none font-sans">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php } else { ?>
                            <div class="pointer-events-none">
                                <?php echo render_mock_graphic_php($graphic_type, get_the_title()); ?>
                            </div>
                        <?php } ?>

                        <div class="p-6 md:p-8 space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#FFD700] bg-[#F5F0E8] px-2.5 py-1 rounded">
                                    <?php echo esc_html($industry); ?>
                                </span>
                                <span class="text-xs text-gray-400 font-mono font-medium">
                                    <?php echo esc_html($year); ?>
                                </span>
                            </div>

                            <h3 class="text-base sm:text-lg font-bold text-[#1A1A2E] tracking-tight group-hover:text-[#FFD700] transition-colors leading-snug">
                                <?php the_title(); ?>
                            </h3>

                            <p class="text-xs sm:text-[13px] text-gray-550 leading-relaxed text-justify line-clamp-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 28); ?>
                            </p>

                            <div class="text-[11px] font-bold text-[#AA7500] flex items-center gap-1 group-hover:translate-x-1 transition-transform pt-1">
                                Xem bài viết phân tích chi tiết dự án &rarr;
                            </div>

                            <!-- Metrics boxes -->
                            <div class="grid grid-cols-3 gap-3 pt-4 border-t border-gray-100 bg-[#F5F0E8] p-3 rounded">
                                <div class="text-center space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-gray-400 block tracking-tight truncate flex-1">
                                        <?php echo esc_html($metric_1_lbl); ?>
                                    </span>
                                    <span class="text-xs sm:text-sm font-extrabold text-[#1A1A2E] tracking-tight block">
                                        <?php echo esc_html($metric_1_val); ?>
                                    </span>
                                </div>
                                <div class="text-center space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-gray-400 block tracking-tight truncate flex-1">
                                        <?php echo esc_html($metric_2_lbl); ?>
                                    </span>
                                    <span class="text-xs sm:text-sm font-extrabold text-[#1A1A2E] tracking-tight block">
                                        <?php echo esc_html($metric_2_val); ?>
                                    </span>
                                </div>
                                <div class="text-center space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-gray-400 block tracking-tight truncate flex-1">
                                        <?php echo esc_html($metric_3_lbl); ?>
                                    </span>
                                    <span class="text-xs sm:text-sm font-extrabold text-[#1A1A2E] tracking-tight block">
                                        <?php echo esc_html($metric_3_val); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>

        <!-- Success Quote card -->
        <div class="bg-[#1A1A2E] text-white p-8 md:p-12 rounded-lg text-center space-y-6 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-32 h-32 bg-[#FFD700]/5 rounded-full blur-2xl font-sans font-medium"></div>
            <div class="max-w-2xl mx-auto space-y-4">
                <h3 class="text-2xl md:text-3xl font-extrabold tracking-tight">Bắt đầu câu chuyện thành công của bạn</h3>
                <p class="text-xs sm:text-sm text-gray-300 leading-relaxed max-w-xl mx-auto font-sans font-medium">
                    Sẵn sàng đưa dự án của bạn bứt phá vị trí dẫn đầu, tinh giản nhân lực thủ công và tối đa tỷ lệ chuyển đổi? Hãy liên kết tư vấn ngay hôm nay.
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-4">
                <a
                    href="<?php echo esc_url(home_url('/lien-he')); ?>"
                    class="inline-flex items-center justify-center space-x-2 bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] text-xs font-bold uppercase tracking-wide px-6 py-4.5 rounded shadow cursor-pointer h-12"
                >
                    <span>Xem Lộ Trình & Nhận Ưu Đãi</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <a
                    href="<?php echo esc_url(home_url('/gia')); ?>"
                    class="inline-flex items-center justify-center space-x-2 border border-gray-650 hover:border-white text-xs font-semibold px-6 py-4.5 rounded transition-all cursor-pointer h-12 text-white"
                >
                    Xem Chi Tiết Chi Phí
                </a>
            </div>
        </div>
    </div>
</main>

<!-- Beautiful Custom Interactive Case Study Detail Modal with 4 Fixed Sections -->
<div id="portfolio-detail-modal" class="fixed inset-0 bg-[#1A1A2E]/85 backdrop-blur-sm z-[9999] flex items-center justify-center p-3 sm:p-4 hidden" onclick="if(event.target === this) closePortfolioModal();">
    <div class="bg-[#FDFBF7] text-[#1A1A2E] w-full max-w-3xl rounded-xl shadow-2xl border border-gray-200 overflow-hidden flex flex-col max-h-[92vh]">
        <!-- Modal Header -->
        <div class="p-5 sm:p-6 bg-[#1A1A2E] text-white flex items-center justify-between border-b border-gray-800">
            <div>
                <div class="flex items-center gap-2">
                    <span id="modal-industry" class="text-[10px] uppercase font-extrabold tracking-widest text-[#FFD700] bg-white/10 px-2 py-0.5 rounded">
                        INDUSTRY
                    </span>
                    <span id="modal-year" class="text-xs text-gray-400 font-mono">
                        YEAR
                    </span>
                </div>
                <h3 id="modal-title" class="text-lg md:text-xl font-bold tracking-tight mt-1.5 leading-snug">Project Title</h3>
            </div>
            <button onclick="closePortfolioModal()" class="p-1.5 rounded-full text-gray-400 hover:text-white hover:bg-white/15 transition-colors cursor-pointer shrink-0 ml-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Content inside a technical blog representation -->
        <div class="p-5 sm:p-8 space-y-8 overflow-y-auto max-h-[calc(92vh-140px)] scrollbar-thin">
            <!-- Header Intro Image Representation -->
            <div class="relative rounded-lg overflow-hidden border border-gray-200 bg-[#F4EFE6] px-4 py-8 text-center flex flex-col items-center justify-center">
                <div class="w-12 h-12 rounded-full bg-[#1A1A2E] text-[#FFD700] flex items-center justify-center mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5-3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
                <span class="text-[11px] uppercase tracking-widest text-[#AA7500] font-black font-sans">BÁO CÁO PHÂN TÍCH CHUYÊN SÂU</span>
                <div class="text-sm text-gray-550 font-mono mt-1 font-medium">Lưu trữ Case Study Hệ thống • Độc bản Derek Flow</div>
            </div>

            <!-- Dynamic Metrics boxes -->
            <div class="grid grid-cols-3 gap-2.5 sm:gap-4 bg-[#F5F0E8] p-4 rounded-lg border border-gray-150">
                <div class="text-center">
                    <span id="modal-m1-lbl" class="text-[9px] sm:text-[10px] text-gray-550 font-bold block uppercase tracking-wide font-sans">METRIC 1</span>
                    <span id="modal-m1-val" class="text-base sm:text-xl font-black text-[#1A1A2E]">VALUE 1</span>
                </div>
                <div class="text-center border-l border-gray-300">
                    <span id="modal-m2-lbl" class="text-[9px] sm:text-[10px] text-gray-550 font-bold block uppercase tracking-wide font-sans">METRIC 2</span>
                    <span id="modal-m2-val" class="text-base sm:text-xl font-black text-[#1A1A2E]">VALUE 2</span>
                </div>
                <div class="text-center border-l border-gray-300">
                    <span id="modal-m3-lbl" class="text-[9px] sm:text-[10px] text-gray-550 font-bold block uppercase tracking-wide font-sans">METRIC 3</span>
                    <span id="modal-m3-val" class="text-base sm:text-xl font-black text-[#1A1A2E]">VALUE 3</span>
                </div>
            </div>

            <!-- THE 4 FIXED SECTIONS -->
            <div class="space-y-6 divide-y divide-gray-150">
                
                <!-- SECT 1: BAN ĐẦU / NHẬN WEB -->
                <div id="modal-section-initial-wrapper" class="space-y-3 pt-0">
                    <div class="flex items-center gap-2 text-indigo-900 border-l-4 border-indigo-700 pl-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v12a2.25 2.25 0 01-2.25 2.25H5.25" />
                        </svg>
                        <h4 class="text-[13px] font-black uppercase tracking-wider">1. TRẠNG THÁI BAN ĐẦU & NHẬN BÀN GIAO</h4>
                    </div>
                    <p id="modal-initial-state" class="text-xs sm:text-[13.5px] text-gray-750 leading-relaxed text-justify pl-4 font-sans font-medium">
                        Detailed Initial State...
                    </p>
                    <div id="modal-proof-initial-container" class="mt-3 pl-4 hidden">
                        <div class="text-[10px] uppercase font-bold text-indigo-500 tracking-wider mb-1.5 font-mono flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Ảnh chụp màn hình thực tế lúc bàn giao:
                        </div>
                        <img id="modal-proof-initial-img" src="" class="rounded-lg border border-gray-205 max-h-72 object-cover w-full shadow-xs hover:scale-[1.01] transition-transform duration-300">
                    </div>
                </div>

                <!-- SECT 2: VẤN ĐỀ -->
                <div id="modal-section-problem-wrapper" class="space-y-3 pt-5">
                    <div class="flex items-center gap-2 text-rose-800 border-l-4 border-rose-600 pl-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <h4 class="text-[13px] font-black uppercase tracking-wider">2. RÀO CẢN & VẤN ĐỀ ĐANG ĐỐI MẶT</h4>
                    </div>
                    <p id="modal-problem" class="text-xs sm:text-[13.5px] text-gray-755 leading-relaxed text-justify pl-4 font-sans font-medium">
                        Detailed Problems...
                    </p>
                    <div id="modal-proof-problem-container" class="mt-3 pl-4 hidden">
                        <div class="text-[10px] uppercase font-bold text-rose-500 tracking-wider mb-1.5 font-mono flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Ảnh minh chứng lỗi & rào cản kỹ thuật:
                        </div>
                        <img id="modal-proof-problem-img" src="" class="rounded-lg border border-gray-205 max-h-72 object-cover w-full shadow-xs hover:scale-[1.01] transition-transform duration-300">
                    </div>
                </div>

                <!-- SECT 3: FIX -->
                <div id="modal-section-fix-wrapper" class="space-y-3 pt-5">
                    <div class="flex items-center gap-2 text-amber-800 border-l-4 border-amber-600 pl-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.67 2.67 0 1113.5 17.25l-5.83-5.83m0 0a4 4 0 11-5.656-5.656 4 4 0 015.656 5.656z" />
                        </svg>
                        <h4 class="text-[13px] font-black uppercase tracking-wider">3. PHƯƠNG ÁN SỬA LỖI & KHẮC PHỤC (FIX)</h4>
                    </div>
                    <p id="modal-fix" class="text-xs sm:text-[13.5px] text-gray-755 leading-relaxed text-justify pl-4 font-sans font-medium">
                        Detailed Fixes...
                    </p>
                    <div id="modal-proof-fix-container" class="mt-3 pl-4 hidden">
                        <div class="text-[10px] uppercase font-bold text-amber-600 tracking-wider mb-1.5 font-mono flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-amber-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Ảnh chụp cấu trúc / Code fixing minh họa:
                        </div>
                        <img id="modal-proof-fix-img" src="" class="rounded-lg border border-gray-205 max-h-72 object-cover w-full shadow-xs hover:scale-[1.01] transition-transform duration-300">
                    </div>
                </div>

                <!-- SECT 4: KẾT QUẢ ĐẠT ĐƯỢC -->
                <div id="modal-section-results-wrapper" class="space-y-3 pt-5">
                    <div class="flex items-center gap-2 text-emerald-800 border-l-4 border-emerald-600 pl-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <h4 class="text-[13px] font-black uppercase tracking-wider">4. KẾT QUẢ VẬN HÀNH ĐẠT ĐƯỢC</h4>
                    </div>
                    <div class="pl-4">
                        <ul id="modal-results-list" class="space-y-2.5">
                            <!-- Dynamic bullet items will be rendered here -->
                        </ul>
                    </div>
                    <div id="modal-proof-results-container" class="mt-3 pl-4 hidden">
                        <div class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider mb-1.5 font-mono flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Ảnh minh chứng kết quả đo lường (Analytics / Lighthouse):
                        </div>
                        <img id="modal-proof-results-img" src="" class="rounded-lg border border-gray-205 max-h-72 object-cover w-full shadow-xs hover:scale-[1.01] transition-transform duration-300">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer CTA -->
        <div class="p-4 bg-[#F5F0E8] border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-3">
            <span class="text-[11px] text-gray-500 font-medium font-sans">Bản quyền phân phối dự án thuộc về Derek Flow®</span>
            <div class="flex gap-2 w-full sm:w-auto">
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="flex-1 sm:flex-initial bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] text-[11px] font-bold uppercase tracking-wider px-5 py-2.5 rounded transition-all text-center whitespace-nowrap">
                    Tư Vấn Dự Án Tương Tự
                </a>
                <button onclick="closePortfolioModal()" class="flex-1 sm:flex-initial bg-white border border-gray-250 text-gray-655 hover:text-gray-850 text-[11px] font-bold uppercase tracking-wider px-5 py-2.5 rounded transition-all cursor-pointer">
                    Đóng lại
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Fast interface filter for client-side fluid navigation in WordPress loop elements
     */
    function filterPortfolio(filter) {
        // Toggle buttons active look consistent with UI theme
        const btns = document.querySelectorAll('.portfolio-filter-btn');
        btns.forEach(btn => {
            if (btn.id === 'filter-btn-' + filter) {
                btn.className = "portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-[#1A1A2E] text-white border-[#1A1A2E]";
            } else {
                btn.className = "portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]";
            }
        });

        // Hide/Show cards
        const cards = document.querySelectorAll('.case-study-card');
        cards.forEach(card => {
            const cat = card.getAttribute('data-category');
            if (filter === 'all' || cat === filter) {
                card.style.opacity = '0';
                card.style.display = 'flex';
                // Trigger reflow for smooth transition
                setTimeout(() => {
                    card.style.transition = 'opacity 0.3s ease-in-out';
                    card.style.opacity = '1';
                }, 50);
            } else {
                card.style.display = 'none';
            }
        });
    }

    /**
     * Interactive Case Study Details Modal Controllers
     */
    function openPortfolioModal(element) {
        const title = element.getAttribute('data-title');
        const industry = element.getAttribute('data-industry');
        const year = element.getAttribute('data-year') || '2024 Project';
        const desc = element.getAttribute('data-desc');
        
        const initialState = element.getAttribute('data-initial-state') || 'Trống';
        const problem = element.getAttribute('data-problem') || 'Đang cập nhật phân tích chi tiết.';
        const fix = element.getAttribute('data-fix') || 'Đang cập nhật phương án giải quyết.';
        const results = element.getAttribute('data-results') || '';
        
        const m1Lbl = element.getAttribute('data-m1-lbl');
        const m1Val = element.getAttribute('data-m1-val');
        const m2Lbl = element.getAttribute('data-m2-lbl');
        const m2Val = element.getAttribute('data-m2-val');
        const m3Lbl = element.getAttribute('data-m3-lbl');
        const m3Val = element.getAttribute('data-m3-val');

        // Retrieve and populate Proof Images
        const proofInitial = element.getAttribute('data-proof-initial') || '';
        const proofProblem = element.getAttribute('data-proof-problem') || '';
        const proofFix = element.getAttribute('data-proof-fix') || '';
        const proofResults = element.getAttribute('data-proof-results') || '';

        const imgContainers = {
            'initial': {
                url: proofInitial,
                img: document.getElementById('modal-proof-initial-img'),
                cnt: document.getElementById('modal-proof-initial-container')
            },
            'problem': {
                url: proofProblem,
                img: document.getElementById('modal-proof-problem-img'),
                cnt: document.getElementById('modal-proof-problem-container')
            },
            'fix': {
                url: proofFix,
                img: document.getElementById('modal-proof-fix-img'),
                cnt: document.getElementById('modal-proof-fix-container')
            },
            'results': {
                url: proofResults,
                img: document.getElementById('modal-proof-results-img'),
                cnt: document.getElementById('modal-proof-results-container')
            }
        };

        for (const key in imgContainers) {
            const obj = imgContainers[key];
            if (obj.url && obj.url.trim() && obj.url !== 'undefined' && obj.url !== 'null') {
                obj.img.src = obj.url;
                obj.cnt.classList.remove('hidden');
            } else {
                obj.img.src = '';
                obj.cnt.classList.add('hidden');
            }
        }

        // Set properties
        document.getElementById('modal-title').innerText = title;
        document.getElementById('modal-industry').innerText = industry;
        document.getElementById('modal-year').innerText = year;
        
        document.getElementById('modal-initial-state').innerText = initialState;
        document.getElementById('modal-problem').innerText = problem;
        document.getElementById('modal-fix').innerText = fix;

        document.getElementById('modal-m1-lbl').innerText = m1Lbl;
        document.getElementById('modal-m1-val').innerText = m1Val;
        document.getElementById('modal-m2-lbl').innerText = m2Lbl;
        document.getElementById('modal-m2-val').innerText = m2Val;
        document.getElementById('modal-m3-lbl').innerText = m3Lbl;
        document.getElementById('modal-m3-val').innerText = m3Val;

        // Render Results Bullets dynamically
        const resultsList = document.getElementById('modal-results-list');
        resultsList.innerHTML = ''; // Reset list
        
        if (results) {
            const items = results.split('|');
            items.forEach(text => {
                if (text.trim()) {
                    const li = document.createElement('li');
                    li.className = 'flex items-start gap-2.5 text-xs sm:text-[13.5px] text-gray-750';
                    li.innerHTML = `
                        <svg class="w-4 h-4 text-emerald-600 mt-1 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="leading-relaxed text-justify font-sans font-medium">${text.trim()}</span>
                    `;
                    resultsList.appendChild(li);
                }
            });
        }

        // Display Modal with a slight backdrop fade
        const modal = document.getElementById('portfolio-detail-modal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Stop background scrolling
    }

    function closePortfolioModal() {
        const modal = document.getElementById('portfolio-detail-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Resume background scrolling
    }

    // Close modal on escape keypress
    window.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closePortfolioModal();
        }
    });
</script>

<?php get_footer(); ?>
