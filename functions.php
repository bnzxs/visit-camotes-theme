<?php
function style_enqueue_assets()
{

    wp_enqueue_style(
        'visitcamotes-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    /* Optional: extra custom CSS file
    wp_enqueue_style(
        'wanderlust-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        ['wanderlust-style'],
        wp_get_theme()->get('Version')
    );
    */
}

add_action('wp_enqueue_scripts', 'style_enqueue_assets');

function visitcamotes_setup()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'visitcamotes'),
    ));
    add_theme_support('post-thumbnails');
    
    // Add editor styles support
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for wide and full alignment
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'visitcamotes_setup');

/**
 * Register Custom Block Patterns for Editorial Layouts
 */
function visitcamotes_register_block_patterns() {
    // Register pattern category
    register_block_pattern_category(
        'visitcamotes-editorial',
        array('label' => __('Editorial Layouts', 'visitcamotes'))
    );
    
    // Pattern 1: Article Intro with Drop Cap
    register_block_pattern(
        'visitcamotes/article-intro',
        array(
            'title'       => __('Article Introduction', 'visitcamotes'),
            'description' => _x('Opening paragraph with automatic drop cap styling', 'Block pattern description', 'visitcamotes'),
            'categories'  => array('visitcamotes-editorial'),
            'content'     => '<!-- wp:paragraph {"className":"text-lg"} -->
<p class="text-lg">Start your article with an engaging introduction. This paragraph will automatically get a drop cap on the first letter when published.</p>
<!-- /wp:paragraph -->',
        )
    );
    
    // Pattern 2: Text + Image Section
    register_block_pattern(
        'visitcamotes/text-image-section',
        array(
            'title'       => __('Text with Image', 'visitcamotes'),
            'description' => _x('Paragraph followed by an image - perfect for editorial flow', 'Block pattern description', 'visitcamotes'),
            'categories'  => array('visitcamotes-editorial'),
            'content'     => '<!-- wp:paragraph -->
<p>Write your content here. Add descriptive, engaging text that tells your story.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="' . get_template_directory_uri() . '/assets/images/placeholder.jpg" alt=""/><figcaption>Add a caption to describe your image</figcaption></figure>
<!-- /wp:image -->',
        )
    );
    
    // Pattern 3: Heading with Content
    register_block_pattern(
        'visitcamotes/section-heading',
        array(
            'title'       => __('Section with Heading', 'visitcamotes'),
            'description' => _x('H2 heading with paragraph - creates sections with accent underline', 'Block pattern description', 'visitcamotes'),
            'categories'  => array('visitcamotes-editorial'),
            'content'     => '<!-- wp:heading -->
<h2>Section Title</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Content for this section goes here. The heading above will automatically get a blue accent underline.</p>
<!-- /wp:paragraph -->',
        )
    );
    
    // Pattern 4: Pull Quote / Blockquote
    register_block_pattern(
        'visitcamotes/pull-quote',
        array(
            'title'       => __('Pull Quote', 'visitcamotes'),
            'description' => _x('Highlighted quote with premium styling', 'Block pattern description', 'visitcamotes'),
            'categories'  => array('visitcamotes-editorial'),
            'content'     => '<!-- wp:quote -->
<blockquote class="wp-block-quote"><p>Add an important quote or highlight key information that you want to stand out from the rest of the content.</p></blockquote>
<!-- /wp:quote -->',
        )
    );
    
    // Pattern 5: Full Article Template
    register_block_pattern(
        'visitcamotes/full-article-template',
        array(
            'title'       => __('Complete Article Template', 'visitcamotes'),
            'description' => _x('Full article structure with intro, sections, images, and quotes', 'Block pattern description', 'visitcamotes'),
            'categories'  => array('visitcamotes-editorial'),
            'content'     => '<!-- wp:paragraph {"className":"text-lg"} -->
<p class="text-lg">Start with an engaging introduction that hooks your readers. This opening paragraph sets the tone for your entire article.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with more context and background information about your topic.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="' . get_template_directory_uri() . '/assets/images/placeholder.jpg" alt=""/><figcaption>Add a descriptive caption for your image</figcaption></figure>
<!-- /wp:image -->

<!-- wp:heading -->
<h2>First Main Section</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Dive deeper into your first major point. Provide details, examples, and insights.</p>
<!-- /wp:paragraph -->

<!-- wp:quote -->
<blockquote class="wp-block-quote"><p>Highlight an important quote or key takeaway that emphasizes your point.</p></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>Continue with more supporting information and details.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Second Main Section</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Explore your next major point with rich, descriptive content.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="' . get_template_directory_uri() . '/assets/images/placeholder.jpg" alt=""/><figcaption>Another image with caption</figcaption></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Wrap up with a strong conclusion that ties everything together.</p>
<!-- /wp:paragraph -->',
        )
    );
}
add_action('init', 'visitcamotes_register_block_patterns');

