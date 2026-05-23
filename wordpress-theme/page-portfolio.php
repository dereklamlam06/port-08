<?php
/**
 * Template Name: Derek Lâm Portfolio Case Studies
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative">

    <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
        <span class="text-[11px] font-black tracking-widest uppercase text-goldAccent bg-navyPrimary px-3 py-1 rounded inline-block">DỰ ÁN TIÊU BIỂU</span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-navyPrimary tracking-tight">Hồ Sơ Thực Chiến</h1>
        <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-2xl mx-auto">
            Khám phá các chiến dịch đo lường chỉ số ROI đột phá thông qua kết quả thực tế từ danh mục dự án đầu tư cấu trúc Entity SEO và Tự động hóa.
        </p>
    </div>

    <!-- Live Category Filter Buttons (Natively controlled via plain javascript for fast responses) -->
    <div class="flex flex-wrap items-center justify-center gap-2.5 mb-12">
        <button onclick="filterPortfolio('all')" class="portfolio-filter-btn px-4 py-2 text-xs font-black uppercase tracking-wider rounded-lg transition-all border border-navyPrimary bg-navyPrimary text-goldAccent shadow-sm">Tất cả</button>
        <button onclick="filterPortfolio('seo')" class="portfolio-filter-btn px-4 py-2 text-xs font-semibold uppercase tracking-wider rounded-lg transition-all border border-gray-200 bg-white hover:bg-gray-50 text-[#1A1A2E]">SEO thực chiến</button>
        <button onclick="filterPortfolio('web')" class="portfolio-filter-btn px-4 py-2 text-xs font-semibold uppercase tracking-wider rounded-lg transition-all border border-gray-200 bg-white hover:bg-gray-50 text-[#1A1A2E]">Thiết kế website</button>
        <button onclick="filterPortfolio('automation')" class="portfolio-filter-btn px-4 py-2 text-xs font-semibold uppercase tracking-wider rounded-lg transition-all border border-gray-200 bg-white hover:bg-gray-50 text-[#1A1A2E]">Tự động hóa</button>
    </div>

    <!-- Case Studies Stream layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16" id="portfolio-container">

        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 12,
            'tax_query'      => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => array( 'portfolio', 'du-an' ),
                ),
            ),
        );
        $portfolio_query = new WP_Query($args);

        if ( $portfolio_query->have_posts() ) :
            while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                // Get post tags to map category for filter (e.g. 'seo', 'web', 'automation')
                $post_tags = wp_get_post_tags( get_the_ID() );
                $data_category = 'all';
                $tech_badge = 'CUSTOM PROJECT';
                if ( ! empty( $post_tags ) ) {
                    foreach ( $post_tags as $tag ) {
                        if ( in_array( $tag->slug, array( 'seo', 'web', 'automation' ) ) ) {
                            $data_category = $tag->slug;
                            break;
                        }
                    }
                }
                
                if ($data_category === 'seo') {
                    $tech_badge = '✔ GSC INDEX ACTIVE';
                    $bg_gradient = 'from-navyPrimary to-slate-800 text-white';
                } elseif ($data_category === 'web') {
                    $tech_badge = '✔ LIGHTHOUSE Score 100/100';
                    $bg_gradient = 'from-navyPrimary to-amber-950/20 text-white';
                } elseif ($data_category === 'automation') {
                    $tech_badge = '✔ COMPLETED AI PIPELINE';
                    $bg_gradient = 'from-[#F5F0E8] to-[#E5E7EB] text-navyPrimary';
                } else {
                    $bg_gradient = 'from-navyPrimary to-slate-900 text-white';
                }
                
                // Get metric custom fields mapped dynamically
                $metric_1_val = get_post_meta( get_the_ID(), 'metric_1_val', true ) ?: '+100%';
                $metric_1_lbl = get_post_meta( get_the_ID(), 'metric_1_lbl', true ) ?: 'TĂNG TRƯỞNG';
                $metric_2_val = get_post_meta( get_the_ID(), 'metric_2_val', true ) ?: '2x';
                $metric_2_lbl = get_post_meta( get_the_ID(), 'metric_2_lbl', true ) ?: 'HIỆU QUẢ';
                $metric_3_val = get_post_meta( get_the_ID(), 'metric_3_val', true ) ?: '3x';
                $metric_3_lbl = get_post_meta( get_the_ID(), 'metric_3_lbl', true ) ?: 'ROI CHỈ SỐ';
                
                $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
                ?>
                <article class="case-study-card bg-white border border-gray-150 rounded-2xl overflow-hidden shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between" data-category="<?php echo esc_attr( $data_category ); ?>">
                    <div>
                        <?php if ( $thumbnail_url ) : ?>
                            <div class="w-full h-48 overflow-hidden border-b border-gray-100">
                                <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php else : ?>
                            <!-- Simulated premium graphic panel -->
                            <div class="w-full h-48 bg-gradient-to-tr <?php echo esc_attr($bg_gradient); ?> flex flex-col items-center justify-center p-6 text-center border-b border-gray-250 select-none">
                                <span class="text-[10px] uppercase tracking-widest font-black"><?php echo esc_html($tech_badge); ?></span>
                                <span class="text-xl font-black mt-1"><?php the_title(); ?></span>
                                <span class="text-xs opacity-70 mt-1"><?php echo get_the_date(); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-wider text-gray-400">
                                <span><?php echo esc_html( strtoupper($data_category) ); ?> PROJECT</span>
                                <span><?php echo get_the_date('Y'); ?></span>
                            </div>
                            <h3 class="text-base sm:text-lg font-black text-navyPrimary leading-snug">
                                <a href="<?php the_permalink(); ?>" class="hover:text-goldAccent transition-colors"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-xs text-gray-500 leading-relaxed text-justify">
                                <?php echo wp_trim_words( get_the_excerpt(), 25 ); ?>
                            </p>
                        </div>
                    </div>
                    <!-- Metrics Panel -->
                    <div class="px-6 pb-6 pt-3 border-t border-gray-50">
                        <div class="grid grid-cols-3 gap-2 bg-[#FAFAF7] border border-gray-150 p-3.5 rounded-xl text-center">
                            <div>
                                <span class="text-[9px] text-gray-400 font-bold block uppercase"><?php echo esc_html( $metric_1_lbl ); ?></span>
                                <strong class="text-xs font-black text-navyPrimary"><?php echo esc_html( $metric_1_val ); ?></strong>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-400 font-bold block uppercase"><?php echo esc_html( $metric_2_lbl ); ?></span>
                                <strong class="text-xs font-black text-navyPrimary"><?php echo esc_html( $metric_2_val ); ?></strong>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-400 font-bold block uppercase"><?php echo esc_html( $metric_3_lbl ); ?></span>
                                <strong class="text-xs font-black text-navyPrimary"><?php echo esc_html( $metric_3_val ); ?></strong>
                            </div>
                        </div>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <div class="col-span-1 md:col-span-2 text-center py-12 bg-white border border-gray-150 rounded-2xl p-8 space-y-4">
                <span class="text-4xl">📁</span>
                <h3 class="text-lg font-black text-navyPrimary">Chưa Có Dự Án Thực Chiến Nào Được Tạo</h3>
                <p class="text-xs text-gray-500 max-w-md mx-auto">
                    Để trang trí danh mục thực chiến, quý khách vui lòng tạo các **Bài Viết (Posts)** thuộc chuyên mục có slug: `portfolio` hoặc `du-an` trong quản trị WordPress.
                </p>
                <div class="text-[10px] font-mono bg-amber-50 border border-amber-200 p-4 rounded text-amber-800 max-w-lg mx-auto text-left space-y-1">
                    <strong>Mẹo thiết lập nhanh:</strong><br>
                    • Tạo Bài viết có đặt ảnh nổi bật.<br>
                    • Thêm thẻ (Tag) là `seo`, `web`, hoặc `automation` để kích hoạt bộ lọc thời gian thực.<br>
                    • Thiết lập các Custom Fields `metric_1_lbl` và `metric_1_val` để hiển thị cột chỉ số tăng trưởng (Ví dụ: `+210%`, `ROI`).
                </div>
            </div>
        <?php endif; ?>

    </div>              </div>
                    <div>
                        <span class="text-xs text-gray-400 font-bold block">TỶ LỆ GIỮ CHÂN</span>
                        <strong class="text-sm font-black text-navyPrimary">68%</strong>
                    </div>
                </div>
            </div>
        </article>

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
            if (btn.textContent.toLowerCase().includes(filter === 'all' ? 'tất cả' : filter === 'seo' ? 'seo' : filter === 'web' ? 'web' : 'tự động')) {
                btn.className = "portfolio-filter-btn px-4 py-2 text-xs font-black uppercase tracking-wider rounded-lg transition-all border border-navyPrimary bg-navyPrimary text-goldAccent shadow-sm";
            } else {
                btn.className = "portfolio-filter-btn px-4 py-2 text-xs font-semibold uppercase tracking-wider rounded-lg transition-all border border-gray-200 bg-white hover:bg-gray-50 text-[#1A1A2E]";
            }
        });

        // Hide/Show cards
        const cards = document.querySelectorAll('.case-study-card');
        cards.forEach(card => {
            const cat = card.getAttribute('data-category');
            if (filter === 'all' || cat === filter) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<?php get_footer(); ?>
