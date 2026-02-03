<?php
/**
 * The template for displaying search results
 *
 * @package Visit_Camotes
 */

get_header();
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 min-h-[60vh]">
    <header class="mb-16 border-b border-gray-200 dark:border-gray-800 pb-8">
        <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight text-[#121617] dark:text-white mb-4">
            <?php printf( esc_html__( 'Search Results for: %s', 'visitcamotes' ), '<span class="text-primary">' . get_search_query() . '</span>' ); ?>
        </h1>
        <p class="text-gray-500 dark:text-gray-400">
            <?php 
            global $wp_query;
            $count = $wp_query->found_posts;
            printf( _n( '%d story found matches your search.', '%d stories found matching your search.', $count, 'visitcamotes' ), $count );
            ?>
        </p>
    </header>

    <!-- Search Results Loop -->
    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
            <?php while ( have_posts() ) : the_post(); 
                $post_type = get_post_type();
                if ($post_type === 'page') {
                    $label = 'Page';
                } elseif ($post_type === 'destination') {
                    $label = 'Destination';
                } else {
                    $categories = get_the_category();
                    $label = !empty($categories) ? $categories[0]->name : 'Post';
                }
                $label = ucwords($label);
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
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary"><?php echo esc_html($label); ?></span>
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

        <!-- Pagination -->
        <?php
        the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => '<span class="material-symbols-outlined text-sm">chevron_left</span>',
            'next_text' => '<span class="material-symbols-outlined text-sm">chevron_right</span>',
            'class'     => 'mt-16 flex items-center justify-center gap-4',
        ) );
        ?>

    <!-- No Results Section -->
    <?php else : ?>
        <div class="flex flex-col items-center justify-center py-20 text-center">
            <div class="mb-8 rounded-full bg-gray-100 dark:bg-gray-800 p-8">
                <span class="material-symbols-outlined text-6xl text-gray-400">search_off</span>
            </div>
            <h2 class="text-3xl font-black text-[#121617] dark:text-white mb-4">No results found</h2>
            <p class="text-lg text-gray-500 dark:text-gray-400 max-w-md mx-auto mb-12">
                We couldn't find any stories matching "<?php echo get_search_query(); ?>". Try checking your spelling or using more general keywords.
            </p>
            
            <div class="w-full max-w-md bg-white dark:bg-gray-900 p-2 rounded-2xl editorial-shadow">
                <form role="search" method="get" class="flex items-center" action="<?php echo home_url('/'); ?>">
                    <input type="search" class="flex-1 px-6 py-4 rounded-xl border-0 bg-transparent text-gray-900 dark:text-white focus:ring-0 placeholder-gray-400" placeholder="Try another search..." value="<?php echo get_search_query(); ?>" name="s">
                    <button type="submit" class="bg-primary text-white p-4 rounded-xl hover:opacity-90 transition-opacity">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </form>
            </div>
            
            <a href="<?php echo home_url('/'); ?>" class="mt-8 text-sm font-bold uppercase tracking-widest text-primary hover:underline">
                Back to Homepage
            </a>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
