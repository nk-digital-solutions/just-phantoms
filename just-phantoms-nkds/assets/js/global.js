// WordPress version — header & footer are rendered server-side via PHP.
// This file handles: active nav, current year, sticky CTA.

function setActiveNavigation() {
  const pathname = window.location.pathname;
  const navLinks = document.querySelectorAll('[data-nav]');

  const vehiclePages = [
    'rolls-royce-phantom', 'range-rover', 'porsche-cayenne-limo',
    'mustang-gt500', 'vintage-car', 'regent', 'bentley-chrysler-limo'
  ];

  navLinks.forEach(function(link) {
    const navPage = link.getAttribute('data-nav');
    const isHome = pathname === '/' || /^\/(home\/?)$/.test(pathname);
    const isVehicle = vehiclePages.some(function(v) { return pathname.indexOf('/' + v) !== -1; });

    if (isHome && (navPage === 'home' || navPage === '')) {
      link.classList.add('active');
    } else if (!isHome && pathname.indexOf('/' + navPage) !== -1) {
      link.classList.add('active');
    } else if (isVehicle && navPage === 'fleet') {
      link.classList.add('active');
    }
  });
}

function initializeStickyBehavior() {
  var stickyCTA = document.querySelector('.sticky-cta');
  var footer    = document.querySelector('footer');

  if (!stickyCTA || !footer) return;

  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      stickyCTA.style.position = entry.isIntersecting ? 'static' : 'sticky';
    });
  }, { rootMargin: '60px 0px 0px 0px' });

  observer.observe(footer);
}

document.addEventListener('DOMContentLoaded', function() {
  // Active navigation
  setActiveNavigation();

  // Current year in footer
  var yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // Sticky CTA (homepage only)
  if (document.querySelector('.sticky-cta')) {
    initializeStickyBehavior();
  }
});
