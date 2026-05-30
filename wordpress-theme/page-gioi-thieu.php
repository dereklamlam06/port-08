<?php
/**
 * Template Name: Derek Flow Giới Thiệu Webpage
 */
get_header(); ?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-7xl mx-auto w-full font-sans text-gray-800 relative">
    <div class="max-w-7xl mx-auto space-y-16">
        <!-- Title layout -->
        <div class="text-center max-w-2xl mx-auto space-y-4">
            <span class="text-[11px] font-bold tracking-widest uppercase text-[#FFD700] bg-navyPrimary px-3 py-1 rounded inline-block font-mono">Đội ngũ đồng hành</span>
            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-navyPrimary">Giới Thiệu Derek Flow Specialist</h2>
            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed max-w-2xl mx-auto">
                Chuyên gia SEO thực chiến & Nhà phát triển hệ thống tự động hóa bằng AI tối giản với tôn chỉ làm việc dựa trên dữ liệu thật.
            </p>
        </div>

        <!-- Biographical Row split -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Avatar frame -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-72 h-80 sm:w-80 sm:h-96 md:w-[350px] md:h-[420px] rounded-2xl shadow-2xl overflow-hidden group">
                    <?php
                    $theme_dir = get_template_directory();
                    $theme_uri = get_template_directory_uri();
                    $custom_avatar_url = dl_field('custom_avatar_url', '');

                    if (empty($custom_avatar_url)) {
                        if (file_exists($theme_dir . '/uploads/avatar.jpg')) {
                            $custom_avatar_url = $theme_uri . '/uploads/avatar.jpg';
                        } elseif (file_exists(dirname($theme_dir) . '/uploads/avatar.jpg')) {
                            $custom_avatar_url = dirname($theme_uri) . '/uploads/avatar.jpg';
                        } elseif (file_exists($theme_dir . '/uploads/avatar.png')) {
                            $custom_avatar_url = $theme_uri . '/uploads/avatar.png';
                        } elseif (file_exists(dirname($theme_dir) . '/uploads/avatar.png')) {
                            $custom_avatar_url = dirname($theme_uri) . '/uploads/avatar.png';
                        }
                    }

                    if (!empty($custom_avatar_url)): ?>
                        <!-- High-Fidelity Custom Image uploaded by user, fits 4:5 vertical proportions nicely -->
                        <div class="absolute inset-0 w-full h-full">
                            <div class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <img 
                                    src="<?php echo esc_url($custom_avatar_url); ?>" 
                                    alt="Derek Flow Specialist" 
                                    class="w-full h-full object-cover" 
                                />
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 select-none font-sans">
                                <div class="space-y-1">
                                    <h3 class="text-xl font-extrabold uppercase tracking-wide text-white leading-none">DEREK FLOW</h3>
                                    <p class="text-[10px] text-[#FFD700] uppercase tracking-widest font-mono font-bold">Senior Strategist & Developer</p>
                                </div>
                                <p class="text-[11px] text-gray-300 leading-relaxed pt-2 border-t border-white/10 mt-2.5">
                                    "Sự vượt bậc trong thứ hạng và độ tinh giản vận hành là thước đo duy nhất thành công."
                                </p>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Default Luxury Badge visual if no custom image is uploaded -->
                        <div class="w-full h-full bg-gradient-to-tr from-[#1A1A2E] to-gray-800 p-8 text-[#FAFAF7] flex flex-col justify-between absolute inset-0">
                            <!-- Decorative items -->
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[#FFD700]/10 rounded-full blur-2xl"></div>
                            
                            <div class="space-y-4 relative z-10">
                                <div class="w-12 h-12 rounded bg-[#FFD700] flex items-center justify-center text-[#1A1A2E]">
                                    <svg class="w-6 h-6 text-[#1A1A2E]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11.5 .5L14 8h7.5L15 12l2.5 7.5-6-4.5-6 4.5L8 12 1.5 8H9z"/>
                                    </svg>
                                </div>
                                <div class="space-y-1">
                                    <h3 class="text-xl font-extrabold uppercase tracking-wide text-white">DEREK FLOW</h3>
                                    <p class="text-[11px] text-gray-400 uppercase tracking-widest font-mono">Senior Strategist & Developer</p>
                                </div>
                                <p class="text-xs text-gray-300 leading-relaxed pt-2">
                                    "Sự vượt bậc trong vị trí thứ hạng tìm kiếm và độ tinh giản của bộ máy vận hành là thước đo duy nhất để đánh giá thành công của dự án."
                                </p>
                            </div>

                            <div class="space-y-2 border-t border-gray-700/50 pt-4 text-xs font-mono relative z-10">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Kinh nghiệm:</span>
                                    <span class="text-white">10+ Năm Thực Chiến</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Thế mạnh chính:</span>
                                    <span class="text-white">Technical SEO & AI RAG</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Mục tiêu:</span>
                                    <span class="text-[#FFD700]">To Peak Efficiency</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Biography content -->
            <div class="lg:col-span-7 space-y-6">
                <div class="space-y-2">
                    <span class="text-[10px] font-bold tracking-widest uppercase text-gray-400 block">Sự kết hợp năng lực hiếm hoi</span>
                    <h3 class="text-2xl font-bold tracking-tight text-[#1A1A2E] leading-snug">
                        Thực chiến dựa vào lập trình mã nguồn website chuẩn SEO & Automation
                    </h3>
                </div>

                <p class="text-xs sm:text-[13px] text-gray-550 leading-relaxed text-justify whitespace-pre-line">
                    Derek Flow bắt đầu sự nghiệp với vai trò là một kỹ sư phần mềm chuyên nghiệp trước khi lấn sân sâu rộng sang ngành Tối ưu hóa công cụ tìm kiếm (SEO). Sự kết hợp hiếm hoi giữa khả năng thấu hiểu thuật toán xếp hạng và năng lực lập trình tối ưu hạ tầng code giúp Derek giải quyết triệt để các bài toán kỹ thuật phức tạp nhất mà các SEOer truyền thống thường bó tay.

                    Mỗi dòng mã nguồn do Derek Flow thiết kế đều đảm bảo cấu trúc dữ liệu schema chuẩn xác nhất, tốc độ phản hồi Core Web Vitals tối ưu, và hoàn toàn miễn nhiễm trước các đợt càn quét thuật toán khắt khe từ Google. Đồng thời, qua việc khai mở sức mạnh of AI Agents và Workflow Automation, chúng giúp các đối tác đồng hành sở hữu cỗ máy bán hàng & chăm sóc khách hàng tự động xuất sắc hoạt động bền bỉ ngày đêm.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                    <div class="flex items-start space-x-2.5">
                        <div class="text-[#FFD700] shrink-0 mt-0.5">
                            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="7" />
                                <path d="M8.21 13.89L7 23l5-3 5 3-1.21-9.12"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-navyPrimary">100% SEO Sạch (Mũ Trắng)</h4>
                            <p class="text-[11px] text-gray-400 leading-relaxed">Tăng trưởng vững bền, không áp dụng các chiêu trò spam mạo hiểm.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-2.5">
                        <div class="text-[#FFD700] shrink-0 mt-0.5">
                            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-navyPrimary">Bảo hành vận hành kỹ thuật</h4>
                            <p class="text-[11px] text-gray-400 leading-relaxed">Luôn cam kết hỗ trợ tối ưu mã nguồn và cập nhật hệ thống sau dự án.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Modern Stack / Tools Grid -->
        <div class="space-y-8">
            <div class="text-center max-w-xl mx-auto space-y-2">
                <span class="text-[10px] font-bold tracking-widest uppercase text-gray-400">The Modern Stack</span>
                <h3 class="text-xl md:text-2xl font-extrabold tracking-tight text-navyPrimary">Hệ Thống Công Cụ Chuyên Sâu</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- SEO suite block -->
                <div class="bg-[#F5F0E8] border border-gray-200 p-6 md:p-8 rounded-lg space-y-5">
                    <h4 class="text-[12px] uppercase font-bold tracking-widest text-[#1A1A2E] border-b pb-3 border-gray-300 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#FFD700]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M2.5 12h19M12 2.5a15 15 0 0 0 0 19M12 2.5a15 15 0 0 1 0 19"/>
                        </svg>
                        <span>SEO & Conversion Analytics Suite</span>
                    </h4>
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Google Search Console</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Theo dõi lập chỉ mục & hiệu suất từ khóa chuyên sâu</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Google Analytics 4</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Phân tích luồng hành vi & hiệu suất phễu chuyển đổi</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Semrush</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Nghiên cứu bộ từ khóa đối thủ & độ khó từ khóa cạnh tranh</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Ahrefs Suite</h5>
                            <p class="text-xs text-gray-550 leading-relaxed">Phát hiện lỗ hổng liên kết (Backlinks audit) toàn vẹn</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Screaming Frog SEO Spider</h5>
                            <p class="text-xs text-gray-550 leading-relaxed">Cào quét rà soát toàn bộ cấu trúc lỗi kỹ thuật technical codes</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Looker Studio Dashboards</h5>
                            <p class="text-xs text-gray-550 leading-relaxed">Tổng hợp trực quan hóa biểu đồ chuyển đổi realtime cho admin</p>
                        </div>
                    </div>
                </div>

                <!-- Dev suite block -->
                <div class="bg-white border border-gray-200 p-6 md:p-8 rounded-lg space-y-5 shadow-sm">
                    <h4 class="text-[12px] uppercase font-bold tracking-widest text-[#1A1A2E] border-b pb-3 border-gray-200 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#FFD700]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                        </svg>
                        <span>Development & AI Automation Toolkit</span>
                    </h4>
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">React & Vite ESM</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Lập trình giao diện SPA tải trang nhanh thần tốc dưới 1s</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Node.js & Express CJS</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Bảo mật backend xử lý tự động logic luồng & kết nối database</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Python Scripts</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Tự động hóa cào dữ liệu đối thủ & bóc tách insight dữ liệu lớn</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">Pinecone / Vector DB</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Cài đặt lưu trữ tri thức bộ nhớ dài hạn cho AI Bot bám đuổi</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">OpenAI & Gemini APIs</h5>
                            <p class="text-xs text-gray-500 leading-relaxed">Khai thác thế hệ mô hình ngôn ngữ lớn LLMs tư vấn thông minh</p>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-[11px] font-bold text-gray-700">N8N, Zapier, Make.com</h5>
                            <p class="text-xs text-gray-550 leading-relaxed">Tự động hóa luồng nghiệp vụ không viết code (No-Code Automations)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Contact link bottom -->
        <div class="bg-[#1A1A2E] text-white p-8 md:p-12 rounded-lg flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-2 max-w-lg">
                <h4 class="text-lg md:text-xl font-bold tracking-tight">Bạn muốn trao đổi trực tiếp cùng chuyên gia Derek Flow?</h4>
                <p class="text-xs text-gray-400">
                    Đặt lịch họp nhanh 15 phút qua Zoom hoặc gặp mặt trực tiếp để giải quyết bài toán tăng trưởng thứ hạng và xây dựng tự động hóa.
                </p>
            </div>
            <div class="flex gap-3 shrink-0 flex-col sm:flex-row w-full sm:w-auto">
                <a
                    href="<?php echo esc_url(home_url('/lien-he')); ?>"
                    class="flex items-center justify-center space-x-2 bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] text-xs font-bold uppercase tracking-wider px-6 py-3.5 rounded cursor-pointer transition-all shadow"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <span>Đăng Ký Đặt Lịch Gặp</span>
                </a>
                <a
                    href="mailto:contact@derektopeak.com"
                    class="flex items-center justify-center space-x-2 border border-gray-600 hover:border-white text-xs font-semibold px-6 py-3.5 rounded transition-all cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5 text-[#FFD700]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <span class="font-mono">contact@derektopeak.com</span>
                </a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
