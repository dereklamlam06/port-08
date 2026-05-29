<?php
/**
 * Template Name: Derek Flow Custom Homepage Front Page
 */
// Tự động nhận diện nếu bạn chọn trang tĩnh Trang Chủ sử dụng Template Bảo Trì hoặc bật chế độ bảo trì toàn trang
if (defined('DEREK_LAM_MAINTENANCE_MODE') && DEREK_LAM_MAINTENANCE_MODE) {
    include(locate_template('page-maintenance.php'));
    exit;
}
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
                            <img src="<?php echo esc_url($hero_image_url); ?>" alt="Derek Flow Specialist" class="w-full h-full object-cover rounded-xl">
                        </div>
                    <?php else : ?>
                        <!-- Match high-end interactive light representation -->
                        <div class="relative w-full max-w-[420px] rounded-2xl bg-[#FDFBF7] border border-gray-200 shadow-xl p-6 overflow-hidden select-none font-sans text-[#1A1A2E]">
                            
                            <!-- Browser window top controls -->
                            <div class="flex items-center justify-between border-b border-gray-150 pb-3 mb-4">
                                <div class="flex items-center space-x-2">
                                    <div class="flex space-x-1.5">
                                        <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
                                    </div>
                                    <span class="text-[10px] font-bold text-gray-400 tracking-wider font-mono">DEREK.FLOW // SEO_REPORT</span>
                                </div>
                                <div class="flex items-center space-x-1 bg-green-50 text-green-700 border border-green-200 px-2.5 py-0.5 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                    <span class="text-[8px] font-extrabold uppercase tracking-widest">Active Track</span>
                                </div>
                            </div>

                            <!-- Core Analytics Showcase -->
                            <div class="space-y-4">
                                <div class="bg-[#F5F0E8] border border-gray-200/60 rounded-xl p-4 flex items-center justify-between">
                                    <div class="space-y-0.5 animate-pulse">
                                        <span class="text-[9px] font-extrabold uppercase text-gray-400 tracking-wider">Organic Search traffic</span>
                                        <div class="flex items-baseline space-x-1.5">
                                            <span class="text-2xl font-extrabold text-[#1A1A2E] tracking-tight">482.3K</span>
                                            <span class="text-[11px] text-green-600 font-extrabold">+187%</span>
                                        </div>
                                    </div>
                                    <div class="p-2.5 bg-white border border-gray-100 rounded-lg text-[#FFD700] shadow-xs">
                                        <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                    </div>
                                </div>

                                <!-- Keyword Rank Tracker Simulation -->
                                <div class="space-y-2.5">
                                    <span class="text-[9px] font-bold uppercase text-gray-400 tracking-widest pl-1">Bứt Phá Thứ Hạng Từ Khóa</span>
                                    
                                    <div class="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-xs hover:border-[#FFD700] transition-colors">
                                        <div class="flex items-center gap-2">
                                            <span class="text-[#FFD700] text-sm">★</span>
                                            <span class="font-bold text-[#1A1A2E]">"dịch vụ seo chiến lược"</span>
                                        </div>
                                        <span class="bg-[#1A1A2E] text-[#FFD700] text-[9px] font-extrabold px-2 py-1 rounded">TOP 1</span>
                                    </div>

                                    <div class="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-xs hover:border-[#FFD700] transition-colors">
                                        <div class="flex items-center gap-2">
                                            <span class="text-[#FFD700] text-sm">★</span>
                                            <span class="font-bold text-[#1A1A2E]">"tự động hóa marketing AI"</span>
                                        </div>
                                        <span class="bg-[#1A1A2E] text-[#FFD700] text-[9px] font-extrabold px-2 py-1 rounded">TOP 2</span>
                                    </div>

                                    <div class="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-xs hover:border-[#FFD700] transition-colors">
                                        <div class="flex items-center gap-2">
                                            <span class="text-[#FFD700] text-sm">★</span>
                                            <span class="font-bold text-[#1A1A2E]">"quy trình n8n setup"</span>
                                        </div>
                                        <span class="bg-[#1A1A2E] text-[#FFD700] text-[9px] font-extrabold px-2 py-1 rounded">TOP 1</span>
                                    </div>
                                </div>

                                <!-- Status indicator bar -->
                                <div class="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-[11px] text-gray-500">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                        <span>AI Agent tự động vận hành...</span>
                                    </div>
                                    <span class="font-mono text-xs font-bold text-[#1A1A2E]">100% OK</span>
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
                    "Sau 4 tháng triển khai chiến dịch SEO chuyên nghiệp cùng Derek Flow, organic traffic nhãn mỹ phẩm của chúng tôi tăng vượt bậc <strong>+210%</strong>, lọt top 3 danh mục bán chạy nhất thị trường."
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

    <!-- Technical Standards Section -->
    <section id="technical-standards" class="bg-[#121315] text-white py-16 px-6 md:px-12 rounded-xl border border-gray-800 my-12 shadow-2xl mx-auto max-w-7xl relative z-10">
        <div class="space-y-10">
            <!-- Header section with technical style -->
            <div class="border-b border-gray-800 pb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div class="space-y-2">
                    <div class="inline-flex items-center space-x-2 px-2.5 py-0.5 bg-[#FFD700]/10 border border-[#FFD700]/30 rounded-full text-xs font-bold text-[#FFD700] uppercase tracking-wider">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Phương Pháp Thực Nghiệm Đặc Thù</span>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-extrabold tracking-tight" style="color: #ffffff !important;">
                        <?php echo esc_html(dl_field('tech_specs_title', 'Bản Vẽ Thực Thi & Tiêu Chuẩn Cam Kết')); ?>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-400 max-w-2xl">
                        <?php echo esc_html(dl_field('tech_specs_desc', 'Thay vì sử dụng các feedback văn bản khó kiểm chứng từ tài khoản ảo, Derek Flow tự tin phơi bày toàn bộ triết lý xây dựng kỹ thuật thực tế giúp dự án của bạn tăng trưởng bền vững trước mọi thuật toán.')); ?>
                    </p>
                </div>

                <!-- Tab Selector Buttons -->
                <div class="flex flex-wrap gap-2 shrink-0">
                    <button id="btn-tab-vitals" onclick="switchTechTab('vitals')" class="tech-tab-btn px-3.5 py-2 rounded-lg text-xs font-bold uppercase transition-all flex items-center gap-2 border bg-[#FFD700] text-[#121315] border-[#FFD700]">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                        <span><?php echo esc_html(dl_field('tech_spec_t1_badge', 'Performance Index')); ?></span>
                    </button>
                    <button id="btn-tab-schema" onclick="switchTechTab('schema')" class="tech-tab-btn px-3.5 py-2 rounded-lg text-xs font-bold uppercase transition-all flex items-center gap-2 border bg-[#1E2022] text-gray-400 border-gray-800 hover:text-white hover:bg-gray-800">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span><?php echo esc_html(dl_field('tech_spec_t2_badge', 'Entity & Schema')); ?></span>
                    </button>
                    <button id="btn-tab-silo" onclick="switchTechTab('silo')" class="tech-tab-btn px-3.5 py-2 rounded-lg text-xs font-bold uppercase transition-all flex items-center gap-2 border bg-[#1E2022] text-gray-400 border-gray-800 hover:text-white hover:bg-gray-800">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span><?php echo esc_html(dl_field('tech_spec_t3_badge', 'Crawl Optimization')); ?></span>
                    </button>
                </div>
            </div>

            <!-- Comparison content & Playground container -->
            <div class="grid grid-cols-1 gap-8 items-stretch">
                
                <!-- Info Tab 1: Vitals -->
                <div id="tab-content-vitals" class="tech-tab-content grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <div class="inline-block text-[10px] uppercase font-bold text-[#FFD700] tracking-widest px-2 py-0.5 bg-gray-800/60 rounded">
                                ⚡ <?php echo esc_html(dl_field('tech_spec_t1_badge', 'Performance Index')); ?>
                            </div>
                            <h4 class="text-xl font-bold tracking-tight" style="color: #ffffff !important;">
                                <?php echo esc_html(dl_field('tech_spec_t1_title', 'Tối Ưu Tốc Độ Tải Trang (Core Web Vitals)')); ?>
                            </h4>
                            <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                                <?php echo esc_html(dl_field('tech_spec_t1_desc', 'Website tải nhanh, mượt mà kể cả dựng bằng code tay gọn nhẹ hay Elementor kéo thả thông qua việc dọn dẹp asset dư thừa, tải lười hình ảnh thế hệ mới.')); ?>
                            </p>
                        </div>

                        <!-- Comparison boxes -->
                        <div class="space-y-4 pt-4 border-t border-gray-800/80">
                            <div class="bg-[#1E1113]/45 border border-red-900/40 rounded-lg p-3.5 space-y-2">
                                <div class="flex items-center gap-2 text-red-400 text-xs font-bold uppercase tracking-wider">
                                    <svg class="w-3.5 h-3.5 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    <span>Cách làm phổ thông trên thị trường</span>
                                </div>
                                <p class="text-xs text-gray-400 leading-relaxed">
                                    <?php echo esc_html(dl_field('tech_spec_t1_std', 'Sử dụng quá nhiều plugin dư thừa hoặc không cấu hình tối ưu tài nguyên, không nén ảnh và không dọn rác CSS/JS dẫn đến tốc độ load chậm chạp.')); ?>
                                </p>
                            </div>

                            <div class="bg-[#111E15]/45 border border-green-900/40 rounded-lg p-3.5 space-y-2">
                                <div class="flex items-center gap-2 text-green-400 text-xs font-bold uppercase tracking-wider">
                                    <svg class="w-3.5 h-3.5 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                    <span>Giải pháp kỹ thuật của Derek Flow</span>
                                </div>
                                <p class="text-xs text-gray-300 leading-relaxed">
                                    <?php echo esc_html(dl_field('tech_spec_t1_derek', 'Tối ưu hóa sâu mã nguồn WordPress custom theme hoặc Elementor kéo thả sạch sẽ, dọn bỏ asset không dùng, tối ưu Cache máy chủ vận hành mượt mà.')); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7 flex flex-col rounded-xl overflow-hidden bg-[#181A1F] border border-gray-800 shadow-inner min-h-[320px] relative">
                        <?php 
                        $t1_image = dl_field('tech_spec_t1_image', '');
                        if (!empty($t1_image)): ?>
                            <img src="<?php echo esc_url($t1_image); ?>" alt="GTmetrix Core Web Vitals" class="w-full h-full object-cover">
                        <?php else: ?>
                            <!-- Styled Terminal fallback -->
                            <div class="bg-[#21252B] px-4 py-2 flex items-center justify-between border-b border-gray-900 select-none">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#FF5F56]"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#FFBD2E]"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#27C93F]"></span>
                                    <div class="ml-4 flex items-center space-x-1.5 bg-[#181A1F] px-3 py-1 rounded-t-md text-gray-300 border-t-2 border-[#FFD700] text-[11px]">
                                        <span>functions.php (WordPress)</span>
                                    </div>
                                </div>
                                <span class="text-[10px] text-gray-500 uppercase font-mono">php</span>
                            </div>
                            <div class="p-4 bg-[#181A1F] flex-1 overflow-x-auto text-gray-300 leading-relaxed font-mono text-xs">
                                <pre><span class="text-green-500">// Gỡ bỏ CSS/JS dư thừa của block-library/Gutenberg nếu không sử dụng</span>
add_action('wp_enqueue_scripts', 'derek_optimize_assets', 100);

function derek_optimize_assets() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_script('wp-embed');
    
    if (!is_admin()) {
        wp_deregister_script('jquery-migrate');
    }
}</pre>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Info Tab 2: Schema -->
                <div id="tab-content-schema" class="tech-tab-content grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch hidden">
                    <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <div class="inline-block text-[10px] uppercase font-bold text-[#FFD700] tracking-widest px-2 py-0.5 bg-gray-800/60 rounded">
                                ⚡ <?php echo esc_html(dl_field('tech_spec_t2_badge', 'Entity & Schema')); ?>
                            </div>
                            <h4 class="text-xl font-bold tracking-tight" style="color: #ffffff !important;">
                                <?php echo esc_html(dl_field('tech_spec_t2_title', 'Lập Chỉ Mục Thực Thể & JSON-LD Khắt Khe')); ?>
                            </h4>
                            <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                                <?php echo esc_html(dl_field('tech_spec_t2_desc', 'Khai báo dữ liệu có cấu trúc đúng biểu đồ tri thức (Knowledge Graph) giúp Google Bot nhận diện thương hiệu của bạn chuẩn xác.')); ?>
                            </p>
                        </div>

                        <!-- Comparison boxes -->
                        <div class="space-y-4 pt-4 border-t border-gray-800/80">
                            <div class="bg-[#1E1113]/45 border border-red-900/40 rounded-lg p-3.5 space-y-2">
                                <div class="flex items-center gap-2 text-red-400 text-xs font-bold uppercase tracking-wider">
                                    <svg class="w-3.5 h-3.5 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    <span>Cách làm phổ thông trên thị trường</span>
                                </div>
                                <p class="text-xs text-gray-400 leading-relaxed">
                                    <?php echo esc_html(dl_field('tech_spec_t2_std', 'Cài đặt chung chung thông qua các plugin SEO tự động dẫn đến xung đột cú pháp, thiếu định danh tác giả (Author) và giấy phép xuất bản chính thống.')); ?>
                                </p>
                            </div>

                            <div class="bg-[#111E15]/45 border border-green-900/40 rounded-lg p-3.5 space-y-2">
                                <div class="flex items-center gap-2 text-green-400 text-xs font-bold uppercase tracking-wider">
                                    <svg class="w-3.5 h-3.5 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                    <span>Giải pháp kỹ thuật của Derek Flow</span>
                                </div>
                                <p class="text-xs text-gray-300 leading-relaxed">
                                    <?php echo esc_html(dl_field('tech_spec_t2_derek', 'Xây dựng sơ đồ thực thể thực tế tùy biến độc bản, gắn kết hồ sơ LinkedIn/Github thực tế, thiết lập quan hệ cha-con mạch lạc cho mạng lưới từ khóa.')); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7 flex flex-col rounded-xl overflow-hidden bg-[#181A1F] border border-gray-800 shadow-inner min-h-[320px] relative">
                        <?php 
                        $t2_image = dl_field('tech_spec_t2_image', '');
                        if (!empty($t2_image)): ?>
                            <img src="<?php echo esc_url($t2_image); ?>" alt="Structured Data Schema" class="w-full h-full object-cover">
                        <?php else: ?>
                            <!-- Styled Terminal fallback -->
                            <div class="bg-[#21252B] px-4 py-2 flex items-center justify-between border-b border-gray-900 select-none">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#FF5F56]"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#FFBD2E]"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#27C93F]"></span>
                                    <div class="ml-4 flex items-center space-x-1.5 bg-[#181A1F] px-3 py-1 rounded-t-md text-gray-300 border-t-2 border-[#FFD700] text-[11px]">
                                        <span>public/schema-service.json</span>
                                    </div>
                                </div>
                                <span class="text-[10px] text-gray-500 uppercase font-mono">json</span>
                            </div>
                            <div class="p-4 bg-[#181A1F] flex-1 overflow-x-auto text-gray-300 leading-relaxed font-mono text-xs">
                                <pre>{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "Derek Flow Specialist",
  "description": "Premium SEO Strategy & Web Development",
  "priceRange": "$$$",
  "sameAs": [
    "https://www.linkedin.com/in/derekflow",
    "https://github.com/derekflow"
  ]
}</pre>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Info Tab 3: Silo -->
                <div id="tab-content-silo" class="tech-tab-content grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch hidden">
                    <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <div class="inline-block text-[10px] uppercase font-bold text-[#FFD700] tracking-widest px-2 py-0.5 bg-gray-800/60 rounded">
                                ⚡ <?php echo esc_html(dl_field('tech_spec_t3_badge', 'Crawl Optimization')); ?>
                            </div>
                            <h4 class="text-xl font-bold tracking-tight" style="color: #ffffff !important;">
                                <?php echo esc_html(dl_field('tech_spec_t3_title', 'Phân Dòng Liên Kết SILO & Crawl Budget')); ?>
                            </h4>
                            <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                                <?php echo esc_html(dl_field('tech_spec_t3_desc', 'Điều hướng dòng chảy sức mạnh website (Link Juice) đi đúng trọng tâm bán hàng thay vì phân tán vào các trang rác vô giá trị.')); ?>
                            </p>
                        </div>

                        <!-- Comparison boxes -->
                        <div class="space-y-4 pt-4 border-t border-gray-800/80">
                            <div class="bg-[#1E1113]/45 border border-red-900/40 rounded-lg p-3.5 space-y-2">
                                <div class="flex items-center gap-2 text-red-400 text-xs font-bold uppercase tracking-wider">
                                    <svg class="w-3.5 h-3.5 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    <span>Cách làm phổ thông trên thị trường</span>
                                </div>
                                <p class="text-xs text-gray-400 leading-relaxed">
                                    <?php echo esc_html(dl_field('tech_spec_t3_std', 'Để liên kết tự do vô tội vạ, robot Google lãng phí ngân sách cào dữ liệu (Crawl Budget) vào các trang trùng lặp, URL rác hoặc tham số truy vấn.')); ?>
                                </p>
                            </div>

                            <div class="bg-[#111E15]/45 border border-green-900/40 rounded-lg p-3.5 space-y-2">
                                <div class="flex items-center gap-2 text-green-400 text-xs font-bold uppercase tracking-wider">
                                    <svg class="w-3.5 h-3.5 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                    <span>Giải pháp kỹ thuật của Derek Flow</span>
                                </div>
                                <p class="text-xs text-gray-300 leading-relaxed">
                                    <?php echo esc_html(dl_field('tech_spec_t3_derek', 'Cấu trúc danh sách liên kết hình phễu chuẩn chỉ, chặn tuyệt đối luồng vô giá trị thông qua file Robots.txt chặt chẽ và sitemap phân nhánh phân tần.')); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7 flex flex-col rounded-xl overflow-hidden bg-[#181A1F] border border-gray-800 shadow-inner min-h-[320px] relative">
                        <?php 
                        $t3_image = dl_field('tech_spec_t3_image', '');
                        if (!empty($t3_image)): ?>
                            <img src="<?php echo esc_url($t3_image); ?>" alt="Robots.txt Optimization sitemap" class="w-full h-full object-cover">
                        <?php else: ?>
                            <!-- Styled Terminal fallback -->
                            <div class="bg-[#21252B] px-4 py-2 flex items-center justify-between border-b border-gray-900 select-none">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#FF5F56]"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#FFBD2E]"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#27C93F]"></span>
                                    <div class="ml-4 flex items-center space-x-1.5 bg-[#181A1F] px-3 py-1 rounded-t-md text-gray-300 border-t-2 border-[#FFD700] text-[11px]">
                                        <span>public/robots.txt</span>
                                    </div>
                                </div>
                                <span class="text-[10px] text-gray-500 uppercase font-mono">plaintext</span>
                            </div>
                            <div class="p-4 bg-[#181A1F] flex-1 overflow-x-auto text-gray-300 leading-relaxed font-mono text-xs">
                                <pre>User-agent: *
Allow: /wp-content/uploads/
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /cgi-bin/
Disallow: *?s=
Disallow: *&preview=

Sitemap: https://derek.flow/sitemap_index.xml</pre>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- JavaScript block inside front-page for interactive tabs -->
    <script>
        function switchTechTab(tabId) {
            // Hide all tab content
            document.querySelectorAll('.tech-tab-content').forEach(function(el) {
                el.classList.add('hidden');
            });
            // Show target tab content
            var activeContent = document.getElementById('tab-content-' + tabId);
            if (activeContent) {
                activeContent.classList.remove('hidden');
            }

            // Reset active button styling
            document.querySelectorAll('.tech-tab-btn').forEach(function(el) {
                el.className = 'tech-tab-btn px-3.5 py-2 rounded-lg text-xs font-bold uppercase transition-all flex items-center gap-2 border bg-[#1E2022] text-gray-400 border-gray-800 hover:text-white hover:bg-gray-800';
            });
            // Apply active styles to clicked button
            var activeBtn = document.getElementById('btn-tab-' + tabId);
            if (activeBtn) {
                activeBtn.className = 'tech-tab-btn px-3.5 py-2 rounded-lg text-xs font-bold uppercase transition-all flex items-center gap-2 border bg-[#FFD700] text-[#121315] border-[#FFD700]';
            }
        }
    </script>

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
                <h4 class="text-sm font-black uppercase tracking-wide text-navyPrimary">Thiết Kế Web WordPress</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Thiết kế và xây dựng giao diện website tối giản qua Custom Theme hoặc Elementor chuẩn chỉ, tối ưu tài nguyên, thân thiện di động và sẵn sàng chuẩn SEO on-page.
                </p>
            </div>
            <div class="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3">
                <h4 class="text-sm font-black uppercase tracking-wide text-navyPrimary">Tối Ưu Tốc Độ & CRO</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Phân tích bản đồ nhiệt, tinh giản mã nguồn và sửa đổi trải nghiệm người dùng giúp giữ chân khách hàng và đột phá tỷ lệ mua hàng tự nhiên.
                </p>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
