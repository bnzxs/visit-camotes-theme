<?php
/**
 * Template Name: Destination Page
 *
 * The template for displaying all destinations with category filtering 
 * and grid/list view toggles.
 *
 * @package Visit_Camotes
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php
$current_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : 'all';
?>
<!-- Category Navigation Sticky Bar -->
<div
    class="w-full sticky top-[64px] z-40 bg-background-light/95 dark:bg-background-dark/95 backdrop-blur-sm border-b border-[#e6dfdb] dark:border-[#2f2521]">
    <div class=" flex justify-center py-2">
        <div class="flex flex-col max-w-[1280px] md:px-8 flex-1 w-full">
            <div class="flex justify-between overflow-x-auto no-scrollbar gap-4 mx-4 md:mx-0">
                <a class="flex flex-col items-center justify-center border-b-[3px] <?php echo ($current_category === 'all' || !$current_category) ? 'border-b-primary text-[#181311] dark:text-white' : 'border-b-transparent text-[#896f61] hover:text-primary hover:border-b-primary/30'; ?> pb-3 pt-2 flex-1 min-w-[80px] md:min-w-[100px] transition-all group"
                    href="?category=all">
                    <span class="material-symbols-outlined mb-1 text-[22px] md:text-2xl <?php echo ($current_category === 'all' || !$current_category) ? '' : 'group-hover:text-primary'; ?>">public</span>
                    <p class="text-xs md:text-sm font-bold leading-normal tracking-[0.015em] whitespace-nowrap">
                        <span class="md:hidden">All</span>
                        <span class="hidden md:inline">All Destinations</span>
                    </p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] <?php echo $current_category === 'coastal' ? 'border-b-primary text-[#181311] dark:text-white' : 'border-b-transparent text-[#896f61] hover:text-primary hover:border-b-primary/30'; ?> pb-3 pt-2 flex-1 min-w-[80px] md:min-w-[100px] transition-all group"
                    href="?category=coastal">
                    <span class="material-symbols-outlined mb-1 text-[22px] md:text-2xl <?php echo $current_category === 'coastal' ? '' : 'group-hover:text-primary'; ?>">beach_access</span>
                    <p class="text-xs md:text-sm font-bold leading-normal tracking-[0.015em] whitespace-nowrap">Coastal</p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] <?php echo $current_category === 'mountain' ? 'border-b-primary text-[#181311] dark:text-white' : 'border-b-transparent text-[#896f61] hover:text-primary hover:border-b-primary/30'; ?> pb-3 pt-2 flex-1 min-w-[80px] md:min-w-[100px] transition-all group"
                    href="?category=mountain">
                    <span class="material-symbols-outlined mb-1 text-[22px] md:text-2xl <?php echo $current_category === 'mountain' ? '' : 'group-hover:text-primary'; ?>">landscape</span>
                    <p class="text-xs md:text-sm font-bold leading-normal tracking-[0.015em] whitespace-nowrap">Mountain</p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] <?php echo $current_category === 'gastronomy' ? 'border-b-primary text-[#181311] dark:text-white' : 'border-b-transparent text-[#896f61] hover:text-primary hover:border-b-primary/30'; ?> pb-3 pt-2 flex-1 min-w-[80px] md:min-w-[100px] transition-all group"
                    href="?category=gastronomy">
                    <span class="material-symbols-outlined mb-1 text-[22px] md:text-2xl <?php echo $current_category === 'gastronomy' ? '' : 'group-hover:text-primary'; ?>">restaurant</span>
                    <p class="text-xs md:text-sm font-bold leading-normal tracking-[0.015em] whitespace-nowrap">Gastronomy</p>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="w-full mt-8">
    <div class=" flex justify-center py-5">
        <div class="flex flex-col max-w-[1280px] md:px-8 flex-1 w-full">
            <!-- Destinations Query Logic -->
            <?php
            $args = array(
                'post_type'      => 'destinations',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'fields'         => 'ids', // First stick to IDs for merging
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            
            $final_query_args = array(
                'post_type'      => 'destinations',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
            );

            if ($current_category && $current_category !== 'all') {
                $final_query_args['category_name'] = $current_category;
                $final_query_args['orderby'] = 'date';
                $final_query_args['order'] = 'DESC';
            } else {
                // 1. Get Featured IDs
                $featured_args = $args;
                $featured_args['category_name'] = 'featured';
                $featured_query = new WP_Query($featured_args);
                $featured_ids = $featured_query->posts;

                // 2. Get All Other IDs
                $latest_args = $args;
                if (!empty($featured_ids)) {
                    $latest_args['post__not_in'] = $featured_ids;
                }
                $latest_query = new WP_Query($latest_args);
                $latest_ids = $latest_query->posts;

                // 3. Merge (Featured First)
                $merged_ids = array_merge($featured_ids, $latest_ids);
                
                if (empty($merged_ids)) {
                     $merged_ids = array(0); // Force empty result if no posts
                }

                // 4. Final Query
                $final_query_args['post__in'] = $merged_ids;
                $final_query_args['orderby'] = 'post__in';
            }
            
            $destinations_query = new WP_Query($final_query_args);
            ?>
            <div class="flex items-center justify-between pb-3 pt-5">
                <h2 class="text-[#181311] dark:text-white tracking-tight text-[28px] font-bold leading-tight">Trending
                    Destinations</h2>
                <div class="flex items-center gap-4">
                    <!-- View Toggle Buttons -->
                    <div class="flex items-center gap-1 bg-gray-100 dark:bg-[#2f2521] rounded-lg p-1">
                        <button id="list-view-btn" class="flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-bold bg-white dark:bg-[#1e1e1e] text-[#181311] dark:text-white shadow-sm transition-all">
                            <span class="material-symbols-outlined text-[16px]">view_list</span>
                            <span class="hidden sm:inline">List</span>
                        </button>
                        <button id="grid-view-btn" class="flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-bold text-[#896f61] hover:text-[#181311] dark:hover:text-white transition-all">
                            <span class="material-symbols-outlined text-[16px]">grid_view</span>
                            <span class="hidden sm:inline">Grid</span>
                        </button>
                    </div>
                    <?php if ($destinations_query->found_posts > 4) : ?>
                    <button id="view-all-destinations" class="text-primary font-bold text-sm flex items-center bg-transparent border-0 cursor-pointer group">
                        View all <span class="material-symbols-outlined text-[16px] ml-1 transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </button>
                    <button id="hide-destinations" class="text-[#896f61] font-bold text-sm flex items-center bg-transparent border-0 cursor-pointer hidden">
                        Hide <span class="material-symbols-outlined text-[16px] ml-1 transition-transform group-hover:translate-x-1">expand_less</span>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <p class="px-4 text-[#896f61] dark:text-gray-400 max-w-2xl mb-4">From the bustling streets of the capital to
                the serene shores of the coast, explore the places travelers love most.</p>
        </div>
    </div>
</div>

<div class="w-full">
    <div class=" flex justify-center py-2">
        <div id="destinations-container" class="flex flex-col max-w-[1280px] md:px-8 flex-1 w-full gap-6">
            <!-- Destinations Loop -->
            <?php


            if ($destinations_query->have_posts()) :
                $index = 0;
                while ($destinations_query->have_posts()) : $destinations_query->the_post();
                    $index++;
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $is_reverse = ($index % 2 == 0);
                    $categories = get_the_terms(get_the_ID(), 'category');
                    $category_name = 'Uncategorized';
                    if (!empty($categories)) {
                        foreach ($categories as $cat) {
                            if (strtolower($cat->slug) !== 'featured') {
                                $category_name = $cat->name;
                                break;
                            }
                        }
                        if ($category_name === 'Uncategorized' && !empty($categories)) {
                             $category_name = $categories[0]->name;
                        }
                    }
                    $rating_score = get_post_meta(get_the_ID(), '_destination_rating', true) ?: 4.8; 
                    $rating_count = get_post_meta(get_the_ID(), '_destination_rating_count', true) ?: '1.2k';
                    
                    // Hide items after the 4th one
                    $hidden_class = ($index > 4) ? 'hidden destination-card-extra' : '';
            ?>
                    <div class="destination-card <?php echo $hidden_class; ?>">
                        <!-- List View Layout -->
                        <div class="list-view-card @container">
                            <div class="flex flex-col items-stretch justify-start rounded-xl @xl:flex-row<?php echo $is_reverse ? '-reverse' : ''; ?> @xl:items-stretch shadow-sm hover:shadow-md transition-shadow bg-white dark:bg-[#1f1a17] overflow-hidden border border-[#f4f2f0] dark:border-[#2f2521]">
                            <div class="w-full @xl:w-1/2 bg-center bg-no-repeat min-h-[240px] bg-cover"
                                data-alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>"
                                style='background-image: url("<?php echo esc_url($thumbnail_url); ?>");'>
                            </div>
                            <div class="flex w-full @xl:w-1/2 grow flex-col items-start justify-center gap-4 py-6 px-6">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span
                                            class="px-2 py-0.5 rounded-full bg-[#f4f2f0] dark:bg-[#2f2521] text-xs font-bold text-[#896f61] uppercase tracking-wide"><?php echo esc_html($category_name); ?></span>
                                        <span class="flex items-center text-[#896f61] text-xs"><span
                                                class="material-symbols-outlined text-[14px] mr-1">star</span> <?php echo esc_html($rating_score . ' (' . $rating_count . ')'); ?></span>
                                    </div>
                                    <h3
                                        class="text-[#181311] dark:text-white text-2xl font-bold leading-tight tracking-[-0.015em]">
                                        <?php the_title(); ?></h3>
                                    <div
                                        class="text-[#896f61] dark:text-gray-400 text-base font-normal leading-relaxed line-clamp-2">
                                        <?php the_excerpt(); ?></div>
                                </div>
                                <div class="flex items-center w-full justify-between pt-2">
                                    <a class="flex items-center text-primary font-bold text-sm group" href="<?php the_permalink(); ?>">
                                        Discover <?php the_title(); ?>
                                        <span
                                            class="material-symbols-outlined text-[16px] ml-1 transition-transform group-hover:translate-x-1">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- Grid View Layout -->
                        <div class="grid-view-card hidden">
                            <div class="flex flex-col rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow bg-white dark:bg-[#1f1a17] border border-[#f4f2f0] dark:border-[#2f2521] h-full">
                                <div class="h-48 bg-center bg-no-repeat bg-cover relative"
                                    data-alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>"
                                    style='background-image: url("<?php echo esc_url($thumbnail_url); ?>");'>
                                    <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full bg-white/90 dark:bg-black/60 backdrop-blur-sm text-xs font-bold text-[#896f61] uppercase tracking-wide"><?php echo esc_html($category_name); ?></span>
                                </div>
                                <div class="p-4 flex flex-col gap-2 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="flex items-center text-[#896f61] text-xs"><span class="material-symbols-outlined text-[14px] mr-1">star</span> <?php echo esc_html($rating_score); ?></span>
                                        <span class="text-[#896f61] text-xs">(<?php echo esc_html($rating_count); ?>)</span>
                                    </div>
                                    <h3 class="text-[#181311] dark:text-white text-lg font-bold leading-tight line-clamp-2"><?php the_title(); ?></h3>
                                    <p class="text-[#896f61] dark:text-gray-400 text-sm leading-relaxed line-clamp-2 flex-1"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    <a class="flex items-center text-primary font-bold text-sm group mt-auto" href="<?php the_permalink(); ?>">
                                        Explore
                                        <span class="material-symbols-outlined text-[16px] ml-1 transition-transform group-hover:translate-x-1">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center text-[#896f61] dark:text-gray-400">No destinations found.</p>';
            endif;
            ?>
        </div><!-- #destinations-container -->
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const viewAllBtn = document.getElementById('view-all-destinations');
    const hideBtn = document.getElementById('hide-destinations');
    const hiddenCards = document.querySelectorAll('.destination-card-extra');
    
    const gridViewBtn = document.getElementById('grid-view-btn');
    const listViewBtn = document.getElementById('list-view-btn');
    const container = document.getElementById('destinations-container');

    // View All / Hide Toggle
    if (viewAllBtn && hideBtn) {
        viewAllBtn.addEventListener('click', (e) => {
            e.preventDefault();
            // Reveal hidden cards
            hiddenCards.forEach(card => card.classList.remove('hidden'));
            // Toggle buttons
            viewAllBtn.classList.add('hidden');
            hideBtn.classList.remove('hidden');
        });

        hideBtn.addEventListener('click', (e) => {
            e.preventDefault();
            // Hide extra cards
            hiddenCards.forEach(card => card.classList.add('hidden'));
            // Toggle buttons
            hideBtn.classList.add('hidden');
            viewAllBtn.classList.remove('hidden');
            // Scroll to top of destinations section
            document.querySelector('#view-all-destinations').closest('.w-full').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }

    // Grid / List View Toggle
    if (gridViewBtn && listViewBtn && container) {
        gridViewBtn.addEventListener('click', () => {
            // Switch to grid view
            container.classList.remove('flex', 'flex-col');
            container.classList.add('grid', 'grid-cols-1', 'sm:grid-cols-2', 'lg:grid-cols-3');
            
            // Show grid cards, hide list cards
            document.querySelectorAll('.grid-view-card').forEach(card => card.classList.remove('hidden'));
            document.querySelectorAll('.list-view-card').forEach(card => card.classList.add('hidden'));
            
            // Update button states
            gridViewBtn.classList.add('bg-white', 'dark:bg-[#1e1e1e]', 'text-[#181311]', 'dark:text-white', 'shadow-sm');
            gridViewBtn.classList.remove('text-[#896f61]');
            listViewBtn.classList.remove('bg-white', 'dark:bg-[#1e1e1e]', 'text-[#181311]', 'dark:text-white', 'shadow-sm');
            listViewBtn.classList.add('text-[#896f61]');
        });

        listViewBtn.addEventListener('click', () => {
            // Switch to list view
            container.classList.remove('grid', 'grid-cols-1', 'sm:grid-cols-2', 'lg:grid-cols-3');
            container.classList.add('flex', 'flex-col');
            
            // Show list cards, hide grid cards
            document.querySelectorAll('.list-view-card').forEach(card => card.classList.remove('hidden'));
            document.querySelectorAll('.grid-view-card').forEach(card => card.classList.add('hidden'));
            
            // Update button states
            listViewBtn.classList.add('bg-white', 'dark:bg-[#1e1e1e]', 'text-[#181311]', 'dark:text-white', 'shadow-sm');
            listViewBtn.classList.remove('text-[#896f61]');
            gridViewBtn.classList.remove('bg-white', 'dark:bg-[#1e1e1e]', 'text-[#181311]', 'dark:text-white', 'shadow-sm');
            gridViewBtn.classList.add('text-[#896f61]');
        });
    }
});
</script>

<!-- Ad Placeholder: Destinations Middle -->
<div class="w-full my-12">
    <div class="flex justify-center">
        <div class="flex flex-col max-w-[1280px] md:px-8 flex-1 w-full text-center">
             <div class="flex flex-col items-center justify-center py-6 bg-white dark:bg-[#181311] border-y border-dashed border-gray-200 dark:border-[#2f2521] relative overflow-hidden group">
                <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
                <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                    <span class="material-symbols-outlined text-3xl">ads_click</span>
                    <span class="text-sm font-medium">Sponsored Content</span>
                    <span class="text-xs opacity-75">(Responsive Banner)</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Experiences Recommendation Section -->
<div class="w-full mt-0 bg-white dark:bg-[#181311] py-16">
    <div class=" flex justify-center">
        <div class="flex flex-col max-w-[1280px] md:px-8 flex-1 w-full">
            <div class="flex items-end justify-between pb-6">
                <div>
                    <h2 class="text-[#181311] dark:text-white tracking-tight text-[28px] font-bold leading-tight">
                        Unforgettable Experiences</h2>
                    <p class="text-[#896f61] dark:text-gray-400 mt-2">Curated activities to make your trip memorable.
                    </p>
                </div>
                <div class="hidden md:flex gap-2">
                    <button
                        class="size-10 rounded-full border border-[#e6dfdb] dark:border-[#2f2521] flex items-center justify-center text-[#181311] dark:text-white hover:bg-[#f4f2f0] dark:hover:bg-[#2f2521]">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </button>
                    <button
                        class="size-10 rounded-full border border-[#e6dfdb] dark:border-[#2f2521] flex items-center justify-center text-[#181311] dark:text-white hover:bg-[#f4f2f0] dark:hover:bg-[#2f2521]">
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="flex flex-col rounded-xl overflow-hidden group cursor-pointer">
                    <div class="h-64 overflow-hidden rounded-xl relative">
                        <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-110 transition-transform duration-500"
                            data-alt="Hiker standing on a mountain peak looking at the view"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDsEtMeAGCQfFVaiiQfbMsIZYU1kDpqvrQLioL2zGUgVZiCVNGAAKXiLdUNNGaPnCkn05P1FehcXDswT6jtD0E0NJEMD0expyFMPp30dYvvQnFOD2FVkWZpXW26nXmHTYsxbIuaHQy4ta-m9Z1hc8c6aZxpqrnyQjp9mJkZrx2gaDqkCn_5hXEISKYwMP3amWko6q6FhGPS7qZojXsSJ8cTB3L3qCBj3gBCKgAVGKmFUGEojGg7QnBqU0MixYWzLnFJs4kWM98GyQsv");'>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-white/90 dark:bg-black/60 backdrop-blur-sm rounded-full px-3 py-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px] text-primary">schedule</span>
                            <span class="text-xs font-bold text-[#181311] dark:text-white">3 Days</span>
                        </div>
                    </div>
                    <div class="px-4 pt-4 flex flex-col gap-2">
                        <h3
                            class="text-lg font-bold text-[#181311] dark:text-white group-hover:text-primary transition-colors">
                            Highland Trekking</h3>
                        <p class="text-sm text-[#896f61] dark:text-gray-400 line-clamp-2">Navigate the rugged peaks of
                            the Northern range with expert guides.</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs font-bold text-primary">From $250</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col rounded-xl overflow-hidden group cursor-pointer">
                    <div class="h-64 overflow-hidden rounded-xl relative">
                        <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-110 transition-transform duration-500"
                            data-alt="Colorful street food dishes on a table"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCHw78Js846AGFTj5LtaT12ZEPOWEVYsVlLXY8ywX2X7_90O_L9164WM7wF5ogXwNAyHy_xRc9YCQAM5jZNySIuhq9obp1UL7RxgEfw8ogLyFQOUlHTINVndcW5A-jbxdyMwxH7f7r3_BOQTaPRNuPfKd-anX8vh7cMBu7rO_aTEtdbX9miA3h52Je4CSfcU78y6ok6oi6aHODJL4Nkuig6uY7sBSRUd4yV2hz9MRo02rUbNZwH0wqXY500UZSVYlLKAR3NcXSpisXF");'>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-white/90 dark:bg-black/60 backdrop-blur-sm rounded-full px-3 py-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px] text-primary">schedule</span>
                            <span class="text-xs font-bold text-[#181311] dark:text-white">4 Hours</span>
                        </div>
                    </div>
                    <div class="px-4 pt-4 flex flex-col gap-2">
                        <h3 class="text-lg font-bold text-[#181311] dark:text-white group-hover:text-primary transition-colors">
                            Street Food Safari</h3>
                        <p class="text-sm text-[#896f61] dark:text-gray-400 line-clamp-2">Taste the authentic flavors of
                            the city in this guided evening tour.</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs font-bold text-primary">From $45</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col rounded-xl overflow-hidden group cursor-pointer">
                    <div class="h-64 overflow-hidden rounded-xl relative">
                        <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-110 transition-transform duration-500"
                            data-alt="Person doing pottery in a workshop"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAd4JSBVrWF5MHuRx5qSlw0U3cTV24eLfBSSrvJGdtddxmEV5DdWituynNXZcTkUQOomU74qHqij-r_-CR-RnXmqyyFQAVL4LbrSsAggzedayk1BsiZBqrKZjwSyZUHPNeLBAWKJ6R5y8N_zJd-eqUt5uXTKA_uykak2mINJuFVO4GtKzY_a_Rkvr8JpYXu35ACTp-Y56ev656EzPuJwPVtZwAK-kBYq8BzH1XGSDSvoJGJedzpdmrhm8BGslcJ5jFVEAIXWxbwAEEu");'>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-white/90 dark:bg-black/60 backdrop-blur-sm rounded-full px-3 py-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px] text-primary">schedule</span>
                            <span class="text-xs font-bold text-[#181311] dark:text-white">1 Day</span>
                        </div>
                    </div>
                    <div class="px-4 pt-4 flex flex-col gap-2">
                        <h3
                            class="text-lg font-bold text-[#181311] dark:text-white group-hover:text-primary transition-colors">
                            Traditional Artisan Workshop</h3>
                        <p class="text-sm text-[#896f61] dark:text-gray-400 line-clamp-2">Learn local crafts from master
                            artisans in the historic quarter.</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs font-bold text-primary">From $80</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function setViewMode(mode) {
        const grid = document.getElementById('experiences-grid');
        const gridBtn = document.getElementById('view-grid-btn');
        const listBtn = document.getElementById('view-list-btn');

        if (mode === 'list') {
            grid.classList.remove('md:grid-cols-2', 'lg:grid-cols-4');
            listBtn.classList.add('text-primary');
            listBtn.classList.remove('text-[#896f61]');
            gridBtn.classList.remove('text-primary');
            gridBtn.classList.add('text-[#896f61]');
        } else {
            grid.classList.add('md:grid-cols-2', 'lg:grid-cols-4');
            gridBtn.classList.add('text-primary');
            gridBtn.classList.remove('text-[#896f61]');
            listBtn.classList.remove('text-primary');
            listBtn.classList.add('text-[#896f61]');
        }
    }
</script>
<?php get_footer(); ?>