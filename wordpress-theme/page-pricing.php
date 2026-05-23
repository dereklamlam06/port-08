<?php
/**
 * Template Name: Derek Lâm Pricing Webpage
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative">

    <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
        <span class="text-[11px] font-black tracking-widest uppercase text-goldAccent bg-navyPrimary px-3 py-1 rounded inline-block font-mono">BẢNG GIÁ DỊCH VỤ CHUYÊN SÂU</span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-navyPrimary tracking-tight">Đầu Tư Hiệu Quả</h1>
        <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-2xl mx-auto">
            Lựa chọn gói đầu tư hợp lý, cam kết chỉ số đo lường hiệu quả (KPIs) rõ ràng, mang lại tỷ suất ROI tối đa cho doanh nghiệp của bạn.
        </p>
    </div>

    <!-- Pricing Columns Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch mb-24">

        <?php
        $pricing_query = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => 12,
            'tax_query'      => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => array( 'pricing', 'bang-gia' ),
                ),
            ),
        ) );

        if ( $pricing_query->have_posts() ) :
            while ( $pricing_query->have_posts() ) : $pricing_query->the_post();
                // Get custom fields for plan metadata
                $price = get_post_meta( get_the_ID(), 'plan_price', true ) ?: 'Thoả thuận';
                $price_period = get_post_meta( get_the_ID(), 'plan_period', true ) ?: 'Hàng tháng';
                $features = get_post_meta( get_the_ID(), 'plan_features', true );
                $features_list = $features ? explode(',', $features) : array('Tư vấn On-page chất lượng', 'Đo lường KPIs cam kết');
                $is_popular = (get_post_meta( get_the_ID(), 'plan_popular', true ) === 'yes' || get_post_meta( get_the_ID(), 'plan_popular', true ) === '1');
                
                if ( $is_popular ) :
                    ?>
                    <div class="bg-white border-2 border-goldAccent rounded-2xl p-6 sm:p-8 flex flex-col justify-between shadow-md relative hover:-translate-y-1 transition-all duration-300">
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-goldAccent text-navyPrimary text-[8px] font-black uppercase tracking-widest px-3.5 py-1.5 rounded-full shadow-sm">PHỔ BIẾN NHẤT</span>
                        <div class="space-y-6">
                            <div class="space-y-1">
                                <h3 class="text-lg font-black text-navyPrimary uppercase tracking-wider"><?php the_title(); ?></h3>
                                <p class="text-xs text-gray-400"><?php echo esc_html(get_the_excerpt()); ?></p>
                            </div>
                            <div class="border-t border-b border-gray-100 py-4">
                                <span class="text-3xl font-black text-[#1A1A2E] tracking-tight"><?php echo esc_html($price); ?></span>
                                <span class="text-[10px] uppercase font-bold text-gray-400 block tracking-wider mt-1"><?php echo esc_html($price_period); ?></span>
                            </div>
                            <ul class="text-xs space-y-3 font-semibold text-gray-650">
                                <?php foreach ($features_list as $feature) : ?>
                                    <li class="flex items-start gap-2">★ <span class="flex-1 text-justify"><?php echo esc_html(trim($feature)); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="pt-8">
                            <button onclick="openCheckout('<?php the_title_attribute(); ?>', '<?php echo esc_js($price); ?>')" class="w-full bg-goldAccent text-navyPrimary hover:bg-navyPrimary hover:text-white font-black text-xs uppercase tracking-wider py-4 rounded-lg transition-all cursor-pointer">
                                đăng ký gói ngay
                            </button>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="bg-white border border-gray-150 rounded-2xl p-6 sm:p-8 flex flex-col justify-between shadow-xs relative hover:-translate-y-1 transition-all duration-300">
                        <div class="space-y-6">
                            <div class="space-y-1">
                                <h3 class="text-lg font-black text-navyPrimary uppercase tracking-wider"><?php the_title(); ?></h3>
                                <p class="text-xs text-gray-400"><?php echo esc_html(get_the_excerpt()); ?></p>
                            </div>
                            <div class="border-t border-b border-gray-100 py-4">
                                <span class="text-3xl font-black text-[#1A1A2E] tracking-tight"><?php echo esc_html($price); ?></span>
                                <span class="text-[10px] uppercase font-bold text-gray-400 block tracking-wider mt-1"><?php echo esc_html($price_period); ?></span>
                            </div>
                            <ul class="text-xs space-y-3 font-semibold text-gray-650">
                                <?php foreach ($features_list as $feature) : ?>
                                    <li class="flex items-start gap-2">➔ <span class="flex-1 text-justify"><?php echo esc_html(trim($feature)); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="pt-8">
                            <button onclick="openCheckout('<?php the_title_attribute(); ?>', '<?php echo esc_js($price); ?>')" class="w-full bg-navyPrimary text-white hover:bg-goldAccent hover:text-navyPrimary font-black text-xs uppercase tracking-wider py-4 rounded-lg transition-all cursor-pointer">
                                đăng ký gói ngay
                            </button>
                        </div>
                    </div>
                <?php
                endif;
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <div class="col-span-1 lg:col-span-3 text-center py-12 bg-white border border-gray-150 rounded-2xl p-8 space-y-4">
                <span class="text-4xl">🏷️</span>
                <h3 class="text-lg font-black text-navyPrimary">Bảng Giá Đang Được Thiết Lập</h3>
                <p class="text-xs text-gray-500 max-w-md mx-auto">
                    Để trang trí các gói đầu tư và bảng giá linh hoạt, quý khách vui lòng tạo các **Bài Viết** thuộc chuyên mục có slug: `pricing` hoặc `bang-gia` trong trang quản trị WordPress.
                </p>
                <div class="text-[10px] font-mono bg-amber-50 border border-amber-200 p-4 rounded text-amber-800 max-w-lg mx-auto text-left space-y-1">
                    <strong>Cách thức tạo bài viết gói giá:</strong><br>
                    • Gán chuyên mục: `pricing` hoặc `bang-gia`.<br>
                    • Viết một đoạn mô tả ngắn gọn tại phần trích xuất (Excerpt).<br>
                    • Khai báo Custom Field `plan_price` (Ví dụ: `15.000.000đ`).<br>
                    • Khai báo Custom Field `plan_period` (Ví dụ: `Tối ưu cam kết ROI`).<br>
                    • Khai báo Custom Field `plan_features` (mỗi tính năng cách nhau bằng dấu phẩy).<br>
                    • Khai báo Custom Field `plan_popular` thành `yes` nếu muốn làm gói nổi bật viền vàng.
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- Elegant FAQ collapsible layout Accordion -->
    <div class="max-w-3xl mx-auto border-t border-gray-200 pt-16">
        <h2 class="text-2xl font-black text-navyPrimary text-center mb-10 uppercase tracking-tight">Giải Đáp Thắc Mắc (FAQs)</h2>
        <div class="space-y-4">
            <div class="bg-white border border-gray-150 rounded-xl overflow-hidden">
                <button onclick="toggleFaq(1)" class="w-full text-left px-5 py-4 font-black text-sm text-[#1A1A2E] hover:text-goldAccent transition-colors flex items-center justify-between">
                    <span>Quy trình làm việc chuẩn mực như thế nào?</span>
                    <span id="faq-icon-1" class="text-gray-400 font-bold">+</span>
                </button>
                <div id="faq-content-1" class="hidden px-5 pb-5 text-xs text-gray-500 leading-relaxed text-justify">
                    Quy trình chuẩn mực 4 bước rõ ràng: 1. Tư vấn lắng nghe bài toán; 2. Thiết kế giải pháp kỹ thuật, lên kế hoạch chi tiết & báo giá thống nhất; 3. Thực thi triển khai lập trình, tối ưu hóa và kiểm nghiệm; 4. Báo cáo chuyển đổi sinh động, bàn giao hoàn toàn tri thức vận hành.
                </div>
            </div>
            <div class="bg-white border border-gray-150 rounded-xl overflow-hidden">
                <button onclick="toggleFaq(2)" class="w-full text-left px-5 py-4 font-black text-sm text-[#1A1A2E] hover:text-goldAccent transition-colors flex items-center justify-between">
                    <span>Thời gian triển khai thực hiện trong bao lâu?</span>
                    <span id="faq-icon-2" class="text-gray-400 font-bold">+</span>
                </button>
                <div id="faq-content-2" class="hidden px-5 pb-5 text-xs text-gray-500 leading-relaxed text-justify">
                    Tùy thuộc vào quy mô dự án. Chiến dịch SEO thường ghi nhận tín hiệu tăng trưởng rõ ràng sau 4-6 tuần và đạt đỉnh cao bền vững sau 4-6 tháng. Đối với việc thiết kế web và tự động hóa với hệ AI Agents, thời gian bàn giao trung bình từ 2-4 tuần.
                </div>
            </div>
            <div class="bg-white border border-gray-150 rounded-xl overflow-hidden">
                <button onclick="toggleFaq(3)" class="w-full text-left px-5 py-4 font-black text-sm text-[#1A1A2E] hover:text-goldAccent transition-colors flex items-center justify-between">
                    <span>Báo cáo hiệu quả chiến dịch diễn ra như thế nào?</span>
                    <span id="faq-icon-3" class="text-gray-405 font-bold">+</span>
                </button>
                <div id="faq-content-3" class="hidden px-5 pb-5 text-xs text-gray-500 leading-relaxed text-justify">
                    Chúng tôi cung cấp bảng theo dõi Analytics (GSC, GA4, Custom CRM Logs) tự động cập nhật theo thời gian thực (Real-time). Hàng tháng sẽ có buổi họp thống nhất chỉ số (Organic Traffic, Keyword Rankings, Leads Generated, Conversion Rates) giúp bạn nắm vững tiến độ kinh doanh.
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Interactive checkout wizard modal in Wordpress style -->
    <div id="checkout-modal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl border border-gray-150 w-full max-w-lg p-6 relative max-h-[90vh] overflow-y-auto space-y-6">
            <button onclick="closeCheckout()" class="absolute right-4 top-4 hover:text-red-500 font-extrabold text-lg">✕</button>
            <div class="border-b border-gray-100 pb-4">
                <span class="text-[10px] font-mono tracking-widest text-[#FFD700] bg-navyPrimary px-2.5 py-1 rounded inline-block font-black uppercase">CHECKOUT SECURE WIZARD</span>
                <h3 class="text-lg font-black text-navyPrimary mt-2">Đăng Ký Khóa Học & Tư Vấn</h3>
            </div>

            <!-- Step contents -->
            <form id="checkout-form" onsubmit="submitCheckout(event);" class="space-y-4">
                <div class="bg-[#FAFAF7] border border-gray-150 p-4 rounded-xl space-y-1">
                    <span class="text-[10px] uppercase font-bold text-gray-400">Gói đầu tư đã lựa chọn</span>
                    <p class="text-sm font-black text-navyPrimary" id="modal-plan-name">SEO Starter</p>
                    <p class="text-xs font-bold text-goldAccent" id="modal-plan-price">15.000.000đ</p>
                </div>

                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-650">Họ và Tên của bạn:</label>
                    <input type="text" id="cust-name" required placeholder="Ví dụ: Nguyễn Văn A..." class="w-full bg-[#FAFAF8] border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary" />
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-650">Địa chỉ Email liên hệ:</label>
                    <input type="email" id="cust-email" required placeholder="nhap@email.com..." class="w-full bg-[#FAFAF8] border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary" />
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-650">Số điện thoại / Zalo:</label>
                    <input type="tel" id="cust-phone" required placeholder="Số điện thoại..." class="w-full bg-[#FAFAF8] border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary" />
                </div>

                <div class="pt-4 border-t border-gray-100 flex gap-2">
                    <button type="button" onclick="closeCheckout()" class="w-1/3 border border-gray-200 hover:bg-gray-50 text-xs uppercase font-bold py-3.5 rounded-lg transition-all">Huỷ bỏ</button>
                    <button type="submit" class="w-2/3 bg-goldAccent text-navyPrimary hover:bg-navyPrimary hover:text-white font-black text-xs uppercase tracking-wider py-3.5 rounded-lg transition-all shadow-md text-center">Gửi Đăng Ký Chốt Lịch</button>
                </div>
            </form>
        </div>
    </div>

</main>

<script>
    /**
     * FAQ Collapsibles Accordions dynamic
     */
    function toggleFaq(index) {
        const content = document.getElementById('faq-content-' + index);
        const icon = document.getElementById('faq-icon-' + index);
        if (!content) return;
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.textContent = '−';
            icon.className = 'text-goldAccent font-bold';
        } else {
            content.classList.add('hidden');
            icon.textContent = '+';
            icon.className = 'text-gray-400 font-bold';
        }
    }

    /**
     * Interactive Checkout Modal trigger
     */
    function openCheckout(name, price) {
        document.getElementById('modal-plan-name').textContent = name;
        document.getElementById('modal-plan-price').textContent = price;
        document.getElementById('checkout-modal').classList.remove('hidden');
    }

    function closeCheckout() {
        document.getElementById('checkout-modal').classList.add('hidden');
    }

    function submitCheckout(e) {
        e.preventDefault();
        alert('Gửi đăng ký gói dịch vụ thành công! Derek Lâm sẽ liên hệ lại qua Zalo/Email trong 10 phút.');
        closeCheckout();
    }
</script>

<?php get_footer(); ?>
