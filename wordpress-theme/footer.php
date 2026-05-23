<footer class="bg-navyPrimary text-white pt-16 pb-8 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-12 gap-10">
        <!-- Logo & Pitch Column -->
        <div class="col-span-12 md:col-span-5 space-y-5">
            <div class="flex items-center gap-2">
                <span class="w-10 h-10 bg-white/10 text-goldAccent rounded-lg flex items-center justify-center font-extrabold text-lg border border-goldAccent/20">
                    DL
                </span>
                <div class="leading-none">
                    <span class="text-sm font-black text-white tracking-tighter uppercase block">DEREK LÂM</span>
                    <span class="text-[9px] font-bold text-gray-400 tracking-widest uppercase block">SEO & AUTOMATION SPECIALIST</span>
                </div>
            </div>
            <p class="text-xs text-gray-400 leading-relaxed max-w-sm">
                Đơn vị tư vấn chuyển đổi số tối giản, nâng tầm thương hiệu tối đa. Chúng tôi chuyên thiết kế hệ quản trị tự động hóa (n8n, CRM, AI Chatbots) và chiến lược SEO bao trùm ngữ nghĩa (Semantic SEO) chuyên sâu nhất.
            </p>
            <div class="text-[10px] font-mono text-gray-500">
                HOSTED IN INDEPENDENT SECURE SERVER • WP V6+ COMPLIANT
            </div>
        </div>

        <!-- Links Navigation column -->
        <div class="col-span-6 md:col-span-3 space-y-4">
            <h4 class="text-xs font-black uppercase tracking-widest text-goldAccent">Khám Phá Dịch Vụ</h4>
            <div class="flex flex-col space-y-2.5 text-xs text-gray-400 font-medium">
                <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="hover:text-goldAccent transition-colors">Tối ưu hóa SEO On-page / Off-page</a>
                <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="hover:text-goldAccent transition-colors">Tự động hóa phễu sales Marketing</a>
                <a href="<?php echo esc_url(home_url('/case-study')); ?>" class="hover:text-goldAccent transition-colors">Dự án Case Study tiêu biểu</a>
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="hover:text-goldAccent transition-colors font-bold uppercase tracking-wider text-[10px]">Đăng ký nhận kiểm toán SEO miễn phí</a>
            </div>
        </div>

        <!-- Newsletter & Contact info Column -->
        <div class="col-span-6 md:col-span-4 space-y-4">
            <h4 class="text-xs font-black uppercase tracking-widest text-goldAccent">Bản Tin Chuyên Gia</h4>
            <p class="text-xs text-gray-400 leading-relaxed">
                Nhận các phân tích thuật toán Google Core Update mới nhất và quy trình n8n Automation hữu ích hàng tuần.
            </p>
            <!-- Newsletter Mock Form -->
            <form action="#" method="POST" class="space-y-2 flex flex-col sm:flex-row gap-2" onsubmit="event.preventDefault(); alert('Đăng ký nhận bản tin thành công!')">
                <input 
                    type="email" 
                    placeholder="Địa chỉ Email của bạn..." 
                    required 
                    class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-goldAccent"
                />
                <button 
                    type="submit" 
                    class="bg-goldAccent text-navyPrimary hover:bg-white font-bold text-xs uppercase px-4 py-2 rounded-lg transition-all"
                >
                    Đăng Ký
                </button>
            </form>
        </div>
    </div>

    <!-- Bottom Copyright -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-gray-500">
        <div>
            &copy; <?php echo date('Y'); ?> <strong>Derek Lâm</strong>. Toàn bộ bản quyền được bảo lưu. Thiết kế tương thích WordPress.
        </div>
        <div class="flex items-center gap-4">
            <a href="#" class="hover:underline">Điều khoản bảo mật</a>
            <span>•</span>
            <a href="#" class="hover:underline">Quy định bản quyền</a>
        </div>
    </div>
</footer>

