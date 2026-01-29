<footer class="bg-[#181311] text-white pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-primary rounded-2xl p-8 md:p-16 text-center relative overflow-hidden mb-16">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-black/10 rounded-full blur-3xl -ml-20 -mb-20"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-6">Ready to start your adventure?</h2>
                <p class="text-white/90 text-lg mb-8 max-w-xl mx-auto">Sign up for our newsletter to get custom itineraries, hidden gems, and exclusive travel deals.</p>
                <div class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input class="flex-1 px-4 py-3 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-orange-300" placeholder="Enter your email" type="email"/>
                    <button class="bg-[#181311] hover:bg-black text-white font-bold px-6 py-3 rounded-lg transition-colors">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 border-b border-white/10 pb-12">
            <div>
                <h4 class="font-bold text-lg mb-4">Explore</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a class="hover:text-primary" href="#">Destinations</a></li>
                    <li><a class="hover:text-primary" href="#">Experiences</a></li>
                    <li><a class="hover:text-primary" href="#">Culture</a></li>
                    <li><a class="hover:text-primary" href="#">Food &amp; Drink</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Planning</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a class="hover:text-primary" href="/planning-tips/#transport">Getting Around</a></li>
                    <li><a class="hover:text-primary" href="#">Accommodations</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">About Us</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a class="hover:text-primary" href="#">Our Mission</a></li>
                    <li><a class="hover:text-primary" href="#">Sustainability</a></li>
                    <li><a class="hover:text-primary" href="#">Press Center</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Follow Us</h4>
                <div class="flex gap-4">
                    <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition-colors" href="#">
                    <span class="text-sm font-bold">IG</span>
                    </a>
                    <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition-colors" href="#">
                    <span class="text-sm font-bold">FB</span>
                    </a>
                    <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition-colors" href="#">
                    <span class="text-sm font-bold">YT</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="pt-8 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm gap-4">
            <p>© <?php echo esc_html( wp_date('Y') ); ?> <span class="text-primary"><?php bloginfo('name'); ?></span> Tourism Board. All rights reserved.</p>
            <div class="flex gap-6">
                <a class="hover:text-white" href="#">Privacy Policy</a>
                <a class="hover:text-white" href="#">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const mobileMenuButton = document.getElementById("mobile-menu-button");
  const closeMobileMenu = document.getElementById("close-mobile-menu");
  const mobileMenu = document.getElementById("mobile-menu");
  const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");
  const mobileMenuDrawer = document.getElementById("mobile-menu-drawer");
  const body = document.body;

  function toggleMenu(show) {
    if (!mobileMenu || !mobileMenuDrawer || !mobileMenuOverlay) return;

    if (show) {
      mobileMenu.classList.remove("pointer-events-none");
      mobileMenuDrawer.classList.remove("translate-x-full");
      mobileMenuOverlay.classList.remove("opacity-0");
      mobileMenuOverlay.classList.add("opacity-100");
      body.classList.add("overflow-hidden");
    } else {
      mobileMenu.classList.add("pointer-events-none");
      mobileMenuDrawer.classList.add("translate-x-full");
      mobileMenuOverlay.classList.add("opacity-0");
      mobileMenuOverlay.classList.remove("opacity-100");
      body.classList.remove("overflow-hidden");
    }
  }

  mobileMenuButton?.addEventListener("click", (e) => {
    e.preventDefault();
    toggleMenu(true);
  });
  closeMobileMenu?.addEventListener("click", (e) => {
    e.preventDefault();
    toggleMenu(false);
  });
  mobileMenuOverlay?.addEventListener("click", (e) => {
    e.preventDefault();
    toggleMenu(false);
  });
  
  window.addEventListener("resize", () => {
    if (window.innerWidth >= 768 && !mobileMenuDrawer?.classList.contains("translate-x-full")) {
      toggleMenu(false);
    }
  });

  // Scroll Fade Animation for "Why Visit" section
  const fadeElements = document.querySelectorAll(".scroll-fade-element");
  if (fadeElements.length > 0) {
    window.addEventListener("scroll", () => {
      fadeElements.forEach(el => {
        // Only apply on mobile screens
        if (window.innerWidth >= 768) {
          el.style.opacity = 1;
          return;
        }

        const parent = el.closest('section');
        if (!parent) return;
        
        const parentRect = parent.getBoundingClientRect();
        const sectionHeight = parentRect.height;
        const scrolledIn = -parentRect.top; // How much of the section has scrolled past the top
        
        let opacity = 1;
        
        // Start fading as soon as the section moves up (scrolledIn > 0)
        // It will reach 0 opacity when scrolled halfway through the section
        if (scrolledIn > 0) {
          const fadeDistance = sectionHeight * 0.2; 
          opacity = Math.max(0, 1 - (scrolledIn / fadeDistance));
        }

        el.style.opacity = opacity;
      });
    });
  }

  // Parallax Scroll Animation for "About" page values section
  const parallaxBgs = document.querySelectorAll(".parallax-bg");
  if (parallaxBgs.length > 0) {
    window.addEventListener("scroll", () => {
      parallaxBgs.forEach(bg => {
        const parent = bg.parentElement;
        if (!parent) return;
        
        const rect = parent.getBoundingClientRect();
        const viewportHeight = window.innerHeight;
        
        // Only animate if in viewport (with some buffer)
        if (rect.top < viewportHeight && rect.bottom > 0) {
          // Calculate progress: 0 when top is at bottom of viewport, 1 when bottom is at top
          const progress = 1 - (rect.bottom / (viewportHeight + rect.height));
          
          // Move the background image slightly (e.g., -10% to 10%)
          const movement = (progress - 0.5) * 20; // range from -10 to 10
          bg.style.transform = `translateY(${movement}%)`;
        }
      });
    }, { passive: true });
  }

  const slider = document.getElementById("dest-slider");
  const prevBtn = document.getElementById("dest-prev");
  const nextBtn = document.getElementById("dest-next");

  const scrollAmount = 360;

  nextBtn.addEventListener("click", () => {
    slider.scrollBy({
      left: scrollAmount,
      behavior: "smooth"
    });
  });

  prevBtn.addEventListener("click", () => {
    slider.scrollBy({
      left: -scrollAmount,
      behavior: "smooth"
    });
  });
});

