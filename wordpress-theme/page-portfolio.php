<?php
/**
 * Template Name: Derek Lâm Portfolio Case Studies
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative bg-[#FAFAF7]">
    <div class="max-w-7xl mx-auto space-y-12">
        <!-- Header content -->
        <div class="text-center max-w-2xl mx-auto space-y-4">
            <span class="text-[11px] font-bold tracking-widest uppercase text-[#FFD700] bg-navyPrimary px-3 py-1 rounded inline-block font-mono">Dự án thực tế tiêu biểu</span>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-[#1A1A2E]">Kết Quả Bứt Phá Thực Tế</h1>
            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-xl mx-auto">
                Xem cách Derek Lâm hỗ trợ các nhãn hàng tăng trưởng vượt bậc thứ hạng tìm kiếm tự nhiên và tối ưu tỷ suất tự động hóa vận hành.
            </p>
        </div>

        <!-- Filter Toolbar Buttons -->
        <div class="flex flex-wrap items-center justify-center gap-2">
            <button onclick="filterPortfolio('all')" id="filter-btn-all" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-[#1A1A2E] text-white border-[#1A1A2E]">
                Tất Cả Dự Án
            </button>
            <button onclick="filterPortfolio('seo')" id="filter-btn-seo" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]">
                SEO Chiến Lược
            </button>
            <button onclick="filterPortfolio('web')" id="filter-btn-web" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]">
                Website Cao Cấp
            </button>
            <button onclick="filterPortfolio('automation')" id="filter-btn-automation" class="portfolio-filter-btn px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]">
                AI & Automation
            </button>
        </div>

        <!-- Case Studies Grid with Pre-configured Static Fallbacks and WP Posts Integration -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4" id="portfolio-grid">
            
            <?php
            // Static default case studies matching the React component's visual assets
            $static_studies = [
                [
                    'id' => 'case_1',
                    'title' => 'Chiến Dịch SEO Tổng Thể Ngành Thực Phẩm',
                    'category' => 'seo',
                    'projectYear' => '2024 Project',
                    'clientIndustry' => 'F&B Industry',
                    'description' => 'Tái cấu trúc toàn diện kiến trúc thông tin, tối ưu hóa Technical On-page và triển khai chiến dịch Content Cluster bám đuổi hành vi mua sắm người dùng.',
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
                    'metrics' => [
                        ['label' => 'DAILY USERS', 'value' => '+12k'],
                        ['label' => 'CAC INDEX', 'value' => '-35%'],
                        ['label' => 'RETENTION RATE', 'value' => '68%']
                    ],
                    'graphic_type' => 'saas'
                ]
            ];

            // Helper to render beautiful visual gradients mirroring the Lucide icons and aesthetics in React
            function render_mock_graphic_php($type, $title) {
                switch($type) {
                    case 'f_b':
                        return '
                        <div class="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-slate-800 flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-900 select-none">
                            <svg class="w-10 h-10 text-[#FFD700] mb-2 animate-pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v5.25c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 18.375v-5.25zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125v-9.75zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v14.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                            <span class="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold font-mono">SEO Rank Report Active</span>
                            <span class="text-xs text-gray-400 mt-1">Google Search Console Overlapping</span>
                        </div>';
                    case 'ai_bot':
                        return '
                        <div class="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-300 select-none">
                            <svg class="w-10 h-10 text-[#FFD700] mb-2 animate-pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m11.142 0L21.75 12l-4.179-2.25M12 5.75L21.75 12 12 18.25 2.25 12 12 5.75z"/></svg>
                            <span class="text-[10px] uppercase tracking-widest text-[#1A1A2E] font-bold font-mono">AI Workflow Connected</span>
                            <span class="text-xs text-gray-500 mt-1">N8N & Pinecone Vectors active</span>
                        </div>';
                    case 'real_estate':
                        return '
                        <div class="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-amber-950/20 flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-950 select-none">
                            <svg class="w-10 h-10 text-[#FFD700] mb-2 animate-pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9s2.015-9 4.5-9m0 0a9.004 9.004 0 018.716 6.747M12 3a9.004 9.004 0 00-8.716 6.747M3 12h18"/></svg>
                            <span class="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold font-mono">Lighthouse 100/100 Speed</span>
                            <span class="text-xs text-gray-400 mt-1">Pure Vite + React ESM architecture</span>
                        </div>';
                    case 'saas':
                    default:
                        return '
                        <div class="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-200 select-none">
                            <svg class="w-10 h-10 text-[#FFD700] mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" /></svg>
                            <span class="text-[10px] uppercase tracking-widest text-gray-600 font-bold font-mono">Crawler Indexer Nodes</span>
                            <span class="text-xs text-gray-500 mt-1">Data sync automatons on Cron</span>
                        </div>';
                }
            }

            // Render default mock case studies
            foreach ($static_studies as $study) {
                ?>
                <div class="case-study-card bg-white border border-gray-200 rounded-lg overflow-hidden hover:border-[#FFD700] hover:shadow-lg transition-all flex flex-col justify-between group duration-300" data-category="<?php echo esc_attr($study['category']); ?>">
                    <!-- Image Graphics representation -->
                    <?php echo render_mock_graphic_php($study['graphic_type'], $study['title']); ?>

                    <div class="p-6 md:p-8 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#FFD700] bg-[#F5F0E8] px-2.5 py-1 rounded">
                                <?php echo esc_html($study['clientIndustry']); ?>
                            </span>
                            <span class="text-xs text-gray-400 font-mono font-medium">
                                <?php echo esc_html($study['projectYear']); ?>
                            </span>
                        </div>

                        <h3 class="text-base sm:text-lg font-bold text-[#1A1A2E] tracking-tight group-hover:text-[#FFD700] transition-colors">
                            <?php echo esc_html($study['title']); ?>
                        </h3>

                        <p class="text-xs sm:text-[13px] text-gray-550 leading-relaxed text-justify">
                            <?php echo esc_html($study['description']); ?>
                        </p>

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

            // Dynamically query additional posts from WordPress categories (e.g. portfolio)
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 8,
                'tax_query'      => array(
                    'relation' => 'OR',
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
                    $post_tags = wp_get_post_tags(get_the_ID());
                    $cat_slug = 'all';
                    if (!empty($post_tags)) {
                        foreach ($post_tags as $tag) {
                            if (in_array($tag->slug, ['seo', 'web', 'automation'])) {
                                $cat_slug = $tag->slug;
                                break;
                            }
                        }
                    }

                    // Map custom fields or defaults
                    $industry = get_post_meta(get_the_ID(), 'client_industry', true) ?: 'Business Industry';
                    $year = get_post_meta(get_the_ID(), 'project_year', true) ?: '2024 Project';
                    $metric_1_lbl = get_post_meta(get_the_ID(), 'metric_1_lbl', true) ?: 'TRAFFIC';
                    $metric_1_val = get_post_meta(get_the_ID(), 'metric_1_val', true) ?: '+150%';
                    $metric_2_lbl = get_post_meta(get_the_ID(), 'metric_2_lbl', true) ?: 'LEADS';
                    $metric_2_val = get_post_meta(get_the_ID(), 'metric_2_val', true) ?: '+45%';
                    $metric_3_lbl = get_post_meta(get_the_ID(), 'metric_3_lbl', true) ?: 'ROI';
                    $metric_3_val = get_post_meta(get_the_ID(), 'metric_3_val', true) ?: '2.8x';

                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    ?>
                    <div class="case-study-card bg-white border border-gray-200 rounded-lg overflow-hidden hover:border-[#FFD700] hover:shadow-lg transition-all flex flex-col justify-between group duration-300" data-category="<?php echo esc_attr($cat_slug); ?>">
                        
                        <?php if ($thumbnail_url) { ?>
                            <div class="w-full h-48 overflow-hidden border-b border-gray-100">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php } else { ?>
                            <?php echo render_mock_graphic_php($cat_slug, get_the_title()); ?>
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

                            <h3 class="text-base sm:text-lg font-bold text-[#1A1A2E] tracking-tight group-hover:text-[#FFD700] transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <p class="text-xs sm:text-[13px] text-gray-550 leading-relaxed text-justify">
                                <?php echo wp_trim_words(get_the_excerpt(), 28); ?>
                            </p>

                            <!-- Metrics boxes -->
                            <div class="grid grid-cols-3 gap-3 pt-4 border-t border-gray-100 bg-[#F5F0E8] p-3 rounded">
                                <div class="text-center space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-gray-400 block tracking-tight truncate">
                                        <?php echo esc_html($metric_1_lbl); ?>
                                    </span>
                                    <span class="text-xs sm:text-sm font-extrabold text-[#1A1A2E] tracking-tight block">
                                        <?php echo esc_html($metric_1_val); ?>
                                    </span>
                                </div>
                                <div class="text-center space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-gray-400 block tracking-tight truncate">
                                        <?php echo esc_html($metric_2_lbl); ?>
                                    </span>
                                    <span class="text-xs sm:text-sm font-extrabold text-[#1A1A2E] tracking-tight block">
                                        <?php echo esc_html($metric_2_val); ?>
                                    </span>
                                </div>
                                <div class="text-center space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-gray-400 block tracking-tight truncate">
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
            <div class="absolute top-0 left-0 w-32 h-32 bg-[#FFD700]/5 rounded-full blur-2xl"></div>
            <div class="max-w-2xl mx-auto space-y-4">
                <h3 class="text-2xl md:text-3xl font-extrabold tracking-tight">Bắt đầu câu chuyện thành công của bạn</h3>
                <p class="text-xs sm:text-sm text-gray-300 leading-relaxed max-w-xl mx-auto font-sans">
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
                    href="<?php echo esc_url(home_url('/bang-gia')); ?>"
                    class="inline-flex items-center justify-center space-x-2 border border-gray-650 hover:border-white text-xs font-semibold px-6 py-4.5 rounded transition-all cursor-pointer h-12 text-white"
                >
                    Xem Chi Tiết Chi Phí
                </a>
            </div>
        </div>
    </div>
</main>

<script>
    /**
     * Fast interface filter for client-side fluid navigation in WordPress loop elements
     */
    function filterPortfolio(filter) {
        // Toggle buttons active look
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
                // Trigger reflow for transition effect
                setTimeout(() => {
                    card.style.transition = 'opacity 0.3s ease-in-out';
                    card.style.opacity = '1';
                }, 50);
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<?php get_footer(); ?>