function add_tailwind_classes_to_menu_links($atts, $item, $args)
{
    if ($args->theme_location === 'primary_menu') {
        $base_classes = 'transition-colors';
        
        $is_active = in_array('current-menu-item', $item->classes) || $item->current;
        
        // Highlight "Destinations" if viewing a single destination
        if (is_singular('destination') && $item->title === 'Destinations') {
            $is_active = true;
        }

        // Highlight "Blog" if viewing a single post or category
        if ((is_singular('post') || is_category()) && ($item->title === 'Blog' || $item->title === 'Blogs')) {
            $is_active = true;
        }

        $active_class = $is_active ? ' text-primary' : ' text-text-main dark:text-gray-200';
        $mobile_active_class = $is_active ? ' text-primary' : ' text-text-main dark:text-white';
        
        if (isset($args->is_mobile) && $args->is_mobile) {
            $atts['class'] = $base_classes . ' text-xl font-bold py-4 block border-b border-gray-100 dark:border-white/10' . $mobile_active_class;
        } else {
            $atts['class'] = $base_classes . ' text-sm font-medium hover:text-primary' . $active_class;
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_tailwind_classes_to_menu_links', 10, 3);

function visitcamotes_breadcrumbs() {
    if (is_front_page()) return;

    echo '<nav class="flex text-sm font-medium text-[#896f61] dark:text-gray-400 mb-6" aria-label="Breadcrumb">';
    echo '<ol class="list-none p-0 inline-flex items-center gap-2">';
    
    // Home
    echo '<li><a href="' . esc_url(home_url('/')) . '" class="hover:text-primary transition-colors flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">home</span>Home</a></li>';
    
    // Destinations Archive
    if (is_singular('destination')) {
        echo '<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] opacity-40">chevron_right</span></li>';
        echo '<li><a href="' . esc_url(get_post_type_archive_link('destination')) . '" class="hover:text-primary transition-colors">Destinations</a></li>';
    }

    // Blog Archive, Category, & Tag
    if (is_singular('post') || is_category() || is_tag()) {
        echo '<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] opacity-40">chevron_right</span></li>';
        echo '<li><a href="' . esc_url(home_url('/blog/')) . '" class="hover:text-primary transition-colors">Blogs</a></li>';
        
        if (is_singular('post')) {
            $categories = get_the_category();
            if (!empty($categories)) {
                echo '<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] opacity-40">chevron_right</span></li>';
                echo '<li><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="hover:text-primary transition-colors">' . esc_html(ucwords(strtolower($categories[0]->name))) . '</a></li>';
            }
        }
    }

    // Current Page Title
    $title = get_the_title();
    if (is_category()) {
        $title = single_cat_title('', false);
        $title = ucwords(strtolower($title));
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
        $title = ucwords(strtolower($title));
    }
    echo '<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] opacity-40">chevron_right</span></li>';
    echo '<li class="text-text-main dark:text-white font-bold truncate max-w-[200px] md:max-w-none">' . esc_html($title) . '</li>';
    
    echo '</ol></nav>';
}

function style_nav_menu_items($classes, $item, $args) {
    if (isset($args->is_mobile) && $args->is_mobile) {
        $classes[] = 'list-none';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'style_nav_menu_items', 10, 3);

function add_button_class_to_last_menu_item($classes, $item, $args)
{
    if ($args->theme_location !== 'primary_menu') {
        return $classes;
    }

    static $menu_item_count = 0;
    static $total_items = 0;

    if ($menu_item_count === 0) {
        $menu_items = wp_get_nav_menu_items($args->menu);
        if (!empty($menu_items)) {
            $total_items = count($menu_items);
        }
    }

    $menu_item_count++;

    if ($menu_item_count === $total_items) {
        $classes[] = 'menu-btn';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'add_button_class_to_last_menu_item', 10, 3);


/**
 * Custom Post Types and Taxonomies.
 */
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Ensure non-existent pages trigger 404 correctly.
 * This also helps with handling cases where a page might resolve but shouldn't.
 */
function visitcamotes_trigger_404_if_needed() {
    global $wp_query;
    
    // Trigger 404 if it's a search with no results
    if (is_search() && !have_posts()) {
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
    }
}
add_action('wp', 'visitcamotes_trigger_404_if_needed');

/**
 * AI Search Assistant - Gemini API Integration
 */

// Define your Gemini API Key here (or in wp-config.php for better security)
if (!defined('GEMINI_API_KEY')) {
    define('GEMINI_API_KEY', 'AIzaSyDgncd6rfIn3ARjoztcEEe3G3jeEFLPoGA');
}

/**
 * Extract text content from the Planning Tips page to use as AI context.
 */
function get_planning_page_context() {
    // We try to find the page by path 'planning-tips'
    $planning_page = get_page_by_path('planning-tips');
    if (!$planning_page) return '';

    $content = $planning_page->post_content;
    
    // If using blocks, render them to get the actual text
    if (has_blocks($content)) {
        $blocks = parse_blocks($content);
        $content = '';
        foreach ($blocks as $block) {
            $content .= render_block($block);
        }
    }

    // Clean up the content: remove HTML tags and extra whitespace
    $context = wp_strip_all_tags($content);
    $context = preg_replace('/\s+/', ' ', $context);
    
    return trim($context);
}

/**
 * AJAX handler for AI Search.
 */
function handle_ai_search() {
    // Basic security check
    if (!isset($_POST['query']) || empty($_POST['query'])) {
        wp_send_json_error('Missing query');
    }

    $query = sanitize_text_field($_POST['query']);
    $context = get_planning_page_context();

    $api_url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key=' . GEMINI_API_KEY;

    $prompt = "You are the Visit Camotes AI Assistant. Use the following context about Camotes Island to answer the user's question. If the answer isn't in the context, be helpful but stay within the scope of travel/planning for Camotes. Keep your answer concise and friendly.\n\nContext:\n" . $context . "\n\nUser Question: " . $query;

    $body = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $prompt]
                ]
            ]
        ],
        'generationConfig' => [
            'temperature' => 0.7,
            'maxOutputTokens' => 800,
        ]
    ];

    $response = wp_remote_post($api_url, [
        'headers' => ['Content-Type' => 'application/json'],
        'body'    => wp_json_encode($body),
        'timeout' => 45,
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error('API connection failed: ' . $response->get_error_message());
    }

    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);

    if ($response_code !== 200) {
        wp_send_json_error('API returned error ' . $response_code . ': ' . $response_body);
    }

    $data = json_decode($response_body, true);
    $ai_answer = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Sorry, I couldn\'t generate an answer.';

    wp_send_json_success(['answer' => $ai_answer]);
}

add_action('wp_ajax_ai_search', 'handle_ai_search');
add_action('wp_ajax_nopriv_ai_search', 'handle_ai_search'); // Allow guest users


