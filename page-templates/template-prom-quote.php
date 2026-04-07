<?php
/**
 * Template Name: Prom Quote
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Get Your Prom Car Quote</h1>
    <p>Tell us your Prom date, school and prom venue. We provide fast, transparent pricing for luxury Prom car and Limousine hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>
  </div>
</section>

<section class="quote-form-section">
  <div class="container">
    <div class="form-layout">

      <!-- Quote Form -->
      <div class="quote-form-container">
        <div class="form-header">
          <h2>Request Your Prom Car Quote</h2>
          <p>Complete the form below and we'll send your tailored Prom transport quote within 24 hours during business hours.</p>
        </div>

        <form id="quoteForm" data-form-type="prom">
          <?php wp_nonce_field( 'jp_quote_nonce', 'jp_nonce' ); ?>
          <input type="hidden" name="quoteType" value="prom">

          <!-- Contact Details -->
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

          <!-- Vehicle & Date -->
          <div class="form-section">
            <h3>Vehicle &amp; Prom Date</h3>
            <div class="form-group">
              <label for="vehicleType">Choose Prom Car *</label>
              <select id="vehicleType" name="vehicleType" required>
                <option value="">Select a vehicle...</option>
                <option value="rolls-royce-phantom">Rolls Royce Phantom (4 Passengers)</option>
                <option value="range-rover-executive">Range Rover Executive LWB SVO (4 Passengers)</option>
                <option value="porsche-cayenne-limo">Porsche Cayenne Limo (8 Passengers)</option>
                <option value="bentley-chrysler-limo">Baby Bentley Chrysler Limo (8 Passengers)</option>
                <option value="mustang-gt500">Limited Edition Ford Mustang GT500 (3 Passengers)</option>
                <option value="vintage-car">1930's Vintage Classic Car (3 Passengers)</option>
                <option value="regent-landaulette">Regent Landaulette Convertible (6 Passengers)</option>
              </select>
            </div>
            <div id="vehicleImageContainer" style="display:none;margin-top:1rem;text-align:center;background:rgba(255,255,255,.04);padding:1rem;border-radius:8px;border:1px solid rgba(255,255,255,.1)">
              <img id="vehicleImage" src="" alt="Selected Vehicle" style="max-width:100%;height:auto;border-radius:4px">
              <p id="vehicleNameDisplay" style="margin-top:.5rem;font-weight:500;color:var(--muted)"></p>
            </div>
            <div class="form-row" style="margin-top:1rem">
              <div class="form-group">
                <label for="eventDate">Prom Date *</label>
                <input type="date" id="eventDate" name="eventDate" required>
              </div>
              <div class="form-group">
                <label>Collection Time *</label>
                <div class="time-picker-wrap">
                  <select class="time-select" id="pickupHour" name="pickupHour" required>
                    <option value="" disabled selected>Hour</option>
                    <?php for ( $h = 1; $h <= 12; $h++ ) : ?>
                      <option value="<?php echo $h; ?>"><?php echo $h; ?></option>
                    <?php endfor; ?>
                  </select>
                  <span class="time-colon">:</span>
                  <select class="time-select" id="pickupMin" name="pickupMin" required>
                    <option value="" disabled selected>Min</option>
                    <?php foreach ( array( '00','05','10','15','20','25','30','35','40','45','50','55' ) as $m ) : ?>
                      <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="ampm-toggle">
                    <input type="radio" name="pickupAmPm" value="AM" id="pickupAM" class="ampm-radio" required>
                    <label for="pickupAM" class="ampm-btn">AM</label>
                    <input type="radio" name="pickupAmPm" value="PM" id="pickupPM" class="ampm-radio">
                    <label for="pickupPM" class="ampm-btn">PM</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Journey Details — Prom is one-way only, no stops -->
          <div class="form-section">
            <h3>Journey Information</h3>

            <div class="form-group">
              <label for="pickupSearch">Pick up Address * <span style="font-size:.8rem;font-weight:400;color:var(--muted)">(Please include door number)</span></label>
              <div class="lookup-container" id="pickupLookup">
                <div class="input-wrapper">
                  <input type="text" id="pickupSearch" name="pickupSearch" placeholder="Start typing address or postcode..." autocomplete="off" required>
                  <button type="button" class="btn-input-action" data-entry="pickup">Enter Manually</button>
                </div>
                <input type="hidden" name="pickupPostcodeAuto" id="pickupPostcodeAuto">
              </div>
              <div class="manual-container" id="pickupManual" style="display:none">
                <div class="manual-grid">
                  <input type="text" name="pickupAddress" id="pickupAddress" placeholder="Street Address">
                  <input type="text" name="pickupCity" id="pickupCity" placeholder="Town / City">
                  <input type="text" name="pickupPostcode" id="pickupPostcode" placeholder="Postcode">
                </div>
                <div style="margin-top:.5rem;display:flex;gap:1rem;align-items:center">
                  <button type="button" class="btn primary small" data-save="pickup">Save Address</button>
                  <button type="button" class="btn-text-action" data-lookup="pickup">Cancel</button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="destSearch">Prom Venue *</label>
              <div class="lookup-container" id="destLookup">
                <div class="input-wrapper">
                  <input type="text" id="destSearch" name="destSearch" placeholder="Start typing prom venue or postcode..." autocomplete="off" required>
                  <button type="button" class="btn-input-action" data-entry="dest">Enter Manually</button>
                </div>
                <input type="hidden" name="destPostcodeAuto" id="destPostcodeAuto">
              </div>
              <div class="manual-container" id="destManual" style="display:none">
                <div class="manual-grid">
                  <input type="text" name="destAddress" id="destAddress" placeholder="Venue Name / Street Address">
                  <input type="text" name="destCity" id="destCity" placeholder="Town / City">
                  <input type="text" name="destPostcode" id="destPostcode" placeholder="Postcode">
                </div>
                <div style="margin-top:.5rem;display:flex;gap:1rem;align-items:center">
                  <button type="button" class="btn primary small" data-save="dest">Save Address</button>
                  <button type="button" class="btn-text-action" data-lookup="dest">Cancel</button>
                </div>
              </div>
            </div>

          </div>

          <div class="form-actions">
            <button type="submit" class="btn primary large" style="width:100%">Get Prom Quote</button>
            <p class="form-note">We respond within 24 hours during business hours. No payment required at this stage.</p>
          </div>
        </form>
      </div>

      <!-- Sidebar -->
      <div class="booking-info">
        <div class="info-card">
          <h3>How Our Booking Process Works</h3>
          <div class="process-steps">
            <div class="step">
              <div class="step-number">1</div>
              <div class="step-content">
                <h4>Submit Your Quote</h4>
                <p>Complete the form with your Prom details and car preferences.</p>
              </div>
            </div>
            <div class="step">
              <div class="step-number">2</div>
              <div class="step-content">
                <h4>Receive Your Quote</h4>
                <p>We'll send your Prom quote within 24 hours during business hours.</p>
              </div>
            </div>
            <div class="step">
              <div class="step-number">3</div>
              <div class="step-content">
                <h4>Confirm Your Booking</h4>
                <p>Secure your date with a deposit. Booking confirmation sent immediately.</p>
              </div>
            </div>
            <div class="step">
              <div class="step-number">4</div>
              <div class="step-content">
                <h4>Final Preparations</h4>
                <p>We'll contact you 48 hours before your Prom to confirm all details.</p>
              </div>
            </div>
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
            <li>Red carpet arrival service</li>
            <li>Photo opportunities at venue</li>
            <li>24/7 customer support on Prom night</li>
          </ul>
        </div>

        <div class="info-card contact-card">
          <h3>Need Help?</h3>
          <p>Speak to our Prom booking specialists:</p>
          <div class="contact-options">
            <a href="tel:+447504040407" class="contact-btn">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" stroke="currentColor" stroke-width="2"/></svg>
              07504 040 407
            </a>
            <a href="mailto:info@justphantoms.com" class="contact-btn">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" stroke="currentColor" stroke-width="2"/><path d="M3 4l7 5 7-5" stroke="currentColor" stroke-width="2"/></svg>
              info@justphantoms.com
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Success Modal -->
<div id="successModal" class="success-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
  <div class="modal-content">
    <div class="modal-header">
      <div class="success-icon">
        <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
          <circle cx="25" cy="25" r="25" fill="var(--gold)"/>
          <path d="M16 25L22 31L34 19" stroke="#111" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h2 id="modalTitle">Prom Quote Submitted!</h2>
      <p>Thank you for choosing Just Phantoms. We'll send your Prom transport quote within 24 hours during business hours.</p>
    </div>
    <div class="modal-footer">
      <button class="btn primary" id="modalClose">Continue</button>
    </div>
  </div>
</div>

<?php get_footer();
