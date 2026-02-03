<?php
/**
 * Custom Post Types and Taxonomies
 *
 * @package VisitCamotes
 */

function visitcamotes_register_post_types() {
    /**
     * Post Type: Destinations.
     */
    $labels = array(
        'name'          => _x( 'Destinations', 'Post Type General Name', 'visitcamotes' ),
        'singular_name' => _x( 'Destination', 'Post Type Singular Name', 'visitcamotes' ),
    );

    $args = array(
        'label'                 => __( 'Destination', 'visitcamotes' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true, // Enable Gutenberg
        'taxonomies'            => array( 'category', 'post_tag' ),
        'rewrite'               => array( 'slug' => 'destinations' ),
    );
    register_post_type( 'destinations', $args );
}
add_action( 'init', 'visitcamotes_register_post_types', 0 );