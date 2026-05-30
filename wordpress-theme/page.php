<?php
/**
 * Derek Flow - Default Page Template & Smart Auto-Router
 */
get_header();

$slug = get_post_field('post_name', get_the_ID());

// Smart auto-routing based on common page slugs in both standard English and Vietnamese forms
if (in_array($slug, ['dich-vu', 'services', 'dich-vu-seo', 'our-services'])) {
    $template = locate_template(['page-dich-vu.php', 'page-services.php']);
    if (!empty($template)) {
        include($template);
        get_footer();
        exit;
    }
} elseif (in_array($slug, ['gioi-thieu', 'about', 'gioi-thieu-derek-flow', 'about-us'])) {
    $template = locate_template(['page-gioi-thieu.php', 'page-about.php']);
    if (!empty($template)) {
        include($template);
        get_footer();
        exit;
    }
} elseif (in_array($slug, ['case-study', 'case-studies', 'portfolio', 'du-an', 'du-an-tieu-bieu'])) {
    $template = locate_template(['page-case-study.php', 'page-portfolio.php']);
    if (!empty($template)) {
        include($template);
        get_footer();
        exit;
    }
} elseif (in_array($slug, ['gia', 'pricing', 'bang-gia', 'pricing-plans'])) {
    $template = locate_template(['page-gia.php', 'page-pricing.php']);
    if (!empty($template)) {
        include($template);
        get_footer();
        exit;
    }
} elseif (in_array($slug, ['lien-he', 'contact', 'lien-he-tu-van'])) {
    $template = locate_template(['page-lien-he.php', 'page-contact.php']);
    if (!empty($template)) {
        include($template);
        get_footer();
        exit;
    }
} elseif (in_array($slug, ['blog', 'tin-tuc', 'news'])) {
    $template = locate_template(['page-blog.php', 'index.php']);
    if (!empty($template)) {
        include($template);
        get_footer();
        exit;
    }
}

// Default Page Layout fallback if the page is a standard user-created page with Gutenberg content
?>

<main class="flex-1 py-16 px-6 md:px-12 max-w-5xl mx-auto w-full font-sans text-gray-850 bg-[#FAFAF7] relative">
    <div class="space-y-8 animate-fade-in">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Page Title Header -->
            <div class="space-y-4 text-center border-b border-gray-200 pb-8">
                <span class="text-[10px] font-bold tracking-widest uppercase text-[#FFD700] bg-[#1A1A2E] px-3 py-1 rounded inline-block font-mono">
                    <?php echo get_bloginfo('name'); ?>
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-[#1A1A2E] tracking-tight leading-tight">
                    <?php the_title(); ?>
                </h1>
            </div>

            <!-- Page Content styled beautiful using high class margins -->
            <article class="prose max-w-none text-xs sm:text-[13.5px] text-gray-750 leading-relaxed text-justify space-y-6 pt-4 font-sans font-medium">
                <?php the_content(); ?>
            </article>

        <?php endwhile; endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>