<!-- FLOATING ACTIONS & INTERACTIVE AI CHATBOT LAYER -->
<!-- Floating speed dial contact column on bottom-right -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col items-center space-y-3 font-sans">
    <!-- Hotline Call Button -->
    <a href="tel:0945143701" 
       class="w-12 h-12 sm:w-14 sm:h-14 bg-goldAccent hover:bg-[#E6C200] text-navyPrimary rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 cursor-pointer relative group" 
       title="Gọi Hotline hỗ trợ">
        <span class="absolute inset-0 rounded-full bg-goldAccent/30 animate-ping opacity-75"></span>
        <svg class="w-5 h-5 relative z-10 group-hover:scale-110 transition-transform text-navyPrimary" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27c1.12.44 2.33.68 3.58.68a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.24 2.46.68 3.58a1 1 0 0 1-.27 1.11z"/>
        </svg>
    </a>

    <!-- Zalo Chat Button -->
    <a href="https://zalo.me/0945143701" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="w-12 h-12 sm:w-14 sm:h-14 bg-[#0068FF] hover:bg-[#005AE0] text-white rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 cursor-pointer relative group" 
       title="Kết nối Zalo tư vấn 24/7">
        <span class="absolute inset-0 rounded-full bg-[#0068FF]/30 animate-ping opacity-75"></span>
        <svg viewBox="0 0 24 24" class="w-6 h-6 sm:w-7 sm:h-7 fill-white relative z-10 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.48 2 2 5.86 2 10.63c0 2.58 1.34 4.89 3.49 6.38l-.73 2.7c-.1.35.26.63.56.44l3.23-2.02c1.08.31 2.24.48 3.45.48 5.52 0 10-3.86 10-8.63S17.52 2 12 2zm3.33 11.2H11.2l-.63.93h2.64v1.16H9.41v-.91l1.83-2.61H9.68V10.6h3.48v.91l-1.83 2.60H13.6c.16 0 .3-.13.3-.3v-.3c0-.17-.14-.3-.3-.3h-.91v-1.16h.91c.8 0 1.46.65 1.46 1.46v.3c0 .8-.66 1.46-1.46 1.46zm-2.27-5.04c.54 0 .98.44.98.98s-.44.98-.98.98a.98.98 0 01-.98-.98c0-.54.44-.98.98-.98z" />
        </svg>
    </a>

    <!-- AI Chatbot Launcher Button -->
    <button id="wp-chatbot-toggle" 
            class="w-12 h-12 sm:w-14 sm:h-14 bg-navyPrimary text-white hover:text-goldAccent rounded-full shadow-lg border border-goldAccent/20 flex items-center justify-center transition-all duration-300 cursor-pointer group focus:outline-none relative">
        <div class="relative" id="wp-chatbot-toggle-inner">
            <!-- Icon Message Square -->
            <svg id="wp-launcher-icon" class="w-5 h-5 sm:w-6 sm:h-6 group-hover:rotate-6 transition-transform text-goldAccent" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            <!-- Icon Close (starts hidden) -->
            <svg id="wp-launcher-close-icon" class="w-5 h-5 sm:w-6 sm:h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span id="wp-launcher-pulse-dot" class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 border-2 border-navyPrimary rounded-full"></span>
        </div>
    </button>
</div>

