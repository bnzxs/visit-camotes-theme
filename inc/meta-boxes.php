<?php
/**
 * Custom Meta Boxes for Destinations
 *
 * @package VisitCamotes
 */

/**
 * Add Meta Boxes to the Destination post type.
 */
function visitcamotes_add_destination_metaboxes() {
    add_meta_box(
        'visitcamotes_destination_details',
        __( 'Destination Spotlight & Ratings', 'visitcamotes' ),
        'visitcamotes_render_destination_metabox',
        'destination',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'visitcamotes_add_destination_metaboxes' );

/**
 * Enqueue scripts and styles for the Meta Box.
 */
function visitcamotes_admin_scripts( $hook ) {
    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'destination' === $post->post_type ) {
            wp_enqueue_media();
        }
    }
}
add_action( 'admin_enqueue_scripts', 'visitcamotes_admin_scripts' );

/**
 * Render the Meta Box HTML.
 */
function visitcamotes_render_destination_metabox( $post ) {
    // Add Nonce field for security
    wp_nonce_field( 'visitcamotes_save_destination_meta', 'visitcamotes_destination_nonce' );

    // Retrieve existing values
    $rating_score = get_post_meta( $post->ID, '_destination_rating', true );
    $rating_count = get_post_meta( $post->ID, '_destination_rating_count', true );
    
    $s_label    = get_post_meta( $post->ID, '_spotlight_label', true );
    $s_title    = get_post_meta( $post->ID, '_spotlight_title', true );
    $s_desc     = get_post_meta( $post->ID, '_spotlight_description', true );
    $s_date     = get_post_meta( $post->ID, '_spotlight_date', true );
    $s_location = get_post_meta( $post->ID, '_spotlight_location', true );
    $s_btn_text = get_post_meta( $post->ID, '_spotlight_button_text', true );
    $s_btn_url  = get_post_meta( $post->ID, '_spotlight_button_url', true );
    $s_img1     = get_post_meta( $post->ID, '_spotlight_image_1', true );
    $s_img2     = get_post_meta( $post->ID, '_spotlight_image_2', true );
    $s_icon     = get_post_meta( $post->ID, '_spotlight_icon', true );

    ?>
    <style>
        .vc-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; padding: 10px; }
        .vc-meta-field { margin-bottom: 15px; }
        .vc-meta-field label { display: block; font-weight: bold; margin-bottom: 5px; }
        .vc-meta-field input, .vc-meta-field textarea { width: 100%; }
        .vc-meta-section-title { grid-column: span 2; border-bottom: 1px solid #ddd; padding-bottom: 5px; margin-top: 10px; color: #2271b1; }
        .vc-image-preview { margin-top: 10px; max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 4px; display: <?php echo $s_img1 || $s_img2 ? 'block' : 'none'; ?>; }
        .vc-media-btns { margin-top: 5px; display: flex; gap: 5px; }
    </style>

    <div class="vc-meta-grid">
        <h3 class="vc-meta-section-title">Ratings</h3>
        <div class="vc-meta-field">
            <label for="destination_rating">Rating Score (e.g. 4.9)</label>
            <input type="text" id="destination_rating" name="destination_rating" value="<?php echo esc_attr( $rating_score ); ?>">
        </div>
        <div class="vc-meta-field">
            <label for="destination_rating_count">Rating Count (e.g. 1.2k)</label>
            <input type="text" id="destination_rating_count" name="destination_rating_count" value="<?php echo esc_attr( $rating_count ); ?>">
        </div>

        <h3 class="vc-meta-section-title">Spotlight Section</h3>
        <div class="vc-meta-field">
            <label for="spotlight_label">Label (e.g. This Month's Spotlight)</label>
            <input type="text" id="spotlight_label" name="spotlight_label" value="<?php echo esc_attr( $s_label ); ?>">
        </div>
        <div class="vc-meta-field">
            <label for="spotlight_title">Title (e.g. The Festival of Lights)</label>
            <input type="text" id="spotlight_title" name="spotlight_title" value="<?php echo esc_attr( $s_title ); ?>">
        </div>
        <div class="vc-meta-field" style="grid-column: span 2;">
            <label for="spotlight_description">Description</label>
            <textarea id="spotlight_description" name="spotlight_description" rows="3"><?php echo esc_textarea( $s_desc ); ?></textarea>
        </div>
        <div class="vc-meta-field">
            <label for="spotlight_date">Date (e.g. Oct 15-18)</label>
            <input type="text" id="spotlight_date" name="spotlight_date" value="<?php echo esc_attr( $s_date ); ?>">
        </div>
        <div class="vc-meta-field">
            <label for="spotlight_location">Location (e.g. Central Square)</label>
            <input type="text" id="spotlight_location" name="spotlight_location" value="<?php echo esc_attr( $s_location ); ?>">
        </div>
        <div class="vc-meta-field">
            <label for="spotlight_button_text">Button Text</label>
            <input type="text" id="spotlight_button_text" name="spotlight_button_text" value="<?php echo esc_attr( $s_btn_text ); ?>">
        </div>
        <div class="vc-meta-field">
            <label for="spotlight_button_url">Button URL</label>
            <input type="text" id="spotlight_button_url" name="spotlight_button_url" value="<?php echo esc_attr( $s_btn_url ); ?>">
        </div>
        
        <!-- Main Image -->
        <div class="vc-meta-field">
            <label for="spotlight_image_1">Main Image</label>
            <input type="text" id="spotlight_image_1" name="spotlight_image_1" value="<?php echo esc_attr( $s_img1 ); ?>">
            <div class="vc-media-btns">
                <button type="button" class="button vc-upload-btn" data-input="#spotlight_image_1">Select Image</button>
                <button type="button" class="button vc-remove-btn" data-input="#spotlight_image_1" style="<?php echo $s_img1 ? '' : 'display:none;'; ?>">Remove</button>
            </div>
        </div>

        <!-- Overlay Image -->
        <div class="vc-meta-field">
            <label for="spotlight_image_2">Overlay Image</label>
            <input type="text" id="spotlight_image_2" name="spotlight_image_2" value="<?php echo esc_attr( $s_img2 ); ?>">
            <div class="vc-media-btns">
                <button type="button" class="button vc-upload-btn" data-input="#spotlight_image_2">Select Image</button>
                <button type="button" class="button vc-remove-btn" data-input="#spotlight_image_2" style="<?php echo $s_img2 ? '' : 'display:none;'; ?>">Remove</button>
            </div>
        </div>

        <div class="vc-meta-field">
            <label for="spotlight_icon">Material Icon Name (e.g. light_mode)</label>
            <input type="text" id="spotlight_icon" name="spotlight_icon" value="<?php echo esc_attr( $s_icon ); ?>">
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        var mediaFrame;

        $('.vc-upload-btn').on('click', function(e){
            e.preventDefault();
            var btn = $(this);
            var inputTarget = btn.data('input');
            var previewTarget = '#preview-' + inputTarget.replace('#', '');
            var removeBtn = btn.siblings('.vc-remove-btn');

            // If the media frame already exists, reopen it.
            if (mediaFrame) {
                mediaFrame.inputTarget = inputTarget;
                mediaFrame.previewTarget = previewTarget;
                mediaFrame.removeBtn = removeBtn;
                mediaFrame.open();
                return;
            }

            // Create the media frame.
            mediaFrame = wp.media({
                title: 'Select or Upload Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false
            });

            mediaFrame.inputTarget = inputTarget;
            mediaFrame.previewTarget = previewTarget;
            mediaFrame.removeBtn = removeBtn;

            mediaFrame.on('select', function() {
                var attachment = mediaFrame.state().get('selection').first().toJSON();
                $(mediaFrame.inputTarget).val(attachment.url);
                $(mediaFrame.previewTarget).attr('src', attachment.url).show();
                $(mediaFrame.removeBtn).show();
            });

            mediaFrame.open();
        });

        $('.vc-remove-btn').on('click', function(e){
            e.preventDefault();
            var btn = $(this);
            var inputTarget = btn.data('input');
            var previewTarget = '#preview-' + inputTarget.replace('#', '');

            $(inputTarget).val('');
            $(previewTarget).hide();
            btn.hide();
        });
    });
    </script>
    <?php
}

