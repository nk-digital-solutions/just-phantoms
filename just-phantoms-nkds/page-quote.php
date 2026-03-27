<?php
/**
 * Template Name: Get a Quote
 *
 * @package just-phantoms-nkds
 */

get_header();
?>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="hero-content">
        <h1>Get Your Instant Quote</h1>
        <p class="hero-subtitle">Professional luxury car hire with transparent pricing. Tell us about your event and we'll provide a detailed quote within minutes.</p>
      </div>
    </div>
  </section>

  <!-- Quote Form Section -->
  <section class="quote-form-section">
    <div class="container">
      <div class="form-layout">

        <!-- Quote Form -->
        <div class="quote-form-container">
          <div class="form-header">
            <h2>Request Your Quote</h2>
            <p>Complete the form below and we'll send you a detailed quote within 30 minutes during business hours.</p>
          </div>

          <form id="quoteForm">
            <?php wp_nonce_field( 'jp_quote_nonce', 'nonce' ); ?>

            <!-- Personal Information -->
            <div class="form-section">
              <h3>Contact Details</h3>
              <div class="form-group">
                <label for="fullName">Name *</label>
                <input type="text" id="fullName" name="fullName" placeholder="Your full name" required>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" id="email" name="email" placeholder="example@email.com" required>
                </div>
                <div class="form-group">
                  <label for="phone">Phone *</label>
                  <input type="tel" id="phone" name="phone" placeholder="07123 456789" required>
                </div>
              </div>
            </div>

            <!-- Vehicle & Event -->
            <div class="form-section">
              <h3>Vehicle &amp; Date</h3>
              <div class="form-group">
                <label for="vehicleType">Choose Car *</label>
                <select id="vehicleType" name="vehicleType" required>
                  <option value="">Select a vehicle...</option>
                  <option value="rolls-royce-phantom">Rolls Royce Phantom (4 Passengers)</option>
                  <option value="range-rover-executive">Range Rover Executive LWB SVO (4 Passengers)</option>
                  <option value="porsche-cayenne-limo">Porsche Cayenne Limo (8–10 Passengers)</option>
                  <option value="bentley-chrysler-limo">Bentley Chrysler Limo (8 Passengers)</option>
                  <option value="mustang-gt500">Mustang GT500 (2 Passengers)</option>
                  <option value="vintage-car">1930's Vintage Car (4 Passengers)</option>
                  <option value="regent-convertible">Regent Convertible (4 Passengers)</option>
                </select>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label for="eventDate">Date Required *</label>
                  <input type="date" id="eventDate" name="eventDate" required>
                </div>
                <div class="form-group">
                  <label for="pickupTime">Time Required *</label>
                  <input type="time" id="pickupTime" name="pickupTime" required>
                </div>
              </div>
            </div>

            <!-- Journey Details -->
            <div class="form-section">
              <h3>Journey Information</h3>

              <div class="form-group address-group" id="pickupGroup">
                <label>Pick up Address *</label>
                <div class="lookup-container" id="pickupLookup">
                  <div class="input-wrapper">
                    <input type="text" id="pickupSearch" name="pickupSearch" placeholder="Start typing address or postcode..." autocomplete="off">
                    <button type="button" class="btn-input-action" onclick="showManualEntry('pickup')">Enter Manually</button>
                  </div>
                </div>
                <div class="manual-container" id="pickupManual" style="display:none;">
                  <div class="manual-grid">
                    <input type="text" name="pickupAddress" id="pickupAddress" placeholder="Street Address">
                    <input type="text" name="pickupCity" id="pickupCity" placeholder="Town / City">
                    <input type="text" name="pickupPostcode" id="pickupPostcode" placeholder="Postcode">
                  </div>
                  <div class="manual-actions" style="margin-top:0.5rem;display:flex;gap:1rem;align-items:center;">
                    <button type="button" class="btn primary small" onclick="saveManualEntry('pickup')">Save Address</button>
                    <button type="button" class="btn-text-action" onclick="showLookup('pickup')">Cancel</button>
                  </div>
                </div>
              </div>

              <div class="form-group address-group" id="destGroup">
                <label>Final Destination *</label>
                <div class="lookup-container" id="destLookup">
                  <div class="input-wrapper">
                    <input type="text" id="destSearch" name="destSearch" placeholder="Start typing address or postcode..." autocomplete="off">
                    <button type="button" class="btn-input-action" onclick="showManualEntry('dest')">Enter Manually</button>
                  </div>
                </div>
                <div class="manual-container" id="destManual" style="display:none;">
                  <div class="manual-grid">
                    <input type="text" name="destAddress" id="destAddress" placeholder="Street Address">
                    <input type="text" name="destCity" id="destCity" placeholder="Town / City">
                    <input type="text" name="destPostcode" id="destPostcode" placeholder="Postcode">
                  </div>
                  <div class="manual-actions" style="margin-top:0.5rem;display:flex;gap:1rem;align-items:center;">
                    <button type="button" class="btn primary small" onclick="saveManualEntry('dest')">Save Address</button>
                    <button type="button" class="btn-text-action" onclick="showLookup('dest')">Cancel</button>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="returnJourney">Return Journey?</label>
                  <select id="returnJourney" name="returnJourney" onchange="toggleReturnJourneyFields()">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="stopsCount">Any Stops Required?</label>
                  <select id="stopsCount" name="stopsCount" onchange="updateStopsFields()">
                    <option value="0">No stops</option>
                    <option value="1">1 Stop</option>
                    <option value="2">2 Stops</option>
                    <option value="3">3 Stops</option>
                    <option value="4">4 Stops</option>
                    <option value="5">5 Stops</option>
                  </select>
                </div>
              </div>

              <!-- Return Journey Fields -->
              <div id="returnJourneyFields" style="display:none;">
                <div class="form-group address-group" id="returnGroup" style="margin-top:1rem;">
                  <label>Return Journey Address *</label>
                  <div class="lookup-container" id="returnLookup">
                    <div class="input-wrapper">
                      <input type="text" id="returnSearch" name="returnSearch" placeholder="Start typing return address or postcode..." autocomplete="off">
                      <button type="button" class="btn-input-action" onclick="showManualEntry('return')">Enter Manually</button>
                    </div>
                  </div>
                  <div class="manual-container" id="returnManual" style="display:none;">
                    <div class="manual-grid">
                      <input type="text" name="returnAddress" id="returnAddress" placeholder="Street Address">
                      <input type="text" name="returnCity" id="returnCity" placeholder="Town / City">
                      <input type="text" name="returnPostcode" id="returnPostcode" placeholder="Postcode">
                    </div>
                    <div class="manual-actions" style="margin-top:0.5rem;display:flex;gap:1rem;align-items:center;">
                      <button type="button" class="btn primary small" onclick="saveManualEntry('return')">Save Address</button>
                      <button type="button" class="btn-text-action" onclick="showLookup('return')">Cancel</button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="returnTime">Return Time *</label>
                  <input type="time" id="returnTime" name="returnTime">
                </div>
              </div>

              <!-- Dynamic stops container -->
              <div id="stopsContainer"></div>
            </div>

            <!-- Notes -->
            <div class="form-section">
              <h3>Additional Information</h3>
              <div class="form-group">
                <label for="notes">Any special requests or notes?</label>
                <textarea id="notes" name="notes" rows="4" placeholder="Wedding ribbons, red carpet, champagne, specific route requirements..."></textarea>
              </div>
            </div>

            <div id="quoteFormMessage" style="display:none;padding:1rem;border-radius:8px;margin-bottom:1rem;"></div>

            <div class="form-actions">
              <button type="submit" class="btn primary large" style="width:100%">Get Instant Quote</button>
            </div>
          </form>
        </div>

        <!-- Booking Process Info -->
        <div class="booking-info">
          <div class="info-card">
            <h3>How Our Booking Process Works</h3>
            <div class="process-steps">
              <div class="step"><div class="step-number">1</div><div class="step-content"><h4>Submit Your Quote</h4><p>Complete the form with your event details and preferences.</p></div></div>
              <div class="step"><div class="step-number">2</div><div class="step-content"><h4>Receive Your Quote</h4><p>We'll send you a detailed quote within 30 minutes during business hours.</p></div></div>
              <div class="step"><div class="step-number">3</div><div class="step-content"><h4>Confirm Your Booking</h4><p>We'll send a booking confirmation with payment details and contract.</p></div></div>
              <div class="step"><div class="step-number">4</div><div class="step-content"><h4>Final Preparations</h4><p>We'll contact you 48 hours before your event to confirm all details.</p></div></div>
            </div>
          </div>

          <div class="info-card">
            <h3>What's Included</h3>
            <ul class="included-list">
              <li>Professional chauffeur in full uniform</li>
              <li>Fully insured and licensed vehicles</li>
              <li>Complimentary bottled water</li>
              <li>Vehicle cleaning and preparation</li>
              <li>Fuel and all driving costs</li>
              <li>Meet and greet service</li>
              <li>Assistance with luggage/belongings</li>
              <li>24/7 customer support on event day</li>
            </ul>
          </div>

          <div class="info-card contact-card">
            <h3>Need Help?</h3>
            <p>Speak to our booking specialists:</p>
            <div class="contact-options">
              <a href="tel:+447504040407" class="contact-btn">&#128222; 07504 040 407</a>
              <a href="mailto:info@justphantoms.com" class="contact-btn">&#9993; Email Us</a>
              <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="contact-btn">&#10003; FAQ's</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Success Modal -->
  <div id="successModal" class="success-modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="success-icon">
          <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
            <circle cx="25" cy="25" r="25" fill="#C2A33B"/>
            <path d="M16 25L22 31L34 19" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h2>Quote Request Submitted!</h2>
        <p>Thank you for choosing Just Phantoms. We'll respond within 30 minutes during business hours.</p>
      </div>
      <div class="modal-footer">
        <button onclick="closeSuccessModal()" class="btn primary">Continue</button>
      </div>
    </div>
  </div>

  <script>
  // Pass WordPress AJAX URL and nonce to JS
  var jpQuote = {
    ajaxUrl: '<?php echo esc_url( admin_url( "admin-ajax.php" ) ); ?>',
    nonce:   '<?php echo esc_js( wp_create_nonce( "jp_quote_nonce" ) ); ?>'
  };

  // Address utility functions
  function showManualEntry(type) {
    document.getElementById(type + 'Lookup').style.display = 'none';
    document.getElementById(type + 'Manual').style.display = 'block';
  }
  function showLookup(type) {
    document.getElementById(type + 'Manual').style.display = 'none';
    document.getElementById(type + 'Lookup').style.display = 'block';
  }
  function saveManualEntry(type) {
    var address  = document.getElementById(type + 'Address')  ? document.getElementById(type + 'Address').value.trim()  : '';
    var city     = document.getElementById(type + 'City')     ? document.getElementById(type + 'City').value.trim()     : '';
    var postcode = document.getElementById(type + 'Postcode') ? document.getElementById(type + 'Postcode').value.trim() : '';
    var full = [address, city, postcode].filter(Boolean).join(', ');
    if (full) { document.getElementById(type + 'Search').value = full; showLookup(type); }
  }

  // Dynamic stops
  function updateStopsFields() {
    var count = parseInt(document.getElementById('stopsCount').value) || 0;
    var container = document.getElementById('stopsContainer');
    container.innerHTML = '';
    for (var i = 1; i <= count; i++) {
      var typeId = 'stop' + i;
      var div = document.createElement('div');
      div.className = 'form-group stop-field';
      div.style.cssText = 'margin-top:1rem;padding-left:1rem;border-left:2px solid #C2A33B';
      div.innerHTML = '<label>Stop ' + i + ' Address</label>'
        + '<div class="lookup-container" id="' + typeId + 'Lookup"><div class="input-wrapper">'
        + '<input type="text" id="' + typeId + 'Search" name="' + typeId + '" placeholder="Enter postcode or address..." autocomplete="off">'
        + '<button type="button" class="btn-input-action" onclick="showManualEntry(\'' + typeId + '\')">Enter Manually</button>'
        + '</div></div>'
        + '<div class="manual-container" id="' + typeId + 'Manual" style="display:none;">'
        + '<div class="manual-grid">'
        + '<input type="text" name="' + typeId + 'Address" id="' + typeId + 'Address" placeholder="Street Address">'
        + '<input type="text" name="' + typeId + 'City" id="' + typeId + 'City" placeholder="Town / City">'
        + '<input type="text" name="' + typeId + 'Postcode" id="' + typeId + 'Postcode" placeholder="Postcode">'
        + '</div><div class="manual-actions" style="margin-top:0.5rem;display:flex;gap:1rem;">'
        + '<button type="button" class="btn primary small" onclick="saveManualEntry(\'' + typeId + '\')">Save Address</button>'
        + '<button type="button" class="btn-text-action" onclick="showLookup(\'' + typeId + '\')">Cancel</button>'
        + '</div></div>';
      container.appendChild(div);
    }
  }

  // Return journey toggle
  function toggleReturnJourneyFields() {
    var sel = document.getElementById('returnJourney').value;
    document.getElementById('returnJourneyFields').style.display = sel === 'yes' ? 'block' : 'none';
  }

  // Google Places autocomplete callback
  function initGooglePlaces() {
    var opts = { componentRestrictions: { country: 'uk' }, fields: ['formatted_address'] };
    new google.maps.places.Autocomplete(document.getElementById('pickupSearch'), opts);
    new google.maps.places.Autocomplete(document.getElementById('destSearch'),   opts);
  }

  // Form submission via WP AJAX
  document.getElementById('quoteForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var btn = this.querySelector('button[type="submit"]');
    var original = btn.innerHTML;
    btn.innerHTML = 'Sending...';
    btn.disabled = true;

    var data = new FormData(this);
    data.append('action', 'jp_submit_quote');

    fetch(jpQuote.ajaxUrl, { method: 'POST', body: data })
      .then(function(r) { return r.json(); })
      .then(function(result) {
        if (result.success) {
          showSuccessModal();
          document.getElementById('quoteForm').reset();
          document.getElementById('stopsContainer').innerHTML = '';
        } else {
          showFormMessage(result.data.message || 'Something went wrong. Please call us directly.', 'error');
        }
      })
      .catch(function() {
        showFormMessage('Unable to send. Please call us on 07504 040 407.', 'error');
      })
      .finally(function() {
        btn.innerHTML = original;
        btn.disabled = false;
      });
  });

  function showFormMessage(msg, type) {
    var el = document.getElementById('quoteFormMessage');
    el.textContent = msg;
    el.style.display = 'block';
    el.style.background = type === 'error' ? 'rgba(255,82,82,.15)' : 'rgba(46,204,113,.15)';
    el.style.border = '1px solid ' + (type === 'error' ? '#ff5252' : '#2ecc71');
    el.style.color = type === 'error' ? '#ff5252' : '#2ecc71';
  }

  function showSuccessModal() {
    document.getElementById('successModal').classList.add('show');
    document.body.style.overflow = 'hidden';
  }
  function closeSuccessModal() {
    document.getElementById('successModal').classList.remove('show');
    document.body.style.overflow = '';
  }

  // Set minimum date
  document.addEventListener('DOMContentLoaded', function() {
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('eventDate').min = today;
  });
  </script>

  <!-- Google Places API -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVxEnH2y-zmEp7bnvb5biffCZhiYDSDhM&libraries=places&callback=initGooglePlaces&loading=async" async defer></script>

<?php get_footer(); ?>
