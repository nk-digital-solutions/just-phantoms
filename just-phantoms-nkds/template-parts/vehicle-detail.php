<?php
/**
 * Shared vehicle detail layout partial.
 * Called from each vehicle page template via include.
 *
 * Required variables (set before including):
 *   $vehicle_title   string  — Page <h1>
 *   $vehicle_badge   string  — Badge label (e.g. "Ultimate Luxury")
 *   $vehicle_intro   string  — Short hero paragraph
 *   $vehicle_image   string  — Full URL to main image
 *   $vehicle_image_alt string — Image alt text
 *   $vehicle_about   string  — Long description HTML
 *   $features        array   — array of ['title'=>'', 'desc'=>'']
 *   $service_tags    array   — list of service labels
 *   $specs           array   — array of ['label'=>'', 'value'=>'']
 *   $price_from      string  — e.g. "£500"
 *   $booking_title   string  — Sidebar booking heading
 *   $service_options array   — dropdown options for the booking sidebar
 *   $features_heading string  — optional, defaults to "Features & Amenities"
 *
 * @package just-phantoms-nkds
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$features_heading = $features_heading ?? 'Features & Amenities';
?>

  <section class="vehicle-hero">
    <div class="container-full">
      <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> /
        <a href="<?php echo esc_url( home_url( '/fleet/' ) ); ?>">Fleet</a> /
        <?php echo esc_html( $vehicle_title ); ?>
      </div>
      <div class="vehicle-title">
        <h1><?php echo esc_html( $vehicle_title ); ?></h1>
        <span class="badge-large"><?php echo esc_html( $vehicle_badge ); ?></span>
      </div>
      <p style="font-size:1.1rem;color:#e9e9e9;max-width:60ch;margin:0 auto"><?php echo wp_kses_post( $vehicle_intro ); ?></p>
    </div>
  </section>

  <div class="container-full content-grid">
    <main>

      <!-- Gallery -->
      <div class="gallery">
        <div class="gallery-display">
          <img src="<?php echo esc_url( $vehicle_image ); ?>" alt="<?php echo esc_attr( $vehicle_image_alt ); ?>" />
        </div>
        <div class="gallery-thumbnails">
          <div class="gallery-thumbnail"><img src="<?php echo esc_url( $vehicle_image ); ?>" alt="<?php echo esc_attr( $vehicle_image_alt ); ?> – Main View" /></div>
          <div class="gallery-thumbnail"><img src="<?php echo esc_url( $vehicle_image ); ?>" alt="<?php echo esc_attr( $vehicle_image_alt ); ?> – Side View" /></div>
          <div class="gallery-thumbnail"><img src="<?php echo esc_url( $vehicle_image ); ?>" alt="<?php echo esc_attr( $vehicle_image_alt ); ?> – Interior" /></div>
        </div>
      </div>

      <!-- About -->
      <section>
        <h2>About the <?php echo esc_html( $vehicle_title ); ?></h2>
        <p style="font-size:1.05rem;line-height:1.7;color:#e0e0e0;margin-bottom:2rem"><?php echo wp_kses_post( $vehicle_about ); ?></p>
      </section>

      <!-- Features -->
      <section>
        <h2><?php echo esc_html( $features_heading ); ?></h2>
        <div class="features-grid">
          <?php foreach ( $features as $f ) : ?>
          <div class="feature-card">
            <h4><?php echo esc_html( $f['title'] ); ?></h4>
            <p><?php echo esc_html( $f['desc'] ); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- Services -->
      <section class="services-section">
        <h3>Perfect for these services:</h3>
        <div class="services-grid">
          <?php foreach ( $service_tags as $tag ) : ?>
          <div class="service-tag"><?php echo esc_html( $tag ); ?></div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- Specs -->
      <section>
        <h3>Vehicle Specifications</h3>
        <table class="specs-table">
          <?php foreach ( $specs as $spec ) : ?>
          <tr>
            <th><?php echo esc_html( $spec['label'] ); ?></th>
            <td><?php echo esc_html( $spec['value'] ); ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </section>

    </main>

    <!-- Booking Sidebar -->
    <aside>
      <div class="booking-card">
        <div class="price-display">From <?php echo esc_html( $price_from ); ?></div>
        <div class="price-note">Per hire (4 hours minimum). Final price depends on date, duration, and distance.</div>

        <h4><?php echo esc_html( $booking_title ); ?></h4>
        <form id="vehicleBookingForm">
          <?php wp_nonce_field( 'jp_quote_nonce', 'nonce' ); ?>
          <input type="hidden" name="vehicleType" value="<?php echo esc_attr( strtolower( str_replace( ' ', '-', $vehicle_title ) ) ); ?>">
          <div class="form-row"><input type="date" name="eventDate" aria-label="Event date" required></div>
          <div class="form-row">
            <select name="serviceType" aria-label="Service type" required>
              <option value="" disabled selected>Select service</option>
              <?php foreach ( $service_options as $opt ) : ?>
              <option><?php echo esc_html( $opt ); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-row"><input type="text" name="pickupAddress" placeholder="Pickup location" aria-label="Pickup location" required></div>
          <div class="form-row"><input type="text" name="dropoffAddress" placeholder="Drop-off location" aria-label="Drop-off location"></div>
          <div class="form-row"><input type="text" name="fullName" placeholder="Your name" aria-label="Name" required></div>
          <div class="form-row"><input type="tel" name="phone" placeholder="Phone number" aria-label="Phone" required></div>
          <div id="vehicleFormMsg" style="display:none;padding:.75rem;border-radius:8px;margin:.5rem 0;font-size:.9rem;"></div>
          <button type="submit" class="btn primary" style="width:100%;margin-top:1rem">Get Instant Quote</button>
        </form>

        <div style="margin-top:1.5rem;padding-top:1rem;border-top:1px solid rgba(255,255,255,.1)">
          <p style="margin:0;font-size:.9rem"><strong>Need to speak to someone?</strong></p>
          <a class="btn ghost" href="tel:+447504040407" style="width:100%;margin-top:.5rem;justify-content:center">Call 07504 040 407</a>
        </div>
      </div>
    </aside>
  </div>

  <script>
  document.getElementById('vehicleBookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var btn = this.querySelector('button[type="submit"]');
    var orig = btn.innerHTML;
    btn.innerHTML = 'Sending...';
    btn.disabled = true;

    var data = new FormData(this);
    data.append('action', 'jp_submit_quote');

    fetch('<?php echo esc_url( admin_url( "admin-ajax.php" ) ); ?>', { method: 'POST', body: data })
      .then(function(r){ return r.json(); })
      .then(function(result) {
        var msgEl = document.getElementById('vehicleFormMsg');
        if (result.success) {
          msgEl.textContent = 'Thank you! We\'ll be in touch shortly.';
          msgEl.style.cssText = 'display:block;background:rgba(46,204,113,.15);border:1px solid #2ecc71;color:#2ecc71;';
          document.getElementById('vehicleBookingForm').reset();
        } else {
          msgEl.textContent = result.data.message || 'Something went wrong. Please call us directly.';
          msgEl.style.cssText = 'display:block;background:rgba(255,82,82,.15);border:1px solid #ff5252;color:#ff5252;';
        }
      })
      .catch(function() {
        var msgEl = document.getElementById('vehicleFormMsg');
        msgEl.textContent = 'Unable to send. Please call 07504 040 407.';
        msgEl.style.cssText = 'display:block;background:rgba(255,82,82,.15);border:1px solid #ff5252;color:#ff5252;';
      })
      .finally(function() { btn.innerHTML = orig; btn.disabled = false; });
  });
  </script>
