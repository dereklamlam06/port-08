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
                <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="hover:text-goldAccent transition-colors">Dự án Portfolio nổi bật</a>
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

<?php wp_footer(); ?>
</body>
</html>
