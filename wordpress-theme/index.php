<?php
/**
 * Derek Lâm - WordPress Blog Template File
 */
get_header(); ?>

<main class="flex-1 py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full font-sans text-gray-800">

    <!-- Ambient Grid glow backgrounds -->
    <div class="absolute top-[20%] left-1/2 -translate-x-1/2 w-[800px] h-[300px] bg-goldAccent/5 rounded-full blur-[140px] pointer-events-none"></div>

    <!-- Intro Header & Big Branding Section -->
    <section class="text-center space-y-4 mb-14 relative z-10 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-[#FFD700]/10 border border-[#FFD700]/25 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-widest text-[#1A1A2E]">
            <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
            <span>Chuyên Trang Chia Sẻ Chuyên Sâu • WordPress Blog</span>
        </div>
        <h1 class="text-4xl sm:text-5xl font-black text-navyPrimary tracking-tight leading-none">
            Blog Tăng Trưởng Thực Chiến
        </h1>
        <p class="text-xs sm:text-sm text-gray-500 max-w-2xl mx-auto leading-relaxed">
            Các chuyên đề hướng dẫn lập bản đồ Semantic SEO bền vững, tích hợp tự động hóa n8n / Make vào quy trình vận hành phễu lead, tối ưu hóa tốc độ load React/WordPress đỉnh cao.
        </p>
    </section>

    <!-- Main Live Search & Category Toolbar -->
    <div class="bg-white rounded-2xl border border-gray-150 p-4 sm:p-6 mb-10 shadow-sm relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
            
            <!-- Category Filter Row (Simulated WP link filtering or active display) -->
            <div class="lg:col-span-8 flex flex-wrap gap-2 items-center">
                <span class="text-xs font-bold text-navyPrimary uppercase tracking-wider mr-2">Chuyên mục:</span>
                <?php
                // Get list of standard WordPress categories to output dynamically
                $categories = get_categories([
                    'orderby' => 'name',
                    'parent'  => 0
                ]);
                
                $current_cat_id = get_queried_object_id();
                
                // All Categories Badge
                $all_url = esc_url(get_post_type_archive_link('post'));
                if (empty($all_url)) {
                    $all_url = esc_url(home_url('/blog/'));
                }
                $is_all_active = !is_category() ? 'bg-navyPrimary text-goldAccent shadow-sm' : 'bg-[#FAFAF7] hover:bg-gray-100 text-gray-700';
                echo '<a href="'.$all_url.'" class="px-3.5 py-1.5 sm:px-4 sm:py-2 text-[11px] font-bold rounded-lg transition-all uppercase tracking-wider '.$is_all_active.'">Tất cả</a>';

                foreach ($categories as $category) {
                    $is_active = (is_category() && $current_cat_id === $category->term_id) ? 'bg-navyPrimary text-goldAccent shadow-sm' : 'bg-[#FAFAF7] hover:bg-gray-100 text-gray-700';
                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="px-3.5 py-1.5 sm:px-4 sm:py-2 text-[11px] font-bold rounded-lg transition-all uppercase tracking-wider ' . $is_active . '">' . esc_html($category->name) . '</a>';
                }
                ?>
            </div>

            <!-- Standard WordPress Native Search Query Handler -->
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="lg:col-span-4 relative">
                <input 
                    type="search" 
                    placeholder="Tìm kiếm nội dung bài viết..." 
                    value="<?php echo get_search_query(); ?>" 
                    name="s" 
                    class="w-full bg-[#FAFAF8] border border-gray-200 focus:border-navyPrimary rounded-xl pl-4 pr-10 py-2.5 text-xs text-navyPrimary placeholder-gray-400 focus:outline-none transition-all font-medium" 
                />
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-navyPrimary">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Structure Output Columns -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
        
        <!-- Left Feed Content Block -->
        <div class="lg:col-span-8 flex flex-col space-y-6">
            
            <?php if (get_search_query()) : ?>
                <div class="bg-blue-50/60 border border-blue-100 rounded-xl px-4 py-3 text-xs text-gray-600">
                    Kết quả tìm kiếm cho từ khóa: <strong class="text-navyPrimary italic">"<?php echo esc_html(get_search_query()); ?>"</strong>
                </div>
            <?php endif; ?>

            <!-- Layout switcher utilities toolbar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-[#FAFAF7] border border-gray-150 rounded-xl px-4 py-2.5 text-xs text-gray-650">
                <div class="flex items-center gap-2">
                    <span class="font-bold text-navyPrimary">Hiển thị:</span>
                    <button 
                        id="grid-mode-btn" 
                        onclick="switchDisplayMode('grid')" 
                        class="flex items-center gap-1.5 px-3 py-1.5 rounded transition-all font-bold cursor-pointer bg-navyPrimary text-goldAccent shadow-xs"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <span>Dạng lưới</span>
                    </button>
                    <button 
                        id="list-mode-btn" 
                        onclick="switchDisplayMode('list')" 
                        class="flex items-center gap-1.5 px-3 py-1.5 rounded transition-all font-bold cursor-pointer bg-white border border-gray-200 hover:bg-gray-50 text-gray-700"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        <span>Dạng danh sách</span>
                    </button>
                </div>
                <div class="text-right text-[11px] sm:text-xs text-gray-400">
                    Cơ sở dữ liệu lưu trữ: <span class="font-bold text-navyPrimary"><?php echo wp_count_posts()->publish; ?></span> bài chuyên khảo
                </div>
            </div>

            <!-- Posts container wrapper -->
            <div id="posts-feed-wrapper" class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <?php 
                if (have_posts()) : 
                    while (have_posts()) : the_post(); 
                    
                    // Fetch post configurations
                    $read_time = get_post_meta(get_the_ID(), 'read_time', true);
                    if (empty($read_time)) {
                        $read_time = '5 phút đọc';
                    }
                    ?>
                    
                    <!-- Individual Article Item Card -->
                    <article class="post-item-card bg-white rounded-xl border border-gray-150 overflow-hidden shadow-xs hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col h-full cursor-pointer" onclick="window.location.href='<?php the_permalink(); ?>'">
                        
                        <!-- Imagery cover -->
                        <div class="relative bg-gray-100 overflow-hidden shrink-0 w-full h-44 image-container">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover transition-transform duration-700 hover:scale-105']); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=800&q=80" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
                            <?php endif; ?>
                            
                            <!-- Term Category Badge -->
                            <span class="absolute top-3 left-3 bg-navyPrimary text-goldAccent text-[8px] font-extrabold uppercase tracking-widest px-2.5 py-1 rounded shadow-xs z-10">
                                <?php 
                                $cats = get_the_category();
                                echo !empty($cats) ? esc_html($cats[0]->name) : 'BLOG'; 
                                ?>
                            </span>
                        </div>

                        <!-- Info Metadata Block -->
                        <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                            <div class="space-y-1.5 min-w-0">
                                <div class="flex items-center gap-3 text-[10px] text-gray-400 font-semibold tracking-wider metadata-row">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <?php echo esc_html($read_time); ?>
                                    </span>
                                </div>

                                <h3 class="font-extrabold text-navyPrimary hover:text-goldAccent transition-colors leading-snug tracking-tight text-sm sm:text-base line-clamp-2">
                                    <?php the_title(); ?>
                                </h3>

                                <div class="text-xs text-gray-500 leading-normal line-clamp-2 summary-text">
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="flex flex-wrap gap-1 pt-0.5 tag-row">
                                    <?php 
                                    $tags = get_the_tags();
                                    if ($tags) {
                                        $cnt = 0;
                                        foreach ($tags as $tag) {
                                            if ($cnt++ >= 3) break;
                                            echo '<span class="text-[9px] font-medium bg-[#FAFAF7] text-gray-500 border border-gray-200 px-1.5 py-0.5 rounded">#' . esc_html($tag->name) . '</span>';
                                        }
                                    } else {
                                        echo '<span class="text-[9px] font-medium bg-[#FAFAF7] text-gray-500 border border-gray-200 px-1.5 py-0.5 rounded">#SEO</span>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- Footer signature -->
                            <div class="flex items-center justify-between pt-3 border-t border-gray-100 mt-1 footer-signature">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 bg-navyPrimary text-goldAccent rounded-full flex items-center justify-center text-[8px] font-extrabold border border-goldAccent/25">
                                        DL
                                    </span>
                                    <span class="text-[10px] font-bold text-gray-700"><?php echo get_the_author(); ?></span>
                                </div>
                                <span class="text-[10px] font-black uppercase text-navyPrimary inline-flex items-center gap-1 transition-transform hover:translate-x-0.5">
                                    Đọc bài <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                                </span>
                            </div>
                        </div>

                    </article>

                    <?php 
                    endwhile; 
                else : 
                    ?>
                    <!-- Fallback empty statement -->
                    <div class="col-span-2 text-center py-16 bg-white border border-gray-150 rounded-xl max-w-xl mx-auto space-y-3">
                        <svg class="w-12 h-12 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="font-extrabold text-navyPrimary">Chưa tìm thấy bài viết nào</h3>
                        <p class="text-xs text-gray-500">Các bài viết mới đang được biên tập và nạp lên hệ thống cơ sở dữ liệu.</p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-navyPrimary text-white text-xs font-bold uppercase tracking-wider px-5 py-2.5 rounded-lg shadow hover:bg-goldAccent hover:text-navyPrimary transition-all">Quay lại trang chủ</a>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Standard WordPress theme numerical post pagination -->
            <div class="flex items-center justify-center gap-1.5 border-t border-gray-100 pt-6 mt-4">
                <?php
                echo paginate_links([
                    'total'     => $wp_query->max_num_pages,
                    'current'   => max(1, get_query_var('paged')),
                    'format'    => '?paged=%#%',
                    'show_all'  => false,
                    'type'      => 'plain',
                    'prev_next' => true,
                    'prev_text' => esc_html__('Trước', 'derek-lam'),
                    'next_text' => esc_html__('Sau', 'derek-lam'),
                    'class'     => 'inline-flex gap-1 border border-gray-200 bg-white rounded-lg p-1'
                ]);
                ?>
            </div>

        </div>

        <!-- Right Sidebar Widgets Column -->
        <aside class="col-span-12 lg:col-span-4 space-y-6">
            
            <?php if (!is_active_sidebar('sidebar-primary')) : ?>
                <!-- Clean static default profile widget -->
                <section class="bg-white border border-gray-150 p-6 rounded-xl shadow-xs space-y-4">
                    <h4 class="text-xs font-black uppercase tracking-widest text-[#1A1A2E] border-b border-gray-100 pb-3 block">Chuyển Gia Công Nghệ</h4>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-navyPrimary border border-goldAccent/25 text-goldAccent rounded-full flex items-center justify-center font-extrabold text-xs">DL</div>
                        <div>
                            <h5 class="text-xs font-extrabold text-[#1A1A2E] leading-snug">Derek Lâm</h5>
                            <span class="text-[10px] font-bold text-gray-400 uppercase">Consultant Specialist</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 leading-relaxed text-justify">
                        Thiết kế kiến trúc tự động hóa kết hợp với cấu trúc Entity SEO ngữ nghĩa, biến Website của bạn thành một cỗ máy thu gom khách hàng tiềm năng năng lực cao.
                    </p>
                </section>

                <!-- Category counter indexes -->
                <section class="bg-white border border-gray-150 p-6 rounded-xl shadow-xs space-y-4">
                    <h4 class="text-xs font-black uppercase tracking-widest text-[#1A1A2E] border-b border-gray-100 pb-3 block">Phân Tầng Chủ Đề</h4>
                    <div class="flex flex-col space-y-2.5 text-xs text-gray-650">
                        <div class="flex items-center justify-between border-b border-gray-50 pb-1.5">
                            <span class="font-semibold">SEO Thực Chiến</span>
                            <span class="bg-[#FAFAF7] font-bold px-2 py-0.5 rounded text-gray-500 text-[10px]">Active</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-gray-50 pb-1.55">
                            <span class="font-semibold">AI & Automation</span>
                            <span class="bg-[#FAFAF7] font-bold px-2 py-0.5 rounded text-gray-500 text-[10px]">Active</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-gray-50 pb-1.55">
                            <span class="font-semibold">Tối Ưu Tốc Độ</span>
                            <span class="bg-[#FAFAF7] font-bold px-2 py-0.5 rounded text-gray-500 text-[10px]">Active</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-semibold">Tư Bản Quy Trình</span>
                            <span class="bg-[#FAFAF7] font-bold px-2 py-0.5 rounded text-gray-500 text-[10px]">Active</span>
                        </div>
                    </div>
                </section>
            <?php else : ?>
                <?php dynamic_sidebar('sidebar-primary'); ?>
            <?php endif; ?>

        </aside>

    </div>

</main>

<script>
    /**
     * Highly resilient JavaScript interface controller to toggle CSS structure
     * on post lists, bringing Grid vs horizontal Row displays natively inside WordPress
     */
    function switchDisplayMode(mode) {
        const wrapper = document.getElementById('posts-feed-wrapper');
        const cards = document.querySelectorAll('.post-item-card');
        const gridBtn = document.getElementById('grid-mode-btn');
        const listBtn = document.getElementById('list-mode-btn');
        
        if (!wrapper) return;

        if (mode === 'grid') {
            // Revert back to 2 columns layout
            wrapper.className = 'grid grid-cols-1 md:grid-cols-2 gap-6';
            
            cards.forEach(card => {
                card.className = "post-item-card bg-white rounded-xl border border-gray-150 overflow-hidden shadow-xs hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col h-full cursor-pointer";
                
                // Seek sub elements
                const imgCont = card.querySelector('.image-container');
                if (imgCont) imgCont.className = "relative bg-gray-100 overflow-hidden shrink-0 w-full h-44 image-container";

                const desc = card.querySelector('.summary-text');
                if (desc) desc.className = "text-xs text-gray-500 leading-normal line-clamp-2 summary-text";
            });

            // Adjust active state colors for visual buttons
            gridBtn.className = "flex items-center gap-1.5 px-3 py-1.5 rounded transition-all font-bold cursor-pointer bg-navyPrimary text-goldAccent shadow-xs";
            listBtn.className = "flex items-center gap-1.5 px-3 py-1.5 rounded transition-all font-bold cursor-pointer bg-white border border-gray-200 hover:bg-gray-50 text-gray-750";
        } else {
            // Transform container into compact enterprise list row model
            wrapper.className = 'flex flex-col space-y-3';
            
            cards.forEach(card => {
                card.className = "post-item-card bg-white rounded-xl border border-gray-150 p-3.5 flex flex-row items-center gap-4 cursor-pointer hover:border-goldAccent transition-all group shadow-2xs w-full";
                
                // Resize image to small square standard list thumbnail
                const imgCont = card.querySelector('.image-container');
                if (imgCont) imgCont.className = "w-14 h-14 sm:w-16 sm:h-16 rounded-lg bg-gray-100 overflow-hidden shrink-0 image-container";

                const desc = card.querySelector('.summary-text');
                if (desc) desc.className = "text-[11px] text-gray-500 line-clamp-1 summary-text";
            });

            // Adjust buttons
            gridBtn.className = "flex items-center gap-1.5 px-3 py-1.5 rounded transition-all font-bold cursor-pointer bg-white border border-gray-200 hover:bg-gray-50 text-gray-750";
            listBtn.className = "flex items-center gap-1.5 px-3 py-1.5 rounded transition-all font-bold cursor-pointer bg-navyPrimary text-goldAccent shadow-xs";
        }
    }
</script>

<?php get_footer(); ?>
