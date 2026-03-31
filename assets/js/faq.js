/**
 * Just Phantoms — FAQ Filter JS
 * Handles: category filter buttons, accordion item visibility.
 *
 * @package Just_Phantoms
 */
(function () {
  'use strict';

  function filterFAQItems(category, items) {
    items.forEach(function (item) {
      var itemCategory = item.getAttribute('data-category') || '';
      if (category === 'all' || itemCategory === category) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
        item.removeAttribute('open');
      }
    });
  }

  function initializeFAQ() {
    var buttons = document.querySelectorAll('.category-btn');
    var items = document.querySelectorAll('.faq .item');

    if (!buttons.length || !items.length) return;

    buttons.forEach(function (button) {
      button.addEventListener('click', function () {
        buttons.forEach(function (b) { b.classList.remove('active'); });
        this.classList.add('active');

        // Close all open items when switching category
        document.querySelectorAll('.faq details[open]').forEach(function (d) {
          d.removeAttribute('open');
        });

        filterFAQItems(this.getAttribute('data-category') || 'all', items);
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeFAQ);
  } else {
    initializeFAQ();
  }

})();
