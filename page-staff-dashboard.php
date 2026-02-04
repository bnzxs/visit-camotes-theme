<?php
/**
 * Template Name: Staff Dashboard Page
 * 
 * A dedicated full-width template for the VC Hotel Booking Staff Dashboard.
 */

get_header(); ?>


<main id="primary" class="site-main">
    <div class="vc-dashboard-page-container">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="vc-dashboard-header" style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div>
                    <h1><?php the_title(); ?></h1>
                    <p>Manage your properties, bookings, and room inventory from this integrated dashboard.</p>
                </div>
                <?php if (is_user_logged_in()): ?>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" class="vc-logout-btn">
                        Logout
                        <span class="material-symbols-outlined" style="margin-left:6px; font-size:18px;">logout</span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="vc-dashboard-content">
                <?php
                if (shortcode_exists('vc_staff_dashboard')) {
                    echo do_shortcode('[vc_staff_dashboard]');
                } else {
                    echo '<div class="vc-error-msg">The VC Hotel Booking plugin is not active or the dashboard shortcode is missing.</div>';
                }
                ?>
            </div>

        </div>
    </div>
</main>

<style>
.vc-dashboard-page-container {
    padding: 80px 0;
    background: #fdfdfd;
}
.vc-dashboard-header {
    margin-bottom: 40px;
}
.vc-dashboard-header h1 {
    font-size: 32px;
    font-weight: 900;
    margin: 0;
    color: #1e293b;
}
.vc-dashboard-header p {
    color: #64748b;
    margin-top: 8px;
    font-size: 16px;
}
.vc-logout-btn {
    display: inline-flex;
    align-items: center;
    padding: 10px 20px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    color: #ef4444;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.2s;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.vc-logout-btn:hover {
    background: #fef2f2;
    border-color: #fecaca;
    color: #dc2626;
}
</style>

<?php get_footer(); ?>
