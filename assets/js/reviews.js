/**
 * Just Phantoms — Reviews page JS (WordPress)
 * Minimal page-specific init. Heavy lifting is done by google-reviews.js.
 *
 * @package Just_Phantoms
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    // Highlight "Google" badge on any dynamically injected cards.
    document.addEventListener('animationend', function (e) {
      if (e.target && e.target.classList.contains('review-card')) {
        e.target.classList.add('visible');
      }
    });
  });

})();