<!-- Chatbot Window Panel Overlay -->
<div id="wp-chatbot-panel" 
     class="fixed bottom-24 right-4 left-4 sm:left-auto sm:bottom-6 sm:right-24 z-50 w-[calc(100%-32px)] sm:w-[400px] h-[calc(100vh-140px)] max-h-[540px] sm:h-[520px] bg-[#FAFAF7] border border-gray-200 rounded-lg shadow-2xl flex flex-col overflow-hidden hidden font-sans">
    
    <!-- Chatbot Header -->
    <div class="bg-navyPrimary text-white px-4 py-3.5 flex items-center justify-between border-b border-gray-200">
        <div class="flex items-center space-x-2.5">
            <div class="w-8 h-8 rounded-full bg-goldAccent flex items-center justify-center text-navyPrimary font-bold">
                A
            </div>
            <div>
                <h3 class="text-xs font-black uppercase tracking-wide text-white">Derek Lâm Assistant</h3>
                <div class="flex items-center space-x-1">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] text-gray-400">Tư vấn tự động phản hồi ngay</span>
                </div>
            </div>
        </div>
        <button id="wp-chatbot-close" class="text-gray-300 hover:text-white transition-colors p-1 hover:bg-white/10 rounded cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Messages List Container -->
    <div id="wp-chatbot-msgs" class="flex-1 overflow-y-auto p-4 space-y-3">
        <!-- Welcoming msg -->
        <div class="flex justify-start">
            <div class="flex items-start gap-2 max-w-[85%]">
                <div class="w-6 h-6 rounded-full bg-navyPrimary flex items-center justify-center text-white mt-1 shrink-0">
                    <span class="text-[9px] text-goldAccent font-black">★</span>
                </div>
                <div>
                    <div class="text-[12.5px] px-3.5 py-2.5 rounded-lg leading-relaxed bg-[#F5F0E8] text-navyPrimary border border-gray-200 rounded-bl-none text-justify">
                        Xin chào! Tôi là Trợ lý AI tự động của Derek Lâm. Tôi có thể hỗ trợ giải đáp nhanh mọi thắc mắc của bạn về tối ưu hóa SEO chuyên sâu, thiết kế website Luxury Tech, tích hợp AI Agents và tự động hóa quy trình. Bạn cần tôi hỗ trợ thông tin gì hôm nay?
                    </div>
                    <span class="text-[9px] text-gray-400 mt-1 block px-1" id="wp-chatbot-welcome-time">12:00</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Suggestions chips -->
    <div class="px-4 py-2 bg-[#FAFAF8] border-t border-gray-150 flex flex-wrap gap-1.5" id="wp-chatbot-suggestions">
        <button onclick="sendWpSuggestion('Khám phá các gói dịch vụ SEO')" class="text-[10.5px] text-navyPrimary bg-white border border-gray-200 px-2.5 py-1 rounded-full hover:border-[#FFD700] hover:bg-[#F5F0E8] transition-all cursor-pointer font-bold">
            Gói dịch vụ SEO
        </button>
        <button onclick="sendWpSuggestion('Báo giá Thiết kế Website')" class="text-[10.5px] text-navyPrimary bg-white border border-gray-200 px-2.5 py-1 rounded-full hover:border-[#FFD700] hover:bg-[#F5F0E8] transition-all cursor-pointer font-bold">
            Thiết kế Website
        </button>
        <button onclick="sendWpSuggestion('Tự động hóa AI N8N/Zapier')" class="text-[10.5px] text-navyPrimary bg-white border border-gray-200 px-2.5 py-1 rounded-full hover:border-[#FFD700] hover:bg-[#F5F0E8] transition-all cursor-pointer font-bold">
            Tự động hóa AI
        </button>
        <button onclick="sendWpSuggestion('Quy trình làm việc 4 bước')" class="text-[10.5px] text-navyPrimary bg-white border border-gray-200 px-2.5 py-1 rounded-full hover:border-[#FFD700] hover:bg-[#F5F0E8] transition-all cursor-pointer font-bold">
            Quy trình làm việc
        </button>
    </div>

    <!-- Input Box controls -->
    <div class="p-3 bg-[#FAFAF8] border-t border-gray-150 flex items-center gap-2">
        <input id="wp-chatbot-input" 
               type="text" 
               placeholder="Nhập câu hỏi của bạn tại đây..." 
               class="flex-1 text-xs bg-white border border-gray-200 px-3 py-2.5 focus:outline-none focus:border-goldAccent rounded font-sans" />
        <button id="wp-chatbot-send-btn" 
                class="w-9 h-9 shrink-0 bg-goldAccent hover:bg-[#E6C200] text-navyPrimary flex items-center justify-center rounded transition-all cursor-pointer font-bold">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
            </svg>
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('wp-chatbot-toggle');
        const chatbotPanel = document.getElementById('wp-chatbot-panel');
        const chatbotClose = document.getElementById('wp-chatbot-close');
        const launcherIcon = document.getElementById('wp-launcher-icon');
        const launcherClose = document.getElementById('wp-launcher-close-icon');
        const chatInput = document.getElementById('wp-chatbot-input');
        const chatSend = document.getElementById('wp-chatbot-send-btn');
        const chatMsgs = document.getElementById('wp-chatbot-msgs');
        const welcomeTime = document.getElementById('wp-chatbot-welcome-time');

        // Setup live initial time
        const now = new Date();
        const timeStr = now.toLocaleTimeString('vi-VN', { hour: '2-digit', minute: '2-digit' });
        if (welcomeTime) welcomeTime.textContent = timeStr;

        // Toggle Open/Close panel
        function togglePanel() {
            if (chatbotPanel.classList.contains('hidden')) {
                chatbotPanel.classList.remove('hidden');
                launcherIcon.classList.add('hidden');
                launcherClose.classList.remove('hidden');
                // Scroll bottom
                chatMsgs.scrollTop = chatMsgs.scrollHeight;
            } else {
                chatbotPanel.classList.add('hidden');
                launcherIcon.classList.remove('hidden');
                launcherClose.classList.add('hidden');
            }
        }

        toggleBtn.addEventListener('click', togglePanel);
        chatbotClose.addEventListener('click', togglePanel);

        // Send current message function
        function handleMsgSubmit() {
            const val = chatInput.value.trim();
            if (!val) return;
            postUserMessage(val);
        }

        chatSend.addEventListener('click', handleMsgSubmit);
        chatInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                handleMsgSubmit();
            }
        });

        // Add user msg to DOM and fetch answer
        function postUserMessage(text) {
            const time = new Date().toLocaleTimeString('vi-VN', { hour: '2-digit', minute: '2-digit' });
            
            // Render user bubble
            const userHtml = `
                <div class="flex justify-end">
                    <div class="flex items-start gap-2 max-w-[85%] flex-row-reverse">
                        <div>
                            <div class="text-[12.5px] px-3.5 py-2.5 rounded-lg leading-relaxed bg-navyPrimary text-white rounded-br-none text-justify">
                                ${escapeHtml(text)}
                            </div>
                            <span class="text-[9px] text-gray-400 mt-1 block px-1 text-right">${time}</span>
                        </div>
                    </div>
                </div>
            `;
            chatMsgs.insertAdjacentHTML('beforeend', userHtml);
            chatInput.value = '';
            chatMsgs.scrollTop = chatMsgs.scrollHeight;

            // Render Loading bubble
            const loaderId = 'wp-chat-loader-' + Date.now();
            const loaderHtml = `
                <div class="flex justify-start" id="${loaderId}">
                    <div class="flex items-start gap-2 max-w-[85%]">
                        <div class="w-6 h-6 rounded-full bg-navyPrimary flex items-center justify-center text-white mt-1 shrink-0">
                            <span class="text-[9px] text-goldAccent font-black">★</span>
                        </div>
                        <div class="bg-[#F5F0E8] border border-gray-200 px-3.5 py-2 rounded-lg rounded-bl-none flex items-center space-x-1">
                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce"></span>
                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></span>
                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                        </div>
                    </div>
                </div>
            `;
            chatMsgs.insertAdjacentHTML('beforeend', loaderHtml);
            chatMsgs.scrollTop = chatMsgs.scrollHeight;

            // Post to Server API
            fetch('/api/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text })
            })
            .then(res => {
                if (!res.ok) throw new Error("API server offline");
                return res.json();
            })
            .then(data => {
                removeLoader(loaderId);
                renderBotResponse(data.response || "Rất tiếc, đã xảy ra lỗi. Vui lòng kết nối Zalo nhé!");
            })
            .catch(() => {
                // Standalone fallback database answers - extreme robustness if imported on normal WordPress
                removeLoader(loaderId);
                const reply = getOfflineFailsafeResponse(text);
                renderBotResponse(reply);
            });
        }

        // Remove indicator
        function removeLoader(id) {
            const loader = document.getElementById(id);
            if (loader) loader.remove();
        }

        // Render bot message block
        function renderBotResponse(text) {
            const time = new Date().toLocaleTimeString('vi-VN', { hour: '2-digit', minute: '2-digit' });
            const botHtml = `
                <div class="flex justify-start">
                    <div class="flex items-start gap-2 max-w-[85%]">
                        <div class="w-6 h-6 rounded-full bg-navyPrimary flex items-center justify-center text-white mt-1 shrink-0">
                            <span class="text-[9px] text-goldAccent font-black">★</span>
                        </div>
                        <div>
                            <div class="text-[12.5px] px-3.5 py-2.5 rounded-lg leading-relaxed bg-[#F5F0E8] text-navyPrimary border border-gray-200 rounded-bl-none text-justify whitespace-pre-line">
                                ${text}
                            </div>
                            <span class="text-[9px] text-gray-400 mt-1 block px-1">${time}</span>
                        </div>
                    </div>
                </div>
            `;
            chatMsgs.insertAdjacentHTML('beforeend', botHtml);
            chatMsgs.scrollTop = chatMsgs.scrollHeight;
        }

        // Helper string encoder
        function escapeHtml(str) {
            return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
        }

        // Intelligence client-side routing answers database
        function getOfflineFailsafeResponse(query) {
            const lower = query.toLowerCase();
            if (lower.includes('seo') || lower.includes('từ khóa') || lower.includes('dịch vụ seo')) {
                return "Dịch thuật toán SEO của Derek Lâm tập trung vào cấu trúc chuẩn Technical và content bao trùm ngữ nghĩa:\n\n- **SEO Starter**: 15.000.000 VNĐ / Tháng (Từ khóa sâu, On-page, theo dõi GSC & GA4).\n- **SEO Pro**: 35.000.000 VNĐ / Tháng (Chiến dịch tổng lực, backlinks chất lượng cao, Looker Studio dashboards).\n\nBạn có muốn tôi gửi tài liệu audit cho dự án của bạn không?";
            }
            if (lower.includes('website') || lower.includes('thiết kế') || lower.includes('báo giá web') || lower.includes('build web')) {
                return "Website do Derek Lâm thiết kế sử dụng Modern Stack (React/Vite) cực kỳ sang trọng và tải trang thần tốc (< 1 giây). Chi phí thiết kế trọn gói từ 25.000.000 VNĐ tùy mức độ tích hợp bảo mật, chatbots, thanh toán.";
            }
            if (lower.includes('automation') || lower.includes('tự động') || lower.includes('n8n') || lower.includes('zapier')) {
                return "Giải pháp AI & Automation giúp tối ưu và giải phóng sức lao động thủ công tới 80%. Chi phí xây dựng hệ thống (Make, n8n, Pinecone Vector DB, AI Agents) dao động từ 60.000.000 VNĐ / Dự án. Bảo hành trơn tru 12 tháng!";
            }
            if (lower.includes('quy trình') || lower.includes('làm việc') || lower.includes('mấy bước')) {
                return "Quy trình làm việc tối giản và cam kết hiệu suất của Derek Lâm:\n1. Tư vấn khảo sát nhu cầu chuyên sâu.\n2. Thiết kế giải pháp kỹ thuật, tiến độ & báo giá chi tiết.\n3. Lập trình mã nguồn sạch, tối ưu hóa Core Web Vitals khắt khe.\n4. Nghiệm thu, đào tạo bàn giao và báo cáo realtime KPI.";
            }
            return "Cảm ơn bạn đã nhắn tin! Để nhanh chóng nhận Lộ trình Tối ưu SEO & Tự động hóa MIỄN PHÍ, bạn có thể gọi Hotline hoặc kết nối Zalo trực tiếp của anh Derek Lâm: (+84) 945.143.701 nhé. Trợ lý ảo sẽ chuyển ngay thông tin đến anh ấy!";
        }

        // Global function for suggestions
        window.sendWpSuggestion = function(text) {
            postUserMessage(text);
        };
    });
</script>

<?php wp_footer(); ?>
</body>
</html>

