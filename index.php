<?php
/**
 * The main template file.
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a WordPress theme (the other being style.css).
 * It is used when no more specific template file matches the query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VisitCamotes
 * @since 1.0.0
 */

get_header();
?>

<!-- Main Content Area -->
<main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (e.g. content-single.php) in the child theme directory.
             */
            get_template_part( 'template-parts/content', get_post_format() );

        endwhile; /* End the Loop */

        the_posts_navigation();

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();