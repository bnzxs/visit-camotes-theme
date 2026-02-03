<?php
/**
 * Template Name: About Us Page
 *
 * This template displays the 'About Us' page content, including mission, vision,
 * team members, and core values.
 *
 * @package Visit_Camotes
 */

get_header();
?>

<main class="min-h-screen bg-white dark:bg-[#0a0a0a]">
    <!-- Hero / Our Purpose Section -->
    <section class="py-20 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-primary">Our Purpose</span>
                    <h2 class="text-4xl md:text-5xl font-black leading-tight text-[#121617] dark:text-white tracking-tight">
                        Bridging the gap between travelers and local traditions.
                    </h2>
                    <div class="space-y-6 text-gray-500 dark:text-gray-400 text-lg leading-relaxed">
                        <p>
                            Founded in 2024, Visit Camotes was born out of a deep-seated love for these four islands. We noticed that while the world was discovering our shores, the stories of our people and the nuances of our culture were often left untold.
                        </p>
                        <p>
                            Our mission is to provide a platform that not only guides you to the best beaches and caves but also connects you with the heart of Camotes—its vibrant history, its resilient communities, and its sustainable future.
                        </p>
                    </div>
                    <div class="pt-4">
                        <div class="flex items-center gap-6">
                            <div>
                                <span class="block text-3xl font-black text-primary">10k+</span>
                                <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Monthly Visitors</span>
                            </div>
                            <div class="w-px h-10 bg-gray-200 dark:bg-gray-800"></div>
                            <div>
                                <span class="block text-3xl font-black text-primary">50+</span>
                                <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Local Partners</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[4/5] rounded-3xl overflow-hidden editorial-shadow relative z-10">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Local Culture">
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl -z-0"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 bg-gray-50 dark:bg-[#0f0f0f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="group p-10 md:p-16 rounded-[2.5rem] bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 hover:border-primary/30 transition-all duration-500 editorial-shadow">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-3xl">flag</span>
                    </div>
                    <h3 class="text-3xl font-black mb-6 dark:text-white">Our Mission</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg leading-relaxed">
                        To empower local tourism through digital storytelling, providing every traveler with the tools and insights needed to experience the Camotes Islands responsibly and authentically.
                    </p>
                </div>
                <div class="group p-10 md:p-16 rounded-[2.5rem] bg-primary text-white transition-all duration-500 editorial-shadow">
                    <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-white text-3xl">visibility</span>
                    </div>
                    <h3 class="text-3xl font-black mb-6">Our Vision</h3>
                    <p class="text-white/80 text-lg leading-relaxed">
                        To become the global gateway for the Camotes Islands, fostering a destination where tourism thrives in perfect harmony with nature, heritage, and the local way of life.
                    </p>
                </div>
            </div>
        </div>
    </section>
 
    <!-- Team Section -->
    <section class="py-20 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 space-y-4">
                <span class="text-xs font-black uppercase tracking-[0.3em] text-primary">The Visionaries</span>
                <h2 class="text-4xl md:text-6xl font-black text-[#121617] dark:text-white">Meet the Dreamers.</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto text-lg leading-relaxed">
                    Behind every story on this site is a team of passionate locals, photographers, and writers who call these islands home.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group">
                    <div class="aspect-square rounded-3xl overflow-hidden mb-6 editorial-shadow relative translate-y-0 group-hover:-translate-y-2 transition-all duration-500">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Team Member">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-primary/80 to-transparent p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            <div class="flex justify-center gap-4">
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">share</span></a>
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">alternate_email</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-xl font-black text-[#121617] dark:text-white">John Doe</h4>
                        <p class="text-sm font-bold text-primary uppercase tracking-widest mt-1">Founder & Lead Photographer</p>
                    </div>
                </div>

                <div class="group">
                    <div class="aspect-square rounded-3xl overflow-hidden mb-6 editorial-shadow relative translate-y-0 group-hover:-translate-y-2 transition-all duration-500">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Team Member">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-primary/80 to-transparent p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            <div class="flex justify-center gap-4">
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">share</span></a>
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">alternate_email</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-xl font-black text-[#121617] dark:text-white">Jane Smith</h4>
                        <p class="text-sm font-bold text-primary uppercase tracking-widest mt-1">Content Director</p>
                    </div>
                </div>

                <div class="group">
                    <div class="aspect-square rounded-3xl overflow-hidden mb-6 editorial-shadow relative translate-y-0 group-hover:-translate-y-2 transition-all duration-500">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Team Member">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-primary/80 to-transparent p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            <div class="flex justify-center gap-4">
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">share</span></a>
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">alternate_email</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-xl font-black text-[#121617] dark:text-white">Mike Wilson</h4>
                        <p class="text-sm font-bold text-primary uppercase tracking-widest mt-1">Local Experience Scout</p>
                    </div>
                </div>

                <div class="group">
                    <div class="aspect-square rounded-3xl overflow-hidden mb-6 editorial-shadow relative translate-y-0 group-hover:-translate-y-2 transition-all duration-500">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Team Member">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-primary/80 to-transparent p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            <div class="flex justify-center gap-4">
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">share</span></a>
                                <a href="#" class="text-white hover:scale-125 transition-transform"><span class="material-symbols-outlined text-xl">alternate_email</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-xl font-black text-[#121617] dark:text-white">Sarah Chen</h4>
                        <p class="text-sm font-bold text-primary uppercase tracking-widest mt-1">Sustainability Specialist</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section (Parallax) -->
    <section class="relative py-20 overflow-hidden min-h-[600px] flex items-center">
        <!-- Parallax Background Image -->
        <img src="/wp-content/uploads/2026/01/about-values-bg.webp" 
             alt="Camotes Scenic Background" 
             class="absolute left-0 top-[-10%] w-full h-[120%] object-cover parallax-bg pointer-events-none">
        
        <!-- Dark Overlay for Readability -->
        <div class="absolute inset-0 bg-black/60 z-[1]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                <div class="lg:col-span-1 space-y-6">
                    <h2 class="text-4xl md:text-5xl font-black tracking-tight leading-tight text-white uppercase">The values that define us.</h2>
                    <p class="text-gray-200 text-lg leading-relaxed">
                        We operate on a simple set of principles that ensure our growth contributes back to the islands we love.
                    </p>
                </div>
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-12">
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-primary text-4xl">eco</span>
                        <h4 class="text-xl font-black text-white uppercase">Environmental Custodianship</h4>
                        <p class="text-gray-200 leading-relaxed font-medium">We promote eco-friendly destinations and practices to ensure the islands remain pristine for generations.</p>
                    </div>
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-primary text-4xl">groups</span>
                        <h4 class="text-xl font-black text-white uppercase">Community First</h4>
                        <p class="text-gray-200 leading-relaxed font-medium">We prioritize local businesses and artisans, ensuring that tourism benefits the people of Camotes directly.</p>
                    </div>
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-primary text-4xl">verified</span>
                        <h4 class="text-xl font-black text-white uppercase">Authentic Storytelling</h4>
                        <p class="text-gray-200 leading-relaxed font-medium">We bypass the generic to bring you the real, unfiltered stories and experiences that make Camotes unique.</p>
                    </div>
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-primary text-4xl">stars</span>
                        <h4 class="text-xl font-black text-white uppercase">Excellence in Service</h4>
                        <p class="text-gray-200 leading-relaxed font-medium">We strive for perfection in everything we do, from the quality of our content to the ease of your planning.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-32 relative overflow-hidden">
        <div class="absolute top-1/4 -left-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>

        <div class="max-w-5xl mx-auto px-4 text-center space-y-12 relative z-10">
            <h2 class="text-5xl md:text-7xl font-black leading-tight tracking-tighter text-[#121617] dark:text-white">
                Let your <span class="text-primary underline decoration-4 underline">#CamotesStory</span> begin!
            </h2>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="<?php echo esc_url(home_url('/destinations')); ?>">
                    <button class="bg-primary hover:bg-orange-600 text-white text-base font-bold h-12 px-8 rounded-lg shadow-lg hover:shadow-orange-500/30 transition-all transform hover:-translate-y-1">
                        Explore Destinations
                    </button>    
                
                </a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">
                    <button class="bg-white hover:bg-white/20 dark:bg-white/5 dark:hover:bg-white/10 text-[#121617] dark:text-white h-12 px-8 text-sm font-black uppercase tracking-[0.2em] rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all border border-gray-200 dark:border-gray-700 editorial-shadow text-center">
                        Read Our Blog
                    </button>

                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
