/**
 * Just Phantoms — Homepage JS
 * Handles: reviews slider auto-scroll, smooth scroll, fade-in animations.
 *
 * @package Just_Phantoms
 */
(function () {
  'use strict';

  function initReviewsSlider() {
    var slider = document.querySelector('.reviews .slider');
    if (!slider) return;

    var isPaused = false;

    var interval = setInterval(function () {
      if (isPaused) return;
      var maxScroll = slider.scrollWidth - slider.clientWidth;
      if (slider.scrollLeft >= maxScroll) {
        slider.scrollLeft = 0;
      } else {
        slider.scrollLeft += 336; // card width (320) + gap (16)
      }
    }, 3000);

    slider.addEventListener('mouseenter', function () { isPaused = true; });
    slider.addEventListener('mouseleave', function () { isPaused = false; });
  }

  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
      link.addEventListener('click', function (e) {
        var target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  }

  function initFadeAnimations() {
    var elements = document.querySelectorAll('.card, .section-head, .lead');
    if (!elements.length || !('IntersectionObserver' in window)) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -100px 0px' });

    elements.forEach(function (el) {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
    });
  }

  function init() {
    initReviewsSlider();
    initSmoothScroll();
    initFadeAnimations();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
