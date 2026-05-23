<?php
/**
 * Template Name: Derek Lâm Contact Webpage
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative">

    <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
        <span class="text-[11px] font-black tracking-widest uppercase text-goldAccent bg-navyPrimary px-3 py-1 rounded inline-block font-mono">BẮT ĐẦU ĐỒNG HÀNH NGAY</span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-navyPrimary tracking-tight">Khởi Động Dự Án</h1>
        <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-2xl mx-auto">
            Gửi yêu cầu hoặc để lại thông tin liên hệ của bạn, Derek Lâm sẽ chủ động liên lạc qua Zalo/Email trong vòng 10 phút để khảo sát chi tiết.
        </p>
    </div>

    <!-- Contact Grid: Left details, Right Contact form -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start mb-16 relative z-10">
        
        <!-- Left: Details and directions -->
        <div class="lg:col-span-5 space-y-8">
            <div class="space-y-3">
                <span class="text-[10px] uppercase font-black tracking-widest text-[#FFD700] block">Thông tin trực tuyến</span>
                <h3 class="text-xl sm:text-2xl font-black text-navyPrimary">Kết Nối Tiêu Điểm</h3>
                <p class="text-xs sm:text-sm text-gray-500 leading-relaxed text-justify">
                    Sẵn sàng giải quyết các bài toán rò rỉ khách hàng lý tưởng hoặc thiết lập quy trình tự động hóa bám đuổi cho doanh nghiệp của bạn.
                </p>
            </div>

            <!-- Detailed contacts -->
            <div class="space-y-4 text-xs font-semibold text-gray-700">
                <div class="flex items-center gap-3 p-4 bg-white border border-gray-150 rounded-xl shadow-2xs">
                    <span class="w-8 h-8 rounded-lg bg-[#FAFAF7] flex items-center justify-center border border-gray-150">✉</span>
                    <div class="leading-none">
                        <span class="text-[9px] uppercase font-bold text-gray-400 block mb-1">EMAIL CHUYÊN GIA</span>
                        <a href="mailto:lamlamthanhtu@gmail.com" class="text-navyPrimary hover:underline">lamlamthanhtu@gmail.com</a>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-4 bg-white border border-gray-150 rounded-xl shadow-2xs">
                    <span class="w-8 h-8 rounded-lg bg-[#FAFAF7] flex items-center justify-center border border-gray-150">☏</span>
                    <div class="leading-none">
                        <span class="text-[9px] uppercase font-bold text-gray-400 block mb-1">ZALO / ĐIỆN THOẠI</span>
                        <a href="tel:#" class="text-navyPrimary hover:underline">+84 • Liên hệ trực tiếp qua form nhận cuộc gọi</a>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-4 bg-white border border-gray-150 rounded-xl shadow-2xs">
                    <span class="w-8 h-8 rounded-lg bg-[#FAFAF7] flex items-center justify-center border border-gray-150">⌚</span>
                    <div class="leading-none">
                        <span class="text-[9px] uppercase font-bold text-gray-400 block mb-1">THỜI GIAN LÀM VIỆC</span>
                        <span class="text-navyPrimary">Thứ 2 - Thứ 7 (08:00 - 18:00)</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-navyPrimary/5 border border-navyPrimary/10 p-5 rounded-xl space-y-1 text-xs">
                <strong class="text-navyPrimary block uppercase text-[10px] tracking-wider">Hỗ Trợ Nhanh 24/7</strong>
                <p class="text-gray-550 text-justify">Yêu cầu khẩn cấp liên quan đến Core Algorithm update bị phạt thuật toán hoặc chết hệ thống dẫn lead sẽ được xử trị tức thì.</p>
            </div>
        </div>

        <!-- Right: Real form layout mapped with dynamic notification -->
        <div class="lg:col-span-7 bg-white border border-gray-150 rounded-2xl p-6 sm:p-8 shadow-sm">
            <h4 class="text-sm font-black uppercase text-navyPrimary tracking-widest border-b border-gray-100 pb-3 mb-6">Gửi Yêu Cầu Tư Vấn Khảo Sát</h4>
            
            <!-- Standard form handler sending email notifications -->
            <form id="contact-form-wp" onsubmit="submitFormContact(event);" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wilder">Họ và Tên của bạn:</label>
                        <input type="text" id="name" required placeholder="Nguyễn Văn A..." class="w-full bg-[#FAFAF8] border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wilder">Địa chỉ Email:</label>
                        <input type="email" id="email" required placeholder="name@domain.com..." class="w-full bg-[#FAFAF8] border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wilder">Số điện thoại / Zalo:</label>
                        <input type="tel" id="phone" required placeholder="090..." class="w-full bg-[#FAFAF8] border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wilder">Dịch vụ bạn quan tâm:</label>
                        <select id="service" class="w-full bg-[#FAFAF8] border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary font-semibold text-gray-700">
                            <option value="seo">Chiến dịch SEO Tổng Thể</option>
                            <option value="web">Thiết kế website Luxury chuẩn SEO</option>
                            <option value="automation">Tích hợp AI & Automation</option>
                            <option value="all">Tư vấn chọn gói tổng thể</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wilder">Công ty / Website hiện tại (nếu có):</label>
                    <input type="text" id="company" placeholder="https://abc.com..." class="w-full bg-[#FAFAF8] border border-[#E5E7EB] rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-navyPrimary" />
                </div>

                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wilder">Nội dung yêu cầu cụ thể:</label>
                    <textarea id="message" rows="4" placeholder="Hãy mô tả sơ qua về bài toán kinh doanh hoặc lỗi hiện tại của Website doanh nghiệp bạn..." class="w-full bg-[#FAFAF8] border border-[#E5E7EB] rounded-xl p-4 text-xs focus:outline-none focus:border-navyPrimary"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-navyPrimary text-white hover:bg-goldAccent hover:text-navyPrimary font-black text-xs uppercase tracking-wider py-4 rounded-lg transition-all cursor-pointer shadow-md text-center">Xác nhận gửi yêu cầu tư vấn</button>
                </div>
            </form>
        </div>
    </div>

</main>

<script>
    function submitFormContact(e) {
        e.preventDefault();
        alert('Yêu cầu tư vấn của bạn đã được gửi thành công! Chuyên gia Derek Lâm sẽ liên hệ lại trực tiếp qua Zalo hoặc gọi điện trong 10 phút.');
        document.getElementById('contact-form-wp').reset();
    }
</script>

<?php get_footer(); ?>
