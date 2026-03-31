/**
 * Just Phantoms — Global JS (WordPress)
 * Handles: active nav, sticky CTA, mobile nav, year.
 * Header/footer are now server-rendered via WordPress — no fetch() needed.
 *
 * @package Just_Phantoms
 */
(function () {
  'use strict';

  function setActiveNavigation() {
    const path = window.location.pathname;
    const navLinks = document.querySelectorAll('[data-nav]');
    const vehicleSlugs = [
      'rolls-royce-phantom', 'porsche-cayenne-limo', 'baby-bentley-chrysler-limo',
      'limited-edition-ford-mustang-gt500', 'range-rover-executive', 'regent-landaulette-convertible',
      'vintage-classic-car',
    ];

    navLinks.forEach(function (link) {
      const nav = link.getAttribute('data-nav');
      // Match slug in path
      if (path.indexOf('/' + nav + '/') !== -1 || (nav === 'home' && (path === '/' || path.endsWith('/index.php')))) {
        link.classList.add('active');
      }
      // Vehicle pages → fleet nav active
      if (nav === 'fleet') {
        vehicleSlugs.forEach(function (slug) {
          if (path.indexOf('/' + slug + '/') !== -1) {
            link.classList.add('active');
          }
        });
      }
    });
  }

  function initializeStickyBehavior() {
    const stickyCTA = document.querySelector('.sticky-cta');
    const footer = document.querySelector('footer');
    if (!stickyCTA || !footer) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        stickyCTA.style.position = entry.isIntersecting ? 'static' : 'sticky';
      });
    }, { rootMargin: '60px 0px 0px 0px' });

    observer.observe(footer);
  }

  function initializeMobileNav() {
    var toggle = document.getElementById('navToggle');
    var close  = document.getElementById('navClose');
    var nav = document.getElementById('mainNav');
    if (!toggle || !nav) return;

    function openNav() {
      nav.classList.add('nav-open');
      toggle.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }
    function closeNav() {
      nav.classList.remove('nav-open');
      toggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    toggle.addEventListener('click', function (e) {
      e.stopPropagation();
      nav.classList.contains('nav-open') ? closeNav() : openNav();
    });

    if (close) {
      close.addEventListener('click', function (e) {
        e.stopPropagation();
        closeNav();
      });
    }

    // Close nav when clicking outside the overlay
    document.addEventListener('click', function (e) {
      if (nav.classList.contains('nav-open') && !nav.contains(e.target)) {
        closeNav();
      }
    });

    // Close on nav link click
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeNav);
    });
  }

  function setFooterYear() {
    var el = document.getElementById('year');
    if (el) {
      el.textContent = new Date().getFullYear();
    }
  }

  function init() {
    setFooterYear();
    setActiveNavigation();
    initializeMobileNav();

    // Only attach sticky behavior on homepage
    if (document.body.classList.contains('home')) {
      initializeStickyBehavior();
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
