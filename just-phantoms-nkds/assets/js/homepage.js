// Homepage specific JavaScript functionality
(function() {
  'use strict';
  
  function initializeHomepage() {
    // Set current year in footer
    const yearElement = document.getElementById('year');
    if (yearElement) {
      yearElement.textContent = new Date().getFullYear();
    }
    
    // Handle quote form submission
    const quoteForm = document.querySelector('.quote-card');
    if (quoteForm) {
      const submitButton = quoteForm.querySelector('.btn.primary');
      const inputs = quoteForm.querySelectorAll('input, select');
      
      if (submitButton) {
        submitButton.addEventListener('click', function(e) {
          e.preventDefault();
          
          // Basic form validation
          let isValid = true;
          let formData = {};
          
          inputs.forEach(input => {
            if (input.hasAttribute('required') && !input.value.trim()) {
              isValid = false;
              input.style.borderColor = '#ff5252';
            } else {
              input.style.borderColor = 'rgba(255,255,255,.12)';
              if (input.name || input.getAttribute('aria-label')) {
                const key = input.name || input.getAttribute('aria-label').toLowerCase();
                formData[key] = input.value;
              }
            }
          });
          
          if (isValid) {
            console.log('Quote form data:', formData);
            // Here you would normally submit the form data to your backend
            alert('Thank you! We\'ll get back to you with a quote shortly.');
          } else {
            alert('Please fill in all required fields.');
          }
        });
      }
    }
    
    // Smooth scrolling for anchor links that still exist
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
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