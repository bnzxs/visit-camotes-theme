<?php
/**
 * Template Name: Contact Page
 *
 * The template for displaying the Contact Us page.
 *
 * @package Visit_Camotes
 */

get_header(); ?>

<main class="min-h-screen bg-white dark:bg-[#0a0a0a]">

   
    <!-- Form Section -->
    <section class="py-20 md:py-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                <!-- Content Column -->
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-3xl md:text-4xl font-black text-[#181311] dark:text-white leading-tight">
                            Send us a <span class="text-primary">message.</span>
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400 text-lg leading-relaxed">
                            Whether you're looking for travel advice, have a business inquiry, or just want to say hello, we're all ears. Fill out the form and we'll get back to you as soon as possible.
                        </p>
                    </div>

                    <div class="space-y-6 pt-4">
                        <div class="flex items-center gap-4 text-gray-500 dark:text-gray-400 hover:text-primary transition-colors cursor-default group">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center group-hover:bg-primary/10 group-hover:text-primary transition-all">
                                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                            </div>
                            <span class="font-bold">Blog Posting Inquiry</span>
                        </div>
                        <div class="flex items-center gap-4 text-gray-500 dark:text-gray-400 hover:text-primary transition-colors cursor-default group">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center group-hover:bg-primary/10 group-hover:text-primary transition-all">
                                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                            </div>
                            <span class="font-bold">Tailored Travel Advice</span>
                        </div>
                        <div class="flex items-center gap-4 text-gray-500 dark:text-gray-400 hover:text-primary transition-colors cursor-default group">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center group-hover:bg-primary/10 group-hover:text-primary transition-all">
                                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                            </div>
                            <span class="font-bold">Partnerships & Advertising</span>
                        </div>
                    </div>

                    <!-- Social Presence -->
                    <div class="pt-8 border-t border-gray-100 dark:border-gray-800 flex items-center gap-6">
                        <p class="text-xs font-black uppercase tracking-widest text-gray-400">Follow our journey</p>
                        <div class="flex gap-4">
                            <a href="#" class="w-12 h-12 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-100 dark:border-gray-800 flex items-center justify-center text-[#181311] dark:text-white hover:bg-primary hover:text-white hover:border-primary transition-all duration-300">
                                <span class="material-symbols-outlined text-[24px]">share</span>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-100 dark:border-gray-800 flex items-center justify-center text-[#181311] dark:text-white hover:bg-primary hover:text-white hover:border-primary transition-all duration-300">
                                <span class="material-symbols-outlined text-[24px]">photo_camera</span>
                            </a>
                        </div>
                    </div>

                    <!-- Google Map Embed -->
                    <div class="mt-10 rounded-3xl overflow-hidden editorial-shadow border border-gray-100 dark:border-gray-800 h-[350px] transition-all duration-500 group/map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125456.79380522073!2d124.3372447087548!3d10.693944545713231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a82954c1a4cdfb%3A0x3cad770124ea1811!2sCamotes%20Islands!5e0!3m2!1sen!2sph!4v1770271223977!5m2!1sen!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="grayscale group-hover/map:grayscale-0 transition-all duration-700"></iframe>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="bg-gray-50 dark:bg-[#0f0f0f] rounded-[2.5rem] p-8 md:p-12 editorial-shadow relative border border-gray-100 dark:border-gray-800 transition-all duration-500 hover:border-primary/20">
                    <?php 
                    // Use a shortcode for Contact Form 7. 
                    // The user will need to create a form in the WordPress admin and paste the shortcode here.
                    // We can use a helpful placeholder if the plugin isn't active or the shortcode is missing.
                    echo do_shortcode('[contact-form-7 id="aee804e" title="Contact Form"]'); 
                    ?>
                    
                    <!-- Fallback Message if CF7 is not configured -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const cf7Forms = document.querySelectorAll('.wpcf7');
                            if (cf7Forms.length === 0) {
                                // This is just a helpful hint for the user in development
                                console.log('Contact Form 7 not detected. Make sure to create a form and update the shortcode in page-contact.php.');
                            }
                        });
                    </script>

                    <style>
                        /* Custom CF7 Styling for this page */
                        .wpcf7-form {
                            display: flex;
                            flex-direction: column;
                            gap: 1.5rem;
                        }
                        .wpcf7-form-control-wrap {
                            display: block;
                        }
                        .wpcf7-text, .wpcf7-textarea, .wpcf7-select, .wpcf7-tel {
                            width: 100% !important;
                            padding: 0.875rem 1.25rem !important;
                            border-radius: 1rem !important;
                            border: 1px solid #e5e7eb !important;
                            background-color: white !important;
                            font-size: 0.9375rem !important;
                            color: #1f2937 !important;
                            transition: all 0.3s ease !important;
                        }
                        .dark .wpcf7-text, .dark .wpcf7-textarea, .dark .wpcf7-select, .dark .wpcf7-tel {
                            background-color: #1a1a1a !important;
                            border-color: #333 !important;
                            color: white !important;
                        }
                        .wpcf7-text:focus, .wpcf7-textarea:focus, .wpcf7-tel:focus {
                            border-color: #ee6c2b !important;
                            box-shadow: 0 0 0 4px rgba(238, 108, 43, 0.1) !important;
                            outline: none !important;
                        }
                        .wpcf7-submit {
                            width: 100% !important;
                            background-color: #ee6c2b !important;
                            color: white !important;
                            font-weight: 700 !important;
                            padding: 1rem !important;
                            border-radius: 1rem !important;
                            border: none !important;
                            cursor: pointer !important;
                            transition: all 0.3s ease !important;
                            margin-top: 1rem !important;
                        }
                        .wpcf7-submit:hover {
                            background-color: #d65a1e !important;
                            transform: translateY(-2px) !important;
                            box-shadow: 0 10px 20px -10px rgba(238, 108, 43, 0.5) !important;
                        }
                        .wpcf7-not-valid-tip {
                            font-size: 0.75rem !important;
                            color: #ef4444 !important;
                            margin-top: 0.25rem !important;
                        }
                        .wpcf7-response-output {
                            border-radius: 1rem !important;
                            padding: 1rem !important;
                            margin: 1rem 0 0 0 !important;
                            font-size: 0.875rem !important;
                            font-weight: 600 !important;
                        }
                    </style>
                </div>
            </div>
        </div>
    </section>
     <!-- Contact Info Cards -->
    <section class="py-12 -mt-10 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Location Card -->
                <div class="group p-8 rounded-3xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 hover:border-primary/30 transition-all duration-500 editorial-shadow text-center">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-3xl">location_on</span>
                    </div>
                    <h3 class="text-xl font-black mb-2 dark:text-white">Visit Us</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        San Francisco, Camotes Islands<br>Cebu, Philippines 6050
                    </p>
                </div>

                <!-- Phone Card -->
                <div class="group p-8 rounded-3xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 hover:border-primary/30 transition-all duration-500 editorial-shadow text-center">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-3xl">call</span>
                    </div>
                    <h3 class="text-xl font-black mb-2 dark:text-white">Call Us</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        <a href="tel:+639123456789" class="hover:text-primary transition-colors">+63 912 345 6789</a><br>
                        Available Mon-Fri, 9am-6pm
                    </p>
                </div>

                <!-- Email Card -->
                <div class="group p-8 rounded-3xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 hover:border-primary/30 transition-all duration-500 editorial-shadow text-center">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-3xl">mail</span>
                    </div>
                    <h3 class="text-xl font-black mb-2 dark:text-white">Email Us</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        <a href="mailto:hello@visitcamotes.com" class="hover:text-primary transition-colors">hello@visitcamotes.com</a><br>
                        We reply within 24 hours
                    </p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