/**
 * Save Meta Box data.
 */
function visitcamotes_save_destination_metadata( $post_id ) {
    // Check nonce
    if ( ! isset( $_POST['visitcamotes_destination_nonce'] ) || ! wp_verify_nonce( $_POST['visitcamotes_destination_nonce'], 'visitcamotes_save_destination_meta' ) ) {
        return;
    }

    // Check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check permissions
    if ( isset( $_POST['post_type'] ) && 'destination' === $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    // Sanitize and save fields
    $fields = [
        'destination_rating'       => '_destination_rating',
        'destination_rating_count' => '_destination_rating_count',
        'spotlight_label'          => '_spotlight_label',
        'spotlight_title'          => '_spotlight_title',
        'spotlight_description'    => '_spotlight_description',
        'spotlight_date'           => '_spotlight_date',
        'spotlight_location'       => '_spotlight_location',
        'spotlight_button_text'    => '_spotlight_button_text',
        'spotlight_button_url'     => '_spotlight_button_url',
        'spotlight_image_1'        => '_spotlight_image_1',
        'spotlight_image_2'        => '_spotlight_image_2',
        'spotlight_icon'           => '_spotlight_icon',
    ];

    foreach ( $fields as $form_key => $meta_key ) {
        if ( isset( $_POST[ $form_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $form_key ] ) );
        }
    }
}
add_action( 'save_post', 'visitcamotes_save_destination_metadata' );
