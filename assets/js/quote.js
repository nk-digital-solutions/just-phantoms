/**
 * Just Phantoms — Quote Form JS (WordPress)
 * Handles: Google Places autocomplete, stops fields, vehicle image preview,
 *          AM/PM time selection, return journey toggle, form AJAX submission.
 *
 * Requires: jpAjax global (set via wp_localize_script in functions.php)
 *           Google Places API script loaded separately.
 *
 * @package Just_Phantoms
 */
(function () {
  'use strict';

  // ------------------------------------------------------------------
  // Vehicle image map (relative to theme assets/images/)
  // ------------------------------------------------------------------
  var vehicleImages = {
    'rolls-royce-phantom':    'assets/images/fleet/rolls-royce-phantom/Rolls Royce Phantom.jpg',
    'range-rover-executive':  'assets/images/fleet/range-rover/Range Rover Executive LWB SVO.jpg',
    'porsche-cayenne-limo':   'assets/images/fleet/porsche-cayenne-limo/Porsche Cayenne Limo.jpg',
    'bentley-chrysler-limo':  'assets/images/fleet/bentley-chrysler-limo/Baby Bentley Chrysler Limo.png',
    'mustang-gt500':          'assets/images/fleet/mustang-gt500/2.jpg',
    'vintage-car':            "assets/images/fleet/vintage/1930's Vintage Classic Car.jpg",
    'regent-landaulette':     'assets/images/fleet/regent/regent-landaulette-convertible.png',
  };

  // ------------------------------------------------------------------
  // Vehicle image preview
  // ------------------------------------------------------------------
  function initVehiclePreview() {
    var select = document.getElementById('vehicleType');
    var container = document.getElementById('vehicleImageContainer');
    var img = document.getElementById('vehicleImage');
    var nameEl = document.getElementById('vehicleNameDisplay');
    if (!select || !container) return;

    select.addEventListener('change', function () {
      var val = this.value;
      var relPath = vehicleImages[val];
      if (relPath && typeof jpAjax !== 'undefined') {
        img.src = jpAjax.themeUri + '/' + relPath;
        img.alt = this.options[this.selectedIndex].text;
        if (nameEl) nameEl.textContent = this.options[this.selectedIndex].text;
        container.style.display = 'block';
      } else {
        container.style.display = 'none';
      }
    });
  }

  // ------------------------------------------------------------------
  // Return journey toggle
  // ------------------------------------------------------------------
  function initReturnJourneyToggle() {
    var select = document.getElementById('returnJourney');
    var fields = document.getElementById('returnJourneyFields');
    if (!select || !fields) return;

    select.addEventListener('change', function () {
      fields.style.display = this.value === 'yes' ? 'block' : 'none';
    });
  }

  // ------------------------------------------------------------------
  // Dynamic stops fields
  // ------------------------------------------------------------------
  function initStopsFields() {
    var countSelect = document.getElementById('stopsCount');
    var container = document.getElementById('stopsContainer');
    if (!countSelect || !container) return;

    countSelect.addEventListener('change', function () {
      var count = parseInt(this.value, 10) || 0;
      container.innerHTML = '';

      for (var i = 1; i <= count; i++) {
        var inputId    = 'stopSearch' + i;
        var postcodeId = 'stopPostcodeAuto' + i;

        var wrapper = document.createElement('div');
        wrapper.className = 'form-group';
        wrapper.style.marginTop = '1rem';
        wrapper.innerHTML = '<label>Stop ' + i + ' Address</label>'
          + '<div class="lookup-container"><div class="input-wrapper">'
          + '<input type="text" id="' + inputId + '" name="stop' + i + '" placeholder="Stop ' + i + ' address..." autocomplete="off">'
          + '</div></div>'
          + '<input type="hidden" id="' + postcodeId + '" name="stop' + i + 'Postcode">';
        container.appendChild(wrapper);

        // Attach Google Places autocomplete if available
        if (typeof google !== 'undefined' && google.maps && google.maps.places) {
          (function (id, pcId) {
            var stopInput = document.getElementById(id);
            if (!stopInput) return;
            var ac = new google.maps.places.Autocomplete(stopInput, {
              componentRestrictions: { country: 'gb' },
              types: ['establishment', 'geocode'],
              fields: ['name', 'formatted_address', 'address_components'],
            });
            ac.addListener('place_changed', function () {
              var place = ac.getPlace();
              if (!place || !place.address_components) return;
              var postcode = '';
              place.address_components.forEach(function (component) {
                if (component.types.indexOf('postal_code') !== -1) {
                  postcode = component.long_name;
                }
              });
              var fullAddress = place.formatted_address || '';
              if (place.name && fullAddress.indexOf(place.name) === -1) {
                fullAddress = place.name + ', ' + fullAddress;
              }
              if (postcode && fullAddress.indexOf(postcode) === -1) {
                fullAddress = fullAddress.replace(/, UK$/, ', ' + postcode + ', UK');
                if (fullAddress.indexOf(postcode) === -1) {
                  fullAddress = fullAddress + ', ' + postcode;
                }
              }
              stopInput.value = fullAddress;
              var pcField = document.getElementById(pcId);
              if (pcField) pcField.value = postcode;
            });
          })(inputId, postcodeId);
        }
      }
    });
  }

  // ------------------------------------------------------------------
  // Manual address entry toggle
  // ------------------------------------------------------------------
  function initManualAddressToggles() {
    document.querySelectorAll('[data-entry]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var key = this.getAttribute('data-entry');
        var lookup = document.getElementById(key + 'Lookup');
        var manual = document.getElementById(key + 'Manual');
        if (lookup) lookup.style.display = 'none';
        if (manual) manual.style.display = 'block';
      });
    });

    document.querySelectorAll('[data-lookup]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var key = this.getAttribute('data-lookup');
        var lookup = document.getElementById(key + 'Lookup');
        var manual = document.getElementById(key + 'Manual');
        if (manual) manual.style.display = 'none';
        if (lookup) lookup.style.display = 'block';
      });
    });

    document.querySelectorAll('[data-save]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var key = this.getAttribute('data-save');
        var addr = document.getElementById(key + 'Address');
        var city = document.getElementById(key + 'City');
        var post = document.getElementById(key + 'Postcode');
        var search = document.getElementById(key + 'Search');

        var parts = [];
        if (addr && addr.value.trim()) parts.push(addr.value.trim());
        if (city && city.value.trim()) parts.push(city.value.trim());
        if (post && post.value.trim()) parts.push(post.value.trim());

        if (search && parts.length) {
          search.value = parts.join(', ');
        }

        var lookup = document.getElementById(key + 'Lookup');
        var manual = document.getElementById(key + 'Manual');
        if (manual) manual.style.display = 'none';
        if (lookup) lookup.style.display = 'block';
      });
    });
  }

  // ------------------------------------------------------------------
  // Google Places autocomplete
  // ------------------------------------------------------------------
  function initPlacesAutocomplete() {
    if (typeof google === 'undefined' || typeof google.maps === 'undefined') return;

    var fieldMap = {
      pickupSearch: 'pickupPostcodeAuto',
      destSearch:   'destPostcodeAuto',
      returnSearch: 'returnPostcodeAuto',
    };

    Object.keys(fieldMap).forEach(function (fieldId) {
      var input = document.getElementById(fieldId);
      if (!input) return;

      var autocomplete = new google.maps.places.Autocomplete(input, {
        componentRestrictions: { country: 'gb' },
        types: ['establishment', 'geocode'],
        fields: ['name', 'formatted_address', 'address_components'],
      });

      autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place || !place.address_components) return;

        // Extract postcode from address components
        var postcode = '';
        place.address_components.forEach(function (component) {
          if (component.types.indexOf('postal_code') !== -1) {
            postcode = component.long_name;
          }
        });

        // Build full address: prepend business name if available
        var fullAddress = place.formatted_address || '';
        if (place.name && fullAddress.indexOf(place.name) === -1) {
          fullAddress = place.name + ', ' + fullAddress;
        }

        // Ensure postcode is visible in the address field
        if (postcode && fullAddress.indexOf(postcode) === -1) {
          fullAddress = fullAddress.replace(/, UK$/, ', ' + postcode + ', UK');
          if (fullAddress.indexOf(postcode) === -1) {
            fullAddress = fullAddress + ', ' + postcode;
          }
        }

        // Set the search field to the full address
        input.value = fullAddress;

        // Populate hidden postcode field
        var postcodeFieldId = fieldMap[fieldId];
        if (postcodeFieldId) {
          var postcodeField = document.getElementById(postcodeFieldId);
          if (postcodeField) postcodeField.value = postcode;
        }
      });
    });
  }

  // ------------------------------------------------------------------
  // Modal helpers
  // ------------------------------------------------------------------
  function showModal() {
    var modal = document.getElementById('successModal');
    if (modal) {
      modal.classList.add('show');
      modal.focus();
    }
  }

  function closeModal() {
    var modal = document.getElementById('successModal');
    if (modal) modal.classList.remove('show');
  }

  function initModalClose() {
    var btn = document.getElementById('modalClose');
    if (btn) btn.addEventListener('click', closeModal);

    var modal = document.getElementById('successModal');
    if (modal) {
      modal.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
      });
    }
  }

  // ------------------------------------------------------------------
  // Form submission via WordPress AJAX
  // ------------------------------------------------------------------
  function initFormSubmission() {
    var form = document.getElementById('quoteForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var submitBtn = form.querySelector('button[type="submit"]');
      var originalText = submitBtn ? submitBtn.textContent : '';
      if (submitBtn) {
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
      }

      var data = new FormData(form);
      data.append('action', 'jp_quote');

      // Ensure nonce is included
      var nonceField = form.querySelector('[name="jp_nonce"]');
      if (nonceField) {
        data.append('jp_nonce', nonceField.value);
      }

      var ajaxUrl = (typeof jpAjax !== 'undefined') ? jpAjax.ajaxUrl : '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, {
        method: 'POST',
        body: data,
        credentials: 'same-origin',
      })
        .then(function (res) { return res.json(); })
        .then(function (json) {
          if (json.success) {
            var base = (typeof jpAjax !== 'undefined' && jpAjax.siteUrl) ? jpAjax.siteUrl : '';
            window.location.href = base + '/thank-you/';
          } else {
            var msg = (json.data && json.data.message) ? json.data.message : (typeof json.data === 'string' ? json.data : 'Something went wrong. Please try again or call us on 07504 040 407.');
            alert(msg);
          }
        })
        .catch(function () {
          alert('Network error. Please check your connection and try again, or call us on 07504 040 407.');
        })
        .finally(function () {
          if (submitBtn) {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
          }
        });
    });
  }

  // ------------------------------------------------------------------
  // Set minimum date to today
  // ------------------------------------------------------------------
  function initDateMin() {
    var dateInput = document.getElementById('eventDate');
    if (dateInput) {
      dateInput.min = new Date().toISOString().split('T')[0];
    }
  }

  // ------------------------------------------------------------------
  // Boot
  // ------------------------------------------------------------------
  function init() {
    initVehiclePreview();
    initReturnJourneyToggle();
    initStopsFields();
    initManualAddressToggles();
    initModalClose();
    initFormSubmission();
    initDateMin();

    // Google Places may load async — wait for it
    if (typeof google !== 'undefined' && google.maps) {
      initPlacesAutocomplete();
    } else {
      window.initJPPlaces = initPlacesAutocomplete;
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
