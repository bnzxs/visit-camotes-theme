<?php
/**
 * Single Post Template
 *
 * The template for displaying all single posts and blog entries.
 *
 * @package Visit_Camotes
 */

get_header();

while (have_posts()) : the_post();
    $categories = get_the_category();
    $category_name = !empty($categories) ? $categories[0]->name : 'Uncategorized';
    $reading_time = ceil(str_word_count(strip_tags(get_the_content())) / 200); // Approx reading time
?>

<!-- Main Article Container -->
<article class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">
    <header class="mb-8">
        <?php if (function_exists('visitcamotes_breadcrumbs')) visitcamotes_breadcrumbs(); ?>

        <div class="flex items-center gap-4 mb-[0.5rem]">
            <span class="text-xs font-black uppercase tracking-[0.2em] text-primary"><?php echo esc_html($category_name); ?></span>
        </div>
        <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight text-[#121617] dark:text-white mb-6">
            <?php the_title(); ?>
        </h1>
  
        <div class="flex items-center gap-4">
            <?php echo get_avatar(get_the_author_meta('ID'), 48, '', '', array('class' => 'rounded-full')); ?>
            <div>
                <p class="font-bold text-[#121617] dark:text-white"><?php the_author(); ?></p>
                <div class="flex items-center gap-2">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Author</p>
                    <span class="text-gray-400">•</span>
                    <time class="text-sm text-gray-500 dark:text-gray-400"><?php echo get_the_date('F j, Y'); ?></time>
                    <span class="text-gray-400">•</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $reading_time; ?> min read</span>
                </div>
            </div>

        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
    <div class="mb-8 rounded-xl overflow-hidden editorial-shadow relative h-[400px] md:h-[500px] lg:h-[510px] group">
        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
             fetchpriority="high"
             loading="eager" 
             alt="<?php the_title_attribute(); ?>" 
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
    </div>
    <?php endif; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-8">
            <div id="blog-content" class="prose prose-lg dark:prose-invert max-w-none mb-16
                        /* Typography */
                        prose-headings:font-bold prose-headings:tracking-tight
                        prose-h2:text-3xl prose-h2:mt-12 prose-h2:mb-6 prose-h2:text-[#121617] dark:prose-h2:text-white
                        prose-h3:text-2xl prose-h3:mt-8 prose-h3:mb-4 prose-h3:text-[#121617] dark:prose-h3:text-white
                        prose-p:text-gray-700 dark:prose-p:text-gray-300 prose-p:leading-[1.8] prose-p:mb-6 prose-p:text-[1.0625rem]
                        
                        /* Links */
                        prose-a:text-primary prose-a:font-medium prose-a:no-underline hover:prose-a:underline prose-a:transition-all
                        
                        /* Images - Enhanced */
                        prose-img:rounded-2xl prose-img:my-8 prose-img:transition-all prose-img:duration-500
                        prose-figure:my-8 prose-figure:mx-0 prose-figure:overflow-hidden prose-figure:rounded-2xl
                        prose-figcaption:text-center prose-figcaption:text-sm prose-figcaption:text-gray-500 dark:prose-figcaption:text-gray-400 prose-figcaption:mt-3 prose-figcaption:italic
                        
                        /* Blockquotes - Premium Style */
                        prose-blockquote:border-l-4 prose-blockquote:border-primary prose-blockquote:pl-8 prose-blockquote:pr-6 
                        prose-blockquote:py-4 prose-blockquote:my-8 prose-blockquote:bg-gray-50 dark:prose-blockquote:bg-gray-900/50
                        prose-blockquote:rounded-r-xl prose-blockquote:italic prose-blockquote:text-gray-800 dark:prose-blockquote:text-gray-200
                        prose-blockquote:text-xl prose-blockquote:font-medium prose-blockquote:leading-relaxed
                        
                        /* Lists */
                        prose-ul:list-disc prose-ul:pl-6 prose-ul:my-6 prose-ul:space-y-2
                        prose-ol:list-decimal prose-ol:pl-6 prose-ol:my-6 prose-ol:space-y-2
                        prose-li:text-gray-700 dark:prose-li:text-gray-300 prose-li:leading-relaxed
                        
                        /* WordPress Galleries */
                        [&_.wp-block-gallery]:flex [&_.wp-block-gallery]:flex-wrap [&_.wp-block-gallery]:gap-6 [&_.wp-block-gallery]:list-none [&_.wp-block-gallery]:pl-0 [&_.wp-block-gallery]:my-8
                        [&_.blocks-gallery-item]:flex-1 [&_.blocks-gallery-item]:min-w-[45%]
                        [&_.blocks-gallery-item_img]:w-full [&_.blocks-gallery-item_img]:h-64 [&_.blocks-gallery-item_img]:object-cover [&_.blocks-gallery-item_img]:rounded-2xl
                        
                        /* Strong/Bold */
                        prose-strong:text-gray-900 dark:prose-strong:text-white prose-strong:font-bold
                        
                        /* Code */
                        prose-code:text-primary prose-code:bg-gray-100 dark:prose-code:bg-gray-800 prose-code:px-2 prose-code:py-1 prose-code:rounded prose-code:text-sm
                        prose-pre:bg-gray-900 prose-pre:text-gray-100 prose-pre:rounded-xl prose-pre:p-6 prose-pre:my-8">
                <?php the_content(); ?>
            </div>

            <style>
                /* Drop Cap for First Paragraph */
                #blog-content > p:first-of-type::first-letter {
                    float: left;
                    font-size: 4.5rem;
                    line-height: 0.85;
                    font-weight: 900;
                    margin-right: 0.5rem;
                    margin-top: 0.15rem;
                    color: var(--wp--preset--color--primary, #ee6c2b);
                }
                
                 /* Enhanced Image Shadows & Smooth Hover */
                #blog-content img,
                .wp-block-image img,
                .wp-block-gallery img {
                    box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.15);
                    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                    border-radius: 1rem;
                }
                
                #blog-content img:hover,
                .wp-block-image img:hover,
                .wp-block-gallery img:hover {
                    transform: translateY(-5px) scale(1.01);
                    box-shadow: 0 25px 60px -12px rgba(0, 0, 0, 0.25);
                    position: relative;
                    z-index: 10;
                }
                
                /* Alignment Classes Support */
                #blog-content img:not(.alignleft):not(.alignright):not(.aligncenter) {
                    width: 100%;
                }

                #blog-content .alignright {
                    float: right;
                    margin-left: 2rem;
                    margin-bottom: 1.5rem;
                    max-width: 50%;
                    clear: right;
                }

                #blog-content .alignleft {
                    float: left;
                    margin-right: 2rem;
                    margin-bottom: 1.5rem;
                    max-width: 50%;
                    clear: left;
                }

                #blog-content .aligncenter {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    margin-bottom: 1.5rem;
                }

                @media (max-width: 640px) {
                    #blog-content .alignright,
                    #blog-content .alignleft {
                        float: none;
                        margin-left: 0;
                        margin-right: 0;
                        max-width: 100%;
                    }
                }
                
                /* Smooth Fade-in Animation */
                #blog-content > * {
                    opacity: 0;
                    animation: fadeInUp 0.8s ease-out forwards;
                }
                
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                
                /* Stagger animation delays */
                #blog-content > *:nth-child(1) { animation-delay: 0.1s; }
                #blog-content > *:nth-child(2) { animation-delay: 0.2s; }
                #blog-content > *:nth-child(3) { animation-delay: 0.3s; }
                #blog-content > *:nth-child(4) { animation-delay: 0.4s; }
                #blog-content > *:nth-child(5) { animation-delay: 0.5s; }
                #blog-content > *:nth-child(n+6) { animation-delay: 0.6s; }
                
                /* Better blockquote styling */
                #blog-content blockquote::before {
                    content: '"';
                    font-size: 4rem;
                    line-height: 0;
                    position: absolute;
                    margin-left: -2.5rem;
                    margin-top: 1.5rem;
                    color: var(--wp--preset--color--primary, #ee6c2b);
                    opacity: 0.3;
                    font-family: Georgia, serif;
                }
                
                #blog-content blockquote {
                    position: relative;
                }
                
                /* Heading underline effect */
                #blog-content h2 {
                    display: flow-root;
                    position: relative;
                }
                
                #blog-content h2::after {
                    content: '';
                    display: block;
                    width: 60px;
                    height: 4px;
                    background: var(--wp--preset--color--primary, #ee6c2b);
                    margin-bottom: 1rem;
                    border-radius: 2px;
                    margin-top: 0.3rem;
                }
                
                /* Link hover effect */
                #blog-content a {
                    background-image: linear-gradient(to right, var(--wp--preset--color--primary, #ee6c2b) 0%, var(--wp--preset--color--primary, #ee6c2b) 100%);
                    background-size: 0 2px;
                    background-position: 0 100%;
                    background-repeat: no-repeat;
                    transition: background-size 0.3s ease;
                }
                
                #blog-content a:hover {
                    background-size: 100% 2px;
                    text-decoration: none;
                }   
                
                /* Custom Styling */
                #blog-content p {
                    margin-bottom: 1rem;
                }
                
                #blog-content h2.wp-block-heading {
                    margin-top: 1rem;
                }
                
                #blog-content h3.wp-block-heading {
                    display: flow-root;
                    margin-top: 1rem;
                    padding-left: 1rem;
                }

                #blog-content .wp-block-quote {
                    margin: 2rem 0;
                    padding: 0 1rem;
                    font-style: italic;
                }

                #blog-content .wp-block-quote::before {
                    display: none;
                }

                #blog-content .wp-block-list {
                    padding-left: 2rem;
                }

                #blog-content .wp-block-list li {
                    list-style-type: circle;
                }

                #blog-content ul.wp-block-list {
                    margin-bottom: 1rem;
                }
            </style>

            <?php 
            $tags = get_the_tags();
            if ($tags) : ?>
            <div class="mb-12 pb-12 border-b border-gray-200 dark:border-gray-800">
                <h3 class="text-sm font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    <?php
                    foreach ($tags as $tag) : ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                    class="px-4 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-primary hover:text-white transition-colors">
                        <?php echo esc_html($tag->name); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (get_the_author_meta('description')) : ?>
            <!-- Author Biography Section -->
            <div class="mb-16 p-8 rounded-xl bg-gray-50 dark:bg-gray-900">
                <div class="flex gap-6 items-start">
                    <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-full')); ?>
                    <div>
                        <h3 class="text-xl font-bold text-[#121617] dark:text-white mb-2">About <?php the_author(); ?></h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            <?php echo get_the_author_meta('description'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <aside class="lg:col-span-4 space-y-6 sticky top-24 self-start">
            <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-xl">
                <h3 class="text-lg font-bold text-[#121617] dark:text-white mb-6">Search</h3>
                <form role="search" method="get" class="relative" action="<?php echo home_url('/'); ?>">
                    <input type="search" class="w-full px-4 py-3 rounded-lg border-0 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary placeholder-gray-400" placeholder="Search articles and pages..." value="<?php echo get_search_query(); ?>" name="s">
                    <button type="submit" class="absolute right-3 top-3 text-gray-400 hover:text-primary transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>

            <!-- Ad Placeholder: Sidebar -->
            <div class="w-full">
                <div class="flex flex-col items-center justify-center py-6 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
                    <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
                    <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                        <span class="material-symbols-outlined text-3xl">ads_click</span>
                        <span class="text-sm font-medium">Sidebar Ad</span>
                        <span class="text-xs opacity-75">(Vertical/Square)</span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget 
            <div>
                <h3 class="text-lg font-bold text-[#121617] dark:text-white mb-6">Categories</h3>
                <div class="flex flex-col gap-2">
                    <?php
                    $categories = get_categories(array('orderby' => 'count', 'order' => 'DESC', 'number' => 8));
                    foreach ($categories as $cat) :
                    ?>
                    <a href="<?php echo get_category_link($cat->term_id); ?>" class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-800 group">
                        <span class="text-gray-600 dark:text-gray-400 group-hover:text-primary transition-colors"><?php echo esc_html($cat->name); ?></span>
                        <span class="text-xs font-bold bg-gray-100 dark:bg-gray-800 text-gray-400 px-2 py-1 rounded-md"><?php echo $cat->count; ?></span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            -->
            <div>
                <h3 class="text-lg font-bold text-[#121617] dark:text-white mb-6">Recent Stories</h3>
                <div class="flex flex-col gap-6">
                    <?php
                    $recent_posts = new WP_Query(array('posts_per_page' => 4, 'post__not_in' => array(get_the_ID())));
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="flex gap-4 group">
                        <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-gray-200">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300')); ?>
                            <?php else: ?>
                                <div class="w-full h-full bg-gray-300"></div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#121617] dark:text-white leading-tight mb-1 group-hover:text-primary transition-colors line-clamp-2"><?php the_title(); ?></h4>
                            <span class="text-xs text-gray-400"><?php echo get_the_date('M d, Y'); ?></span>
                        </div>
                    </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </aside>
    </div>
</article>

<?php
$related_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID()),
    'orderby' => 'rand',
);

