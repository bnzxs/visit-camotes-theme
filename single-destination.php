<?php
get_header();
?>

<div class="sticky top-[64px] z-40 bg-white/95 dark:bg-[#181311]/95 backdrop-blur-sm border-b border-[#f4f2f0] dark:border-[#332b26] py-4 shadow-sm">
    <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-20">
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

<main class="w-full max-w-[1440px] mx-auto px-6 lg:px-20 py-12">
    <?php if (function_exists('visitcamotes_breadcrumbs')) visitcamotes_breadcrumbs(); ?>
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
        <div>
            <h2 class="text-3xl md:text-4xl font-bold text-[#181311] dark:text-white mb-3">Curated Experiences</h2>
            <p class="text-[#896f61] dark:text-gray-400 max-w-xl">Handpicked activities that bring you closer to the heart of our country. From adrenaline-pumping adventures to soul-soothing retreats.</p>
        </div>
        <div class="flex gap-2">
            <button id="view-grid-btn" class="p-2 rounded-lg bg-gray-50 border border-[#f4f2f0] dark:border-[#332b26] hover:bg-white dark:hover:bg-[#3a302a] transition-colors text-primary" onclick="setViewMode('grid')">
                <span class="material-symbols-outlined">grid_view</span>
            </button>
            <button id="view-list-btn" class="p-2 rounded-lg bg-white dark:bg-[#2c2420] border border-[#f4f2f0] dark:border-[#332b26] hover:bg-gray-50 dark:hover:bg-[#3a302a] transition-colors text-[#896f61]" onclick="setViewMode('list')">
                <span class="material-symbols-outlined">view_list</span>
            </button>
        </div>
    </div>
    
    <div id="experiences-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 auto-rows-[300px]">
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
                <a href="<?php echo esc_url($link_url); ?>" class="flex items-center gap-2 text-white font-bold text-sm group/btn">
                    Discover More <span class="material-symbols-outlined text-[16px] group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                </a>
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
</main>

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
    $s_title = get_post_meta($post_id, '_spotlight_title', true) ?: "The Festival of Lights";
    $s_desc = get_post_meta($post_id, '_spotlight_description', true) ?: "Join us for a magical evening as thousands of lanterns float into the night sky, symbolizing the release of worries and welcoming a new year of good fortune. A truly mesmerizing spectacle you cannot miss.";
    $s_date = get_post_meta($post_id, '_spotlight_date', true) ?: "Oct 15-18";
    $s_location = get_post_meta($post_id, '_spotlight_location', true) ?: "Central Square";
    $s_btn_text = get_post_meta($post_id, '_spotlight_button_text', true) ?: "Reserve Your Spot";
    $s_btn_url = get_post_meta($post_id, '_spotlight_button_url', true) ?: "#";
    $s_img1 = get_post_meta($post_id, '_spotlight_image_1', true) ?: "https://lh3.googleusercontent.com/aida-public/AB6AXuDZM3wWz3dkKSbFh-Oz2kKEvqKVDZhfH4gR9KuJdZqU8VZZaxgDZJg_aqEQQHBS9CnR4A8uF_ff5FZG7_s1aYFIQtaTJFTrO1VpuwisBiKlbHzXF-kI1wF1djR07XVoEnjgRTNKROIuKZ-p4kXiGBCfam4cxd2F6b6uoPnHedfDO_J53Meo3jEt9d56IHBFNCbb4_Vr8kq-3cq50NHaeHFaHKRxtSJAN7_P0eyIbOjAjfRasgJEWecQQM27i2H8-nZ4VxR2g2V4yRsh";
    $s_img2 = get_post_meta($post_id, '_spotlight_image_2', true) ?: "https://lh3.googleusercontent.com/aida-public/AB6AXuDVC81v8PVqGwXjYHSTGQ9gWk4Gakbq9SvCXw0pcBUr54TNFfkT8v6ghNbuv4HVP_liN_S-iBfXWwJQ1lA6J43on050qHk-RSA6Nr6AsHWpZ6rz2cvMptNDxikUoRdgQBhfbYZeqHStOK2mmg0Ef0oA94l8yuOEs6L8GyTx_f377SQcQ4HHaGUmP3U3F2i0VBMagP94gmxBwiKr4ZHOHZZGesze5ulKpxOKKd-ZaAOnQ3sczvhfxeAhUYVVxoZU2toSQNJOjbzPfkSF";
    $s_icon = get_post_meta($post_id, '_spotlight_icon', true) ?: "light_mode";
?>
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
                <a href="<?php echo esc_url($s_btn_url); ?>" class="inline-block mt-4 bg-primary hover:bg-primary/90 text-white font-bold py-3 px-8 rounded-lg shadow-lg shadow-primary/20 transition-all text-center">
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

<!-- Ad Placeholder: Single Destination Middle -->
<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-20 mt-12 mb-0">
    <div class="flex flex-col items-center justify-center py-8 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
        <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
        <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
            <span class="material-symbols-outlined text-4xl">ads_click</span>
            <span class="text-sm font-medium">Relevance Ad Content</span>
            <span class="text-xs opacity-75">(In-Content Banner)</span>
        </div>
    </div>
</div>

<div class="w-full my-12 dark:bg-[#181311] py-12">
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
                        <h3
                            class="text-lg font-bold text-[#181311] dark:text-white group-hover:text-primary transition-colors">
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
<?php

get_footer();
?>