</script>
<script>
  // Dynamic Table of Contents for Planning Page
  const guideNav = document.getElementById("guide-nav");
  if (guideNav) {
    const links = guideNav.querySelectorAll(".nav-link");
    const sections = Array.from(links).map(link => document.querySelector(link.getAttribute("href")));
    
    const ACTIVE_CLASSES = ["bg-primary/10", "text-primary", "hover:bg-primary/20"];
    const INACTIVE_CLASSES = ["text-[#555]", "dark:text-gray-300", "hover:bg-gray-100", "dark:hover:bg-[#333]"];

    function setActive(activeLink) {
      if (!activeLink) return;
      links.forEach(link => {
        link.classList.remove(...ACTIVE_CLASSES);
        link.classList.add(...INACTIVE_CLASSES);
      });
      activeLink.classList.add(...ACTIVE_CLASSES);
      activeLink.classList.remove(...INACTIVE_CLASSES);
    }

    // Intersection Observer to track scroll
    const observerOptions = {
      root: null,
      rootMargin: '-10% 0px -80% 0px', // Trigger when section is near top
      threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const id = entry.target.getAttribute("id");
          const activeLink = guideNav.querySelector(`[href="#${id}"]`);
          setActive(activeLink);
        }
      });
    }, observerOptions);

    sections.forEach(section => {
      if (section) observer.observe(section);
    });

    // Handle clicks explicitly
    links.forEach(link => {
      link.addEventListener("click", () => {
        setActive(link);
      });
    });

    // Initial load check (if hash exists)
    const initialHash = window.location.hash;
    if (initialHash) {
      const activeLink = guideNav.querySelector(`[href="${initialHash}"]`);
      if (activeLink) {
        setActive(activeLink);
      }
    } else {
      // Default to first item if no hash
      setActive(links[0]);
    }
  }
</script>

<script>
  // AI Search Assistant Logic
  document.addEventListener('DOMContentLoaded', function() {
    const aiAskBtn = document.getElementById('ai-ask-btn');
    const aiSearchInput = document.getElementById('ai-search-input');
    const aiResponseContainer = document.getElementById('ai-response-container');
    const aiResponseText = document.getElementById('ai-response-text');
    const aiLoading = document.getElementById('ai-loading');
    const closeAiBtn = document.getElementById('close-ai-response');

    if (!aiAskBtn) return;

    async function performAiSearch() {
      const query = aiSearchInput.value.trim();
      if (!query) return;

      // Reset and show container
      aiResponseContainer.classList.remove('hidden');
      aiResponseText.innerHTML = '';
      aiLoading.classList.remove('hidden');
      aiAskBtn.disabled = true;
      aiAskBtn.classList.add('opacity-50', 'cursor-not-allowed');

      const formData = new FormData();
      formData.append('action', 'ai_search');
      formData.append('query', query);

      try {
        const response = await fetch('/wp-admin/admin-ajax.php', {
          method: 'POST',
          body: formData
        });

        const data = await response.json();

        if (data.success) {
          aiLoading.classList.add('hidden');
          const answer = data.data.answer;
          let i = 0;
          const speed = 8;
          
          function typeWriter() {
            if (i < answer.length) {
              const char = answer.charAt(i);
              aiResponseText.innerHTML += char === '\n' ? '<br>' : char;
              i++;
              setTimeout(typeWriter, speed);
            }
          }
          typeWriter();
        } else {
          aiResponseText.innerHTML = `<p class="text-red-500">Error: ${data.data}</p>`;
          aiLoading.classList.add('hidden');
        }
      } catch (error) {
        aiResponseText.innerHTML = '<p class="text-red-500">Something went wrong. Please try again later.</p>';
        aiLoading.classList.add('hidden');
      } finally {
        aiAskBtn.disabled = false;
        aiAskBtn.classList.remove('opacity-50', 'cursor-not-allowed');
      }
    }

    aiAskBtn.addEventListener('click', performAiSearch);

    aiSearchInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        if (document.activeElement === aiSearchInput) {
          e.preventDefault();
          performAiSearch();
        }
      }
    });

    closeAiBtn.addEventListener('click', function() {
      aiResponseContainer.classList.add('hidden');
    });
  });
</script>

</body>
</html>