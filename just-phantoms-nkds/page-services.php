<?php
/**
 * Template Name: Services
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';
?>

  <section class="page-hero">
    <div class="container-full">
      <h1>Our Luxury Services</h1>
      <p>From intimate weddings to high-profile events, we provide tailored luxury transport solutions with professional chauffeurs and immaculate vehicles across the UK.</p>
    </div>
  </section>

  <section>
    <div class="container-full">
      <div class="grid g4">
        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Wedding%20Transport.jpg" alt="Wedding car service" /></div>
          <div class="body">
            <h3>Wedding Transport</h3>
            <p>Make your special day perfect with our luxury wedding car service.</p>
            <ul class="features">
              <li>Rolls-Royce and classic vehicles</li>
              <li>Wedding ribbons and decorations</li>
              <li>Red carpet service</li>
              <li>Professional uniformed chauffeur</li>
              <li>Flexible timing and routes</li>
            </ul>
          </div>
        </article>

        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Prom%20Transport.jpg" alt="Prom transport" /></div>
          <div class="body">
            <h3>Prom Transport</h3>
            <p>Arrive in style with friends in our party limousines and luxury vehicles.</p>
            <ul class="features">
              <li>Group bookings available</li>
              <li>Party atmosphere lighting</li>
              <li>Complimentary refreshments</li>
              <li>Photo opportunities</li>
              <li>Safe, professional drivers</li>
            </ul>
          </div>
        </article>

        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Music%20Videos%20%26%20Film.jpg" alt="Music video production" /></div>
          <div class="body">
            <h3>Music Videos &amp; Film</h3>
            <p>Statement vehicles for productions, with flexible hire terms for creatives.</p>
            <ul class="features">
              <li>Performance and luxury models</li>
              <li>Flexible filming schedules</li>
              <li>Professional crew cooperation</li>
              <li>Multiple vehicle options</li>
              <li>Competitive production rates</li>
            </ul>
          </div>
        </article>

        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/VIP%20%26%20Executive%20Transfer.jpg" alt="VIP chauffeur service" /></div>
          <div class="body">
            <h3>VIP &amp; Executive Transfer</h3>
            <p>Discreet, professional chauffeur service for business and VIP clients.</p>
            <ul class="features">
              <li>Executive vehicles available</li>
              <li>Corporate account options</li>
              <li>Punctual and discreet service</li>
              <li>Wi-Fi and charging facilities</li>
              <li>Meet and greet service</li>
            </ul>
          </div>
        </article>

        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Airport%20Transfers.jpg" alt="Airport transfer" /></div>
          <div class="body">
            <h3>Airport Transfers</h3>
            <p>Stress-free luxury travel to and from all major UK airports.</p>
            <ul class="features">
              <li>Flight monitoring service</li>
              <li>Luggage assistance included</li>
              <li>All major airports covered</li>
              <li>Early morning availability</li>
              <li>Fixed pricing guarantee</li>
            </ul>
          </div>
        </article>

        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Special%20Occasions.jpg" alt="Special events" /></div>
          <div class="body">
            <h3>Special Occasions</h3>
            <p>Celebrate birthdays, anniversaries and milestone moments in luxury.</p>
            <ul class="features">
              <li>Customized service packages</li>
              <li>Champagne service available</li>
              <li>Special occasion decorations</li>
              <li>Flexible itineraries</li>
              <li>Photo and video friendly</li>
            </ul>
          </div>
        </article>

        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Self%20Drive%20Options.jpg" alt="Self drive luxury" /></div>
          <div class="body">
            <h3>Self Drive Options</h3>
            <p>Drive selected luxury vehicles yourself with comprehensive insurance.</p>
            <ul class="features">
              <li>Select vehicles available</li>
              <li>Comprehensive insurance included</li>
              <li>Eligibility requirements apply</li>
              <li>Flexible hire periods</li>
              <li>Full handover briefing</li>
            </ul>
          </div>
        </article>

        <article class="service-card">
          <div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Corporate%20Events.jpg" alt="Corporate events" /></div>
          <div class="body">
            <h3>Corporate Events</h3>
            <p>Professional transport solutions for business events and conferences.</p>
            <ul class="features">
              <li>Multiple vehicle coordination</li>
              <li>Corporate billing options</li>
              <li>Event planning support</li>
              <li>Professional presentation</li>
              <li>Reliable service guarantee</li>
            </ul>
          </div>
        </article>
      </div>

      <div class="cta-section">
        <h3>Ready to book your perfect transport?</h3>
        <p>Get an instant quote tailored to your specific requirements. Our team responds within minutes during business hours.</p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap">
          <a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn primary">Get Instant Quote</a>
          <a href="tel:+447504040407" class="btn ghost">Call 07504 040 407</a>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
