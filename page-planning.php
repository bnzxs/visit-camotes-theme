<?php
/**
 * Template Name: Planning Page
 *
 * The template for displaying travel planning information, ferry schedules,
 * and essential travel tips.
 *
 * @package Visit_Camotes
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="flex flex-col lg:flex-row max-w-[1280px] mx-auto px-4 md:px-8 py-10 gap-10">
    <!-- Sidebar / Table of Contents -->
    <aside class="hidden lg:block w-64 shrink-0 sticky top-24 h-fit">
        <div
            class="flex flex-col gap-6 p-6 bg-white dark:bg-[#1e1e1e] rounded-xl border border-[#e6dfdb] dark:border-[#333] shadow-sm">
            <div class="flex flex-col gap-1">
                <h3 class="text-[#181311] dark:text-white text-lg font-bold">Table of Contents</h3>
                <p class="text-[#896f61] dark:text-gray-400 text-sm">Jump to section</p>
            </div>
            <nav class="flex flex-col gap-2" id="guide-nav">
                <a class="nav-link flex items-center gap-3 px-3 py-2 rounded-lg text-[#555] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#333] transition-colors"
                    href="#essentials">
                    <span class="material-symbols-outlined text-[20px]">info</span>
                    <span class="text-sm font-medium">Quick Essentials</span>
                </a>
                <a class="nav-link flex items-center gap-3 px-3 py-2 rounded-lg text-[#555] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#333] transition-colors"
                    href="#best-time">
                    <span class="material-symbols-outlined text-[20px]">calendar_month</span>
                    <span class="text-sm font-medium">Best Time to Visit</span>
                </a>
                <a class="nav-link flex items-center gap-3 px-3 py-2 rounded-lg text-[#555] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#333] transition-colors"
                    href="#transport">
                    <span class="material-symbols-outlined text-[20px]">directions_bus</span>
                    <span class="text-sm font-medium">Transportation</span>
                </a>
                <a class="nav-link flex items-center gap-3 px-3 py-2 rounded-lg text-[#555] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#333] transition-colors"
                    href="#ferry-schedules">
                    <span class="material-symbols-outlined text-[20px]">directions_boat</span>
                    <span class="text-sm font-medium">Ferry Schedules</span>
                </a>
                <a class="nav-link flex items-center gap-3 px-3 py-2 rounded-lg text-[#555] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#333] transition-colors"
                    href="#safety">
                    <span class="material-symbols-outlined text-[20px]">health_and_safety</span>
                    <span class="text-sm font-medium">Safety &amp; Health</span>
                </a>
                <a class="nav-link flex items-center gap-3 px-3 py-2 rounded-lg text-[#555] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#333] transition-colors"
                    href="#faq">
                    <span class="material-symbols-outlined text-[20px]">help</span>
                    <span class="text-sm font-medium">FAQ</span>
                </a>
            </nav>

            <div class="pt-4 border-t border-[#f0f0f0] dark:border-[#333]">
                <button onclick="window.print()"
                    class="w-full flex items-center justify-center gap-2 text-sm font-bold text-[#181311] dark:text-white border border-[#e6dfdb] dark:border-[#555] rounded-lg py-2.5 hover:bg-gray-50 dark:hover:bg-[#2a2a2a] transition-colors">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                    Download Guide PDF
                </button>
            </div>
        </div>

        <!-- Ad Placeholder: Sidebar (Planning Page) -->
        <div class="w-full mt-4">
            <div class="flex flex-col items-center justify-center py-6 bg-white dark:bg-[#1e1e1e] border border-dashed border-gray-200 dark:border-[#333] rounded-xl relative overflow-hidden group">
                <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
                <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                    <span class="material-symbols-outlined text-3xl">ads_click</span>
                    <span class="text-sm font-medium">Planning Ad</span>
                    <span class="text-xs opacity-75">(Sidebar Slot)</span>
                </div>
            </div>
        </div>
    </aside>
    <!-- Main Planning Content Area -->
    <main class="flex-1 flex flex-col gap-12 min-w-0">
        <section class="flex flex-col gap-6 scroll-mt-28" id="essentials">
            <div class="flex flex-col gap-2">
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Quick <span class="text-primary">Essentials</span></h2>
                <p class="text-[#666] dark:text-gray-400">Key information to know before you land.</p>
            </div>
            <div class="flex flex-wrap gap-4">
                <div
                    class="flex items-center gap-3 rounded-xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] p-4 shadow-sm min-w-[180px] flex-1">
                    <div class="size-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">account_balance_wallet</span>
                    </div>
                    <div>
                        <p class="text-xs text-[#896f61] font-semibold uppercase tracking-wider">Currency</p>
                        <p class="text-[#181311] dark:text-white font-bold">
                            <?php echo esc_html(get_field('currency')); ?></p>
                    </div>
                </div>
                <div
                    class="flex items-center gap-3 rounded-xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] p-4 shadow-sm min-w-[180px] flex-1">
                    <div class="size-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <div>
                        <p class="text-xs text-[#896f61] font-semibold uppercase tracking-wider">Payment Methods</p>
                        <p class="text-[#181311] dark:text-white font-bold">
                            <?php echo esc_html(get_field('payment_methods')); ?></p>
                    </div>
                </div>
                <div
                    class="flex items-center gap-3 rounded-xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] p-4 shadow-sm min-w-[180px] flex-1">
                    <div class="size-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">language</span>
                    </div>
                    <div>
                        <p class="text-xs text-[#896f61] font-semibold uppercase tracking-wider">Language</p>
                        <p class="text-[#181311] dark:text-white font-bold">
                            <?php echo esc_html(get_field('language')); ?></p>
                    </div>
                </div>
                <div
                    class="flex items-center gap-3 rounded-xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] p-4 shadow-sm min-w-[180px] flex-1">
                    <div class="size-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div>
                        <p class="text-xs text-[#896f61] font-semibold uppercase tracking-wider">Time Zone</p>
                        <p class="text-[#181311] dark:text-white font-bold">
                            <?php echo esc_html(get_field('time_zone')); ?></p>
                    </div>
                </div>
                <div
                    class="flex items-center gap-3 rounded-xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] p-4 shadow-sm min-w-[180px] flex-1">
                    <div class="size-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">emergency</span>
                    </div>
                    <div>
                        <p class="text-xs text-[#896f61] font-semibold uppercase tracking-wider">Emergency Hotlines</p>
                        <?php
                        $hotlines = array_filter([
                            'Camotes ERT' => get_field('camotes_island_emergency_response_team'),
                            'PCG Camotes' => get_field('philippine_coast_guard_camotes'),
                            'PNP - San Francisco' => get_field('philippine_national_police_-_san_francisco'),
                        ]);

                        if ($hotlines):
                            $count = count($hotlines);
                            $i = 0;
                            foreach ($hotlines as $label => $number):
                                $i++;
                                $tel = preg_replace('/[^0-9+]/', '', $number);
                                ?>
                                <p class="contact-item text-[#181311] dark:text-white float-left mr-[10px] font-bold text-[13px] md:text-[16px]">
                                    <?php echo esc_html($label); ?>: 
                                    <a href="tel:<?php echo esc_attr($tel); ?>" class="text-primary font-normal"><?php echo esc_html($number); ?></a> 
                                    <?php if ($i < $count): ?>
                                        <span class="separator"> | </span>
                                    <?php endif; ?>
                                </p>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 2: Visa & Entry
        <section class="flex flex-col gap-6 scroll-mt-28" id="visa">
            <div class="flex flex-col gap-2">
                <h2 class="text-2xl font-bold text-[#181311] dark:text-white">Visa &amp; Entry Requirements</h2>
                <p class="text-[#666] dark:text-gray-400">Determine the entry documents you need based on your citizenship.</p>
            </div>
            <div class="bg-white dark:bg-[#1e1e1e] rounded-xl border border-[#e6dfdb] dark:border-[#333] overflow-hidden">
                <div class="flex border-b border-[#e6dfdb] dark:border-[#333]">
                    <button class="flex-1 py-4 text-center border-b-[3px] border-primary text-[#181311] dark:text-white font-bold text-sm tracking-wide bg-gray-50 dark:bg-[#252525]">
                        VISA FREE
                    </button>
                    <button class="flex-1 py-4 text-center border-b-[3px] border-transparent text-[#896f61] hover:text-[#181311] dark:hover:text-white font-bold text-sm tracking-wide transition-colors">
                        E-VISA
                    </button>
                    <button class="flex-1 py-4 text-center border-b-[3px] border-transparent text-[#896f61] hover:text-[#181311] dark:hover:text-white font-bold text-sm tracking-wide transition-colors">
                        EMBASSY REQUIRED
                    </button>
                </div>
                <div class="p-6 md:p-8 flex flex-col gap-4">
                    <div class="flex items-start gap-4">
                        <div class="mt-1">
                            <span class="material-symbols-outlined text-green-600 text-3xl">check_circle</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <h4 class="text-lg font-bold text-[#181311] dark:text-white">Up to 90 Days Stay</h4>
                            <p class="text-[#666] dark:text-gray-400 leading-relaxed text-sm md:text-base">
                                Citizens of the US, Canada, EU, UK, Australia, and New Zealand do not require a visa for stays up to 90 days. You must have a passport valid for at least 6 months beyond your date of entry.
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 flex gap-4">
                        <a class="text-primary font-bold text-sm hover:underline flex items-center gap-1" href="#">
                            Check Eligibility 
                            <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="flex flex-col gap-6 scroll-mt-28" id="best-time">
            <div class="flex flex-col gap-2">
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Best Time to <span class="text-primary">Visit</span></h2>
                <p class="text-[#666] dark:text-gray-400">Weather patterns and seasonal highlights.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div
                    class="group relative flex flex-col gap-3 rounded-xl overflow-hidden bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-44 bg-gray-200 w-full overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Blooming cherry blossoms in spring park"
                            src="/wp-content/uploads/2026/01/weather-effects-composition-scaled.webp" />
                    </div>
                    <div class="px-4 pb-4 flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-[#181311] dark:text-white">Wet Season</h4>
                            <span class="text-xs font-bold bg-blue-100 text-blue-700 px-2 py-1 rounded-full">Cool</span>
                        </div>
                        <p class="text-xs text-[#896f61] font-medium">Jun - Nov</p>
                        <p class="text-sm text-[#666] dark:text-gray-400 mt-1">Expect occasional rain and greener
                            landscapes during these months. While showers are more frequent, there are still plenty of
                            sunny days. This season is ideal for travelers who prefer fewer crowds, cooler evenings, and
                            a more relaxed island atmosphere.</p>
                        <div class="mt-2 flex items-center gap-1 text-xs text-[#181311] dark:text-white font-semibold">
                            <span class="material-symbols-outlined text-[16px]">thermostat</span>
                            <span>25°C - 32°C</span>
                        </div>
                    </div>
                </div>
                <div
                    class="group relative flex flex-col gap-3 rounded-xl overflow-hidden bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-44 bg-gray-200 w-full overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Sunny beach with clear blue water"
                            src="/wp-content/uploads/2026/01/beach-view-summer-scaled.webp" />
                    </div>
                    <div class="px-4 pb-4 flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-[#181311] dark:text-white">Dry Season</h4>
                            <span
                                class="text-xs font-bold bg-orange-100 text-orange-700 px-2 py-1 rounded-full">Hot</span>
                        </div>
                        <p class="text-xs text-[#896f61] font-medium">Dec - May</p>
                        <p class="text-sm text-[#666] dark:text-gray-400 mt-1">This is the best time for beach
                            activities, island hopping, and outdoor tours. Days are sunnier with minimal rainfall,
                            making it perfect for swimming, snorkeling, and sightseeing. Peak months are March to May,
                            when the weather is hottest and most vibrant.</p>
                        <div class="mt-2 flex items-center gap-1 text-xs text-[#181311] dark:text-white font-semibold">
                            <span class="material-symbols-outlined text-[16px]">thermostat</span>
                            <span>30°C - 38°C</span>
                        </div>
                    </div>
                </div>
                <!-- Autumn 
                <div class="group relative flex flex-col gap-3 rounded-xl overflow-hidden bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-32 bg-gray-200 w-full overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Forest path covered in orange autumn leaves" src="/wp-content/uploads/2026/02/no-image.webp"/>
                    </div>
                    <div class="px-4 pb-4 flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-[#181311] dark:text-white">Autumn</h4>
                        </div>
                        <p class="text-xs text-[#896f61] font-medium">Sep - Nov</p>
                        <p class="text-sm text-[#666] dark:text-gray-400 mt-1">Crisp air, harvest festivals, fewer crowds.</p>
                        <div class="mt-2 flex items-center gap-1 text-xs text-[#181311] dark:text-white font-semibold">
                            <span class="material-symbols-outlined text-[16px]">thermostat</span>
                            <span>12°C - 20°C</span>
                        </div>
                    </div>
                </div>
                Winter 
                <div class="group relative flex flex-col gap-3 rounded-xl overflow-hidden bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-32 bg-gray-200 w-full overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Snowy mountain landscape" src="/wp-content/uploads/2026/02/no-image.webp"/>
                    </div>
                    <div class="px-4 pb-4 flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-[#181311] dark:text-white">Winter</h4>
                            <span class="text-xs font-bold bg-blue-100 text-blue-700 px-2 py-1 rounded-full">Cool</span>
                        </div>
                        <p class="text-xs text-[#896f61] font-medium">Dec - Feb</p>
                        <p class="text-sm text-[#666] dark:text-gray-400 mt-1">Ski season in the north, mild in the south.</p>
                        <div class="mt-2 flex items-center gap-1 text-xs text-[#181311] dark:text-white font-semibold">
                            <span class="material-symbols-outlined text-[16px]">thermostat</span>
                            <span>-2°C - 8°C</span>
                        </div>
                    </div>
                </div>-->
            </div>
        </section>
        <section class="flex flex-col gap-6 scroll-mt-28" id="transport">
            <div class="flex flex-col gap-2">
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Local <span class="text-primary">Transportation</span></h2>
                <p class="text-[#666] dark:text-gray-400">Once you're on the island, these are the best ways to get around.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Private Jeepney -->
                <div class="group flex gap-5 p-6 rounded-2xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md hover:border-primary/20 transition-all duration-300">
                    <div class="shrink-0 size-14 rounded-2xl bg-primary/5 dark:bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">directions_bus</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-bold text-[#181311] dark:text-white text-lg">Private Jeepney</h4>
                        <p class="text-sm text-[#666] dark:text-gray-400 leading-relaxed">Perfect for groups. Tourists usually rent a private jeepney with a local driver for convenient, door-to-door transport around Camotes Island.</p>
                        <div class="flex items-center gap-2 mt-auto pt-2">
                            <span class="text-[10px] font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 px-2 py-0.5 rounded-full uppercase tracking-wider">Recommended for Groups</span>
                        </div>
                    </div>
                </div>

                <!-- Local Tricycle -->
                <div class="group flex gap-5 p-6 rounded-2xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md hover:border-primary/20 transition-all duration-300">
                    <div class="shrink-0 size-14 rounded-2xl bg-primary/5 dark:bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">electric_rickshaw</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-bold text-[#181311] dark:text-white text-lg">Local Tricycle</h4>
                        <p class="text-sm text-[#666] dark:text-gray-400 leading-relaxed">The classic way to travel. Ideal for short trips around town. Hire one with a local driver for quick transport to nearby spots.</p>
                        <div class="flex items-center gap-2 mt-auto pt-2">
                            <span class="text-[10px] font-bold bg-[#f4f2f0] dark:bg-[#333] text-[#666] dark:text-gray-400 px-2 py-0.5 rounded-full uppercase tracking-wider">Short Distances</span>
                        </div>
                    </div>
                </div>

                <!-- Motorcycle Rental -->
                <div class="group flex gap-5 p-6 rounded-2xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md hover:border-primary/20 transition-all duration-300">
                    <div class="shrink-0 size-14 rounded-2xl bg-primary/5 dark:bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">sports_motorsports</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-bold text-[#181311] dark:text-white text-lg">Motorcycle Rental</h4>
                        <p class="text-sm text-[#666] dark:text-gray-400 leading-relaxed">For total freedom. Renting a motorcycle is the best way to explore Camotes at your own pace. Ideal for solo travelers or couples.</p>
                        <div class="flex items-center gap-2 mt-auto pt-2">
                            <span class="text-[10px] font-bold bg-primary/10 text-primary px-2 py-0.5 rounded-full uppercase tracking-wider">Best for Solo/Couples</span>
                        </div>
                    </div>
                </div>

                <!-- Local Motorcycle (Habal-habal) -->
                <div class="group flex gap-5 p-6 rounded-2xl bg-white dark:bg-[#1e1e1e] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-md hover:border-primary/20 transition-all duration-300">
                    <div class="shrink-0 size-14 rounded-2xl bg-primary/5 dark:bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">motorcycle</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-bold text-[#181311] dark:text-white text-lg">Habal-habal</h4>
                        <p class="text-sm text-[#666] dark:text-gray-400 leading-relaxed">Local motorcycle taxis with a driver. Quick and affordable for solo travelers who want easy transport without renting.</p>
                        <div class="flex items-center gap-2 mt-auto pt-2">
                            <span class="text-[10px] font-bold bg-[#f4f2f0] dark:bg-[#333] text-[#666] dark:text-gray-400 px-2 py-0.5 rounded-full uppercase tracking-wider">Quick & Affordable</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-6 scroll-mt-28" id="ferry-schedules">
            <div class="flex flex-col gap-2">
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Ferry <span class="text-primary">Schedules</span></h2>
                <p class="text-[#666] dark:text-gray-400">Regular boat services to and from Camotes Island.</p>
            </div>
            <div class="grid grid-cols-1 gap-6">
                <!-- Danao to Consuelo -->
                <div class="bg-white dark:bg-[#1e1e1e] rounded-xl border border-[#e6dfdb] dark:border-[#333] overflow-hidden shadow-sm">
                    <div class="bg-primary/5 dark:bg-primary/10 px-6 py-4 border-b border-[#e6dfdb] dark:border-[#333] flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">directions_boat</span>
                            <h4 class="font-bold text-[#181311] dark:text-white">Danao City to Consuelo Port</h4>
                        </div>
                        <span class="text-xs font-bold text-primary uppercase">Jomalia Shipping</span>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 text-sm">
                            <div>
                                <h5 class="font-bold text-[#181311] dark:text-white mb-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">departure_board</span> Regular Schedule
                                </h5>
                                <ul class="space-y-2 text-[#666] dark:text-gray-400">
                                    <li class="flex justify-between"><span>Danao → Consuelo:</span> <span class="font-medium text-[#181311] dark:text-white">5:30 AM, 8:30 AM, 2:30 PM, 5:30 PM</span></li>
                                    <li class="flex justify-between"><span>Consuelo → Danao:</span> <span class="font-medium text-[#181311] dark:text-white">5:30 AM, 8:30 AM, 1:30 PM, 5:30 PM</span></li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="font-bold text-[#181311] dark:text-white mb-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">info</span> Essential Info
                                </h5>
                                <p class="text-[#666] dark:text-gray-400 leading-relaxed">
                                    Travel time is approximately <span class="font-bold">2 hours</span>. Jomalia also offers RORO services if you're bringing a vehicle. We recommend arriving 1 hour before departure.
                                </p>
                            </div>
                        </div>
                        <div class="mt-8 flex flex-wrap gap-3">
                            <a href="https://www.facebook.com/JomaliaShippingCorp" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 px-4 py-2 bg-[#1877F2] hover:bg-[#166fe5] text-white rounded-full text-xs font-bold transition-colors">
                                Facebook Page
                            </a>
                            <a href="https://www.jomaliashipping.com/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-full text-xs font-bold transition-colors">
                                <span class="material-symbols-outlined text-[18px]">language</span>
                                Book Tickets
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pier 1 to Poro -->
                <div class="bg-white dark:bg-[#1e1e1e] rounded-xl border border-[#e6dfdb] dark:border-[#333] overflow-hidden shadow-sm opacity-75">
                    <div class="bg-gray-50 dark:bg-white/5 px-6 py-4 border-b border-[#e6dfdb] dark:border-[#333] flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-gray-400">directions_boat</span>
                            <h4 class="font-bold text-[#181311] dark:text-white">Cebu Pier 1 to Poro Port</h4>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold text-gray-500 uppercase">OceanJet</span>
                            <span class="text-[10px] font-bold bg-red-100 text-red-700 px-2 py-0.5 rounded-full uppercase tracking-wider">Currently Unavailable</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 text-sm">
                            <div>
                                <h5 class="font-bold text-gray-400 mb-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">departure_board</span> Regular Schedule
                                </h5>
                                <div class="p-4 bg-gray-50 dark:bg-white/5 rounded-lg border border-dashed border-gray-200 dark:border-white/10 text-center">
                                    <p class="text-[#666] dark:text-gray-400 font-medium italic">Service is currently suspended or unavailable.</p>
                                </div>
                            </div>
                            <div>
                                <h5 class="font-bold text-[#181311] dark:text-white mb-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">info</span> Essential Info
                                </h5>
                                <p class="text-[#666] dark:text-gray-400 leading-relaxed">
                                    The OceanJet fast craft service between Cebu Pier 1 and Poro is currently not operational. We recommend using the Danao to Consuelo route via Jomalia Shipping as an alternative.
                                </p>
                            </div>
                        </div>
                        <div class="mt-8 flex flex-wrap gap-3">
                            <div class="flex items-center gap-2 px-4 py-2 bg-gray-200 dark:bg-white/10 text-gray-400 dark:text-gray-500 rounded-full text-xs font-bold cursor-not-allowed">
                                Facebook Page
                            </div>
                            <div class="flex items-center gap-2 px-4 py-2 bg-gray-200 dark:bg-white/10 text-gray-400 dark:text-gray-500 rounded-full text-xs font-bold cursor-not-allowed">
                                <span class="material-symbols-outlined text-[18px]">language</span>
                                Book Tickets
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tips -->
                <div class="p-4 bg-orange-50 dark:bg-orange-950/20 border border-orange-100 dark:border-orange-900/30 rounded-xl flex items-start gap-3">
                    <span class="material-symbols-outlined text-orange-600">warning</span>
                    <p class="text-sm text-orange-800 dark:text-orange-200 leading-relaxed">
                        Schedules are subject to change without prior notice depending on sea conditions and vessel availability. Always check the official Facebook pages of Jomalia Shipping and OceanJet for the latest updates before your trip.
                    </p>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-6 scroll-mt-28" id="safety">
            <div class="flex flex-col gap-2">
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Safety & <span class="text-primary">Health</span></h2>
                <p class="text-[#666] dark:text-gray-400">Stay safe and healthy during your visit.</p>
            </div>
            <div class="bg-primary/5 dark:bg-primary/10 rounded-xl p-6 border border-primary/10 flex flex-col gap-4">
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary mt-1">vaccines</span>
                    <div>
                        <h4 class="font-bold text-[#181311] dark:text-white">Vaccinations</h4>
                        <p class="text-sm text-[#666] dark:text-gray-300 mt-1">Routine vaccinations are recommended.
                            Hepatitis A and Typhoid shots are advised, especially for travelers visiting rural areas or
                            staying for extended periods.</p>
                    </div>
                </div>
                <div class="w-full h-px bg-primary/10"></div>
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary mt-1">local_police</span>
                    <div>
                        <h4 class="font-bold text-[#181311] dark:text-white">General Safety</h4>
                        <p class="text-sm text-[#666] dark:text-gray-300 mt-1">Camotes Island is generally safe for
                            tourists, and violent crime is rare. As with any destination, exercise basic precautions,
                            particularly in crowded areas and tourist spots.</p>
                    </div>
                </div>
                <div class="w-full h-px bg-primary/10"></div>
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary mt-1">water_drop</span>
                    <div>
                        <h4 class="font-bold text-[#181311] dark:text-white">Water Quality</h4>
                        <p class="text-sm text-[#666] dark:text-gray-300 mt-1">Tap water is usually safe, but many
                            visitors prefer bottled or filtered water for drinking, especially if you have a sensitive
                            stomach.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-6 mb-20 scroll-mt-28" id="faq">
            <div class="flex flex-col gap-2">
                <h2 class="text-4xl md:text-5xl font-black text-[#181311] dark:text-white mb-4">Frequently Asked <span class="text-primary">Questions</span></h2>
                <p class="text-[#666] dark:text-gray-400">Common questions from travelers.</p>
            </div>
            <div class="flex flex-col gap-3">
                <details
                    class="group bg-white dark:bg-[#1e1e1e] rounded-xl border border-gray-200 dark:border-[#333] shadow-sm open:border-primary open:ring-1 open:ring-primary/20">
                    <summary
                        class="flex justify-between items-center p-5 cursor-pointer list-none text-[#181311] dark:text-white font-bold select-none">
                        Do I need to tip in restaurants?
                        <span
                            class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
                    </summary>
                    <div
                        class="px-5 pb-5 text-sm text-[#666] dark:text-gray-300 leading-relaxed border-t border-transparent group-open:border-gray-100 dark:group-open:border-[#333] pt-3">
                        Tipping is not required in most restaurants on Camotes Island, as service charges are usually
                        not included in the bill. However, leaving a small tip is appreciated, especially if you receive
                        good service. Many visitors round up the bill or leave around 5–10% as a courtesy, but it is
                        always optional.
                    </div>
                </details>
                <details
                    class="group bg-white dark:bg-[#1e1e1e] rounded-xl border border-gray-200 dark:border-[#333] shadow-sm open:border-primary open:ring-1 open:ring-primary/20">
                    <summary
                        class="flex justify-between items-center p-5 cursor-pointer list-none text-[#181311] dark:text-white font-bold select-none">
                        Is English widely spoken?
                        <span
                            class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
                    </summary>
                    <div
                        class="px-5 pb-5 text-sm text-[#666] dark:text-gray-300 leading-relaxed border-t border-transparent group-open:border-gray-100 dark:group-open:border-[#333] pt-3">
                        Yes. English is widely understood on Camotes Island, especially in hotels, resorts, tour
                        services, and restaurants. Most locals also speak Cebuano, but visitors generally have no
                        trouble communicating in English for travel needs and everyday interactions.
                    </div>
                </details>
                <details
                    class="group bg-white dark:bg-[#1e1e1e] rounded-xl border border-gray-200 dark:border-[#333] shadow-sm open:border-primary open:ring-1 open:ring-primary/20">
                    <summary
                        class="flex justify-between items-center p-5 cursor-pointer list-none text-[#181311] dark:text-white font-bold select-none">
                        How good is the internet connectivity?
                        <span
                            class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
                    </summary>
                    <div
                        class="px-5 pb-5 text-sm text-[#666] dark:text-gray-300 leading-relaxed border-t border-transparent group-open:border-gray-100 dark:group-open:border-[#333] pt-3">
                        Internet connectivity on Camotes Island is generally reliable in major towns, resorts, and
                        hotels, where Wi-Fi is commonly available. Mobile data works well in most populated areas,
                        though speeds may be slower in remote beaches or rural locations. For basic browsing, messaging,
                        and remote work, connectivity is usually sufficient, but it is best to download important files
                        in advance.
                    </div>
                </details>
                <details
                    class="group bg-white dark:bg-[#1e1e1e] rounded-xl border border-gray-200 dark:border-[#333] shadow-sm open:border-primary open:ring-1 open:ring-primary/20">
                    <summary
                        class="flex justify-between items-center p-5 cursor-pointer list-none text-[#181311] dark:text-white font-bold select-none">
                        Are there ATMs on the island?
                        <span
                            class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
                    </summary>
                    <div
                        class="px-5 pb-5 text-sm text-[#666] dark:text-gray-300 leading-relaxed border-t border-transparent group-open:border-gray-100 dark:group-open:border-[#333] pt-3">
                        Yes. Camotes Island has several ATMs located in main towns such as San Francisco and Poro.
                        However, cash may run low during peak travel periods or holidays, so it is recommended to bring
                        extra cash when possible. Credit card acceptance can be limited at smaller businesses, so having
                        cash on hand is advisable.
                    </div>
                </details>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
