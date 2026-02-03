<?php
/**
 * The template for displaying category archives
 *
 * @package Visit_Camotes
 */

get_header();

$cat_id = get_queried_object_id();
$current_cat = get_queried_object();
$cat_name = (is_a($current_cat, 'WP_Term')) ? ucwords(strtolower($current_cat->name)) : 'Category';
$cat_desc = (is_a($current_cat, 'WP_Term')) ? $current_cat->description : '';

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$grid_args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'paged' => $paged,
    'cat' => $cat_id,
);
$grid_query = new WP_Query($grid_args);
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col gap-8">
  <!-- Archive Header -->
  <header class="mb-8 border-b border-gray-100 dark:border-gray-800 pb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
    <div class="flex-1">
      <?php if (function_exists('visitcamotes_breadcrumbs')) visitcamotes_breadcrumbs(); ?>
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-tight text-[#121617] dark:text-white capitalize">
        <span class="text-primary opacity-50 text-2xl md:text-3xl lg:text-4xl block mb-2">Category:</span>
        <?php echo esc_html($cat_name); ?>
      </h1>
      <?php if ($cat_desc) : ?>
      <p class="mt-4 text-lg text-gray-500 dark:text-gray-400 max-w-2xl">
        <?php echo esc_html($cat_desc); ?>
      </p>
      <?php endif; ?>
    </div>

    <div class="flex items-center gap-2 bg-gray-50 dark:bg-gray-800/50 p-1 rounded-xl w-fit self-start md:self-end">
      <button id="view-grid" class="flex h-10 w-10 items-center justify-center rounded-lg bg-white dark:bg-gray-800 shadow-sm text-primary transition-all active-view" title="Grid View">
        <span class="material-symbols-outlined">grid_view</span>
      </button>
      <button id="view-list" class="flex h-10 w-10 items-center justify-center rounded-lg text-gray-400 hover:text-primary transition-all" title="List View">
        <span class="material-symbols-outlined">view_list</span>
      </button>
    </div>
  </header>

  <section class="mb-20">
    <?php if ($grid_query->have_posts()) : ?>
    <!-- Main Posts Loop -->
    <div id="posts-container" class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3 transition-all duration-300">
      <?php while ($grid_query->have_posts()) : $grid_query->the_post(); 
        $categories = get_the_category();
        $category_name = !empty($categories) ? ucwords(strtolower($categories[0]->name)) : 'Uncategorized';
      ?>
      <article class="post-item hover-card flex flex-col gap-6 group">
        <a href="<?php the_permalink(); ?>" class="post-thumbnail aspect-[4/3] w-full overflow-hidden rounded-xl bg-gray-200 shrink-0">
          <?php if (has_post_thumbnail()) : ?>
          <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-105" 
               style='background-image: url("<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>");'>
          </div>
          <?php else : ?>
          <div class="h-full w-full bg-gray-300 dark:bg-gray-700 font-bold text-gray-400 flex items-center justify-center italic">No Image</div>
          <?php endif; ?>
        </a>
        <div class="post-content flex flex-col gap-3 flex-1 justify-center">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary capitalize"><?php echo esc_html($category_name); ?></span>
            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400"><?php echo get_the_date('M d, Y'); ?></span>
          </div>
          <h3 class="post-title text-2xl font-black leading-tight tracking-tight text-[#121617] dark:text-white group-hover:text-primary transition-colors">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
          <p class="post-excerpt line-clamp-2 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
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
    <!-- Pagination -->
    <div class="mt-16 flex items-center justify-center gap-4">
      <?php if ($paged > 1) : ?>
      <a href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>" class="flex h-12 w-12 items-center justify-center rounded-lg bg-white dark:bg-gray-800 editorial-shadow text-gray-400 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">chevron_left</span>
      </a>
      <?php endif; ?>
      
      <div class="flex gap-2">
        <?php 
        $total_pages = $grid_query->max_num_pages;
        $range = 2;
        for ($i = 1; $i <= $total_pages; $i++) : 
          if ($i == 1 || $i == $total_pages || ($i >= $paged - $range && $i <= $paged + $range)) :
        ?>
        <a href="<?php echo esc_url(get_pagenum_link($i)); ?>" 
           class="h-12 w-12 rounded-lg text-sm font-bold transition-colors <?php echo ($i === $paged) ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'bg-white dark:bg-gray-800 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700'; ?> flex items-center justify-center">
          <?php echo $i; ?>
        </a>
        <?php elseif ($i == 2 || $i == $total_pages - 1) : ?>
        <span class="flex h-12 w-8 items-center justify-center text-gray-400">...</span>
        <?php endif; endfor; ?>
      </div>
      
      <?php if ($paged < $grid_query->max_num_pages) : ?>
      <a href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>" class="flex h-12 w-12 items-center justify-center rounded-lg bg-white dark:bg-gray-800 editorial-shadow text-gray-400 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">chevron_right</span>
      </a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php else : ?>
    <div class="text-center py-20 bg-gray-50 dark:bg-gray-800/50 rounded-2xl">
      <span class="material-symbols-outlined text-4xl text-gray-300 mb-4">folder_open</span>
      <p class="text-gray-500 dark:text-gray-400 font-medium">No posts found in this category yet.</p>
    </div>
    <?php endif; wp_reset_postdata(); ?>
  </section>
</main>

<style>
    .list-mode {
    grid-template-columns: 1fr !important;
    gap: 2rem !important;
    }

    .list-mode .post-item {
    flex-direction: row !important;
    align-items: center;
    }

    .list-mode .post-thumbnail {
    width: 320px !important;
    height: 220px !important;
    }

    .list-mode .post-content {
    padding-left: 1rem;
    }

    @media (max-width: 768px) {
    .list-mode .post-item {
        flex-direction: column !important;
    }
    .list-mode .post-thumbnail {
        width: 100% !important;
    }
    }

    .active-view {
    background-color: white;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .dark .active-view {
    background-color: #1f2937;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const container = document.getElementById('posts-container');
  const viewGrid = document.getElementById('view-grid');
  const viewList = document.getElementById('view-list');

  const currentView = localStorage.getItem('category-view') || 'grid';
  if (currentView === 'list') {
    enableListView();
  }

  viewGrid.addEventListener('click', function() {
    enableGridView();
  });

  viewList.addEventListener('click', function() {
    enableListView();
  });

  function enableGridView() {
    container.classList.remove('list-mode');
    viewGrid.classList.add('bg-white', 'dark:bg-gray-800', 'shadow-sm', 'text-primary');
    viewGrid.classList.remove('text-gray-400');
    viewList.classList.add('text-gray-400');
    viewList.classList.remove('bg-white', 'dark:bg-gray-800', 'shadow-sm', 'text-primary');
    localStorage.setItem('category-view', 'grid');
  }

  function enableListView() {
    container.classList.add('list-mode');
    viewList.classList.add('bg-white', 'dark:bg-gray-800', 'shadow-sm', 'text-primary');
    viewList.classList.remove('text-gray-400');
    viewGrid.classList.add('text-gray-400');
    viewGrid.classList.remove('bg-white', 'dark:bg-gray-800', 'shadow-sm', 'text-primary');
    localStorage.setItem('category-view', 'list');
  }
});
</script>

<?php get_footer(); ?>
