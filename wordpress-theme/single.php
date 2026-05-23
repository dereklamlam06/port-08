<?php
/**
 * Derek Lâm - WordPress Single Post Detail Template
 */
get_header(); ?>

<main class="flex-1 py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto w-full font-sans text-gray-800">

    <?php 
    if (have_posts()) : 
        while (have_posts()) : the_post(); 
        
        // Custom read time
        $read_time = get_post_meta(get_the_ID(), 'read_time', true);
        if (empty($read_time)) {
            $read_time = '6 phút đọc';
        }
        ?>

        <!-- Breadcrumbs index link -->
        <div class="mb-6 flex items-center gap-2 text-xs font-semibold text-gray-400">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-navyPrimary transition-colors uppercase">Trang Chủ</a>
            <span>/</span>
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="hover:text-navyPrimary transition-colors uppercase">Blog</a>
            <span>/</span>
            <span class="text-gray-600 truncate max-w-[200px]"><?php the_title(); ?></span>
        </div>

        <article class="bg-white rounded-2xl border border-gray-150 overflow-hidden shadow-sm relative z-10">
            
            <!-- Cover feature banner image -->
            <div class="relative w-full h-[240px] sm:h-[400px] bg-gray-100 overflow-hidden">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                <?php else : ?>
                    <img src="https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=1200&q=80" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover" />
                <?php endif; ?>

                <!-- Category overlay badge -->
                <span class="absolute top-4 left-4 bg-navyPrimary text-goldAccent text-[9px] font-black uppercase tracking-widest px-3.5 py-2 rounded-lg shadow">
                    <?php 
                    $cats = get_the_category();
                    echo !empty($cats) ? esc_html($cats[0]->name) : 'CHUYÊN KHẢO'; 
                    ?>
                </span>
            </div>

            <!-- Main text body layout wrapper -->
            <div class="p-6 sm:p-10 space-y-8">
                
                <!-- Heading details meta list -->
                <div class="space-y-4 border-b border-gray-100 pb-6">
                    <div class="flex items-center gap-4 text-xs font-bold text-gray-400 tracking-wider">
                        <span class="flex items-center gap-1.5 uppercase">
                            <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="flex items-center gap-1.5 uppercase">
                            <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo esc_html($read_time); ?>
                        </span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-extrabold text-navyPrimary tracking-tight leading-tight">
                        <?php the_title(); ?>
                    </h1>

                    <!-- Author badge -->
                    <div class="flex items-center gap-2.5 pt-2">
                        <span class="w-7 h-7 bg-navyPrimary text-goldAccent rounded-full flex items-center justify-center text-[10px] font-extrabold border border-goldAccent/25">
                            DL
                        </span>
                        <div>
                            <span class="text-xs font-black text-navyPrimary block"><?php the_author(); ?></span>
                            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest block">Specialist Consultant</span>
                        </div>
                    </div>
                </div>

                <!-- Actual loop content with premium typography stylings -->
                <div class="prose max-w-none text-gray-650 text-sm leading-relaxed text-justify space-y-4" style="font-size: 14.5px;">
                    <?php the_content(); ?>
                </div>

                <!-- Post Tags mapped -->
                <div class="flex flex-wrap gap-2 pt-6 border-t border-gray-100">
                    <?php 
                    $tags = get_the_tags();
                    if ($tags) :
                        foreach ($tags as $tag) : ?>
                            <span class="text-[10px] font-bold bg-[#FAFAF7] text-gray-600 border border-gray-200 px-2.5 py-1 rounded-md">
                                #<?php echo esc_html($tag->name); ?>
                            </span>
                        <?php endforeach;
                    endif; 
                    ?>
                </div>

            </div>

        </article>

        <!-- Previous and Next Navigation panels -->
        <nav class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
            <div class="text-left bg-white border border-gray-150 rounded-xl p-4 hover:border-navyPrimary transition-all">
                <span class="text-[9px] font-black uppercase text-gray-400 block mb-1">Bài viết trước</span>
                <?php previous_post_link('%link', '<span class="text-[13px] font-extrabold text-navyPrimary line-clamp-1 hover:text-[#FFD700] transition-colors">%title</span>'); ?>
            </div>
            <div class="text-right bg-white border border-gray-150 rounded-xl p-4 hover:border-navyPrimary transition-all">
                <span class="text-[9px] font-black uppercase text-gray-400 block mb-1">Bài viết sau</span>
                <?php next_post_link('%link', '<span class="text-[13px] font-extrabold text-navyPrimary line-clamp-1 hover:text-[#FFD700] transition-colors">%title</span>'); ?>
            </div>
        </nav>

        <!-- Standard WordPress Comment Module -->
        <?php 
        if (comments_open() || get_comments_number()) :
            echo '<div class="mt-10 bg-white border border-gray-150 rounded-xl p-6 sm:p-8 shadow-xs">';
            comments_template();
            echo '</div>';
        endif;

        endwhile; 
    endif; 
    ?>

</main>

<?php get_footer(); ?>
