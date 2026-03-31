<?php
/**
 * Template Name: Vehicle - Rolls Royce Phantom
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header();

$vehicle = array(
  'name'      => 'Rolls Royce Phantom',
  'badge'     => 'Ultimate Luxury',
  'seats'     => '4',
  'img_dir'   => 'images/fleet/rolls-royce-phantom/',
  'main_img'  => 'Rolls Royce Phantom.jpg',
  'thumbs'    => array( 'Rolls Royce Phantom.jpg', '2.jpg', '5.jpg' ),
  'desc'      => array(
    'The Rolls Royce Phantom represents the ultimate expression of luxury automotive excellence and remains the world\'s most prestigious chauffeur-driven vehicle. This iconic masterpiece combines timeless British craftsmanship with modern technology, delivering an unforgettable experience for Weddings, Proms, funerals, and VIP occasions across the UK. Featuring the legendary Starlight Headliner with thousands of fiber-optic stars, massage and heated seats throughout, and whisper-quiet V12 power, the Phantom ensures every journey is extraordinary.',
    'With its handcrafted leather interior, real wood veneers, premium sound system, and advanced technology including sat-nav touchscreen and all-round cameras, this luxury vehicle provides unmatched comfort and sophistication. Whether you\'re planning a traditional English Wedding or a multi-venue Asian Wedding day, the Rolls Royce Phantom combines commanding presence with discreet elegance. Available for chauffeur-driven hire across Preston, Blackburn, Burnley, Leeds, Bradford, York, Carlisle, Derby, Nottingham and surrounding towns.',
  ),
  'features'  => array(
    array( 'title' => 'Starlight Headliner', 'desc' => 'Iconic fiber-optic starlight ceiling with thousands of twinkling stars creating an unforgettable magical atmosphere.' ),
    array( 'title' => 'Massage &amp; Climate Seats', 'desc' => 'Heated and vented seats front and rear with massage functions, ensuring ultimate comfort on every journey.' ),
    array( 'title' => 'Premium Technology', 'desc' => 'Sat-nav touchscreen, premier sound system, Bluetooth connectivity, and all-round cameras for a sophisticated experience.' ),
    array( 'title' => 'Handcrafted Excellence', 'desc' => 'Finest leather seating, real wood veneers, electric boot, rear seat controls, and timeless Rolls Royce craftsmanship.' ),
  ),
  'specs'     => array(
    'Model'         => 'Rolls Royce Phantom',
    'Capacity'      => '4 passengers',
    'Engine'        => '6.75L V12 Twin-Turbo',
    'Transmission'  => '8-Speed Automatic',
    'Key Features'  => 'Starlight Headliner, Heated &amp; Vented Seats, Sat Nav, Premier Sound, All-Round Cameras, Electric Boot',
    'Colour'        => 'Snow White',
  ),
  'services'  => array( 'Weddings', 'Proms', 'Funerals', 'VIP Events', 'Red Carpet', 'Special Occasions' ),
  'tagline'   => 'The pinnacle of luxury motoring &mdash; whisper-quiet elegance for Weddings and VIP occasions.',
  'quote_url' => '/wedding-quote/',
  'prom_url'  => '/prom-quote/',
);
?>

<section class="vehicle-hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <span>/</span>
      <a href="<?php echo esc_url( home_url( '/our-fleet/' ) ); ?>">Our Fleet</a>
      <span>/</span>
      <span><?php echo esc_html( $vehicle['name'] ); ?></span>
    </nav>
    <div class="vehicle-title">
      <h1><?php echo esc_html( $vehicle['name'] ); ?></h1>
      <span class="badge-large"><?php echo esc_html( $vehicle['badge'] ); ?></span>
      <span class="seats">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Seats <?php echo esc_html( $vehicle['seats'] ); ?> passengers
      </span>
    </div>
    <p class="vehicle-hero-desc"><?php echo wp_kses_post( $vehicle['tagline'] ); ?></p>
  </div>
</section>

<section>
  <div class="container">
    <div class="content-grid">

      <div class="main">
        <!-- Gallery -->
        <div class="gallery">
          <div class="gallery-display">
            <img src="<?php echo esc_url( jp_assets( $vehicle['img_dir'] . $vehicle['main_img'] ) ); ?>" alt="<?php echo esc_attr( $vehicle['name'] ); ?>" loading="eager">
          </div>
          <div class="gallery-thumbnails">
            <?php foreach ( $vehicle['thumbs'] as $i => $thumb ) : ?>
              <div class="gallery-thumbnail<?php echo $i === 0 ? ' active' : ''; ?>">
                <img src="<?php echo esc_url( jp_assets( $vehicle['img_dir'] . $thumb ) ); ?>"
                     alt="<?php echo esc_attr( $vehicle['name'] . ' - View ' . ( $i + 1 ) ); ?>"
                     loading="lazy">
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- About -->
        <div class="about">
          <h2>About the <?php echo esc_html( $vehicle['name'] ); ?></h2>
          <?php foreach ( $vehicle['desc'] as $para ) : ?>
            <p><?php echo esc_html( $para ); ?></p>
          <?php endforeach; ?>
        </div>

        <!-- Features -->
        <div class="features-grid">
          <?php foreach ( $vehicle['features'] as $feat ) : ?>
            <div class="feature-card">
              <h4><?php echo wp_kses_post( $feat['title'] ); ?></h4>
              <p><?php echo esc_html( $feat['desc'] ); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div><!-- .main -->

      <aside>
        <div class="services-section">
          <h3>Perfect for these services:</h3>
          <div class="service-tags">
            <?php foreach ( $vehicle['services'] as $svc ) : ?>
              <span class="service-tag"><?php echo esc_html( $svc ); ?></span>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="booking-card">
          <h3 class="specs-heading">Vehicle Specifications</h3>
          <table class="specs-table">
            <tbody>
              <?php foreach ( $vehicle['specs'] as $label => $value ) : ?>
                <tr>
                  <th><?php echo esc_html( $label ); ?></th>
                  <td><?php echo wp_kses_post( $value ); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="cta-buttons" style="margin-top:1.5rem">
            <a href="<?php echo esc_url( home_url( $vehicle['quote_url'] ) ); ?>" class="btn primary" style="width:100%;text-align:center;margin-bottom:.75rem;display:block">Get Wedding Quote</a>
            <a href="<?php echo esc_url( home_url( $vehicle['prom_url'] ) ); ?>" class="btn btn-prom-quote" style="width:100%;text-align:center;margin-bottom:.75rem;display:block">Get Prom Quote</a>
            <a href="tel:+447504040407" class="btn btn-hero-tel" style="width:100%;text-align:center;display:block">Call 07504 040 407</a>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<?php get_footer();
