<?php
/**
 * Template Name: Home Page
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col gap-24">
    <section id="why-visit" class="flex flex-col md:flex-row gap-12 items-start justify-between">
        <div class="md:w-[30%] flex flex-col gap-6 sticky top-24 scroll-fade-element transition-opacity duration-300">
            <h2 class="text-text-main dark:text-white text-4xl font-bold leading-tight">
                Why Visit?
            </h2>
            <p class="text-text-sub dark:text-gray-400 text-lg leading-relaxed">
                Camotes Island is one of the few destinations in the Philippines where travelers can still experience truly unspoiled beaches. Unlike highly commercialized tourist hubs, its shores remain quiet, clean, and refreshingly natural. This makes Camotes ideal for couples seeking privacy, families wanting safe and relaxed beach time, and solo travelers looking for peace and reflection. Every sunrise and sunset feels personal, not shared with hundreds of strangers.
            </p>
            <a class="text-primary font-bold flex items-center gap-1 hover:gap-2 transition-all" href="/about-us/">
                Read our story <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
        <div class="md:w-[65%] grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="group relative overflow-hidden rounded-2xl aspect-[4/5]">
                <img alt="Colorful traditional festival dancer" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Colorful traditional festival dancer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhSIMTPm5lQTUFQN0M7zQFKFJj2WWldmD_VXcnl2tx-twe4ilc7iXkWAI-YdJWRL23yJ78qA9B8pjKGNNc_adO04dRHoI1dQyAvvPQIxuRiD7L8dQfSJin-Fyrgp88i80qwY6FdD_G-Ea6odNQn6DyPaA1hSY74MnFUa4H2MEu8T99857dNFx4VhLAALIbXVpqVq0pf6mcirOMNi83_dGBNoqQ_tR1LQuQ1OJ2Lwl5vmKpSOEYqDlTNycZRiyXgXsWgz6WTyUpIUd5"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <div class="flex items-center gap-2 text-primary mb-1">
                        <span class="material-symbols-outlined">diversity_3</span>
                        <span class="text-xs font-bold uppercase tracking-wider">Culture</span>
                    </div>
                    <h3 class="text-white text-xl font-bold">Rich Heritage</h3>
                    <p class="text-white/80 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Ancient traditions meet modern vibrancy.</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl aspect-[4/5] sm:mt-12">
                <img alt="Misty green mountains and forest" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Misty green mountains and forest" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9En4Uazk12YW5EjgaqUaQXbRtsGF_EoCJH1klOFF8F2xIWjyAKFPTKXc_Aj_OWFaurL4Cn_QTRfhjLhm16rHS98Q7-k5CTpHObwD1hl1Ha01wng_wKSdqaUwFKau4dfJ6gbrOLlhxy0kIiMRtQiVqQWBpN_IJHrBOvAy7mI8_si6g_D8P22CPGXI8nZ4imC-4i6dlVSraSO2LGQbRm8-X9Y7vCbaUTnuvsmYPJGe3YsfHCvMaUfCc1t9-5D6QbGX2ofsWAsI8KW9_"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <div class="flex items-center gap-2 text-primary mb-1">
                        <span class="material-symbols-outlined">landscape</span>
                        <span class="text-xs font-bold uppercase tracking-wider">Nature</span>
                    </div>
                    <h3 class="text-white text-xl font-bold">Pristine Landscapes</h3>
                    <p class="text-white/80 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Explore unspoiled beaches and caves.</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl aspect-[4/5]">
                <img alt="Two locals smiling warmly" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Two locals smiling warmly" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAisw1u4sOW1Fksi9k6p3KQWKoOieK0xPrtpRlydjLa9D4ACEo6Z_SkBFVB5wvCInUeu0hJ7ygzs-DZx1jJcmluoaH-f4Lyn6R8KOfhowmD6yrmG4OwkhqpXDGJf24gWe4kj3w6a4iyNsveMj9Zu5_-MvZcE6J52ciqVMf5Wgmbx27WWHwXcGGU1xGs4IGnaVdt9DSGxo3bDXjWrbIibwpRFTJbVDRa_BPWqHalREaxvCUJJHxXqCyMPZ9bZcubjPlrtvNplclOeXoL"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <div class="flex items-center gap-2 text-primary mb-1">
                        <span class="material-symbols-outlined">sentiment_satisfied</span>
                        <span class="text-xs font-bold uppercase tracking-wider">People</span>
                    </div>
                    <h3 class="text-white text-xl font-bold">Warm Hospitality</h3>
                    <p class="text-white/80 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Meet the friendliest people on earth.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Ad Placeholder: Home Middle -->
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center py-6 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
            <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
            <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                <span class="material-symbols-outlined text-3xl">ads_click</span>
                <span class="text-sm font-medium">Google Ad Container</span>
                <span class="text-xs opacity-75">(Responsive Leaderboard)</span>
            </div>
            <!-- Actual Ad Code would replace the content above -->
        </div>
    </div>
    
    <section class="flex flex-col gap-8">
        <div class="flex items-end justify-between">
            <h2 class="text-text-main dark:text-white text-3xl font-bold">Featured Destinations</h2>
            <div class="flex gap-2">
                <button id="dest-prev" class="p-2 rounded-full border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button id="dest-next" class="p-2 rounded-full border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
        <div id="dest-slider" class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory scrollbar-hide -mx-4 px-4 sm:mx-0 sm:px-0">
            <div class="min-w-[280px] md:min-w-[340px] snap-center group cursor-pointer">
                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden mb-4">
                    <img alt="Tropical beach with turquoise water" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Tropical beach with turquoise water" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0L-BxF2i9TGO4d_eW_LgTQ1lwDGKrGiBGytg2C2uNGP-HJ8t2hcDcT12DCf3Ji3zKrUWV_q8IoZSPLYeJPeFjA--2NGnYiDOvabFFGUEzuHHKJ87xRFpo7k-MbOeONHMBvfqvt67cxXOYKCw2BEr1Bep4gcfnh5tSxbUWQzXlH7yXbTMKZpxHXArit2rVleM-fbxC8u1mb4qjKiAP_yH5hqxSo4KwS3sBgow6N0TPWPpcJUwV9Pm4t9ixF0Ld772v6FPDSmEnVHS7"/>
                    <div class="absolute top-4 right-4 bg-white/90 dark:bg-black/60 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-text-main dark:text-white flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px] text-primary">sunny</span> 
                            Beach
                    </div>
                </div>
                <h3 class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">The Golden Coast</h3>
                <p class="text-text-sub dark:text-gray-400 text-sm mt-1">Sun, sand, and endless surf.</p>
            </div>
            <div class="min-w-[280px] md:min-w-[340px] snap-center group cursor-pointer">
                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden mb-4">
                    <img alt="Ancient temple in the mist" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Ancient temple in the mist" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6lJdBq4SYkeaxyeMWUjxQV4MszLzPftl3ln5gDPcVBlKBjJ6xNBLr51a67mhbhtHP8pmviRO2S2EW9jw0xTChOoK0RKiG4CikeXG4vPZgcldOHJlS1oA_ra7myZDmbHveDqBNeprubJK8UjQq94pJJBRRfJrOPhLLp7nADrk9W3BOTq1wdCy4bZFsRAuLKzktBfPtFKEDsL-AM-IXNjB8OGuIzqcEUEfAD0srURZ_5ZeL2nSicH3vqgFo1U3b3IQoWLhv4Vh2YqCe"/>
                        <div class="absolute top-4 right-4 bg-white/90 dark:bg-black/60 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-text-main dark:text-white flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px] text-primary">temple_buddhist</span> 
                                Heritage
                        </div>
                </div>
                <h3 class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">Historic Highlands</h3>
                <p class="text-text-sub dark:text-gray-400 text-sm mt-1">Ancient temples and tea plantations.</p>
            </div>
            <div class="min-w-[280px] md:min-w-[340px] snap-center group cursor-pointer">
                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden mb-4">
                    <img alt="Busy city street at night" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Busy city street at night" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBfOERP-adlYFaL6GyNFK4HRYjgm207l1GycUC5XvNxzjaGPLaoZXxlCEVgAKMK5tBSQxHhBWG_cj56lp6dqnV1DkVyEjI-TiCmCqkLf4fHt5Ertv-KUwBnupfCFuFy-gg_s9xbKz-vPas0vPFREOBQdWFNaTUyZ4R4DZjFnwFvg7RZNr303ObC89z5uZYf9Y9rzbihMyL0xrQGwrWtzaoJmgxjQyFol4RssQkjjh1qYYFHIo50EsxMP2mIWO5g9LyHgzBGhkS3Djm"/>
                    <div class="absolute top-4 right-4 bg-white/90 dark:bg-black/60 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-text-main dark:text-white flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px] text-primary">location_city</span> 
                            City
                    </div>
                </div>
                <h3 class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">Urban Heartbeat</h3>
                <p class="text-text-sub dark:text-gray-400 text-sm mt-1">City lights and vibrant street food.</p>
            </div>
            <div class="min-w-[280px] md:min-w-[340px] snap-center group cursor-pointer">
                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden mb-4">
                    <img alt="Calm lake surrounded by trees" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Calm lake surrounded by trees" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCcwSZAr7fApQoKBsPZq76FTcgOg6AEKEs0zO6qoipH9qmqJczxYP4IBBpQ80zw5XRm2R9X9c85K8g1ohCV_4fTWOoS26c2XtykZpPbDdLMhgJPNto7p7fNzDHhIlHfBwFZtYqnn0vnhFy4BMr_aUmBmVcWOc8uhLpAyv7ZJfaOWNuwO1h9HqhF3Rb-Lxww3-wJ91B79Lh9_Hl6Onup6Smw_i0fy_-zdqF8D-J6XnQRsbfcbniAaZcMdFeU0OyTjg8pfx3OZhXZkS6A"/>
                    <div class="absolute top-4 right-4 bg-white/90 dark:bg-black/60 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-text-main dark:text-white flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px] text-primary">water_drop</span> 
                            Nature
                    </div>
                </div>
                <h3 class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">Serene Lake District</h3>
                <p class="text-text-sub dark:text-gray-400 text-sm mt-1">Peaceful waters and lush forests.</p>
            </div>
        </div>
    </section>

    <!-- Ad Placeholder: Home Middle -->
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center py-6 bg-gray-50 dark:bg-white/5 border border-dashed border-gray-200 dark:border-white/10 rounded-xl relative overflow-hidden group">
            <span class="absolute top-2 right-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Advertisement</span>
            <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                <span class="material-symbols-outlined text-3xl">ads_click</span>
                <span class="text-sm font-medium">Google Ad Container</span>
                <span class="text-xs opacity-75">(Responsive Leaderboard)</span>
            </div>
            <!-- Actual Ad Code would replace the content above -->
        </div>
    </div>

    <section class="bg-white dark:bg-[#2a1d17] rounded-3xl p-8 md:p-12 shadow-sm">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl font-bold text-text-main dark:text-white mb-4">Unforgettable Experiences</h2>
            <p class="text-text-sub dark:text-gray-400">Whatever your travel style, we have something to ignite your passion.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col gap-4">
                <div class="relative h-48 rounded-xl overflow-hidden group">
                    <img alt="Hiker on a mountain ridge" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Hiker on a mountain ridge" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCSfOYHJKx_udwJ48rwFciOnNpXojs2-bK9KjMpRuFRUO4KWY3CAUAJabSALpMFTQbfEOMP3ICBvz5Eb2ACksHS5q-5-oaxG6EgERQlvofGbCBiT_HO-Kx-0NLap8pIkopMQYiD1B6jBSh4Yo04bR6gDHfwX-K_YiJLoSGeoOIjPEhZf6uE2Yt_SIdCfkdDJNYZQXGUm9sWF_MCV1fBPz9ojYBFvn-aTLn6pEZUkcHQd8_CnPpcZnkHTfzqX4izqFoewHx1RVqOVLPQ"/>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-primary">hiking</span>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Adventure</h3>
                    </div>
                    <p class="text-sm text-text-sub dark:text-gray-400">Trek through dense jungles and scale volcanic peaks for the ultimate thrill.</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="relative h-48 rounded-xl overflow-hidden group">
                    <img alt="Colorful spread of local food" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Colorful spread of local food" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCAMi0Lz1hq6oGtRF3cOeUieCQeoAY6slbjwEEYHr3OTdKFY0i59vJW1eMBkiwzmYNGIzNVlIAJ-7Xu53J6Et9V9snvV-45I4ghE7CC3rOp_dE4Z2g5cMIKLQzz-FLvW6yiyolAwbW7rMgKLJSFJWDo5xlQV8_KNPQZHExKhzJFV7h1xvHkSbxBcAkXb9NzonKcI1I6BSuw740lHJA_Z7fyBdQyGn7Z22JJ6CiqDx8kMswt4IRRAmn7qNioe7l00yDjVSDD0v0O5316"/>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-primary">restaurant_menu</span>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Culinary</h3>
                    </div>
                    <p class="text-sm text-text-sub dark:text-gray-400">Taste the explosion of spices and flavors in our world-renowned street food.</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="relative h-48 rounded-xl overflow-hidden group">
                    <img alt="Woman meditating in nature" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Woman meditating in nature" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBTy2eK7pKWsUD9j9QbbGHGaaCSBQsNwDZyIBy6Qa73P0LrNtS6KEUJjej2A1iqYMJwBeSYiNqMgveMaP0Hmse7jbtFpxay8Prm3az68Krz5p8emGHjCVeAa3wlIMn0zdea2n7Dx0JnNEyL6q02jTh4ojfN0sid_qJRA3TpsH_PIe_FAXi-uLkjAXvXg26HgD55F7-IMfITWMEMbRh8Jbr6ntHiF7GLWoxYLvH9wI44CYJKBpSdUJleO5d4J7X2IsSEmjcvCmu7ZxO2"/>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-primary">spa</span>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Wellness</h3>
                    </div>
                    <p class="text-sm text-text-sub dark:text-gray-400">Rejuvenate your mind and body with ancient healing practices and yoga.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-text-main dark:text-white">Curated Itineraries</h2>
                <p class="text-text-sub dark:text-gray-400 mt-2">Expertly planned trips to make the most of your visit.</p>
            </div>
        </div>
        
        <!-- Coming Soon Placeholder -->
        <div class="bg-gray-50/50 dark:bg-white/[0.02] border-2 border-dashed border-gray-100 dark:border-white/5 rounded-3xl p-12 text-center">
            <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <span class="material-symbols-outlined text-primary text-3xl">auto_awesome</span>
            </div>
            <h3 class="text-2xl font-bold text-text-main dark:text-white mb-3">Section Coming Soon</h3>
            <p class="text-text-sub dark:text-gray-400 max-w-md mx-auto">
                We're currently hand-crafting the ultimate itineraries to help you explore every corner of Camotes. Check back soon for expert-led tours and hidden gem discoveries.
            </p>
        </div>

        <?php if (false): // Temporarily hidden ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-[#1f1612] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-[#3a2e28]">
                <div class="h-48 relative">
                    <img alt="Van parked on a scenic road" class="w-full h-full object-cover" data-alt="Van parked on a scenic road" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7eIk5DoPZeqrunxgLRbELSMNGNqRIlAacmA5HICOIm26oqTCiovNc0GJlekwNCQYTU6pldcU0H2glQ-Qfeu0-kJ8zdx_Kk1Fud08HK8ExZAKJkn2TOk2A-j_Dniyc2lcMsWQ7O1F7gJP0-vBaM0Vfqc47SqtoB_XWM2m7Z4e_nOxxKcUrBjkW3nNpx2PBf6eC0yVRPkroqjv3cjdAPj0ysG-E8jpDKctoC_Fcog9_vNKIVFGj29uWBDAkaukFwSta6Pbnyzn9iQKF"/>
                    <div class="absolute bottom-3 left-3 bg-white/90 text-text-main text-xs font-bold px-2 py-1 rounded flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> 10 Days
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-text-main dark:text-white mb-2">The Ultimate Road Trip</h3>
                    <p class="text-sm text-text-sub dark:text-gray-400 mb-4 line-clamp-2">Drive along the coastline, up through the highlands, and back down to the rainforests.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100 dark:border-[#3a2e28]">
                        <span class="text-sm font-medium text-text-main dark:text-gray-300">From <span class="font-bold text-primary">$1,200</span></span>
                        <button class="text-sm font-bold text-primary hover:text-orange-600">View Details</button>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-[#1f1612] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-[#3a2e28]">
                <div class="h-48 relative">
                    <img alt="Ancient ruins in a forest" class="w-full h-full object-cover" data-alt="Ancient ruins in a forest" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCG551usVEEnbLYU-BKwMGap4ARgZk9_LaWb78x0uDxg9-987TSoimQgruB17Ho2wXJpdgVflC9PV4dh2plei0jD0fi2-9_8Oo2GxYzTvTT9uNXKsR8WfenMw08Go3nnBXTR3fB-Aq7H1wMviih-TXc9L4Qdw8GL9ZEf5s1SCc1FIvtPEt8tRqZc3FjzhpjXk-YlzuzY51_pmoXhlTwq40AwPMyYAbat4ZO5OGZ3hGHhWiM-2qZ_BBClWsCYaIPFZYp0cFGkIZo-GEH"/>
                    <div class="absolute bottom-3 left-3 bg-white/90 text-text-main text-xs font-bold px-2 py-1 rounded flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> 5 Days
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-text-main dark:text-white mb-2">Cultural Immersion</h3>
                    <p class="text-sm text-text-sub dark:text-gray-400 mb-4 line-clamp-2">Stay with local families, learn traditional crafts, and visit sacred heritage sites.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100 dark:border-[#3a2e28]">
                        <span class="text-sm font-medium text-text-main dark:text-gray-300">From <span class="font-bold text-primary">$850</span></span>
                        <button class="text-sm font-bold text-primary hover:text-orange-600">View Details</button>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-[#1f1612] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-[#3a2e28]">
                <div class="h-48 relative">
                    <img alt="Scuba diver underwater" class="w-full h-full object-cover" data-alt="Scuba diver underwater" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrbrK7_hVfdlWsz6QMo_ZCUNCr0Phtmvw54FI0dRAZMKxDdcyQ9o8lFetPNkLR9ptLLHAT-2fG6YRfnC5NpYhZaw0J0rLI8LtgPj4bX6XxMJNfa_P5MPbk2viFZbE1HtArl3HAtxOVgf5842v2eTEBaOfwYZsBFMBf3aZG3kiBFj9b5PwbClY2MLCJtZsw8zcNwIrD2Q0_jUiSbjNRHpF1DUlsdju5CM_TNoe_1st8IASluGaqdQryPOWqQ9C2nofz8mSW8o8TBl4_"/>
                    <div class="absolute bottom-3 left-3 bg-white/90 text-text-main text-xs font-bold px-2 py-1 rounded flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> 7 Days
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-text-main dark:text-white mb-2">Island Hopping</h3>
                    <p class="text-sm text-text-sub dark:text-gray-400 mb-4 line-clamp-2">Sail between pristine islands, snorkel in coral reefs, and sleep under the stars.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100 dark:border-[#3a2e28]">
                        <span class="text-sm font-medium text-text-main dark:text-gray-300">From <span class="font-bold text-primary">$1,500</span></span>
                        <button class="text-sm font-bold text-primary hover:text-orange-600">View Details</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>
    <section class="border-t border-gray-200 dark:border-gray-800 pt-16">
        <h2 class="text-2xl font-bold text-text-main dark:text-white mb-8">Travel Essentials</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">directions_boat</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Getting There</h3>
                        <p class="text-sm text-text-sub dark:text-gray-400 mt-1">Daily ferries run from Danao City and Mactan (Pier 1) to Consuelo or Poro Port. Check schedules in advance.</p>
                        <a class="text-sm font-medium text-primary mt-2 block hover:underline" href="/planning-tips/#ferry-schedules">Ferry schedules</a>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">wb_sunny</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Best Time</h3>
                        <p class="text-sm text-text-sub dark:text-gray-400 mt-1">Visit between December and May for the best weather. Perfect for beach trips, snorkeling, and cave exploring.</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">payments</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-text-main dark:text-white">Island Tips</h3>
                        <p class="text-sm text-text-sub dark:text-gray-400 mt-1">Cash is king—ATMs are limited on the island. Bring enough for your stay and enjoy the unplugged vibe.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
