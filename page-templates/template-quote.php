<?php
/**
 * Template Name: Quote
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Get Your Event Quote</h1>
    <p>Tell us your event, date, venues and preferred vehicle. We provide fast, transparent pricing across all of our services.</p>
  </div>
</section>

<section class="quote-form-section">
  <div class="container">
    <div class="form-layout">

      <!-- Quote Form -->
      <div class="quote-form-container">
        <div class="form-header">
          <h2>Request Your Quote</h2>
          <p>Complete the form below and we'll send your tailored transport quote within 24 hours during business hours.</p>
        </div>

        <form id="quoteForm" data-form-type="general">
          <?php wp_nonce_field( 'jp_quote_nonce', 'jp_nonce' ); ?>
          <input type="hidden" name="quoteType" value="general">

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

          <!-- Service Type -->
          <div class="form-section">
            <h3>Service Type</h3>
            <div class="form-group">
              <label for="eventService">Type of Service / Event *</label>
              <select id="eventService" name="eventService" required>
                <option value="">Select a service...</option>
                <option value="Wedding Transport">Wedding Transport</option>
                <option value="Prom Transport">Prom Transport</option>
                <option value="Music Videos &amp; Film">Music Videos &amp; Film</option>
                <option value="VIP &amp; Executive Transfer">VIP &amp; Executive Transfer</option>
                <option value="Airport Transfers">Airport Transfers</option>
                <option value="Special Occasions">Special Occasions</option>
                <option value="Birthdays">Birthdays</option>
                <option value="Corporate Events">Corporate Events</option>
              </select>
            </div>
          </div>

          <!-- Vehicle & Date -->
          <div class="form-section">
            <h3>Vehicle &amp; Date</h3>
            <div class="form-group">
              <label for="vehicleType">Choose Car *</label>
              <select id="vehicleType" name="vehicleType" required>
                <option value="">Select a vehicle...</option>
                <option value="rolls-royce-phantom">Rolls Royce Phantom &ndash; Snow White (4 Passengers)</option>
                <option value="range-rover-executive">Range Rover Autobiography LWB &ndash; Santorini Black (4 Passengers)</option>
                <option value="porsche-cayenne-limo">Porsche Cayenne Limo &ndash; Ibis White with Black Roof (8 Passengers)</option>
                <option value="bentley-chrysler-limo">Baby Bentley Chrysler Limo &ndash; Silver with Black Roof (8 Passengers)</option>
                <option value="mustang-gt500">Limited Edition Ford Mustang GT500 &ndash; Shadow Black (3 Passengers)</option>
                <option value="vintage-car">1930's Vintage Classic Car &ndash; Classic Ivory with Gloss Black (3 Passengers)</option>
                <option value="regent-landaulette">Regent Landaulette Convertible &ndash; Classic Ivory with Gloss Black (6 Passengers)</option>
              </select>
            </div>
            <div id="vehicleImageContainer" style="display:none;margin-top:1rem;text-align:center;background:rgba(255,255,255,.04);padding:1rem;border-radius:8px;border:1px solid rgba(255,255,255,.1)">
              <img id="vehicleImage" src="" alt="Selected Vehicle" style="max-width:100%;height:auto;border-radius:4px">
              <p id="vehicleNameDisplay" style="margin-top:.5rem;font-weight:500;color:var(--muted)"></p>
            </div>
            <div class="form-row" style="margin-top:1rem">
              <div class="form-group">
                <label for="eventDate">Date Required *</label>
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

          <!-- Journey Details -->
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
              <label for="destSearch">Final Destination *</label>
              <div class="lookup-container" id="destLookup">
                <div class="input-wrapper">
                  <input type="text" id="destSearch" name="destSearch" placeholder="Start typing address or postcode..." autocomplete="off" required>
                  <button type="button" class="btn-input-action" data-entry="dest">Enter Manually</button>
                </div>
                <input type="hidden" name="destPostcodeAuto" id="destPostcodeAuto">
              </div>
              <div class="manual-container" id="destManual" style="display:none">
                <div class="manual-grid">
                  <input type="text" name="destAddress" id="destAddress" placeholder="Street Address">
                  <input type="text" name="destCity" id="destCity" placeholder="Town / City">
                  <input type="text" name="destPostcode" id="destPostcode" placeholder="Postcode">
                </div>
                <div style="margin-top:.5rem;display:flex;gap:1rem;align-items:center">
                  <button type="button" class="btn primary small" data-save="dest">Save Address</button>
                  <button type="button" class="btn-text-action" data-lookup="dest">Cancel</button>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="returnJourney">Return Journey?</label>
                <select id="returnJourney" name="returnJourney">
                  <option value="no">No</option>
                  <option value="yes">Yes</option>
                </select>
              </div>
              <div class="form-group">
                <label for="stopsCount">Any Stops Required?</label>
                <select id="stopsCount" name="stopsCount">
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
            <div id="returnJourneyFields" style="display:none">
              <div class="form-group" style="margin-top:1rem">
                <label for="returnSearch">Return Journey Address *</label>
                <div class="lookup-container" id="returnLookup">
                  <div class="input-wrapper">
                    <input type="text" id="returnSearch" name="returnSearch" placeholder="Start typing return address or postcode..." autocomplete="off">
                    <button type="button" class="btn-input-action" data-entry="return">Enter Manually</button>
                  </div>
                  <input type="hidden" name="returnPostcodeAuto" id="returnPostcodeAuto">
                </div>
                <div class="manual-container" id="returnManual" style="display:none">
                  <div class="manual-grid">
                    <input type="text" name="returnAddress" id="returnAddress" placeholder="Street Address">
                    <input type="text" name="returnCity" id="returnCity" placeholder="Town / City">
                    <input type="text" name="returnPostcode" id="returnPostcode" placeholder="Postcode">
                  </div>
                  <div style="margin-top:.5rem;display:flex;gap:1rem;align-items:center">
                    <button type="button" class="btn primary small" data-save="return">Save Address</button>
                    <button type="button" class="btn-text-action" data-lookup="return">Cancel</button>
                  </div>
                </div>
              </div>
              <div class="form-group" style="margin-top:1rem">
                <label for="returnTime">Return Time</label>
                <input type="time" id="returnTime" name="returnTime">
              </div>
            </div>

            <!-- Dynamic Stops -->
            <div id="stopsContainer"></div>

          </div>

          <div class="form-actions">
            <button type="submit" class="btn primary large" style="width:100%">Get Instant Quote</button>
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
                <p>Complete the form with your event details and preferences.</p>
              </div>
            </div>
            <div class="step">
              <div class="step-number">2</div>
              <div class="step-content">
                <h4>Receive Your Quote</h4>
                <p>We'll send you a detailed quote within 24 hours during business hours.</p>
              </div>
            </div>
            <div class="step">
              <div class="step-number">3</div>
              <div class="step-content">
                <h4>Confirm Your Booking</h4>
                <p>If you're happy with the quote, we'll send payment details for the deposit. Once received, a booking confirmation is emailed.</p>
              </div>
            </div>
            <div class="step">
              <div class="step-number">4</div>
              <div class="step-content">
                <h4>Final Preparations</h4>
                <p>We'll contact you 48 hours before your event to confirm all details.</p>
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
            <li>Meet and greet service</li>
            <li>Assistance with luggage/belongings</li>
            <li>24/7 customer support on event day</li>
          </ul>
        </div>

        <div class="info-card contact-card">
          <h3>Need Help?</h3>
          <p>Speak to our booking specialists:</p>
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
      <h2 id="modalTitle">Quote Request Submitted!</h2>
      <p>Thank you for choosing Just Phantoms. We'll respond within 24 hours during business hours.</p>
    </div>
    <div class="modal-footer">
      <button class="btn primary" id="modalClose">Continue</button>
    </div>
  </div>
</div>

<?php get_footer();
