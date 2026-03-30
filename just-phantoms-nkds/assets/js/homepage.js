// Homepage specific JavaScript functionality
(function() {
  'use strict';

  function initializeHomepage() {
    // Smooth scrolling for on-page anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(link) {
      link.addEventListener('click', function(e) {
        var target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });

    // Auto-scroll reviews with pause on hover
    const reviewsSlider = document.querySelector('.reviews .slider');
    if (reviewsSlider) {
      let scrollInterval;
      let isPaused = false;
      
      function autoScrollReviews() {
        if (!isPaused) {
          const maxScroll = reviewsSlider.scrollWidth - reviewsSlider.clientWidth;
          const currentScroll = reviewsSlider.scrollLeft;
          
          // If we've reached the end, reset to the beginning
          if (currentScroll >= maxScroll) {
            reviewsSlider.scrollLeft = 0;
          } else {
            // Scroll by one slide width (320px + 16px gap)
            reviewsSlider.scrollLeft += 336;
          }
        }
      }
      
      // Start auto-scrolling every 3 seconds
      scrollInterval = setInterval(autoScrollReviews, 3000);
      
      // Pause on hover
      reviewsSlider.addEventListener('mouseenter', function() {
        isPaused = true;
      });
      
      // Resume on hover out
      reviewsSlider.addEventListener('mouseleave', function() {
        isPaused = false;
      });
    }
    
    // Add scroll-based animations (optional enhancement)
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, observerOptions);
    
    // Observe elements for scroll animations
    const animatedElements = document.querySelectorAll('.card, .section-head, .lead');
    animatedElements.forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
    });
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeHomepage);
  } else {
    initializeHomepage();
  }
  
})();