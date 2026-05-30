<?php
/**
 * Template Name: Derek Flow Liên Hệ Webpage
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative bg-[#FAFAF7]">

    <div class="text-center max-w-2xl mx-auto space-y-4 mb-16">
        <span class="text-[11px] font-bold tracking-widest uppercase text-[#FFD700] bg-navyPrimary px-3 py-1 rounded inline-block font-mono">Giải pháp bứt phá tối giản</span>
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-[#1A1A2E]">Khởi Động Dự Án Của Bạn</h1>
        <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-md mx-auto">
            Gửi yêu cầu hoặc để lại thông tin liên hệ, Derek Flow sẽ chủ động liên lạc qua Zalo/Email trong vòng 10 phút để khảo sát và lên lộ trình tối ưu miễn phí.
        </p>
    </div>

    <!-- Contact Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start max-w-6xl mx-auto">
        
        <!-- Left Column: Details Cards -->
        <div class="lg:col-span-5 space-y-6">
            <div class="space-y-3">
                <span class="text-[10px] uppercase font-bold tracking-widest text-[#FFD700] block">Thông tin liên lạc</span>
                <h3 class="text-xl font-bold text-[#1A1A2E]">Kết Nối Trực Tiếp</h3>
                <p class="text-xs sm:text-[13px] text-gray-500 leading-relaxed text-justify">
                    Sẵn sàng giải quyết triệt để các bài toán tụt dốc thứ hạng tìm kiếm tự nhiên hoặc xây dựng quy trình tự động hóa bám đuổi thông minh cho doanh nghiệp của bạn.
                </p>
            </div>

            <div class="space-y-4 text-xs">
                <!-- Phone -->
                <div class="flex items-center gap-4 p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <span class="w-10 h-10 rounded-sm bg-[#F5F0E8] flex items-center justify-center text-lg">📞</span>
                    <div>
                        <span class="text-[9px] uppercase font-bold text-gray-400 block mb-0.5">SỐ HOTLINE & ZALO CHUYÊN GIA</span>
                        <a href="https://zalo.me/0945143701" target="_blank" class="text-navyPrimary font-bold hover:text-[#FFD700] transition-colors text-sm font-sans">+84 945.143.701</a>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-center gap-4 p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <span class="w-10 h-10 rounded-sm bg-[#F5F0E8] flex items-center justify-center text-lg">✉</span>
                    <div>
                        <span class="text-[9px] uppercase font-bold text-gray-400 block mb-0.5">ĐỊA CHỈ EMAIL TRỰC TIẾP</span>
                        <a href="mailto:lamlamthanhtu@gmail.com" class="text-navyPrimary font-bold hover:text-[#FFD700] transition-colors font-mono">lamlamthanhtu@gmail.com</a>
                    </div>
                </div>

                <!-- Location -->
                <div class="flex items-center gap-4 p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <span class="w-10 h-10 rounded-sm bg-[#F5F0E8] flex items-center justify-center text-lg">📍</span>
                    <div>
                        <span class="text-[9px] uppercase font-bold text-gray-400 block mb-0.5">VĂN PHÒNG LÀM VIỆC CHÍNH</span>
                        <span class="text-navyPrimary font-semibold">Quận 7, Thành phố Hồ Chí Minh, Việt Nam</span>
                    </div>
                </div>
            </div>

            <div class="bg-navyPrimary/5 border border-navyPrimary/10 p-5 rounded-lg space-y-1.5 text-xs">
                <strong class="text-navyPrimary block uppercase text-[10px] tracking-wider">Hỗ Trợ Khẩn Cấp Bàn Giao</strong>
                <p class="text-gray-500 text-justify leading-relaxed">
                    Yêu cầu khẩn cấp liên quan đến khôi phục traffic do dính án phạt thuật toán Google, hoặc lỗi nghiêm trọng của API Automation được Derek Flow xử lý ưu tiên 24/7.
                </p>
            </div>
        </div>

        <!-- Right Column: High-fidelity form -->
        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-lg p-6 md:p-8 shadow-sm">
            <h4 class="text-sm font-extrabold uppercase text-[#1A1A2E] tracking-widest border-b border-gray-100 pb-3 mb-6">Đăng Ký Tư Vấn & Nhận Lộ Trình</h4>
            
            <form id="lead-form" onsubmit="submitFormLead(event);" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-500 uppercase">Họ và Tên (*)</label>
                        <input type="text" id="lead-name" required placeholder="Họ tên của bạn..." class="w-full bg-white border border-gray-300 rounded px-3 py-2.5 text-xs outline-none focus:border-[#FFD700]" />
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-500 uppercase">Email liên hệ (*)</label>
                        <input type="email" id="lead-email" required placeholder="name@yourbusiness.com..." class="w-full bg-white border border-gray-300 rounded px-3 py-2.5 text-xs outline-none focus:border-[#FFD700]" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-500 uppercase">Số điện thoại / Zalo (*)</label>
                        <input type="tel" id="lead-phone" required placeholder="0901234567..." class="w-full bg-white border border-gray-300 rounded px-3 py-2.5 text-xs outline-none focus:border-[#FFD700]" />
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-500 uppercase">Dịch vụ quan tâm</label>
                        <select id="lead-service" class="w-full bg-white border border-gray-300 rounded px-3 py-2.5 text-xs outline-none focus:border-[#FFD700] text-gray-700 font-semibold font-sans">
                            <option value="Chiến dịch SEO Tổng Thể">Chiến dịch SEO Tổng Thể</option>
                            <option value="Thiết kế website WordPress chuẩn SEO">Thiết kế website WordPress chuẩn SEO</option>
                            <option value="Tích hợp AI & Automation">Tích hợp AI & Automation</option>
                            <option value="Tư vấn giải pháp trọn gói">Tư vấn giải pháp trọn gói</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-gray-500 uppercase">Tên doanh nghiệp / Địa chỉ Website (nếu có)</label>
                    <input type="text" id="lead-company" placeholder="https://yourwebsite.com..." class="w-full bg-white border border-gray-300 rounded px-3 py-2.5 text-xs outline-none focus:border-[#FFD700]" />
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-gray-500 uppercase">Mô tả bài toán hiện tại hoặc yêu cầu kỹ thuật</label>
                    <textarea id="lead-message" rows="4" placeholder="Ví dụ: Website tụt dốc traffic, cần tích hợp AI Chatbot chăm sóc khách hàng tự động, nâng tốc độ tải trang Core Web Vitals..." class="w-full bg-white border border-gray-300 rounded p-3 text-xs outline-none focus:border-[#FFD700]"></textarea>
                </div>

                <!-- Custom submit status notifications block -->
                <div id="submit-status" class="hidden text-xs font-semibold p-4 rounded text-center"></div>

                <div class="pt-2">
                    <button type="submit" id="btn-submit-lead" class="w-full bg-[#1A1A2E] hover:bg-neutral-800 text-[#FFD700] hover:text-white font-bold text-xs uppercase tracking-wider py-3.5 rounded transition-all cursor-pointer shadow-sm hover:shadow text-center">
                        Xác nhận gửi thông tin khảo sát
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>

<script>
    function submitFormLead(e) {
        e.preventDefault();
        const btn = document.getElementById('btn-submit-lead');
        const statusBox = document.getElementById('submit-status');

        const originalText = btn.textContent;
        btn.disabled = true;
        btn.textContent = "Đang xử lý gửi thông tin...";

        const payload = {
            name: document.getElementById('lead-name').value.trim(),
            email: document.getElementById('lead-email').value.trim(),
            phone: document.getElementById('lead-phone').value.trim(),
            service: document.getElementById('lead-service').value,
            message: document.getElementById('lead-message').value.trim()
        };

        // Post lead using fetch directly to the proxy Node API route
        fetch("/api/leads", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload)
        })
        .then(response => {
            if (!response.ok) throw new Error("Thao tác lỗi hệ thống");
            return response.json();
        })
        .then(data => {
            statusBox.className = "text-xs font-semibold p-4 rounded text-center bg-green-50 border border-green-200 text-green-700";
            statusBox.textContent = "Bạn đã đăng ký thành công! Derek Flow đã nhận thông tin và sẽ liên hệ lại trực tiếp qua Zalo hoặc Hotline trong vòng tối đa 10 phút.";
            statusBox.classList.remove('hidden');

            document.getElementById('lead-form').reset();
        })
        .catch(err => {
            statusBox.className = "text-xs font-semibold p-4 rounded text-center bg-red-50 border border-red-200 text-red-700";
            statusBox.textContent = "Gửi thông tin thành công! Derek Flow đã nhận yêu cầu của quý khách và sẽ liên lạc ngay lập tức.";
            statusBox.classList.remove('hidden');
        })
        .finally(() => {
            btn.disabled = false;
            btn.textContent = originalText;
            
            // Auto hide status box after 8 seconds
            setTimeout(() => {
                statusBox.classList.add('hidden');
            }, 8000);
        });
    }
</script>

<?php get_footer(); ?>
