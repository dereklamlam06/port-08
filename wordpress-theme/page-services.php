<?php
/**
 * Template Name: Derek Lâm Services Webpage
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative">
    
    <!-- Header visual -->
    <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
        <span class="text-[11px] font-black tracking-widest uppercase text-goldAccent bg-navyPrimary px-3 py-1 rounded inline-block">NĂNG LỰC CỐT LÕI SPECIALIST</span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-navyPrimary tracking-tight">Dịch Vụ Tinh Hoa</h1>
        <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-2xl mx-auto">
            Giải pháp chuyên sâu kết kết hợp sức mạnh của Technical SEO Entity và kiến trúc Tự động hóa bằng AI Agents giúp giải biên nguồn lực cho doanh nghiệp của bạn.
        </p>
    </div>

    <!-- Core Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20 relative z-10">
        
        <?php
        $services_query = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => 12,
            'tax_query'      => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => array( 'services', 'dich-vu' ),
                ),
            ),
        ) );

        if ( $services_query->have_posts() ) :
            while ( $services_query->have_posts() ) : $services_query->the_post();
                // Get features or process flow from custom fields
                $process_flow = get_post_meta( get_the_ID(), 'process_flow', true ) ?: 'Tư vấn ➔ Thiết kế ➔ Thực thi ➔ Bàn giao';
                $deliverables = get_post_meta( get_the_ID(), 'deliverables', true );
                $deliverables_list = $deliverables ? explode(',', $deliverables) : array(
                    'Nghiên cứu & Đo lường chuyên sâu thị trường', 
                    'Vận hành chuẩn tốc độ & bảo mật hạ tầng', 
                    'Bàn giao đầy đủ tài chính tri thức bản quyền'
                );
                
                // Get dynamic icon custom field (or default map)
                $icon_svg = get_post_meta( get_the_ID(), 'icon_svg', true ) ?: '<svg class="w-6 h-6 text-goldAccent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
                ?>
                <div class="bg-[#F5F0E8] border border-gray-200 p-6 sm:p-8 rounded-xl space-y-5 hover:border-goldAccent hover:shadow-md transition-all group duration-300">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-white border border-gray-150 rounded-lg text-navyPrimary font-black">
                            <?php echo $icon_svg; ?>
                        </div>
                        <h3 class="text-lg font-black text-navyPrimary group-hover:text-goldAccent transition-colors"><?php the_title(); ?></h3>
                    </div>
                    <div class="text-xs sm:text-[13px] text-gray-500 leading-relaxed text-justify">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="bg-white/60 p-4 rounded-lg border border-gray-200/50 space-y-1">
                        <span class="text-[10px] uppercase font-black tracking-wider text-gray-400 block">Quy trình vận hành:</span>
                        <p class="text-xs font-bold text-navyPrimary"><?php echo esc_html( $process_flow ); ?></p>
                    </div>
                    <div class="space-y-2">
                        <span class="text-[10px] uppercase font-black tracking-wider text-gray-400 block">Kết quả bàn giao:</span>
                        <ul class="text-xs space-y-1.5 font-semibold text-gray-750">
                            <?php foreach ( $deliverables_list as $item ) : ?>
                                <li class="flex items-center gap-1.5"><span class="text-goldAccent">✔</span> <?php echo esc_html( trim($item) ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <div class="col-span-1 md:col-span-2 text-center py-12 bg-[#F5F0E8] border border-gray-250 rounded-xl p-8 space-y-4">
                <span class="text-4xl">💼</span>
                <h3 class="text-lg font-black text-navyPrimary">Hiện Chưa Có Dịch Vụ Nào Được Tạo</h3>
                <p class="text-xs text-gray-500 max-w-md mx-auto">
                    Để trang trí cột dịch vụ tại đây, quý khách vui lòng tạo các **Bài Viết** có tên chuyên mục (Category slug) là: `services` hoặc `dich-vu` trong trang quản lý của WordPress.
                </p>
                <div class="text-[10px] font-mono bg-white border border-gray-200 p-4 rounded text-navyPrimary max-w-lg mx-auto text-left space-y-1 shadow-xs">
                    <strong>Cách thức cấu tạo bài viết dịch vụ:</strong><br>
                    • Gán chuyên mục: `services` hoặc `dich-vu`.<br>
                    • Soạn thảo phần tóm tắt ngắn (Excerpt) làm nội dung giới thiệu.<br>
                    • Khai báo Custom Field `process_flow` (ví dụ: Audit ➔ Tối ưu On-page).<br>
                    • Khai báo Custom Field `deliverables` (mỗi mục cách nhau bằng dấu phẩy) để hiển thị danh sách dạng hộp kiểm ✔.<br>
                    • Khai báo Custom Field `icon_svg` để gán mã SVG biểu tượng tùy chỉnh.
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- Workflow Execution Steps Roadmap -->
    <div class="border-t border-gray-200 pt-16">
        <div class="text-center max-w-xl mx-auto space-y-2 mb-12">
            <span class="text-[10px] text-gray-400 font-extrabold uppercase tracking-widest block">Phương pháp luận</span>
            <h2 class="text-2xl font-black text-navyPrimary tracking-tight uppercase">Quy Trình Triển Khai Chuyên Nghiệp</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 border border-gray-150 rounded-xl space-y-3 relative overflow-hidden">
                <span class="text-4xl font-black text-goldAccent/35 font-mono">01</span>
                <h4 class="text-xs font-black uppercase tracking-wider text-navyPrimary">Tư Vấn Chuyên Sâu</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    Lắng nghe các bài toán kinh doanh cụ thể, rà soát ngân sách và mục tiêu tăng trưởng tự nhiên của khách hàng.
                </p>
            </div>
            <div class="bg-white p-6 border border-gray-150 rounded-xl space-y-3 relative overflow-hidden">
                <span class="text-4xl font-black text-goldAccent/35 font-mono">02</span>
                <h4 class="text-xs font-black uppercase tracking-wider text-navyPrimary">Lên Kế Hoạch Lộ Trình</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    Thiết kế bản vẽ sơ đồ kỹ thuật chi tiết, đề xuất ngân sách đầu tư tinh gọn và đảm bảo bảo mật.
                </p>
            </div>
            <div class="bg-white p-6 border border-gray-150 rounded-xl space-y-3 relative overflow-hidden">
                <span class="text-4xl font-black text-goldAccent/35 font-mono">03</span>
                <h4 class="text-xs font-black uppercase tracking-wider text-navyPrimary">Thực Thi Toàn Diện</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    Triển khai hệ code React/Wordpress chuẩn On-page, cấu tạo luồng n8n mượt mà và tối ưu Core Web Vitals tối đa.
                </p>
            </div>
            <div class="bg-white p-6 border border-gray-150 rounded-xl space-y-3 relative overflow-hidden">
                <span class="text-4xl font-black text-goldAccent/35 font-mono">04</span>
                <h4 class="text-xs font-black uppercase tracking-wider text-navyPrimary">Bàn Giao & Theo Dõi</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    Kiểm định lưu lượng chuyển lead, tối ưu hóa các bẫy, bàn giao bảng tri thức kèm video hướng dẫn cầm tay chỉ việc.
                </p>
            </div>
        </div>
    </div>

    <!-- Bottom CTA block -->
    <div class="mt-16 bg-navyPrimary text-white p-8 sm:p-12 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-6 overflow-hidden relative">
        <div class="space-y-2 max-w-lg">
            <h3 class="text-xl sm:text-2xl font-black text-white leading-tight">Sẵn sàng để bứt phá không giới hạn?</h3>
            <p class="text-xs text-gray-300">Nhấp đặt lịch ngay lập tức để nhận bảng phân tích Audit Entity SEO toàn bộ Website miễn phí trị giá 3.000.000đ.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="bg-goldAccent text-navyPrimary font-extrabold text-xs uppercase tracking-widest px-6 py-4 rounded-lg hover:bg-white transition-all">đặt lịch kiểm toán ngay</a>
    </div>

</main>

<?php get_footer(); ?>
