<?php
/**
 * Template Name: Services
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Wedding &amp; Prom Car &amp; Limousine Hire Services</h1>
    <p>From intimate English ceremonies and large multi-car Asian Wedding events to standout Prom night arrivals, we deliver tailored chauffeur-driven transport across Preston, Blackburn, Burnley, Leeds, Bradford, York, Carlisle, Derby, Nottingham and surrounding areas.</p>
  </div>
</section>

<section>
  <div class="container">
    <div class="grid g4">

      <?php
      $services = array(
        array(
          'img'      => 'Wedding Transport.jpg',
          'name'     => 'Wedding Transport',
          'desc'     => 'Luxury Wedding transport for Asian and English Weddings, planned around your timings, venues and traditions.',
          'features' => array( 'Rolls-Royce and classic vehicles', 'Wedding ribbons and decorations', 'Red carpet service', 'Professional uniformed chauffeur', 'Flexible timing and routes' ),
        ),
        array(
          'img'      => 'Prom Transport.jpg',
          'name'     => 'Prom Transport',
          'desc'     => 'Arrive in style with friends in our party Limousines and luxury vehicles.',
          'features' => array( 'Group bookings available', 'Party atmosphere lighting', 'Complimentary refreshments', 'Photo opportunities', 'Safe, professional drivers' ),
        ),
        array(
          'img'      => 'Music Videos & Film.jpg',
          'name'     => 'Music Videos &amp; Film',
          'desc'     => 'Statement vehicles for productions, with flexible hire terms for creatives.',
          'features' => array( 'Performance and luxury models', 'Flexible filming schedules', 'Professional crew cooperation', 'Multiple vehicle options', 'Competitive production rates' ),
        ),
        array(
          'img'      => 'VIP & Executive Transfer.jpg',
          'name'     => 'VIP &amp; Executive Transfer',
          'desc'     => 'Discreet, professional chauffeur service for business and VIP clients.',
          'features' => array( 'Executive vehicles available', 'Corporate account options', 'Punctual and discreet service', 'Wi-Fi and charging facilities', 'Meet and greet service' ),
        ),
        array(
          'img'      => 'Airport Transfers.jpg',
          'name'     => 'Airport Transfers',
          'desc'     => 'Stress-free luxury travel to and from all major UK airports.',
          'features' => array( 'Flight monitoring service', 'Luggage assistance included', 'All major airports covered', 'Early morning availability', 'Fixed pricing guarantee' ),
        ),
        array(
          'img'      => 'Special Occasions.jpg',
          'name'     => 'Special Occasions',
          'desc'     => 'Celebrate birthdays, anniversaries and milestone moments in luxury.',
          'features' => array( 'Customised service packages', 'Champagne service available', 'Special occasion decorations', 'Flexible itineraries', 'Photo and video friendly' ),
        ),
        array(
          'img'      => 'Self Drive Options.jpg',
          'name'     => 'Self Drive Options',
          'desc'     => 'Drive selected luxury vehicles yourself with comprehensive insurance.',
          'features' => array( 'Select vehicles available', 'Comprehensive insurance included', 'Eligibility requirements apply', 'Flexible hire periods', 'Full handover briefing' ),
        ),
        array(
          'img'      => 'Corporate Events.jpg',
          'name'     => 'Corporate Events',
          'desc'     => 'Professional transport solutions for business events and conferences.',
          'features' => array( 'Multiple vehicle coordination', 'Corporate billing options', 'Event planning support', 'Professional presentation', 'Reliable service guarantee' ),
        ),
      );

      foreach ( $services as $svc ) : ?>
        <article class="service-card">
          <div class="imgwrap">
            <img src="<?php echo esc_url( jp_assets( 'images/services/' . $svc['img'] ) ); ?>" alt="<?php echo esc_attr( strip_tags( $svc['name'] ) ); ?>" loading="lazy">
          </div>
          <div class="body">
            <h3><?php echo wp_kses_post( $svc['name'] ); ?></h3>
            <p><?php echo esc_html( $svc['desc'] ); ?></p>
            <ul class="features">
              <?php foreach ( $svc['features'] as $feat ) : ?>
                <li><?php echo esc_html( $feat ); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </article>
      <?php endforeach; ?>

    </div>

    <div class="cta-section">
      <h3>Ready to secure your Wedding or Prom transport?</h3>
      <p>Get an instant quote for your Wedding or Prom car and Limousine package. We regularly cover Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>
      <div class="cta-buttons">
        <a href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>" class="btn primary">Get Wedding Quote</a>
        <a href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>" class="btn btn-prom-quote">Get Prom Quote</a>
        <a href="tel:+447504040407" class="btn btn-hero-tel">Call 07504 040 407</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer();
