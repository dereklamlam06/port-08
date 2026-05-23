<?php
/**
 * Template Name: Derek Lâm Custom Homepage Front Page
 */
// Tự động nhận diện nếu bạn chọn trang tĩnh Trang Chủ sử dụng Template Bảo Trì
$front_page_id = get_option('page_on_front');
if ($front_page_id) {
    $template = get_page_template_slug($front_page_id);
    if ($template === 'page-maintenance.php') {
        include(locate_template('page-maintenance.php'));
        exit;
    }
}

get_header(); ?>

<main class="flex-1">

    <!-- Hero Slogan Section -->
    <section class="bg-transparent text-navyPrimary py-16 lg:py-24 px-6 md:px-12 font-sans overflow-hidden relative">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Hero Left Content -->
                <div class="lg:col-span-7 space-y-6 relative z-10">
                    <div class="inline-flex items-center space-x-2 px-3 py-1 bg-[#F5F0E8] border border-gray-200 rounded-full">
                        <svg class="w-3 h-3 text-goldAccent" fill="currentColor" viewBox="0 0 20 20"><path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"></path></svg>
                        <span class="text-[11px] font-bold tracking-widest uppercase text-gray-650"><?php echo esc_html(dl_field('hero_slogan_tag', 'SEO & AI Automation Specialist')); ?></span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-5xl font-black tracking-tight leading-tight text-navyPrimary">
                        <?php echo esc_html(dl_field('hero_title_1', 'Đưa Website Của Bạn')); ?> <br />
                        <span class="text-navyPrimary relative inline-block">
                            <?php echo esc_html(dl_field('hero_title_2', 'Lên Đỉnh Cao Mới')); ?>
                            <span class="absolute bottom-1 left-0 right-0 h-1 bg-goldAccent/40 rounded"></span>
                        </span>
                    </h1>

                    <p class="text-sm md:text-base text-gray-500 leading-relaxed max-w-xl">
                        <?php echo dl_field('hero_desc', 'Kết hợp sức mạnh vượt trội của <strong>SEO thực chiến chuyên sâu</strong> và giải pháp <strong>Tự động hóa bằng AI Agents</strong> để gia tăng gấp bội lượng traffic tự nhiên, tối ưu hóa tỷ lệ chuyển đổi và giải phóng nguồn lực tối đa.'); ?>
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="flex items-center justify-center space-x-2 bg-goldAccent hover:bg-[#E6C200] text-navyPrimary font-bold text-sm px-6 py-3.5 rounded-lg transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                            <span><?php echo esc_html(dl_field('hero_btn_text', 'Liên Hệ Tư Vấn Ngay')); ?></span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        
                        <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="flex items-center justify-center space-x-2 border border-navyPrimary hover:bg-navyPrimary hover:text-white transition-all text-sm font-bold text-navyPrimary px-6 py-3.5 rounded-lg">
                            <span>Xem Gói Dịch Vụ</span>
                        </a>
                    </div>

                    <!-- Quick Benefits Tags -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 border-t border-gray-200">
                        <div class="flex items-center space-x-2 text-xs text-gray-600">
                            <span class="text-goldAccent">★</span>
                            <span class="font-semibold"><?php echo esc_html(dl_field('benefit_1', 'Bứt phá thứ hạng từ khóa')); ?></span>
                        </div>
                        <div class="flex items-center space-x-2 text-xs text-gray-600">
                            <span class="text-goldAccent">★</span>
                            <span class="font-semibold"><?php echo esc_html(dl_field('benefit_2', 'Tích hợp AI trợ lý 24/7')); ?></span>
                        </div>
                        <div class="flex items-center space-x-2 text-xs text-gray-600">
                            <span class="text-goldAccent">★</span>
                            <span class="font-semibold"><?php echo esc_html(dl_field('benefit_3', 'Cam kết vận hành chuẩn SEO')); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Hero Right Visual Column - Styled beautiful yellow launcher shape or dynamic ACF image upload -->
                <div class="lg:col-span-5 flex justify-center">
                    <?php 
                    $hero_image_url = dl_field('hero_image', ''); 
                    if ($hero_image_url) : 
                    ?>
                        <div class="relative w-72 h-72 sm:w-80 sm:h-80 md:w-96 md:h-96 rounded-2xl overflow-hidden shadow-2xl border border-gray-250 bg-white p-2">
                            <img src="<?php echo esc_url($hero_image_url); ?>" alt="Derek Lâm Specialist" class="w-full h-full object-cover rounded-xl">
                        </div>
                    <?php else : ?>
                        <!-- Default high-end abstract design fallback if no custom image is declared in ACF -->
                        <div class="relative w-72 h-72 sm:w-80 sm:h-80 md:w-96 md:h-96 rounded-2xl bg-gradient-to-tr from-[#F5F0E8] to-white border border-gray-200 shadow-xl flex items-center justify-center p-8">
                            <!-- Decorative nodes -->
                            <div class="absolute top-8 left-8 w-3 h-3 rounded-full bg-goldAccent/40 animate-ping"></div>
                            <div class="absolute bottom-12 right-12 w-4 h-4 rounded-full bg-navyPrimary/10"></div>
                            <div class="absolute top-1/4 right-8 w-2 h-2 rounded-full bg-goldAccent"></div>

                            <!-- Main Visual Core Card with smooth animation simulation -->
                            <div class="w-48 h-48 md:w-56 md:h-56 rounded-2xl bg-goldAccent shadow-2xl flex flex-col items-center justify-center relative select-none animate-bounce" style="animation-duration: 4s;">
                                <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-md animate-pulse">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                                </div>
                                <div class="absolute -bottom-4 bg-navyPrimary text-white text-[10px] uppercase font-bold tracking-widest px-4 py-1.5 rounded-lg shadow-md">
                                    PRO LEVEL STRATEGY
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Aggregate Performance Metrics Strip -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 lg:mt-24 pt-8 border-t border-b border-gray-250 pb-8 bg-white/50 backdrop-blur-md px-6 rounded-xl">
                <div class="text-center md:text-left space-y-1">
                    <h3 class="text-3xl font-black text-navyPrimary tracking-tight">+187%</h3>
                    <p class="text-[11px] font-black uppercase text-gray-800 tracking-wide">Tăng Trưởng Traffic</p>
                    <p class="text-[11px] text-gray-400">Bình quân các chiến dịch</p>
                </div>
                <div class="text-center md:text-left space-y-1">
                    <h3 class="text-3xl font-black text-navyPrimary tracking-tight">23</h3>
                    <p class="text-[11px] font-black uppercase text-gray-800 tracking-wide">Keywords Top 10</p>
                    <p class="text-[11px] text-gray-400">Dẫn đầu các từ khóa khó</p>
                </div>
                <div class="text-center md:text-left space-y-1">
                    <h3 class="text-3xl font-black text-navyPrimary tracking-tight">02</h3>
                    <p class="text-[11px] font-black uppercase text-gray-800 tracking-wide">Dự Án Lớn</p>
                    <p class="text-[11px] text-gray-400">Mỹ phẩm & Bất Động Sản</p>
                </div>
                <div class="text-center md:text-left space-y-1">
                    <h3 class="text-3xl font-black text-navyPrimary tracking-tight">06</h3>
                    <p class="text-[11px] font-black uppercase text-gray-800 tracking-wide">Tháng Đạt Đỉnh</p>
                    <p class="text-[11px] text-gray-400">Thời gian trung bình</p>
                </div>
            </div>

            <!-- Tools strip -->
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-between gap-6 opacity-60">
                <span class="text-[11px] font-bold uppercase tracking-wider text-gray-500">CÔNG CỤ PHÂN TÍCH:</span>
                <div class="flex flex-wrap items-center justify-center gap-6 md:gap-12 text-xs font-mono font-bold text-gray-650">
                    <span>GOOGLE SEARCH CONSOLE</span>
                    <span>GOOGLE ANALYTICS 4</span>
                    <span>SEMRUSH</span>
                    <span>AHREFS</span>
                    <span>OPENAI API</span>
                    <span>MAKE / N8N</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Band (Reviews Section) -->
    <section class="bg-navyPrimary text-white py-16 px-6 md:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="space-y-3.5 border-l-2 border-goldAccent pl-5">
                <div class="text-goldAccent font-black text-sm">★★★★★</div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-goldAccent">Định Hướng Thực Chiến</h4>
                <p class="text-xs text-gray-300 leading-relaxed">
                    "Sau 4 tháng triển khai chiến dịch SEO chuyên nghiệp cùng Derek Lâm, organic traffic nhãn mỹ phẩm của chúng tôi tăng vượt bậc <strong>+210%</strong>, lọt top 3 danh mục bán chạy nhất thị trường."
                </p>
                <span class="text-[10px] text-gray-500 font-bold block">— Giám đốc Marketing, Nhãn hàng Mỹ phẩm Mỹ</span>
            </div>

            <!-- Testimonial 2 -->
            <div class="space-y-3.5 border-l-2 border-goldAccent pl-5">
                <div class="text-goldAccent font-black text-sm">★★★★★</div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-goldAccent">Tự Động Hóa Vượt Bậc</h4>
                <p class="text-xs text-gray-300 leading-relaxed">
                    "Giải pháp tích hợp AI chatbot và tự động hóa Make.com giúp hệ thống kinh doanh bất động sản của chúng tôi đồng bộ lead tự động 100%, tỷ lệ phản hồi đáp ứng giảm từ 30 phút xuống còn <strong>10 giây</strong>."
                </p>
                <span class="text-[10px] text-gray-500 font-bold block">— Lê Minh Quốc, CEO TechStart JSC</span>
            </div>

            <!-- Testimonial 3 -->
            <div class="space-y-3.5 border-l-2 border-goldAccent pl-5">
                <div class="text-goldAccent font-black text-sm">★★★★★</div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-goldAccent">Website Tải Trang Thần Tốc</h4>
                <p class="text-xs text-gray-300 leading-relaxed">
                    "Trang đích load trong vòng vỏn vẹn <strong>0.8 giây</strong>, thiết kế tối giản cực sang trọng, tích hợp trơn tru cổng mua bán khiến tỉ lệ chốt đơn (CVR) cải thiện ngay lập tức thêm 15%."
                </p>
                <span class="text-[10px] text-gray-500 font-bold block">— Trần Phương Thảo, Founder ScentLux</span>
            </div>
        </div>
    </section>

    <!-- Core Services Teaser grid -->
    <section class="py-16 px-6 md:px-12 max-w-7xl mx-auto space-y-12">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <span class="text-[10px] text-goldAccent font-bold uppercase tracking-widest block">Dịch vụ thế mạnh</span>
                <h3 class="text-2xl sm:text-3xl font-black tracking-tight text-navyPrimary">Giải Pháp Toàn Diện</h3>
            </div>
            <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="flex items-center space-x-1 text-xs font-bold uppercase tracking-wider text-gray-800 hover:text-goldAccent transition-colors">
                <span>Xem Tất Cả Gói Dịch Vụ</span>
                <span>➔</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3">
                <h4 class="text-sm font-black uppercase tracking-wide text-navyPrimary">SEO Fullstack</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Đột phá thứ hạng tự nhiên thông qua Technical Audit, cấu trúc dữ liệu schema, On-page chuẩn chỉ & xây dựng liên kết sạch chuẩn Google.
                </p>
            </div>
            <div class="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3">
                <h4 class="text-sm font-black uppercase tracking-wide text-navyPrimary">Lập Trình Web Luxury</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Thiết kế kiến tạo website bằng React/WordPress mượt mà, tải nhanh tức thì dưới 1s, tương thích 100% di động, cấu bản chuẩn SEO on-page từ lúc code.
                </p>
            </div>
            <div class="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3">
                <h4 class="text-sm font-black uppercase tracking-wide text-navyPrimary">AI & Automation</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Kết nối CRM, Google Sheets tự động, lập chatbot AI RAG trả lời tự tin 24/7, giúp tiết kiệm ít nhất 40% chi phí vận hành nghiệp vụ.
                </p>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
