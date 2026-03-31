/**
 * Just Phantoms — Fleet Filter JS
 * Handles: category filter buttons, vehicle card filtering.
 *
 * @package Just_Phantoms
 */
(function () {
  'use strict';

  function filterVehicles(category, cards) {
    cards.forEach(function (card) {
      var cardCategory = card.getAttribute('data-category') || '';
      if (category === 'all' || cardCategory === category) {
        card.classList.remove('hidden');
      } else {
        card.classList.add('hidden');
      }
    });
  }

  function initializeFleetFilters() {
    var buttons = document.querySelectorAll('.filter-btn');
    var cards = document.querySelectorAll('.fleet-grid .card[data-category]');

    if (!buttons.length || !cards.length) return;

    buttons.forEach(function (button) {
      button.addEventListener('click', function () {
        buttons.forEach(function (b) { b.classList.remove('active'); });
        this.classList.add('active');
        filterVehicles(this.getAttribute('data-filter') || 'all', cards);
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeFleetFilters);
  } else {
    initializeFleetFilters();
  }

})();
