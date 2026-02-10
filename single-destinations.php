<?php
/**
 * The template for displaying single destination posts.
 *
 * @package Visit_Camotes
 */
get_header();
?>

<!-- Tag Navigation / Filter Bar -->
<div class="sticky top-[64px] z-40 bg-white/95 dark:bg-[#181311]/95 backdrop-blur-sm border-b border-[#f4f2f0] dark:border-[#332b26] py-4 shadow-sm">
    <div class="w-full max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex gap-3 overflow-x-auto no-scrollbar pb-1">
            <!-- Always show "All Experiences" first as active -->
            <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#181311] dark:bg-white text-white dark:text-[#181311] transition-all hover:shadow-md shrink-0">
                <span class="material-symbols-outlined text-[20px]">explore</span>
                <span class="text-sm font-bold">All Experiences</span>
            </button>
            
            <?php
            // Get tags for the current destination
            $tags = get_the_tags();
            
            if ($tags && !is_wp_error($tags)) {
                // Define icon mapping for common tags
                $tag_icons = array(
                    'adventure' => 'hiking',
                    'culinary' => 'restaurant_menu',
                    'culture' => 'temple_buddhist',
                    'wellness' => 'self_improvement',
                    'nature' => 'forest',
                    'coastal' => 'beach_access',
                    'mountain' => 'terrain',
                    'beach' => 'beach_access',
                    'diving' => 'scuba_diving',
                    'snorkeling' => 'water',
                    'hiking' => 'hiking',
                    'food' => 'restaurant',
                    'historical' => 'history_edu',
                    'relaxation' => 'spa',
                    'water-sports' => 'surfing',
                    'photography' => 'photo_camera',
                );
                
                foreach ($tags as $tag) {
                    $tag_slug = strtolower($tag->slug);
                    $icon = isset($tag_icons[$tag_slug]) ? $tag_icons[$tag_slug] : 'label';
                    ?>
                    <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white dark:bg-[#2c2420] border border-[#f4f2f0] dark:border-[#332b26] text-[#181311] dark:text-white hover:border-primary hover:text-primary dark:hover:text-primary transition-all shrink-0 group">
                        <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors"><?php echo esc_html($icon); ?></span>
                        <span class="text-sm font-semibold"><?php echo esc_html($tag->name); ?></span>
                    </button>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- Destination Content -->
<main class="w-full max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <?php if (function_exists('visitcamotes_breadcrumbs')) visitcamotes_breadcrumbs(); ?>
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
        <div>
            <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Curated <span class="text-primary">Experiences</span></h2>
            <p class="text-[#896f61] dark:text-gray-400 max-w-xl">Handpicked activities that bring you closer to the heart of our country. From adrenaline-pumping adventures to soul-soothing retreats.</p>
        </div>
        <div class="flex gap-2">
            <button id="view-grid-btn" class="p-2 rounded-lg bg-white dark:bg-[#2c2420] border border-[#f4f2f0] dark:border-[#332b26] hover:bg-gray-50 dark:hover:bg-[#3a302a] transition-colors text-primary" onclick="setViewMode('grid')">
                <span class="material-symbols-outlined">grid_view</span>
            </button>
            <button id="view-list-btn" class="p-2 rounded-lg bg-gray-50 border border-[#f4f2f0] dark:border-[#332b26] hover:bg-white dark:hover:bg-[#3a302a] transition-colors text-[#896f61]" onclick="setViewMode('list')">
                <span class="material-symbols-outlined">view_list</span>
            </button>
        </div>
    </div>
    
    
    <div id="experiences-grid" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 auto-rows-[300px]">
        <?php
            $visible_cards = 0;
            $img_raw  = get_field('card1_image');
            $title    = get_field('card1_title') ?: get_the_title();
            $desc     = get_field('card1_description');
            $link_raw = get_field('card1_link');
            $cat_raw  = get_field('card1_category');

            $img_url = is_array($img_raw)
                ? ($img_raw['url'] ?? '')
                : (is_numeric($img_raw)
                    ? wp_get_attachment_image_url($img_raw, 'full')
                    : $img_raw);

            $link_url = is_array($link_raw)
                ? ($link_raw['url'] ?? '#')
                : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw)
                ? implode(', ', $cat_raw)
                : $cat_raw;
            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 md:col-span-2 lg:col-span-2 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500 bg-gray-100 dark:bg-gray-800">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
            <div class="absolute top-4 left-4 z-10">
                <span class="px-3 py-1 bg-primary text-white text-xs font-bold uppercase rounded-md tracking-wide">Must Do</span>
            </div>
            <div class="absolute bottom-0 left-0 p-6 w-full z-10 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <p class="text-primary font-bold text-sm mb-1"><?php echo esc_html($cat_display); ?></p>
                <h3 class="text-3xl font-bold text-white mb-2 leading-tight"><?php echo esc_html($title); ?></h3>
                <p class="text-white/80 text-sm line-clamp-2 mb-4 max-w-md duration-500 delay-100"><?php echo esc_html($desc); ?></p>
                <!-- <a href="<?php echo esc_url($link_url); ?>" class="flex items-center gap-2 text-white font-bold text-sm group/btn">
                    Discover More <span class="material-symbols-outlined text-[16px] group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                </a> -->
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card2_image');
            $title    = get_field('card2_title') ?: get_the_title();
            $desc     = get_field('card2_description');
            $link_raw = get_field('card2_link');
            $cat_raw  = get_field('card2_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 lg:col-span-1 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-5 w-full z-10">
                <p class="text-primary font-bold text-xs mb-1"><?php echo esc_html($cat_display); ?></p>
                <h3 class="text-xl font-bold text-white leading-tight"><?php echo esc_html($title); ?></h3>
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card3_image');
            $title    = get_field('card3_title') ?: get_the_title();
            $desc     = get_field('card3_description');
            $link_raw = get_field('card3_link');
            $cat_raw  = get_field('card3_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 lg:col-span-1 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-5 w-full z-10">
                <p class="text-primary font-bold text-xs mb-1"><?php echo esc_html($cat_display); ?></p>
                <h3 class="text-xl font-bold text-white leading-tight"><?php echo esc_html($title); ?></h3>
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card4_image');
            $title    = get_field('card4_title') ?: get_the_title();
            $desc     = get_field('card4_description');
            $link_raw = get_field('card4_link');
            $cat_raw  = get_field('card4_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 lg:col-span-1 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-5 w-full z-10">
                <p class="text-primary font-bold text-xs mb-1"><?php echo esc_html($cat_display); ?></p>
                <h3 class="text-xl font-bold text-white leading-tight"><?php echo esc_html($title); ?></h3>
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card5_image');
            $title    = get_field('card5_title') ?: get_the_title();
            $desc     = get_field('card5_description');
            $link_raw = get_field('card5_link');
            $cat_raw  = get_field('card5_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 lg:col-span-1 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-5 w-full z-10">
                <p class="text-primary font-bold text-xs mb-1"><?php echo esc_html($cat_display); ?></p>
                <h3 class="text-xl font-bold text-white leading-tight"><?php echo esc_html($title); ?></h3>
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card6_image');
            $title    = get_field('card6_title') ?: get_the_title();
            $desc     = get_field('card6_description');
            $link_raw = get_field('card6_link');
            $cat_raw  = get_field('card6_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 md:col-span-2 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-6 w-full z-10 flex flex-col justify-end h-full">
                <div>
                    <p class="text-primary font-bold text-sm mb-1"><?php echo esc_html($cat_display); ?></p>
                    <h3 class="text-2xl font-bold text-white mb-2"><?php echo esc_html($title); ?></h3>
                    <p class="text-white/80 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card7_image');
            $title    = get_field('card7_title') ?: get_the_title();
            $desc     = get_field('card7_description');
            $link_raw = get_field('card7_link');
            $cat_raw  = get_field('card7_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 md:col-span-2 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500 hidden experience-card-extra opacity-0 translate-y-8">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-6 w-full z-10 flex flex-col justify-end h-full">
                <div>
                    <p class="text-primary font-bold text-sm mb-1"><?php echo esc_html($cat_display); ?></p>
                    <h3 class="text-2xl font-bold text-white mb-2"><?php echo esc_html($title); ?></h3>
                    <p class="text-white/80 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card8_image');
            $title    = get_field('card8_title') ?: get_the_title();
            $desc     = get_field('card8_description');
            $link_raw = get_field('card8_link');
            $cat_raw  = get_field('card8_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 lg:col-span-1 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500 hidden experience-card-extra opacity-0 translate-y-8">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-5 w-full z-10">
                <p class="text-primary font-bold text-xs mb-1"><?php echo esc_html($cat_display); ?></p>
                <h3 class="text-xl font-bold text-white leading-tight"><?php echo esc_html($title); ?></h3>
            </div>
        </div>
        <?php } ?>

        <?php
            $img_raw  = get_field('card9_image');
            $title    = get_field('card9_title') ?: get_the_title();
            $desc     = get_field('card9_description');
            $link_raw = get_field('card9_link');
            $cat_raw  = get_field('card9_category');

            $img_url = is_array($img_raw) ? ($img_raw['url'] ?? '') : (is_numeric($img_raw) ? wp_get_attachment_image_url($img_raw, 'full') : $img_raw);
            $link_url = is_array($link_raw) ? ($link_raw['url'] ?? '#') : (is_string($link_raw) ? $link_raw : '#');
            $cat_display = is_array($cat_raw) ? implode(', ', $cat_raw) : $cat_raw;

            if ($img_raw) {
                $visible_cards++;
        ?>
        <div class="group relative col-span-1 lg:col-span-1 row-span-1 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500 hidden experience-card-extra opacity-0 translate-y-8">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="<?php echo esc_attr($title); ?>" style='background-image: url("<?php echo esc_url($img_url); ?>");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-5 w-full z-10">
                <p class="text-primary font-bold text-xs mb-1"><?php echo esc_html($cat_display); ?></p>
                <h3 class="text-xl font-bold text-white leading-tight"><?php echo esc_html($title); ?></h3>
            </div>
        </div>
        
        <?php } ?>
    </div>

    <?php if ($visible_cards > 6) { ?>
    <div id="load-more-container" class="flex justify-center mt-12">
        <button id="toggle-experiences-btn" onclick="toggleExperiences()" class="px-8 py-3 rounded-lg border border-[#f4f2f0] dark:border-[#332b26] text-[#181311] dark:text-white font-bold hover:bg-gray-50 dark:hover:bg-[#2c2420] transition-colors flex items-center gap-2">
            <span id="btn-text">Load More Experiences</span>
            <span id="btn-icon" class="material-symbols-outlined text-[20px] transition-transform duration-300">expand_more</span>
        </button>
    </div>
    <?php } ?>
    <!-- Ad Placeholder: Single Destination Middle -->
    <div class="w-full max-w-7xl mx-auto px-6 lg:px-8 mt-12 mb-0">
        <div class="flex flex-col items-center justify-center py-8 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
            <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
            <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                <span class="material-symbols-outlined text-4xl">ads_click</span>
                <span class="text-sm font-medium">Relevance Ad Content</span>
                <span class="text-xs opacity-75">(In-Content Banner)</span>
            </div>
        </div>
    </div>
</main>

<script>
    function setViewMode(mode) {
        const grid = document.getElementById('experiences-grid');
        const gridBtn = document.getElementById('view-grid-btn');
        const listBtn = document.getElementById('view-list-btn');

        if (mode === 'list') {
            grid.classList.remove('md:grid-cols-2', 'lg:grid-cols-4');
            grid.classList.add('grid-cols-1');
            
            // List button active
            listBtn.classList.add('text-primary', 'bg-white', 'dark:bg-[#2c2420]');
            listBtn.classList.remove('text-[#896f61]', 'bg-gray-50', 'dark:bg-white/5');
            
            // Grid button inactive
            gridBtn.classList.remove('text-primary', 'bg-white', 'dark:bg-[#2c2420]');
            gridBtn.classList.add('text-[#896f61]', 'bg-gray-50', 'dark:bg-white/5');
        } else {
            grid.classList.add('md:grid-cols-2', 'lg:grid-cols-4');
            grid.classList.remove('grid-cols-1');
            
            // Grid button active
            gridBtn.classList.add('text-primary', 'bg-white', 'dark:bg-[#2c2420]');
            gridBtn.classList.remove('text-[#896f61]', 'bg-gray-50', 'dark:bg-white/5');
            
            // List button inactive
            listBtn.classList.remove('text-primary', 'bg-white', 'dark:bg-[#2c2420]');
            listBtn.classList.add('text-[#896f61]', 'bg-gray-50', 'dark:bg-white/5');
        }
    }

    let experiencesExpanded = false;

    function toggleExperiences() {
        const extraCards = document.querySelectorAll('.experience-card-extra');
        const btn = document.getElementById('toggle-experiences-btn');
        const btnText = document.getElementById('btn-text');
        const btnIcon = document.getElementById('btn-icon');

        if (!experiencesExpanded) {
            extraCards.forEach((card, index) => {
                card.classList.remove('hidden');
                setTimeout(() => {
                    card.classList.remove('opacity-0', 'translate-y-8');
                    card.classList.add('opacity-100', 'translate-y-0');
                }, index * 100);
            });
            btnText.innerText = 'Hide Experiences';
            btnIcon.style.transform = 'rotate(180deg)';
            experiencesExpanded = true;
        } else {
            extraCards.forEach((card, index) => {
                card.classList.remove('opacity-100', 'translate-y-0');
                card.classList.add('opacity-0', 'translate-y-8');
                
                setTimeout(() => {
                    card.classList.add('hidden');
                }, 500); 
            });
            btnText.innerText = 'Load More Experiences';
            btnIcon.style.transform = 'rotate(0deg)';
            experiencesExpanded = false;
            
            document.getElementById('experiences-grid').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>

<?php
    $post_id = get_the_ID();
    $s_label = get_post_meta($post_id, '_spotlight_label', true) ?: "This Month's Spotlight";
    $s_title = get_post_meta($post_id, '_spotlight_title', true) ?: "No Incoming Events";
    $s_desc = get_post_meta($post_id, '_spotlight_description', true) ?: "Stay informed about upcoming festivals, activities, and events at this destination. ";
    $s_date = get_post_meta($post_id, '_spotlight_date', true) ?: date('M d, Y');
    $s_location = get_post_meta($post_id, '_spotlight_location', true) ?: "" . get_the_title() . "";
    $s_btn_text = get_post_meta($post_id, '_spotlight_button_text', true) ?: "Reserve Your Spot";
    $s_btn_url = get_post_meta($post_id, '_spotlight_button_url', true) ?: "#properties-section";
    $s_img1 = get_post_meta($post_id, '_spotlight_image_1', true) ?: "/wp-content/uploads/2026/02/default-image-2.webp";
    $s_img2 = get_post_meta($post_id, '_spotlight_image_2', true) ?: "/wp-content/uploads/2026/02/default-image-1.webp";
    $s_icon = get_post_meta($post_id, '_spotlight_icon', true) ?: "light_mode";
?>

<!-- Monthly Spotlight Section -->
<section class="w-full bg-[#221610] text-white py-20 px-6 lg:px-20 overflow-hidden relative">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ee6c2b_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-[1440px] mx-auto relative z-10">
        <div class="flex flex-col lg:flex-row gap-12 items-center">
            <div class="flex-1 space-y-6">
                <div class="inline-flex items-center gap-2 text-primary font-bold uppercase tracking-wider text-sm">
                    <span class="material-symbols-outlined text-[18px]">event</span>
                    <?php echo esc_html($s_label); ?>
                </div>
                <h2 class="text-4xl md:text-5xl font-black leading-tight"><?php echo esc_html($s_title); ?></h2>
                <p class="text-lg text-white/70 leading-relaxed">
                    <?php echo esc_html($s_desc); ?>
                </p>
                <div class="flex gap-4 pt-4">
                    <div class="flex flex-col border-l-2 border-primary pl-4">
                        <span class="text-2xl font-bold"><?php echo esc_html($s_date); ?></span>
                        <span class="text-sm text-white/60">Dates</span>
                    </div>
                    <div class="flex flex-col border-l-2 border-primary pl-4">
                        <span class="text-2xl font-bold"><?php echo esc_html($s_location); ?></span>
                        <span class="text-sm text-white/60">Location</span>
                    </div>
                </div>
                <a href="<?php echo esc_html($s_btn_url); ?>" class="inline-block mt-4 bg-primary hover:bg-primary/90 text-white font-bold py-3 px-8 rounded-lg shadow-lg shadow-primary/20 transition-all text-center">
                    <?php echo esc_html($s_btn_text); ?>
                </a>
            </div>
            <div class="flex-1 relative w-full h-[400px] lg:h-[500px]">
                <div class="absolute top-0 right-0 w-4/5 h-4/5 rounded-xl overflow-hidden shadow-2xl z-10">
                    <img alt="<?php echo esc_attr($s_title); ?>" class="w-full h-full object-cover" src="<?php echo esc_url($s_img1); ?>"/>
                </div>
                <div class="absolute bottom-0 left-0 w-3/5 h-3/5 rounded-xl overflow-hidden shadow-2xl border-4 border-[#221610] z-20">
                    <img alt="<?php echo esc_attr($s_title); ?> Overlay" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700" src="<?php echo esc_url($s_img2); ?>"/>
                </div>
                <div class="absolute top-10 left-10 text-primary opacity-20">
                    <span class="material-symbols-outlined text-[120px]"><?php echo esc_html($s_icon); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 360 Degree Virtual Tour Section -->
<?php echo do_shortcode('[vc_360_viewer]'); ?>

<!-- Ad Placeholder: Single Destination Middle -->
<div class="w-full max-w-7xl mx-auto px-6 lg:px-8 mb-12 mb-0">
    <div class="flex flex-col items-center justify-center py-8 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
        <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
        <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
            <span class="material-symbols-outlined text-4xl">ads_click</span>
            <span class="text-sm font-medium">Relevance Ad Content</span>
            <span class="text-xs opacity-75">(In-Content Banner)</span>
        </div>
    </div>
</div>

<!-- Where to Stay Section -->
<section id="properties-section" class="w-full py-20 bg-[#fbfaf8] dark:bg-[#120e0c]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary text-xs font-bold uppercase rounded-full tracking-widest mb-4">
                    Accommodation
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">
                    Where to <span class="text-primary">Stay</span>
                </h2>
            </div>
            <p class="text-[#896f61] dark:text-gray-400 max-w-md">
                Choose from our handpicked selection of premium resorts and hotels in <?php the_title(); ?>.
            </p>
        </div>
        <?php echo do_shortcode('[vc_property_cards columns="3"]'); ?>
        <?php echo do_shortcode('[vc_booking_form]'); ?>
    </div>
</section>

<?php get_footer(); ?>