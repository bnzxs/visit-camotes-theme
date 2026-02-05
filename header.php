<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Visit_Camotes
 */
?>
<!DOCTYPE html>
<html class="light" <?php language_attributes(); ?>>


<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>
    <?php if (is_front_page()): ?>
      <?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>
    <?php elseif (is_category()): ?>
      <?php 
        $cat = get_queried_object();
        echo ucwords(strtolower($cat->name)); 
      ?> | <?php bloginfo('name'); ?>
    <?php else: ?>
      <?php wp_title(''); ?> | <?php bloginfo('name'); ?>
    <?php endif; ?>
  </title>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/plus-jakarta-sans-latin-wght-normal.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/noto-sans-latin-wght-normal.woff2" as="font" type="font/woff2" crossorigin>
  <!-- Google Fonts for Material Symbols (For local site) -->
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/MaterialSymbolsOutlined.ttf" as="font" type="font/ttf" crossorigin>
  <!-- Google Fonts for Material Symbols (Fix for live site) 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />-->

  <?php wp_head(); ?>
</head>

<body
  class="bg-background-light dark:bg-background-dark font-display text-text-main antialiased selection:bg-primary selection:text-white">
  <!-- Main Navigation -->
  <nav
    class="sticky top-0 z-50 w-full bg-white/90 dark:bg-[#181311]/90 backdrop-blur-md border-b border-[#f4f2f0] dark:border-[#3a2e28] transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <a href="<?php echo trailingslashit(home_url()); ?>">
          <div class="flex items-center gap-2 text-text-main dark:text-white">
            <img src="/wp-content/uploads/2026/01/VisitCamotes-Logo-e1769568648963.webp" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto">
            <span class="text-xl font-bold tracking-tight"><?php bloginfo('name'); ?></span>
          </div>
        </a>
        <div class="hidden md:flex items-center gap-8">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary_menu',
            'container' => false,
            'items_wrap' => '%3$s',
            'fallback_cb' => false,
          ));
          ?>
        </div>
        <div class="md:hidden flex items-center">
          <button id="mobile-menu-button" class="text-text-main dark:text-white">
            <span class="material-symbols-outlined">menu</span>
          </button>
        </div>
      </div><!-- .flex -->
    </div><!-- .max-w-7xl -->
  </nav><!-- .sticky -->

  <!-- Mobile Menu Container -->
  <div id="mobile-menu" class="fixed inset-0 z-[100] md:hidden pointer-events-none">
    <!-- Overlay -->
    <div id="mobile-menu-overlay" class="absolute inset-0 bg-black/60 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    
    <!-- Drawer -->
    <div id="mobile-menu-drawer" class="absolute right-0 top-0 bottom-0 w-full max-w-xs bg-white dark:bg-background-dark shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto overflow-y-auto">
      <div class="sticky top-0 bg-white dark:bg-background-dark z-10 flex items-center justify-between p-6 border-b border-gray-100 dark:border-white/10">
        <a href="<?php echo trailingslashit(home_url()); ?>" class="flex items-center">
          <img src="/wp-content/uploads/2026/01/VisitCamotes-Logo-e1769568648963.webp" alt="<?php bloginfo('name'); ?>" class="h-16 w-auto">
        </a>
        <button id="close-mobile-menu" class="text-text-main dark:text-white p-2 hover:bg-gray-100 dark:hover:bg-white/5 rounded-full transition-colors">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>
      
      <div class="flex flex-col p-6 bg-white dark:bg-background-dark">
        <ul class="flex flex-col list-none p-0 m-0">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary_menu',
            'container' => false,
            'items_wrap' => '%3$s',
            'fallback_cb' => false,
            'is_mobile' => true,
          ));
          ?>
        </ul>
      </div>

      <div class="mt-auto p-6 border-t border-gray-100 dark:border-white/10 flex flex-col gap-3">
          <button
            onclick="window.location.href='#why-visit'"
            class="w-full bg-primary hover:bg-orange-600 text-white text-base font-bold h-12 px-8 rounded-lg shadow-lg hover:shadow-primary/30 transition-all">
            Start Your Journey
          </button>
          <button
            class="w-full bg-gray-50 dark:bg-white/5 hover:bg-gray-100 dark:hover:bg-white/10 text-text-main dark:text-white border border-gray-200 dark:border-white/10 text-base font-bold h-12 px-8 rounded-lg transition-all flex items-center justify-center gap-2">
            <span class="material-symbols-outlined text-xl">call</span>
            Contact Us
          </button>
      </div>
    </div><!-- #mobile-menu-drawer -->
  </div><!-- #mobile-menu -->

  <?php if (is_front_page()): ?>
    <!-- Hero Section (Front Page) -->
    <header class="relative w-full h-[90vh] min-h-[600px] flex items-center justify-center overflow-hidden">

      <div class="absolute inset-0 z-0 overflow-hidden">
        <!-- Video Background -->
        <video 
          autoplay 
          muted 
          fetchpriority="high"
          loading="eager"
          loop 
          playsinline
          class="absolute top-1/2 left-1/2 w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-80">
          <source src="/wp-content/uploads/2026/01/camotes_trimmed.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <!-- YouTube Background
        <iframe 
          src="https://www.youtube.com/embed/ZiBgWrq8EB8?autoplay=1&mute=1&controls=0&loop=1&playlist=ZiBgWrq8EB8&showinfo=0&rel=0&iv_load_policy=3&disablekb=1&modestbranding=1" 
          class="absolute top-1/2 left-1/2 w-[150%] h-[150%] -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-80"
          frameborder="0" 
          allow="autoplay; encrypted-media" 
          allowfullscreen>
        </iframe> -->
        
        <div
          class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/20 to-background-light dark:to-background-dark z-10">
        </div>
      </div>

      <div class="relative z-20 text-center px-4 max-w-4xl mx-auto">
        <h1 class="text-white text-5xl md:text-7xl font-black leading-tight tracking-tight mb-6 drop-shadow-lg">
          <?php bloginfo('description'); ?>
        </h1>
        <p class="text-white/90 text-lg md:text-xl font-normal max-w-2xl mx-auto mb-10 drop-shadow-md">
          Immerse yourself in a land of vibrant culture, pristine nature, and unforgettable stories waiting to be told.
        </p>
        <div class="hidden md:flex flex-col sm:flex-row items-center justify-center gap-4">
          <button
            onclick="window.location.href='#why-visit'"
            class="bg-primary hover:bg-orange-600 text-white text-base font-bold h-12 px-8 rounded-lg shadow-lg hover:shadow-orange-500/30 transition-all transform hover:-translate-y-1">
            Start Your Journey
          </button>
          <button
            class="bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white border border-white/30 text-base font-bold h-12 px-8 rounded-lg transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-xl">call</span>
            Contact Us
          </button>
        </div>
      </div>

      <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-20 text-white animate-bounce">
        <span class="material-symbols-outlined text-3xl">keyboard_arrow_down</span>
      </div><!-- .animate-bounce -->
    </header><!-- hero-header -->
  <?php elseif (!is_front_page() && get_post_type() !== 'post' && !is_404()): ?>
    <?php
    $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (!$bg_image) {
        // Fallback image if no featured image is set
        $bg_image = "/wp-content/uploads/2026/01/nature-white-beauty-tree-tropical-scaled.webp";
    }
    ?>
    <!-- Hero Section (Subpages) -->
    <div class="relative w-full bg-background-light dark:bg-background-dark">
      <div class="relative flex min-h-[480px] flex-col gap-6 items-center justify-center p-4 text-center">
        <!-- Hero Background Image -->
        <img src="<?php echo esc_url($bg_image); ?>"
             fetchpriority="high"
             loading="eager" 
             alt="<?php the_title_attribute(); ?>" 
             class="absolute inset-0 w-full h-full object-cover">
        
        <!-- Hero Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/60 z-[1]"></div>

        <div class="flex flex-col gap-3 max-w-[800px] z-10 relative">
          <h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] md:text-6xl">
            <?php the_title(); ?>
          </h1>
          <h2 class="text-gray-200 text-lg font-medium md:text-xl">
            <?php
            if (has_blocks(get_the_content())) {
                $blocks = parse_blocks(get_the_content());
                if (!empty($blocks)) {
                    $found_text = false;
                    foreach ($blocks as $block) {
                        $rendered = trim(strip_tags(render_block($block)));
                        if (!empty($rendered)) {
                            echo wp_kses_post($rendered);
                            $found_text = true;
                            break;
                        }
                    }
                    if (!$found_text) {
                        echo get_the_excerpt() ?: "Explore the wonders of Camotes Island.";
                    }
                }
            } else {
                echo get_the_excerpt() ?: "Explore the wonders of Camotes Island.";
            }
            ?>
          </h2>
        </div>
        <?php if (is_page('planning-tips')): ?>
          <div class="w-full max-w-[640px] z-20 mt-4 relative">
            <form id="ai-search-form" role="search" method="get" action="<?php echo home_url('/'); ?>" class="w-full">
              <div class="flex flex-col w-full h-14 md:h-16">
                <div class="flex w-full flex-1 items-stretch rounded-xl h-full shadow-xl overflow-hidden">
                  <div
                    class="text-gray-500 flex border-y border-l border-gray-200 bg-white items-center justify-center pl-4">
                    <span class="material-symbols-outlined">search</span>
                  </div>
                  <input
                    id="ai-search-input"
                    type="search"
                    name="s"
                    value="<?php echo get_search_query(); ?>"
                    class="flex w-full min-w-0 flex-1 resize-none overflow-hidden text-[#181311] focus:outline-0 border-y border-gray-200 bg-white h-full placeholder:text-gray-400 px-3 text-base"
                    placeholder="Ask AI anything about Camotes..." />
                  <div
                    class="flex items-center justify-center border-y border-r border-gray-200 bg-white pr-2 pl-1 gap-2">
                    <button
                      id="ai-ask-btn"
                      type="button"
                      class="flex items-center justify-center rounded-lg h-10 px-6 md:h-12 bg-primary hover:bg-primary/90 text-white text-sm md:text-base font-bold transition-all shadow-lg hover:shadow-primary/30 flex items-center gap-2 group">
                      <span class="material-symbols-outlined text-[20px] group-hover:rotate-12 transition-transform">auto_awesome</span>
                      <span>Ask AI</span>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            
            <!-- AI Response Container (Floats over content) -->
            <div id="ai-response-container" class="hidden absolute top-full left-0 w-full mt-4 bg-white/95 dark:bg-black/90 backdrop-blur-md rounded-2xl border border-white/20 shadow-2xl overflow-hidden p-6 text-left animate-fade-in z-50">
              <div class="flex items-start justify-between mb-4 border-b border-gray-100 dark:border-white/10 pb-4">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined">auto_awesome</span>
                  </div>
                  <div>
                    <h3 class="font-bold text-[#181311] dark:text-white">AI Assistant</h3>
                    <p class="text-xs text-gray-500">Instant planning guide</p>
                  </div>
                </div>
                <button id="close-ai-response" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                  <span class="material-symbols-outlined">close</span>
                </button>
              </div>
              
              <div id="ai-response-text" class="text-[#444] dark:text-gray-300 text-sm leading-relaxed prose dark:prose-invert max-w-none">
                <!-- AI content arrives here -->
              </div>

              <div id="ai-loading" class="hidden flex flex-col gap-3 py-4">
                <div class="h-4 bg-gray-100 dark:bg-gray-800 rounded-full w-full animate-pulse"></div>
                <div class="h-4 bg-gray-100 dark:bg-gray-800 rounded-full w-[90%] animate-pulse"></div>
                <div class="h-4 bg-gray-100 dark:bg-gray-800 rounded-full w-[75%] animate-pulse"></div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>