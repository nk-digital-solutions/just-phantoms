/**
 * Just Phantoms — Google Reviews (WordPress)
 * Fetches live Google Reviews via google-places-proxy.php, caches to localStorage,
 * falls back to hardcoded reviews when the API is unavailable.
 *
 * Requires: jpAjax global (set via wp_localize_script in functions.php)
 *
 * @package Just_Phantoms
 */
(function () {
  'use strict';

  // ------------------------------------------------------------------
  // GoogleReviews class
  // ------------------------------------------------------------------
  function GoogleReviews() {
    this.placeId       = null;
    this.apiKey        = null;
    this.businessName  = 'Just Phantoms Limited (Rolls Royce Wedding Car Hire)';
    this.maxReviews    = 10;
    this.minRating     = 4;
    this.cacheKey      = 'justPhantoms_googleReviews';
    this.cacheExpiry   = 24 * 60 * 60 * 1000; // 24 h
    this.proxyUrl      = (typeof jpAjax !== 'undefined')
      ? jpAjax.themeUri + '/google-places-proxy.php'
      : '/wp-content/themes/just-phantoms-nkds/google-places-proxy.php';
  }

  // ------------------------------------------------------------------
  // Init
  // ------------------------------------------------------------------
  GoogleReviews.prototype.init = function (apiKey, placeId) {
    var self = this;
    self.apiKey = apiKey;

    var p = placeId
      ? Promise.resolve(placeId)
      : self.findPlaceId();

    p.then(function (id) {
      if (id) {
        self.placeId = id;
        return self.loadReviews();
      }
      console.warn('GoogleReviews: could not determine Place ID, using fallback.');
      self.showFallbackReviews();
    }).catch(function () {
      self.showFallbackReviews();
    });
  };

  // ------------------------------------------------------------------
  // Place ID lookup
  // ------------------------------------------------------------------
  GoogleReviews.prototype.findPlaceId = function () {
    var self = this;
    var url = self.proxyUrl + '?action=find_place&query=' + encodeURIComponent(self.businessName);

    return fetch(url)
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data.candidates && data.candidates.length > 0) {
          return data.candidates[0].place_id;
        }
        return null;
      })
      .catch(function (err) {
        console.warn('GoogleReviews: findPlaceId error', err);
        return null;
      });
  };

  // ------------------------------------------------------------------
  // Cache helpers
  // ------------------------------------------------------------------
  GoogleReviews.prototype.getCachedReviews = function () {
    try {
      var raw = localStorage.getItem(this.cacheKey);
      if (raw) {
        var data = JSON.parse(raw);
        if (Date.now() - data.timestamp < this.cacheExpiry) {
          return data.reviews;
        }
      }
    } catch (e) {
      // ignore storage errors
    }
    return null;
  };

  GoogleReviews.prototype.setCachedReviews = function (reviews) {
    try {
      localStorage.setItem(this.cacheKey, JSON.stringify({
        reviews: reviews,
        timestamp: Date.now(),
      }));
    } catch (e) {
      // quota exceeded — ignore
    }
  };

  // ------------------------------------------------------------------
  // Fetch reviews (with cache)
  // ------------------------------------------------------------------
  GoogleReviews.prototype.fetchGoogleReviews = function () {
    var self = this;

    var cached = self.getCachedReviews();
    if (cached) return Promise.resolve(cached);

    if (!self.placeId) return Promise.resolve([]);

    var url = self.proxyUrl + '?action=place_details&place_id=' + encodeURIComponent(self.placeId);

    return fetch(url)
      .then(function (res) {
        if (!res.ok) throw new Error('HTTP ' + res.status);
        return res.json();
      })
      .then(function (data) {
        if (data.result && data.result.reviews) {
          var filtered = data.result.reviews
            .filter(function (r) { return r.rating >= self.minRating; })
            .slice(0, self.maxReviews);
          self.setCachedReviews(filtered);
          return filtered;
        }
        return self.getCachedReviews() || [];
      })
      .catch(function (err) {
        console.warn('GoogleReviews: fetchGoogleReviews error', err);
        return self.getCachedReviews() || [];
      });
  };

  // ------------------------------------------------------------------
  // Load and display
  // ------------------------------------------------------------------
  GoogleReviews.prototype.loadReviews = function () {
    var self = this;
    return self.fetchGoogleReviews().then(function (reviews) {
      if (reviews && reviews.length > 0) {
        self.displayReviews(reviews);
        self.updateHomepageSlider(reviews.slice(0, 6));
      } else {
        self.showFallbackReviews();
      }
    });
  };

  // ------------------------------------------------------------------
  // Render helpers
  // ------------------------------------------------------------------
  GoogleReviews.prototype.detectServiceType = function (text) {
    var t = text.toLowerCase();
    if (/wedding|bride|groom/.test(t))                return 'Wedding Service';
    if (/prom|graduation/.test(t))                    return 'Prom Transport';
    if (/corporate|business|airport/.test(t))         return 'Corporate Service';
    if (/phantom|rolls/.test(t))                      return 'Rolls Royce Service';
    if (/range rover|executive/.test(t))              return 'Executive Transport';
    if (/vintage|classic/.test(t))                    return 'Vintage Car Service';
    if (/mustang|gt500/.test(t))                      return 'Performance Vehicle';
    if (/limo|limousine/.test(t))                     return 'Limousine Service';
    return 'Premium Transport';
  };

  GoogleReviews.prototype.createReviewCard = function (review) {
    var card = document.createElement('div');
    card.className = 'review-card google-review';

    var stars = '★'.repeat(review.rating || 5);
    var text = review.text || review.review_text || '';
    var name = review.author_name || review.author || 'Google User';
    var time = review.relative_time_description || review.time || 'Recently';
    var service = this.detectServiceType(text);

    card.innerHTML = '<div class="review-header">'
      + '<div class="stars">' + stars + '</div>'
      + '<div class="google-badge">Google</div>'
      + '</div>'
      + '<p class="review-text">\u201c' + text + '\u201d</p>'
      + '<div class="review-meta">'
      + '<div class="review-avatar">' + name.charAt(0).toUpperCase() + '</div>'
      + '<div>'
      + '<div class="review-author">' + name + '</div>'
      + '<div class="review-service">' + service + ' \u2022 ' + time + '</div>'
      + '</div></div>';

    return card;
  };

  GoogleReviews.prototype.displayReviews = function (reviews) {
    var grid = document.querySelector('.reviews-grid');
    if (!grid) return;

    grid.innerHTML = '';
    grid.classList.remove('loading');

    var self = this;
    reviews.forEach(function (review) {
      grid.appendChild(self.createReviewCard(review));
    });
  };

  GoogleReviews.prototype.updateHomepageSlider = function (reviews) {
    var slides = document.querySelector('.reviews-slider .slides');
    if (!slides || !reviews.length) return;

    slides.innerHTML = '';
    reviews.forEach(function (review, i) {
      var slide = document.createElement('div');
      slide.className = 'slide' + (i === 0 ? ' active' : '');

      var stars = '★'.repeat(review.rating || 5);
      var text = review.text || review.review_text || '';
      var short = text.length > 200 ? text.substring(0, 200) + '\u2026' : text;
      var name = review.author_name || review.author || 'Google User';
      var time = review.relative_time_description || 'Recently';

      slide.innerHTML = '<div class="stars">' + stars + '</div>'
        + '<blockquote>\u201c' + short + '\u201d</blockquote>'
        + '<div class="review-author">'
        + '<strong>' + name + '</strong>'
        + '<span>Google Review \u2022 ' + time + '</span>'
        + '</div>';

      slides.appendChild(slide);
    });
  };

  // ------------------------------------------------------------------
  // Fallback reviews (static)
  // ------------------------------------------------------------------
  GoogleReviews.prototype.showFallbackReviews = function () {
    var fallback = [
      {
        rating: 5,
        author_name: 'Sarah Mitchell',
        text: 'Absolutely incredible service for our wedding day! The Rolls Royce Phantom was immaculate and the chauffeur was professional, punctual, and made us feel like royalty. They arrived 15 minutes early as promised and even provided complimentary water and wedding ribbons.',
        relative_time_description: '2 weeks ago',
      },
      {
        rating: 5,
        author_name: 'David Chen',
        text: 'Outstanding corporate service for our executive travel needs. The Range Rover Executive LWB is perfect for business meetings — quiet, comfortable, and the chauffeur is professional and discreet.',
        relative_time_description: '1 month ago',
      },
      {
        rating: 5,
        author_name: 'Emma Lawrence',
        text: 'Perfect for our prom group! The Porsche Cayenne Limo was exactly what we wanted — spacious enough for 8 of us, luxury interior with amazing LED lighting, and the champagne bar was a nice touch.',
        relative_time_description: '3 weeks ago',
      },
      {
        rating: 5,
        author_name: 'Marcus Productions',
        text: 'Used Just Phantoms for our music video shoot and they were incredibly accommodating. The Ford Mustang GT500 looked absolutely stunning on camera. Professional service that exceeded expectations!',
        relative_time_description: '1 week ago',
      },
      {
        rating: 5,
        author_name: 'Rachel Bennett',
        text: 'Hired the 1930\'s vintage classic car for our anniversary photoshoot and it was absolutely magical. The car was in pristine condition with beautiful chrome details and authentic period features.',
        relative_time_description: '2 months ago',
      },
      {
        rating: 5,
        author_name: 'Alex Morrison',
        text: 'Fantastic service from start to finish. Booking was easy, communication was excellent, and the actual service exceeded our expectations. The attention to detail is remarkable.',
        relative_time_description: '3 weeks ago',
      },
    ];
    this.displayReviews(fallback);
    this.updateHomepageSlider(fallback);
  };

  // ------------------------------------------------------------------
  // Refresh (bust cache + reload)
  // ------------------------------------------------------------------
  GoogleReviews.prototype.refreshReviews = function () {
    var self = this;
    try { localStorage.removeItem(self.cacheKey); } catch (e) {}

    var grid = document.querySelector('.reviews-grid');
    if (grid) {
      grid.classList.add('loading');
      grid.innerHTML = '<div class="loading-spinner">Loading reviews\u2026</div>';
    }
    return self.loadReviews();
  };

  // ------------------------------------------------------------------
  // Boot
  // ------------------------------------------------------------------
  var instance = new GoogleReviews();

  document.addEventListener('DOMContentLoaded', function () {
    // API key is passed via a <meta> tag in the reviews page template.
    var apiKeyMeta  = document.querySelector('meta[name="google-api-key"]');
    var placeIdMeta = document.querySelector('meta[name="google-place-id"]');

    var apiKey  = apiKeyMeta  ? apiKeyMeta.getAttribute('content')  : null;
    var placeId = placeIdMeta ? placeIdMeta.getAttribute('content') : null;

    if (apiKey) {
      instance.init(apiKey, placeId || null);
    } else {
      instance.showFallbackReviews();
    }
  });

  // Public API.
  window.googleReviewsInstance  = instance;
  window.refreshGoogleReviews   = function () { return instance.refreshReviews(); };

})();