if (!empty($categories)) {
    $related_args['category__in'] = array($categories[0]->term_id);
}

$related_query = new WP_Query($related_args);

if ($related_query->have_posts()) : ?>

    <!-- Ad Placeholder: Single Post Bottom -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="flex flex-col items-center justify-center p-8 bg-white dark:bg-gray-800 border border-dashed border-gray-200 dark:border-gray-700 rounded-xl relative overflow-hidden group">
            <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
            <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                <span class="material-symbols-outlined text-4xl">ads_click</span>
                <span class="text-sm font-medium">Content Ad Slot</span>
            </div>
        </div>
    </div>

<!-- Related Stories Grid -->
<section class="bg-gray-50 dark:bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-[#121617] dark:text-white mb-8">Related Stories</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); 
                $rel_categories = get_the_category();
                $rel_category_name = !empty($rel_categories) ? $rel_categories[0]->name : 'Uncategorized';
            ?>
            <article class="hover-card flex flex-col gap-4">
                <a href="<?php the_permalink(); ?>" class="aspect-[4/3] w-full overflow-hidden rounded-xl bg-gray-200">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-300 hover:scale-105" 
                         style='background-image: url("<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>");'>
                    </div>
                    <?php else : ?>
                    <div class="h-full w-full bg-gray-300 dark:bg-gray-700"></div>
                    <?php endif; ?>
                </a>
                <div class="flex flex-col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary"><?php echo esc_html($rel_category_name); ?></span>
                    <h3 class="text-xl font-bold leading-tight text-[#121617] dark:text-white">
                        <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors"><?php the_title(); ?></a>
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo get_the_date('M d, Y'); ?></p>
                </div>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
