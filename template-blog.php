<?php
/**
 * Template Name: Blog Page
 */

get_header();

$current_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$featured_args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'category_name' => 'featured',
);
$featured_query = new WP_Query($featured_args);

$exclude_names = array('All Experiences', 'Featured');
$exclude_ids = array();
foreach ($exclude_names as $name) {
    $term = get_term_by('name', $name, 'category');
    if ($term) $exclude_ids[] = $term->term_id;
}

$grid_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'paged' => $paged,
    'category__not_in' => $exclude_ids,
);

if ($current_category) {
    $grid_args['category_name'] = $current_category;
}

$grid_query = new WP_Query($grid_args);
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col gap-8">
  <?php if ($featured_query->have_posts()) : $featured_query->the_post(); ?>
  <section>
    <div class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 editorial-shadow">
      <div class="flex flex-col lg:flex-row items-stretch">
        <div class="relative h-[400px] w-full lg:h-[600px] lg:w-3/5 overflow-hidden">
          <?php if (has_post_thumbnail()) : ?>
          <div class="h-full w-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
               style='background-image: url("<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>");'>
          </div>
          <?php else : ?>
          <div class="h-full w-full bg-gray-300 dark:bg-gray-700"></div>
          <?php endif; ?>
          <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>
        <div class="flex w-full flex-col justify-center p-8 lg:w-2/5 lg:p-16">
          <?php 
          $categories = get_the_category();
          if (!empty($categories)) : ?>
          <span class="mb-4 inline-block text-xs font-black uppercase tracking-[0.2em] text-primary flex items-center justify-between">
            <?php echo esc_html($categories[0]->name); ?>
            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400"><?php echo get_the_date('M d, Y'); ?></span>
          </span>
          <?php endif; ?>
          <h1 class="mb-6 text-3xl font-black leading-[1.1] tracking-tight text-[#121617] dark:text-white">
            <?php the_title(); ?>
          </h1>
          <p class="mb-8 text-lg leading-relaxed text-gray-500 dark:text-gray-400">
            <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
          </p>
          <a href="<?php the_permalink(); ?>" class="group flex items-center gap-3 self-start text-sm font-bold uppercase tracking-widest text-primary">
            <span class="border-b-2 border-primary pb-1">Read Full Story</span>
            <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; wp_reset_postdata(); ?>

  <!-- Ad Placeholder: Blog Index Top -->
  <div class="w-full">
    <div class="flex flex-col items-center justify-center py-6 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
      <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
      <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
        <span class="material-symbols-outlined text-3xl">ads_click</span>
        <span class="text-sm font-medium">Sponsored Post</span>
        <span class="text-xs opacity-75">(Feed Insert)</span>
      </div>
    </div>
  </div>

  <section>
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 dark:border-gray-800 pb-6">
      <div class="flex gap-2 flex-wrap">
        <a href="<?php echo esc_url(remove_query_arg('category')); ?>" 
           class="flex items-center justify-center h-9 rounded-full px-6 text-xs font-bold capitalize tracking-widest transition-colors <?php echo empty($current_category) ? 'bg-primary text-white' : 'bg-white dark:bg-gray-800 text-gray-500 hover:bg-gray-100'; ?>">
          All
        </a>
        <?php
        $categories = get_categories(array(
            'hide_empty' => true,
            'exclude'    => $exclude_ids,
        ));
        foreach ($categories as $cat) :
          $is_active = ($current_category === $cat->slug);
        ?>
        <a href="<?php echo esc_url(add_query_arg('category', $cat->slug)); ?>" 
           class="flex items-center justify-center h-9 rounded-full px-6 text-xs font-bold capitalize tracking-widest transition-colors <?php echo $is_active ? 'bg-primary text-white' : 'bg-white dark:bg-gray-800 text-gray-500 hover:bg-gray-100'; ?>">
          <?php echo esc_html(ucwords(strtolower($cat->name))); ?>
        </a>
        <?php endforeach; ?>
      </div>
      <!-- <div class="flex items-center gap-2 text-gray-400">
        <span class="text-xs font-bold uppercase tracking-widest">Sort By:</span>
        <select class="border-none bg-transparent text-xs font-bold uppercase tracking-widest text-primary focus:ring-0" onchange="window.location.href=this.value">
          <option value="<?php echo esc_url(add_query_arg('orderby', 'date')); ?>">Latest</option>
          <option value="<?php echo esc_url(add_query_arg('orderby', 'comment_count')); ?>">Popular</option>
        </select>
      </div> -->
    </div>
  </section>


  <section class="mb-20">
    <?php if ($grid_query->have_posts()) : ?>
    <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
      <?php while ($grid_query->have_posts()) : $grid_query->the_post(); 
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

    <?php if ($grid_query->max_num_pages > 1) : ?>
    <div class="mt-16 flex items-center justify-center gap-4">
      <?php if ($paged > 1) : ?>
      <a href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>" class="flex h-12 w-12 items-center justify-center rounded-lg bg-white dark:bg-gray-800 editorial-shadow text-gray-400 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">chevron_left</span>
      </a>
      <?php endif; ?>
      
      <div class="flex gap-2">
        <?php for ($i = 1; $i <= $grid_query->max_num_pages; $i++) : ?>
        <a href="<?php echo esc_url(get_pagenum_link($i)); ?>" 
           class="h-12 w-12 rounded-lg text-sm font-bold transition-colors <?php echo ($i === $paged) ? 'bg-primary text-white' : 'bg-white dark:bg-gray-800 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700'; ?> flex items-center justify-center">
          <?php echo $i; ?>
        </a>
        <?php endfor; ?>
      </div>
      
      <?php if ($paged < $grid_query->max_num_pages) : ?>
      <a href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>" class="flex h-12 w-12 items-center justify-center rounded-lg bg-white dark:bg-gray-800 editorial-shadow text-gray-400 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">chevron_right</span>
      </a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php else : ?>
    <p class="text-center text-gray-500 dark:text-gray-400">No posts found.</p>
    <?php endif; wp_reset_postdata(); ?>
  </section>
</main>

<?php get_footer(); ?>
