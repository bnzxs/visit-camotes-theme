<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Visit_Camotes
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- 404 Hero Section -->
    <section class="relative py-20 md:py-32 overflow-hidden bg-background-light dark:bg-background-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="mb-8 flex justify-center">
                <img src="/wp-content/uploads/2026/01/VisitCamotes-Logo-e1769568648963.webp" alt="<?php bloginfo('name'); ?>" class="h-[120px] md:h-[180px] w-auto opacity-10 absolute -top-10 md:-top-20 left-1/2 -translate-x-1/2 select-none pointer-events-none">
                <h1 class="text-7xl md:text-9xl font-black text-primary relative">404</h1>
            </div>
            
            <h2 class="text-4xl md:text-5xl font-black text-text-main dark:text-white mb-6">Oops! Lost in <span class="text-primary">Paradise?</span></h2>
            <p class="text-lg md:text-xl text-text-sub dark:text-gray-400 max-w-2xl mx-auto mb-10">
                Looks like the page you're looking for has drifted off like a message in a bottle. Let's get you back on track to explore more of Camotes Island.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="bg-primary hover:bg-orange-600 text-white text-base font-bold h-12 px-8 rounded-lg shadow-lg hover:shadow-orange-500/30 transition-all transform hover:-translate-y-1 inline-flex items-center justify-center">
                    Return Home
                </a>
                <a href="<?php echo esc_url(home_url('/destinations/')); ?>" 
                   class="bg-white hover:bg-white/20 dark:bg-white/5 dark:hover:bg-white/10 backdrop-blur-sm text-text-main dark:text-white border border-gray-200 dark:border-white/20 text-base font-bold h-12 px-8 rounded-lg transition-all inline-flex items-center justify-center">
                    Explore Destinations
                </a>
            </div>
        </div>
    </section>

    <!-- Recent Blogs Section -->
    <section class="py-20 bg-white dark:bg-gray-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="text-xs font-black uppercase tracking-[0.2em] text-primary mb-2 block">Don't Miss Out</span>
                    <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Latest Stories & <span class="text-primary">Tips</span></h2>
                </div>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="group flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-primary">
                    View All Posts
                    <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                </a>
            </div>

            <?php
            $recent_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
            ));

            if ($recent_posts->have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); 
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? ucwords(strtolower($categories[0]->name)) : 'Uncategorized';
                    ?>
                        <article class="hover-card flex flex-col gap-6">
                            <a href="<?php the_permalink(); ?>" class="aspect-[4/3] w-full overflow-hidden rounded-xl bg-gray-200">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="h-full w-full bg-cover bg-center transition-transform duration-300 hover:scale-105" 
                                         style='background-image: url("<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>");'>
                                    </div>
                                <?php else : ?>
                                    <div class="h-full w-full bg-gray-300 dark:bg-gray-700"></div>
                                <?php endif; ?>
                            </a>
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] font-black capitalize tracking-[0.2em] text-primary"><?php echo esc_html($category_name); ?></span>
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400"><?php echo get_the_date('M d, Y'); ?></span>
                                </div>
                                <h3 class="text-2xl font-black leading-tight tracking-tight text-[#121617] dark:text-white">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors"><?php the_title(); ?></a>
                                </h3>
                                <p class="line-clamp-2 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                </p>
                                <a class="mt-2 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-primary hover:gap-3 transition-all" href="<?php the_permalink(); ?>">
                                    Read More
                                    <span class="material-symbols-outlined text-sm">east</span>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p class="text-center text-gray-500 dark:text-gray-400">No stories found yet. Check back soon!</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
