<?php
/**
 * Template Name: Derek Flow Giá Webpage
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-[#1A1A2E] bg-[#FAFAF7] relative">
    <div class="max-w-7xl mx-auto space-y-16">
        <!-- Title Section -->
        <div class="text-center max-w-2xl mx-auto space-y-4">
            <span class="text-[11px] font-bold tracking-widest uppercase text-[#FFD700] bg-[#1A1A2E] px-3 py-1 rounded inline-block font-mono">Chi phí đầu tư rõ ràng</span>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">Bảng Giá Dịch Vụ SEO & AI</h1>
            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-md mx-auto">
                Các gói giải pháp được thiết kế tối giản, minh bạch các hạng mục bàn giao nhằm tập trung tối đa tối ưu hóa chuyển đổi thực tế cho doanh nghiệp.
            </p>
        </div>

        <!-- Pre-configured Packages Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
            
            <!-- Plan 1: SEO Starter -->
            <div class="border border-gray-200 bg-white rounded-lg p-6 md:p-8 flex flex-col justify-between relative shadow-sm transition-all duration-300 hover:shadow-md">
                <div class="space-y-6">
                    <div class="space-y-2">
                        <h3 class="text-lg font-extrabold tracking-wide uppercase text-navyPrimary">SEO Starter</h3>
                        <p class="text-xs text-gray-500 leading-relaxed min-h-[40px]">
                            Phù hợp cho doanh nghiệp mới bắt đầu xây dựng hiện diện số.
                        </p>
                    </div>

                    <div class="border-t border-b py-4 border-gray-200/50 flex items-baseline gap-1.5 matches">
                        <span class="text-2xl sm:text-3xl font-extrabold tracking-tighter" id="plan1-price-display">
                            15,000,000
                        </span>
                        <span class="text-[11px] font-semibold text-gray-400">
                            VNĐ / Tháng
                        </span>
                    </div>

                    <ul class="space-y-3 pt-2 text-xs">
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Nghiên cứu sâu 50 từ khóa mục tiêu</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Tối ưu hóa On-page cấu trúc 10 trang</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Thiết lập Google Search Console & GA4</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Kiểm tra & vá lỗi Technical SEO cơ bản</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Báo cáo hiệu quả & thứ hạng từ khóa hàng tháng</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-8">
                    <button onclick="openCheckout('SEO Starter', 15000000)" class="w-full text-center text-xs font-bold uppercase tracking-wider py-3.5 rounded bg-[#F4F4F1] hover:bg-gray-200 text-[#1A1A2E] border border-gray-300 shadow-sm hover:shadow transition-all hover:-translate-y-0.5 cursor-pointer">
                        Đăng Ký Khởi Chạy
                    </button>
                </div>
            </div>

            <!-- Plan 2: SEO Pro (Gold Highlighted) -->
            <div class="border border-[#FFD700] derek-gold-card ring-2 ring-[#FFD700]/20 rounded-lg p-6 md:p-8 flex flex-col justify-between relative shadow-md transition-all duration-300 hover:shadow-lg -translate-y-1">
                <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#FFD700] text-[#1A1A2E] text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                    PHỔ BIẾN NHẤT
                </span>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <h3 class="text-lg font-extrabold tracking-wide uppercase text-navyPrimary">SEO Pro</h3>
                        <p class="text-xs text-gray-500 leading-relaxed min-h-[40px]">
                            Chiến dịch tổng lực dành cho doanh nghiệp bứt phá đầu ngành.
                        </p>
                    </div>

                    <div class="border-t border-b py-4 border-gray-200/50 flex items-baseline gap-1.5 matches">
                        <span class="text-2xl sm:text-3xl font-extrabold tracking-tighter" id="plan2-price-display">
                            35,000,000
                        </span>
                        <span class="text-[11px] font-semibold text-gray-400">
                            VNĐ / Tháng
                        </span>
                    </div>

                    <ul class="space-y-3 pt-2 text-xs">
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Nghiên cứu từ khóa không giới hạn</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">SEO Audit chuyên sâu định kỳ hàng tuần</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Chiến lược content cluster sáng tạo</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Xây dựng backlink chất lượng cao bền vững</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Phân tích hành vi đối thủ cạnh tranh 24/7</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Báo cáo thống kê chuyển đổi Analytics trực quan</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-8">
                    <button onclick="openCheckout('SEO Pro', 35000000)" class="w-full text-center text-xs font-bold uppercase tracking-wider py-3.5 rounded bg-[#1A1A2E] hover:bg-neutral-800 text-white shadow-sm hover:shadow transition-all hover:-translate-y-0.5 cursor-pointer">
                        Đăng Ký Khởi Chạy
                    </button>
                </div>
            </div>

            <!-- Plan 3: AI & Automation (Dark Theme) -->
            <div class="bg-[#1A1A2E] text-[#E2E3E0] border border-gray-800 rounded-lg p-6 md:p-8 flex flex-col justify-between relative shadow-sm transition-all duration-300 hover:shadow-md">
                <div class="space-y-6">
                    <div class="space-y-2">
                        <h3 class="text-lg font-extrabold tracking-wide uppercase text-white">AI & Automation</h3>
                        <p class="text-xs text-gray-400 leading-relaxed min-h-[40px]">
                            Tự động hóa vận hành & tích hợp AI tăng năng lực cạnh tranh.
                        </p>
                    </div>

                    <div class="border-t border-b py-4 border-gray-800 flex items-baseline gap-1.5 matches">
                        <span class="text-2xl sm:text-3xl font-extrabold tracking-tighter text-white" id="plan3-price-display">
                            60,000,000
                        </span>
                        <span class="text-[11px] font-semibold text-gray-400">
                            VNĐ / Dự Án
                        </span>
                    </div>

                    <ul class="space-y-3 pt-2 text-xs">
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Xây dựng Chatbot AI phản hồi tự động RAG</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Hệ thống tự động hóa Marketing (Make.com/N8N)</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Đồng bộ hóa dữ liệu tự động CRM & ERP</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Scraping Bots thu thập thông tin tự động</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Hệ thống báo cáo tự sinh KPI tự động</span>
                        </li>
                        <li class="flex items-start space-x-2 text-xs">
                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                            <span class="leading-relaxed">Quản trị an toàn chuẩn bảo mật hệ thống độc lập</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-8">
                    <button onclick="openCheckout('AI & Automation', 60000000)" class="w-full text-center text-xs font-bold uppercase tracking-wider py-3.5 rounded bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] shadow-sm hover:shadow transition-all hover:-translate-y-0.5 cursor-pointer">
                        Đăng Ký Khởi Chạy
                    </button>
                </div>
            </div>
            
            <?php
            // Dynamic packages mapping from WP database
            $pricing_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'tax_query'      => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => array( 'pricing', 'bang-gia' ),
                    ),
                ),
            ) );

            if ( $pricing_query->have_posts() ) {
                while ( $pricing_query->have_posts() ) {
                    $pricing_query->the_post();
                    $raw_price = get_post_meta( get_the_ID(), 'plan_price', true ) ?: '30000000';
                    $clean_price = floatval(preg_replace('/[^0-9]/', '', $raw_price));
                    if (!$clean_price) $clean_price = 30000000;
                    $price_period = get_post_meta( get_the_ID(), 'plan_period', true ) ?: 'Tháng';
                    $features_meta = get_post_meta( get_the_ID(), 'plan_features', true );
                    $features_list = $features_meta ? explode(',', $features_meta) : array('Onpage SEO', 'Audit SEO Code');
                    $is_popular_meta = get_post_meta( get_the_ID(), 'plan_popular', true );
                    $is_popular = ($is_popular_meta === 'yes' || $is_popular_meta === '1' || $is_popular_meta === 'true');

                    if ($is_popular) {
                        ?>
                        <div class="border border-[#FFD700] derek-gold-card ring-2 ring-[#FFD700]/20 rounded-lg p-6 md:p-8 flex flex-col justify-between relative shadow-md transition-all duration-300 hover:shadow-lg -translate-y-1">
                            <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#FFD700] text-[#1A1A2E] text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                                DỰ ÁN NỔI BẬT
                            </span>
                            <div class="space-y-6">
                                <div class="space-y-2">
                                    <h3 class="text-lg font-extrabold tracking-wide uppercase text-navyPrimary"><?php the_title(); ?></h3>
                                    <p class="text-xs text-gray-500 leading-relaxed min-h-[40px]"><?php echo get_the_excerpt(); ?></p>
                                </div>
                                <div class="border-t border-b py-4 border-gray-200/50 flex items-baseline gap-1.5 matches">
                                    <span class="text-2xl sm:text-3xl font-extrabold tracking-tighter">
                                        <?php echo number_format($clean_price, 0, ',', '.'); ?>
                                    </span>
                                    <span class="text-[11px] font-semibold text-gray-400">VNĐ / <?php echo esc_html($price_period); ?></span>
                                </div>
                                <ul class="space-y-3 pt-2 text-xs">
                                    <?php foreach ($features_list as $feat) { ?>
                                        <li class="flex items-start space-x-2 text-xs">
                                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                                            <span class="leading-relaxed"><?php echo esc_html(trim($feat)); ?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="pt-8">
                                <button onclick="openCheckout('<?php the_title_attribute(); ?>', <?php echo $clean_price; ?>)" class="w-full text-center text-xs font-bold uppercase tracking-wider py-3.5 rounded bg-[#1A1A2E] hover:bg-neutral-800 text-white shadow-sm hover:shadow transition-all hover:-translate-y-0.5 cursor-pointer">
                                    Đăng Ký Khởi Chạy
                                </button>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="border border-gray-200 bg-white rounded-lg p-6 md:p-8 flex flex-col justify-between relative shadow-sm transition-all duration-300 hover:shadow-md">
                            <div class="space-y-6">
                                <div class="space-y-2">
                                    <h3 class="text-lg font-extrabold tracking-wide uppercase text-navyPrimary"><?php the_title(); ?></h3>
                                    <p class="text-xs text-gray-505 leading-relaxed min-h-[40px]"><?php echo get_the_excerpt(); ?></p>
                                </div>
                                <div class="border-t border-b py-4 border-gray-200/50 flex items-baseline gap-1.5 matches">
                                    <span class="text-2xl sm:text-3xl font-extrabold tracking-tighter">
                                        <?php echo number_format($clean_price, 0, ',', '.'); ?>
                                    </span>
                                    <span class="text-[11px] font-semibold text-gray-400">VNĐ / <?php echo esc_html($price_period); ?></span>
                                </div>
                                <ul class="space-y-3 pt-2 text-xs">
                                    <?php foreach ($features_list as $feat) { ?>
                                        <li class="flex items-start space-x-2 text-xs">
                                            <span class="text-[#FFD700] shrink-0 font-bold">✓</span>
                                            <span class="leading-relaxed"><?php echo esc_html(trim($feat)); ?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="pt-8">
                                <button onclick="openCheckout('<?php the_title_attribute(); ?>', <?php echo $clean_price; ?>)" class="w-full text-center text-xs font-bold uppercase tracking-wider py-3.5 rounded bg-[#F4F4F1] hover:bg-gray-200 text-[#1A1A2E] border border-gray-300 shadow-sm hover:shadow transition-all hover:-translate-y-0.5 cursor-pointer">
                                    Đăng Ký Khởi Chạy
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata();
            }
            ?>
        </div>

        <!-- Trust Disclaimer -->
        <p class="text-center text-xs text-gray-400 italic">
            * Đơn giá dịch vụ đã bao gồm chi phí bản quyền công cụ & hỗ trợ phân tích toàn bộ tiến trình. Hợp đồng pháp lý minh bạch cam kết KPIs.
        </p>

        <!-- FAQ Accordion Layout -->
        <div class="bg-white border border-gray-200 p-8 rounded-lg space-y-8 max-w-4xl mx-auto shadow-sm">
            <div class="text-center space-y-2">
                <span class="text-[10px] font-bold tracking-widest uppercase text-gray-400">Hỗ trợ nhanh</span>
                <h3 class="text-xl md:text-2xl font-bold">Câu Hỏi Thường Gặp</h3>
            </div>

            <div class="space-y-4">
                <?php
                $faqs = [
                    [
                        'q' => 'Quy trình làm việc như thế nào?',
                        'a' => 'Quy trình chuẩn mực 4 bước rõ ràng: 1. Tư vấn lắng nghe bài toán; 2. Thiết kế giải pháp kỹ thuật, lên kế hoạch chi tiết & báo giá thống nhất; 3. Thực thi triển khai lập trình, tối ưu hóa và kiểm nghiệm; 4. Báo cáo chuyển đổi, bàn giao tri thức vận hành.'
                    ],
                    [
                        'q' => 'Thời gian triển khai trong bao lâu?',
                        'a' => 'Tùy thuộc vào quy mô dự án. Chiến dịch SEO thường ghi nhận tín hiệu tăng trưởng sau 4-6 tuần và đạt đỉnh bền vững sau 4-6 tháng. Đối với việc thiết kế web và tự động hóa AI, thời gian bàn giao trung bình từ 2-4 tuần.'
                    ],
                    [
                        'q' => 'Báo cáo hiệu quả diễn ra như thế nào?',
                        'a' => 'Chúng tôi cung cấp bảng theo dõi Analytics tự động cập nhật theo thời gian thực (Real-time). Hàng tháng sẽ có buổi họp thống nhất chỉ số (Organic Traffic, Keyword Rankings, Leads Generated, Conversion Rates) giúp bạn nắm tổng số tiến trình.'
                    ],
                    [
                        'q' => 'Có cam kết thứ hạng hoặc bồi hoàn không?',
                        'a' => 'Chúng tôi cam kết thực thi SEO mũ trắng an toàn chuẩn Google, nói không với spam phá hoại. Cam kết hoàn tiền hoặc tăng cường giờ làm việc không tính phí nếu không đạt 85% tiến độ KPIs đã ký kết trong hợp đồng.'
                    ],
                    [
                        'q' => 'Có hỗ trợ sau khi hoàn thành bàn giao không?',
                        'a' => 'Hoàn toàn có! Tất cả website và hệ thống tự động hóa AI đều được bảo hành kỹ thuật 12 tháng hoàn toàn miễn phí. Đội ngũ chuyên gia luôn sẵn sàng hỗ trợ cập nhật thuật toán 24/7.'
                    ]
                ];

                foreach ($faqs as $i => $faq) {
                    $idx = $i + 1;
                    ?>
                    <div class="border-b border-gray-100 pb-4">
                        <button onclick="toggleFaq(<?php echo $idx; ?>)" class="w-full text-left flex items-center justify-between text-xs sm:text-sm font-bold text-[#1A1A2E] py-2 cursor-pointer focus:outline-none">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#FFD700] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3M12 17h.01"/>
                                </svg>
                                <?php echo esc_html($faq['q']); ?>
                            </span>
                            <span id="faq-sign-<?php echo $idx; ?>" class="text-base text-gray-400 font-bold">+</span>
                        </button>
                        <div id="faq-answer-<?php echo $idx; ?>" class="hidden overflow-hidden mt-2 text-xs text-gray-500 leading-relaxed pl-6 transition-all duration-300">
                            <?php echo esc_html($faq['a']); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- SECURE ONLINE CHECKOUT WIZARD OVERLAY -->
    <div id="checkout-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-[#FAFAF7] w-full max-w-xl rounded-lg shadow-2xl border border-gray-200 overflow-hidden flex flex-col font-sans">
            
            <!-- Header dialog -->
            <div class="bg-[#1A1A2E] text-white px-6 py-4 flex items-center justify-between border-b border-[#FFD700]/20">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-[#FFD700]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    <span class="text-xs font-bold uppercase tracking-widest text-[#FAFAF7]">Cổng Thanh Toán Trực Tuyến Bảo Mật</span>
                </div>
                <button onclick="closeCheckout()" class="text-gray-400 hover:text-white transition-colors cursor-pointer text-sm font-bold">
                    [✕] Đóng
                </button>
            </div>

            <!-- Steps indicators tabs -->
            <div class="grid grid-cols-3 text-center text-[10px] font-extrabold uppercase tracking-wider border-b bg-[#F5F0E8] text-gray-500">
                <div id="checkout-tab-1" class="py-3 text-[#1A1A2E] border-b-2 border-[#1A1A2E]">1. Thông tin</div>
                <div id="checkout-tab-2" class="py-3">2. Phương thức</div>
                <div id="checkout-tab-3" class="py-3">3. Hoàn tất</div>
            </div>

            <!-- Main forms scrolling contents -->
            <div class="p-6 md:p-8 flex-1 overflow-y-auto max-h-[500px]">
                
                <!-- STEP 1 Layout -->
                <div id="checkout-step-1" class="space-y-4">
                    <div class="bg-[#F5F0E8] p-4 rounded text-xs leading-relaxed space-y-2">
                        <p class="font-bold">Đang thanh toán cho: <span id="checkout-summary-plan" class="text-red-700 font-extrabold text-sm font-sans uppercase">SEO PRO</span></p>
                        <p class="text-gray-500">Đơn giá gốc: <span id="checkout-summary-price" class="font-mono font-bold text-gray-800">35,000,000 VNĐ</span></p>
                    </div>

                    <div class="space-y-3">
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold uppercase text-gray-500">Họ và Tên khách hàng (*)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-400">👤</span>
                                <input id="buyer-name" type="text" placeholder="Ví dụ: Nguyễn Văn A" class="w-full text-xs bg-white border border-gray-300 rounded pl-9 pr-3 py-2.5 outline-none focus:border-[#FFD700]" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold uppercase text-gray-500">Email nhận hóa đơn số (*)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-400">✉</span>
                                <input id="buyer-email" type="email" placeholder="example@yourbusiness.com" class="w-full text-xs bg-white border border-gray-300 rounded pl-9 pr-3 py-2.5 outline-none focus:border-[#FFD700]" required />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold uppercase text-gray-500">Số điện thoại liên hệ (*)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-400">📞</span>
                                <input id="buyer-phone" type="tel" placeholder="Số Zalo của bạn..." class="w-full text-xs bg-white border border-gray-300 rounded pl-9 pr-3 py-2.5 outline-none focus:border-[#FFD700]" required />
                            </div>
                        </div>
                    </div>

                    <!-- Discount code block -->
                    <div class="pt-2 border-t border-gray-200">
                        <label class="text-[10px] font-bold uppercase text-gray-500 block mb-1">Mã giảm giá (Nhập: <span class="text-red-700 font-bold">GROWTH2026</span> giảm 10%)</label>
                        <div class="flex gap-2">
                            <input id="coupon-code" type="text" placeholder="MÃ GIẢM GIÁ" class="bg-white border border-gray-300 rounded px-3 py-2 text-xs flex-1 uppercase outline-none focus:border-[#FFD700]" />
                            <button onclick="applyCoupon()" type="button" class="bg-[#1A1A2E] hover:bg-neutral-800 text-white text-xs px-4 rounded font-bold cursor-pointer transition-all">
                                Kích hoạt
                            </button>
                        </div>
                        <p id="coupon-success-msg" class="text-[11px] text-green-600 font-semibold mt-1 hidden">Đã áp dụng giảm giá 10% thành công!</p>
                        <p id="coupon-error-msg" class="text-[11px] text-red-500 mt-1 hidden">Mã giảm giá không hợp lệ hoặc đã hết hạn.</p>
                    </div>

                    <button onclick="goToStep(2)" class="w-full bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] font-bold text-xs uppercase py-3 rounded-lg shadow transition-all cursor-pointer mt-4">
                        Tiếp Tục Phương Thức Thanh Có Sẵn
                    </button>
                </div>

                <!-- STEP 2 Layout (Payment Choice) -->
                <div id="checkout-step-2" class="space-y-6 hidden">
                    <div class="space-y-3">
                        <label class="text-[10px] font-extrabold uppercase text-gray-400 tracking-wider">Lựa chọn phương thức thanh toán:</label>
                        
                        <!-- Choice 1: VietQR -->
                        <div onclick="selectPayment('qr')" id="pm-option-qr" class="border p-4 rounded cursor-pointer transition-all flex items-start gap-3 border-[#FFD700] bg-[#F5F0E8]">
                            <span class="text-xl mt-0.5 shrink-0">📱</span>
                            <div>
                                <h4 class="text-xs font-bold text-[#1A1A2E]">Chuyển Khoản Nhanh VietQR (Khuyên dùng)</h4>
                                <p class="text-[11px] text-gray-500 mt-0.5">Quét QR chuyển trực tiếp qua ngân hàng, xử lý tự động trong vòng 10 giây.</p>
                            </div>
                        </div>

                        <!-- Choice 2: Card -->
                        <div onclick="selectPayment('card')" id="pm-option-card" class="border p-4 rounded cursor-pointer transition-all flex items-start gap-3 border-gray-200 hover:bg-gray-50">
                            <span class="text-xl mt-0.5 shrink-0">💳</span>
                            <div>
                                <h4 class="text-xs font-bold text-[#1A1A2E]">Thanh toán bằng thẻ ATM nội địa / Credit Card</h4>
                                <p class="text-[11px] text-gray-500 mt-0.5">Xử lý mã hóa đầu cuối bảo mật qua ngân hàng số.</p>
                            </div>
                        </div>

                        <!-- Choice 3: Deposit -->
                        <div onclick="selectPayment('deposit')" id="pm-option-deposit" class="border p-4 rounded cursor-pointer transition-all flex items-start gap-3 border-gray-200 hover:bg-gray-50">
                            <span class="text-xl mt-0.5 shrink-0">🏛</span>
                            <div>
                                <h4 class="text-xs font-bold text-[#1A1A2E]">Đặt cọc giữ chỗ 20%</h4>
                                <p class="text-[11px] text-gray-500 mt-0.5">Thanh toán cọc giữ chỗ trước, phần còn lại thanh toán theo hợp đồng thực tế.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment summary calculation table pricing -->
                    <div class="bg-white border border-gray-100 p-4 rounded space-y-2 text-xs">
                        <div class="flex justify-between font-medium">
                            <span>Chi phí kế hoạch:</span>
                            <span id="calc-base-price" class="font-mono text-gray-800">0đ</span>
                        </div>
                        <div id="calc-coupon-row" class="flex justify-between text-green-600 font-medium hidden">
                            <span>Áp mã giảm giá (10%):</span>
                            <span id="calc-coupon-price" class="font-mono">-0đ</span>
                        </div>
                        <div class="flex justify-between font-extrabold text-[#1A1A2E] border-t pt-2 text-sm">
                            <span>Tổng tiền thanh toán thực tế:</span>
                            <span id="calc-grand-total" class="font-mono text-[#FFD700]">0đ</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-[10px] text-gray-400">
                        <svg class="w-3.5 h-3.5 text-green-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        <span>Thông tin thẻ & chuyển khoản được mã hóa độc lập 256-bit bảo mật cao.</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="goToStep(1)" class="flex-1 border text-xs font-bold uppercase py-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-all cursor-pointer">
                            Quay lại
                        </button>
                        <button onclick="submitSimulatedPayment()" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold text-xs uppercase py-3 rounded-lg transition-all cursor-pointer">
                            Xác Nhận Đặt Mua & Thanh Toán
                        </button>
                    </div>
                </div>

                <!-- STEP 3 Layout (Success scan QR code receipt wrapper) -->
                <div id="checkout-step-3" class="space-y-6 text-center hidden">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path d="M20 6L9 17l-5-5"/>
                        </svg>
                    </div>

                    <div class="space-y-1">
                        <h3 class="font-bold text-[#1A1A2E] text-base">Đăng Ký Đơn Hàng Thành Công!</h3>
                        <p class="text-xs text-gray-400">Mã giao dịch bảo mật: <strong id="receipt-tx-id" class="font-mono text-gray-800">TX-123456</strong></p>
                    </div>

                    <!-- Scan VietQR Block mockup representation matches React -->
                    <div id="receipt-qr-flow-box" class="bg-[#F5F0E8] border border-gray-200 p-4 rounded-lg space-y-4 max-w-sm mx-auto">
                        <div class="bg-white p-3 rounded border border-gray-150 flex flex-col items-center justify-center">
                            <div class="w-40 h-40 border-4 border-[#1A1A2E] relative flex flex-col items-center justify-center bg-gray-50 select-none">
                                <!-- Simulated QR vector blocks -->
                                <svg class="w-32 h-32 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M0 0h6v6H0zm2 2v2h2V2zm6 0h2v2H8zm4 0h6v6h-6zm2 2v2h2V4zm-6 4h4v2H8zm6 0h2v4h-2zm-4 4h2v2h-2zm-2 2h2v4H8zm-8 2h6v6H0zm2 2v2h2V18zm6 0h2v2H8zm4 0h6v6h-6zm2 2v2h2v-2z"/>
                                </svg>
                                <span class="text-[8px] font-black bg-[#FFD700] text-[#1A1A2E] px-1.5 py-0.5 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded shadow">
                                    VIETQR SECURE
                                </span>
                            </div>
                            <span class="text-[9px] font-extrabold text-[#1A1A2E] tracking-widest mt-2 uppercase block">QUÉT MÃ ĐỂ THANH TOÁN TỰ ĐỘNG</span>
                        </div>
                        <div class="text-[11px] text-left space-y-1.5 text-gray-700 font-sans">
                            <p>● Ngân hàng: <strong class="text-gray-900">MOCK COMMERCIAL TECHBANK</strong></p>
                            <p>● Số tài khoản: <strong class="text-gray-900 font-mono">901234567</strong></p>
                            <p>● Chủ tài khoản: <strong class="text-gray-900 uppercase">DEREK FLOW SPECIALIST</strong></p>
                            <p>● Số tiền chuyển: <strong id="receipt-grand-price" class="text-red-700 font-mono font-bold text-sm">35,000,000 VNĐ</strong></p>
                            <p>● Nội dung chuyển khoản: <strong id="receipt-tx-memo" class="text-gray-900 font-mono uppercase bg-white px-1 border">SEOPRO1234567</strong></p>
                        </div>
                    </div>

                    <!-- Alternate card receipt text block -->
                    <div id="receipt-card-flow-box" class="bg-green-50 border border-green-200 p-4 rounded-lg max-w-sm mx-auto text-xs text-left text-green-800 whitespace-pre-line hidden">
                        Cổng thanh toán ATM đã xác nhận giao dịch số dư thành công!

                        Số tiền thanh toán: <span id="receipt-card-amount"></span> VNĐ
                        Mã đối soát giao dịch: <span id="receipt-card-tx"></span>
                        Một email hóa đơn bản quyền đầy đủ đã được gửi về địa chỉ bạn đăng ký.
                    </div>

                    <p class="text-xs text-gray-500 leading-normal max-w-md mx-auto">
                        Hệ thống tự động hóa sẽ gửi nội dung hợp đồng số và lịch đặt tư vấn trực tiếp với anh Derek Flow qua Email/Zalo của bạn trong vòng tối đa 15 phút.
                    </p>

                    <button onclick="closeCheckout()" class="w-full bg-[#1A1A2E] text-white hover:bg-neutral-800 text-xs font-bold uppercase py-3 rounded-lg transition-all cursor-pointer">
                        Hoàn tất & Quay về bảng giá
                    </button>
                </div>

            </div>
        </div>
    </div>
</main>

<script>
    // State controller
    let currentPlanName = "SEO Pro";
    let basePlanPrice = 35000000;
    let finalCalculatedPrice = 35000000;
    let isCouponApplied = false;
    let selectedPaymentMethod = "qr";

    function toggleFaq(index) {
        const ans = document.getElementById('faq-answer-' + index);
        const sign = document.getElementById('faq-sign-' + index);
        if (!ans) return;

        if (ans.classList.contains('hidden')) {
            ans.classList.remove('hidden');
            sign.textContent = "−";
        } else {
            ans.classList.add('hidden');
            sign.textContent = "+";
        }
    }

    function openCheckout(planName, rawPrice) {
        currentPlanName = planName;
        basePlanPrice = rawPrice;
        isCouponApplied = false;
        
        // Reset inputs
        document.getElementById('buyer-name').value = "";
        document.getElementById('buyer-email').value = "";
        document.getElementById('buyer-phone').value = "";
        document.getElementById('coupon-code').value = "";
        
        document.getElementById('coupon-success-msg').classList.add('hidden');
        document.getElementById('coupon-error-msg').classList.add('hidden');

        updatePricingMath();
        goToStep(1);

        document.getElementById('checkout-modal').classList.remove('hidden');
    }

    function closeCheckout() {
        document.getElementById('checkout-modal').classList.add('hidden');
    }

    function applyCoupon() {
        const val = document.getElementById('coupon-code').value.trim().toUpperCase();
        if (val === "GROWTH2026") {
            isCouponApplied = true;
            document.getElementById('coupon-success-msg').classList.remove('hidden');
            document.getElementById('coupon-error-msg').classList.add('hidden');
        } else {
            isCouponApplied = false;
            document.getElementById('coupon-success-msg').classList.add('hidden');
            document.getElementById('coupon-error-msg').classList.remove('hidden');
        }
        updatePricingMath();
    }

    function updatePricingMath() {
        const discountPercentage = isCouponApplied ? 0.10 : 0.0;
        finalCalculatedPrice = basePlanPrice * (1.0 - discountPercentage);

        document.getElementById('checkout-summary-plan').textContent = currentPlanName;
        document.getElementById('checkout-summary-price').textContent = basePlanPrice.toLocaleString('vi-VN') + " VNĐ";

        // Step 2 math labels
        document.getElementById('calc-base-price').textContent = basePlanPrice.toLocaleString('vi-VN') + "đ";
        if (isCouponApplied) {
            document.getElementById('calc-coupon-row').classList.remove('hidden');
            document.getElementById('calc-coupon-price').textContent = "-" + (basePlanPrice * 0.1).toLocaleString('vi-VN') + "đ";
        } else {
            document.getElementById('calc-coupon-row').classList.add('hidden');
        }
        document.getElementById('calc-grand-total').textContent = finalCalculatedPrice.toLocaleString('vi-VN') + " VNĐ";
    }

    function goToStep(step) {
        // Validation for step changes
        if (step === 2) {
            const name = document.getElementById('buyer-name').value.trim();
            const email = document.getElementById('buyer-email').value.trim();
            const phone = document.getElementById('buyer-phone').value.trim();

            if (!name || !email || !phone) {
                alert("Vui lòng điền đầy đủ các trường thông tin liên lạc bắt buộc của bạn.");
                return;
            }
        }

        // Hide all steps
        document.getElementById('checkout-step-1').classList.add('hidden');
        document.getElementById('checkout-step-2').classList.add('hidden');
        document.getElementById('checkout-step-3').classList.add('hidden');

        // Show current step
        document.getElementById('checkout-step-' + step).classList.remove('hidden');

        // Update tabs active state css class
        for (let t = 1; t <= 3; t++) {
            const tab = document.getElementById('checkout-tab-' + t);
            if (t <= step) {
                tab.className = "py-3 text-[#1A1A2E] border-b-2 border-[#1A1A2E] font-black";
            } else {
                tab.className = "py-3 text-gray-500 border-none font-bold";
            }
        }
    }

    function selectPayment(method) {
        selectedPaymentMethod = method;
        
        // Toggle selected styling
        const options = ['qr', 'card', 'deposit'];
        options.forEach(opt => {
            const block = document.getElementById('pm-option-' + opt);
            if (opt === method) {
                block.className = "border p-4 rounded cursor-pointer transition-all flex items-start gap-3 border-[#FFD700] bg-[#F5F0E8]";
            } else {
                block.className = "border p-4 rounded cursor-pointer transition-all flex items-start gap-3 border-gray-200 hover:bg-gray-50";
            }
        });
    }

    function submitSimulatedPayment() {
        const txHash = "TX" + Math.floor(10000000 + Math.random() * 90000000);
        document.getElementById('receipt-tx-id').textContent = txHash;

        if (selectedPaymentMethod === "qr") {
            document.getElementById('receipt-qr-flow-box').classList.remove('hidden');
            document.getElementById('receipt-card-flow-box').classList.add('hidden');
            
            // Render scan qr
            document.getElementById('receipt-grand-price').textContent = finalCalculatedPrice.toLocaleString('vi-VN') + " VNĐ";
            document.getElementById('receipt-tx-memo').textContent = "SEOPRO" + txHash.substring(2);
        } else {
            document.getElementById('receipt-qr-flow-box').classList.add('hidden');
            document.getElementById('receipt-card-flow-box').classList.remove('hidden');

            const displayedValue = selectedPaymentMethod === "deposit" ? finalCalculatedPrice * 0.2 : finalCalculatedPrice;
            document.getElementById('receipt-card-amount').textContent = displayedValue.toLocaleString('vi-VN');
            document.getElementById('receipt-card-tx').textContent = txHash;
        }

        // POST transaction lead to database proxy api! Real integration
        const name = document.getElementById('buyer-name').value;
        const email = document.getElementById('buyer-email').value;
        const phone = document.getElementById('buyer-phone').value;

        fetch("/api/orders", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                clientName: name,
                clientEmail: email,
                phone: phone,
                servicePackage: currentPlanName,
                amount: finalCalculatedPrice,
                paymentMethod: selectedPaymentMethod === "qr" ? "VietQR Transfer" : selectedPaymentMethod === "card" ? "ATM/Credit Card" : "Deposit booking (20%)"
            })
        }).then(() => {
            goToStep(3);
        }).catch(() => {
            goToStep(3); // Soft failover
        });
    }
</script>

<?php get_footer(); ?>
