<?php
/**
 * Template Name: Home Page
 *
 * The template for displaying the home page.
 *
 * @package Visit_Camotes
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<!-- Home Page Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col gap-24">
    <!-- Why Visit Section -->
    <section id="why-visit" class="flex flex-col md:flex-row gap-12 items-start justify-between">
        <div class="md:w-[30%] flex flex-col gap-6 sticky top-24 scroll-fade-element transition-opacity duration-300">
            <h2 class="text-[#181311] dark:text-white text-4xl md:text-5xl font-black leading-tight">
                Why <span class="text-primary">Visit?</span>
            </h2>
            <p class="text-text-sub dark:text-gray-400 text-lg leading-relaxed">
                Camotes Island is one of the few destinations in the Philippines where travelers can still experience truly unspoiled beaches. Unlike highly commercialized tourist hubs, its shores remain quiet, clean, and refreshingly natural. This makes Camotes ideal for couples seeking privacy, families wanting safe and relaxed beach time, and solo travelers looking for peace and reflection. Every sunrise and sunset feels personal, not shared with hundreds of strangers.
            </p>
            <a class="text-primary font-bold flex items-center gap-1 hover:gap-2 transition-all" href="/about-us/">
                Read our story <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
        <div class="md:w-[65%] grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="group relative overflow-hidden rounded-2xl aspect-[4/5]">
                <img alt="Colorful traditional festival dancer" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Colorful traditional festival dancer" src="/wp-content/uploads/2026/02/tradition.webp"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <div class="flex items-center gap-2 text-primary mb-1">
                        <span class="material-symbols-outlined">diversity_3</span>
                        <span class="text-xs font-bold uppercase tracking-wider">Culture</span>
                    </div>
                    <h3 class="text-white text-xl font-bold">Rich Heritage</h3>
                    <p class="text-white/80 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Ancient traditions meet modern vibrancy.</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl aspect-[4/5] sm:mt-12">
                <img alt="Misty green mountains and forest" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Misty green mountains and forest" src="/wp-content/uploads/2026/02/landscape.webp"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <div class="flex items-center gap-2 text-primary mb-1">
                        <span class="material-symbols-outlined">landscape</span>
                        <span class="text-xs font-bold uppercase tracking-wider">Nature</span>
                    </div>
                    <h3 class="text-white text-xl font-bold">Pristine Landscapes</h3>
                    <p class="text-white/80 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Explore unspoiled beaches and caves.</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl aspect-[4/5]">
                <img alt="Two locals smiling warmly" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Two locals smiling warmly" src="/wp-content/uploads/2026/02/hospitality.webp"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <div class="flex items-center gap-2 text-primary mb-1">
                        <span class="material-symbols-outlined">sentiment_satisfied</span>
                        <span class="text-xs font-bold uppercase tracking-wider">People</span>
                    </div>
                    <h3 class="text-white text-xl font-bold">Warm Hospitality</h3>
                    <p class="text-white/80 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Meet the friendliest people on earth.</p>
                </div>
            </div>
        </div><!-- .grid -->
    </section><!-- Why Visit Section -->
    
    <!-- Ad Placeholder: Home Middle -->
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center py-6 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
            <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
            <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                <span class="material-symbols-outlined text-3xl">ads_click</span>
                <span class="text-sm font-medium">Google Ad Container</span>
                <span class="text-xs opacity-75">(Responsive Leaderboard)</span>
            </div>
            <!-- Actual Ad Code would replace the content above -->
        </div>
    </div>
    
    <!-- Featured Destinations Section -->
    <section class="flex flex-col gap-8">
        <div class="flex items-end justify-between">
            <h2 class="text-[#181311] dark:text-white text-4xl md:text-5xl font-black">Featured <span class="text-primary">Destinations</span></h2>
            <div class="flex gap-2">
                <button id="dest-prev" class="p-2 rounded-full border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button id="dest-next" class="p-2 rounded-full border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
        <div id="dest-slider" class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory scrollbar-hide -mx-4 px-4 sm:mx-0 sm:px-0">
            <?php
            $featured_query = new WP_Query(array(
                'post_type' => 'destinations',
                'posts_per_page' => 6,
                'category_name' => 'featured', // Use category slug 'featured'
            ));

            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$thumbnail_url) {
                        $thumbnail_url = '/wp-content/uploads/2026/02/default-image-1.webp';
                    }
                    
                    // Get categories or tags for icons
                    $categories = get_the_category();
                    $display_cat = 'Experience';
                    $icon = 'explore';
                    
                    $icon_mapping = array(
                        'beach' => 'sunny',
                        'heritage' => 'temple_buddhist',
                        'culture' => 'temple_buddhist',
                        'city' => 'location_city',
                        'nature' => 'water_drop',
                        'adventure' => 'hiking',
                        'diving' => 'scuba_diving'
                    );

                    if (!empty($categories)) {
                        foreach ($categories as $cat) {
                            if (strtolower($cat->name) !== 'featured') {
                                $display_cat = $cat->name;
                                $slug = strtolower($cat->slug);
                                if (isset($icon_mapping[$slug])) {
                                    $icon = $icon_mapping[$slug];
                                }
                                break;
                            }
                        }
                    }
            ?>
                <div class="min-w-[280px] md:min-w-[340px] snap-center group cursor-pointer" onclick="window.location.href='<?php the_permalink(); ?>'">
                    <div class="relative aspect-[3/4] rounded-2xl overflow-hidden mb-4">
                        <img alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="<?php echo esc_attr(get_the_title()); ?>" src="<?php echo esc_url($thumbnail_url); ?>"/>
                        <div class="absolute top-4 right-4 bg-white/90 dark:bg-black/60 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-text-main dark:text-white flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px] text-primary"><?php echo esc_html($icon); ?></span> 
                                <?php echo esc_html($display_cat); ?>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors"><?php the_title(); ?></h3>
                    <p class="text-text-sub dark:text-gray-400 text-sm mt-1 line-clamp-2"><?php echo get_the_excerpt(); ?></p>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p class="text-text-sub dark:text-gray-400">No featured destinations found.</p>
            <?php endif; ?>
        </div>
    </section><!-- Featured Destinations Section -->

    <!-- Ad Placeholder: Home Middle -->
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center py-6 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
            <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
            <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                <span class="material-symbols-outlined text-3xl">ads_click</span>
                <span class="text-sm font-medium">Google Ad Container</span>
                <span class="text-xs opacity-75">(Responsive Leaderboard)</span>
            </div>
            <!-- Actual Ad Code would replace the content above -->
        </div>
    </div>

    <!-- Experiences Section -->
    <section class="bg-white dark:bg-[#2a1d17] rounded-3xl p-8 md:p-12 shadow-sm">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Unforgettable <span class="text-primary">Experiences</span></h2>
            <p class="text-text-sub dark:text-gray-400">Whatever your travel style, we have something to ignite your passion.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="flex flex-col rounded-xl overflow-hidden group cursor-pointer">
                    <div class="h-64 overflow-hidden rounded-xl relative">
                        <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-110 transition-transform duration-500"
                            data-alt="Hiker standing on a mountain peak looking at the view"
                            style='background-image: url("/wp-content/uploads/2026/02/tourist-taking-photos-nature-landscape-using-his-smartphone-scaled.webp");'>
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
                            style='background-image: url("/wp-content/uploads/2026/01/sweet-pork-wooden-bowl-with-cucumber-long-beans-tomatoes-side-dishes-scaled.webp");'>
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
                            style='background-image: url("/wp-content/uploads/2026/01/man-swimming-water-sunny-day-scaled.webp");'>
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
                            Free Diving</h3>
                        <p class="text-sm text-[#896f61] dark:text-gray-400 line-clamp-2">Experience the thrill of free
                            diving in the crystal-clear waters of Camotes.</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs font-bold text-primary">From $80</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Experiences Section -->
    <!-- Itineraries Section -->
    <section>
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
            <div>
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white">Curated <span class="text-primary">Itineraries</span></h2>
                <p class="text-text-sub dark:text-gray-400 mt-2">Expertly planned trips to make the most of your visit.</p>
            </div>
        </div>
        
        <!-- Coming Soon Placeholder -->
        <div class="bg-gray-50/50 dark:bg-white/[0.02] border-2 border-dashed border-gray-100 dark:border-white/5 rounded-3xl p-12 text-center">
            <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <span class="material-symbols-outlined text-primary text-3xl">auto_awesome</span>
            </div>
            <h3 class="text-2xl font-bold text-text-main dark:text-white mb-3">Section Coming Soon</h3>
            <p class="text-text-sub dark:text-gray-400 max-w-md mx-auto">
                We're currently hand-crafting the ultimate itineraries to help you explore every corner of Camotes. Check back soon for expert-led tours and hidden gem discoveries.
            </p>
        </div>

        <?php if (false): // Temporarily hidden ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-[#1f1612] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-[#3a2e28]">
                <div class="h-48 relative">
                    <img alt="Van parked on a scenic road" class="w-full h-full object-cover" data-alt="Van parked on a scenic road" src="/wp-content/uploads/2026/02/no-image.webp"/>
                    <div class="absolute bottom-3 left-3 bg-white/90 text-text-main text-xs font-bold px-2 py-1 rounded flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> 10 Days
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-text-main dark:text-white mb-2">The Ultimate Road Trip</h3>
                    <p class="text-sm text-text-sub dark:text-gray-400 mb-4 line-clamp-2">Drive along the coastline, up through the highlands, and back down to the rainforests.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100 dark:border-[#3a2e28]">
                        <span class="text-sm font-medium text-text-main dark:text-gray-300">From <span class="font-bold text-primary">$1,200</span></span>
                        <button class="text-sm font-bold text-primary hover:text-orange-600">View Details</button>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-[#1f1612] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-[#3a2e28]">
                <div class="h-48 relative">
                    <img alt="Ancient ruins in a forest" class="w-full h-full object-cover" data-alt="Ancient ruins in a forest" src="/wp-content/uploads/2026/02/no-image.webp"/>
                    <div class="absolute bottom-3 left-3 bg-white/90 text-text-main text-xs font-bold px-2 py-1 rounded flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> 5 Days
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-text-main dark:text-white mb-2">Cultural Immersion</h3>
                    <p class="text-sm text-text-sub dark:text-gray-400 mb-4 line-clamp-2">Stay with local families, learn traditional crafts, and visit sacred heritage sites.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100 dark:border-[#3a2e28]">
                        <span class="text-sm font-medium text-text-main dark:text-gray-300">From <span class="font-bold text-primary">$850</span></span>
                        <button class="text-sm font-bold text-primary hover:text-orange-600">View Details</button>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-[#1f1612] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-[#3a2e28]">
                <div class="h-48 relative">
                    <img alt="Scuba diver underwater" class="w-full h-full object-cover" data-alt="Scuba diver underwater" src="/wp-content/uploads/2026/02/no-image.webp"/>
                    <div class="absolute bottom-3 left-3 bg-white/90 text-text-main text-xs font-bold px-2 py-1 rounded flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> 7 Days
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-text-main dark:text-white mb-2">Island Hopping</h3>
                    <p class="text-sm text-text-sub dark:text-gray-400 mb-4 line-clamp-2">Sail between pristine islands, snorkel in coral reefs, and sleep under the stars.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100 dark:border-[#3a2e28]">
                        <span class="text-sm font-medium text-text-main dark:text-gray-300">From <span class="font-bold text-primary">$1,500</span></span>
                        <button class="text-sm font-bold text-primary hover:text-orange-600">View Details</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section><!-- Itineraries Section -->
    <!-- Travel Essentials Section -->
    <section class="border-t border-gray-200 dark:border-gray-800 pt-16">
        <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-8">Travel <span class="text-primary">Essentials</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">directions_boat</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Getting There</h3>
                        <p class="text-sm text-text-sub dark:text-gray-400 mt-1">Daily ferries run from Danao City and Mactan (Pier 1) to Consuelo or Poro Port. Check schedules in advance.</p>
                        <a class="text-sm font-medium text-primary mt-2 block hover:underline" href="/planning-tips/?scroll_to=ferry-schedules">Ferry schedules</a>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">wb_sunny</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Best Time</h3>
                        <p class="text-sm text-text-sub dark:text-gray-400 mt-1">Visit between December and May for the best weather. Perfect for beach trips, snorkeling, and cave exploring.</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">payments</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Island Tips</h3>
                        <p class="text-sm text-text-sub dark:text-gray-400 mt-1">Cash is king—ATMs are limited on the island. Bring enough for your stay and enjoy the unplugged vibe.</p>
                    </div>
                </div>
            </div>
        </div><!-- .grid -->
    </section><!-- Travel Essentials -->
</main><!-- .max-w-7xl -->

<?php
get_footer();
